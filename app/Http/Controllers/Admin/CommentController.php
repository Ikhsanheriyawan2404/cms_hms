<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
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
}
