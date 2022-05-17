<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
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
            'post_most_viewed' => Post::with('comments')->withCount('comments')->orderBy('comments_count', 'DESC')->limit(5)->get(),
            'categories' => Category::all(),
            'post_header' => PostHeader::find(1),
            'customers' => Customer::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('frontend.blog_details', [
            'title' => $post->title,
            'post' => $post,
            'posts' => Post::latest()->paginate(5),
            'post_most_viewed' => Post::with('comments')->withCount('comments')->orderBy('comments_count', 'DESC')->limit(5)->get(),
            'categories' => Category::all(),
            'post_header' => PostHeader::find(1),
            'comments' => Comment::all(),
            'customers' => Customer::all()
        ]);
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->with('user')->latest()->paginate(5);
        return view('frontend.blog', [
            'title' => 'Kategori Postingan',
            'category' => $category,
            'posts' => $posts,
            'categories' => Category::all(),
            'post_header' => PostHeader::find(1),
            'customers' => Customer::all()
        ]);
    }

    public function search()
    {
        $query = request('search');
        return view('frontend.blog', [
            'title' => 'Hasil untuk ' . $query,
            'posts' => Post::where("title", "like", "%$query%")->latest()->paginate(5),
            'categories' => Category::get(),
            'post_header' => PostHeader::find(1),
            'customers' => Customer::all()
        ]);
    }
}
