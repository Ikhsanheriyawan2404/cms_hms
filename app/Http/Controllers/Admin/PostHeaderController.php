<?php

namespace App\Http\Controllers\Admin;

use App\Models\PostHeader;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PostHeaderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:blog-create', ['only' => ['create','store']]);
        $this->middleware('permission:blog-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (request()->ajax()) {
            $post_header = PostHeader::all();
            return DataTables::of($post_header)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<div class="d-flex justify-content-center">
                    <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-primary btn-sm mr-2" id="editItem"><i class="fas fa-pencil-alt"></i></a>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.post_header.index', [
            'title' => 'Post Header',
            'post_header' => PostHeader::find(1)
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'quote' => 'required',
            'keyword' => 'required',
            'description' => 'required',
        ]);

        PostHeader::updateOrCreate(
            ['id' => request('post_header_id')],
            [
                'title' => request('title'),
                'quote' => request('quote'),
                'keyword' => request('keyword'),
                'description' => request('description'),
            ]
        );
    }

    public function edit(PostHeader $post_header)
    {
        return response()->json($post_header);
    }

    public function updateImage(PostHeader $post_header)
    {
        request()->validate([
            'image' => 'image|mimes:png,jpeg,jpg|max:2048'
        ]);

        if (request('image')) {
            Storage::delete($post_header->image);
            $image = request()->file('image')->store('img/post_headers');
        } else {
            $image = $post_header->image;
        }

        $post_header->update([
            'image' => $image,
        ]);

        toast('Gambar post header berhasil diupdate!', 'success');
        return redirect()->route('post_header.index');
    }
}
