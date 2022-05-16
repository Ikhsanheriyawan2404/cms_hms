<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class PostController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Post::with('user')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('contents', function ($about) {
                    return Str::limit($about->contents, 100);
                })
                ->addColumn('image', function($request) {
                    return "<img src='$request->takeImage' class='img-fluid' />";
                })
                ->addColumn('users', function (Post $post) {
                    return $post->user->name;
                })
                ->editColumn('created_at', function($request) {
                    return $request->created_at->diffForHumans();
                })
                ->addColumn('action', function($row) {
                    $btn = '<div class="d-flex justify-content-center">
                    <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-primary btn-sm mr-2" id="showItem"><i class="fas fa-eye"></i></a>
                    <a href=" ' . route('posts.edit', $row->id) . '" class="btn btn-sm btn-primary mr-2"><i class="fas fa-pencil-alt"></i></a>
                        <form action="' . route('posts.destroy', $row->id) . '" method="post">
                        ' . csrf_field() . '
                        ' . method_field("DELETE") . '
                            <button type="submit" data-id="'.$row->id.'" class="btn btn-danger btn-sm" id="deleteItem" onclick="return confirm(\'Are you sure want to delete this?\')"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['contents', 'image', 'action'])
                ->make(true);
        }

        return view('backend.posts.index', [
            'title' => 'Data Postingan',
        ]);
    }

    public function create()
    {
        return view('backend.posts.create', [
            'title' => 'Tambah Postingan',
            'post' => new Post,
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {
        // Validasi inputan dari user untuk simpan post
        request()->validate([
            'title' => 'required|min:8|max:255|unique:posts,title,',
            'category' => 'required|array',
            'contents' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Inputan dari user
        $attr = [
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'meta_title' => request('title'),
            'meta_description' => request('meta_description'),
            'meta_keyword' => request('meta_keyword'),
            'image' => request('image') ? request()->file('image')->store('img/posts') : null,
            'contents' => request('contents'),
        ];

        // Menyimpan author post
        $post = auth()->user()->posts()->create($attr);
        // Menyimpan kategori post
        $post->categories()->sync(request('category'));

        // Menampilkan report success
        toast('Data postingan berhasil ditambahkan!', 'success');
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('backend.posts.edit', [
            'title' => 'Edit Postingan',
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => 'required|min:8|unique:posts,title,' . $post->id,
            'category' => 'required|array',
            'contents' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:2058',
        ]);

        if (request('image')) {
            Storage::delete($post->image);
            $image = request()->file('image')->store('img/post');
        } elseif ($post->image) {
            $image = $post->image;
        } else {
            $image = null;
        }

        $post->update([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'meta_title' => request('title'),
            'meta_description' => request('meta_description'),
            'meta_keyword' => request('meta_keyword'),
            'image' => $image,
            'contents' => request('contents'),
        ]);

        $post->categories()->sync(request('category'));

        toast('Data postingan berhasil diupdate!', 'success');
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->categories()->detach();
        Storage::delete($post->image);
        $post->delete();

        toast('Data postingan berhasil dihapus!', 'success');
        return redirect()->route('posts.index');
    }
}
