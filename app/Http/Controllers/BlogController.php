<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Customer;
use App\Models\PostHeader;

class BlogController extends Controller
{
    public function index()
    {
        return view('frontend.blog', [
            'title' => 'Halaman Blog',
            'posts' => Post::latest()->paginate(5),
            'categories' => Category::all(),
            'post_header' => PostHeader::find(1),
            'customers' => Customer::all()
        ]);
    }
}
