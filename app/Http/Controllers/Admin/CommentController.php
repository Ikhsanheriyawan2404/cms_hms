<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:comment-crud', ['only' => ['index', 'show', 'create', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        if (request()->ajax()) {
            $comments = Comment::latest()->get();
            return DataTables::of($comments)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                           <form action=" ' . route('comments.destroy', $row->id) . '" method="POST">
                               <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah yakin ingin menghapus ini?\')"><i class="fas fa-trash"></i></button>
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                           </form>
                        </div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.comments.index', [
            'title' => ' Komentar',
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'messages' => 'required',
        ]);

        Comment::create([
            'name' => request('name'),
            'email' => request('email'),
            'messages' => request('messages'),
            'post_id' => request('post_id'),
        ]);

        Alert::success('Komentar Berhasil', 'Terimaksih komentarnya!');
        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        toast('Data komentar berhasil dihapus!', 'success');
        return redirect()->route('comments.index');
    }
}
