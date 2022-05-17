@extends('layouts.frontend', compact('title'))

@section('content')

<div class="banner-area banner-bg-1" style="background-image: url({{ $post_header->takeImage }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner">
                    <h2>Blog</h2>
                    <ul class="page-title-link">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('blog', []) }}">Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="main_blog_area">
    <div class="container">
        <div class="row main_blog_inner">
            <div class="col-md-9">
                <div class="main_blog_items">
                    @foreach ($post_most_viewed as $post)
                        <div class="main_blog_item">
                            <div class="main_blog_image">
                                <img src="{{ $post->takeImage }}" alt="">
                            </div>
                            <div class="main_blog_text">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    <h2>{{ $post->title }}</h2>
                                </a>
                                <div class="blog_author_area">
                                    <a href="#"><i class="fa fa-user"></i>By : <span>{{ $post->user->name }}</span></a>
                                    @foreach ($post->categories as $category)
                                    <a href="#"><i class="fa fa-tag"></i><span>{{ $category->name }}</span></a>
                                    @endforeach
                                    <a href="#"><i class="fa fa-comments-o"></i>Comments: {{ $post->comments->count() }}</a>
                                </div>
                                {!! Str::limit($post->contents, 200) !!}
                                </p>
                                <a href="{{ route('blog.show', $post->slug) }}" data-scroll class="btn btn-light btn-radius btn-brd">Read more</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation" class="blog_pagination">
                    <div class="text-center">{{ $posts->links() }}</div>
                </nav>
            </div>
            <div class="col-md-3">
                <div class="sidebar_area">
                    <aside class="r_widget search_widget">
                        <div class="input-group">
                            <form action="{{ route('blog.search', []) }}" method="get" id="search-form">
                            </form>
                            <input type="text" class="form-control" name="search" placeholder="Enter Search Keywords">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" onclick="event.preventDefault();document.getElementById('search-form').submit();"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </aside>
                    <aside class="r_widget categories_widget">
                        <div class="r_widget_title">
                            <h3>Categories</h3>
                        </div>
                        <ul>
                            @foreach ($categories as $category)

                            <li><a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }} <span>({{ $category->posts->count() }})</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                            @endforeach
                        </ul>
                    </aside>
                    <aside class="r_widget recent_widget">
                        <div class="r_widget_title">
                            <h3>Berita Terbaru</h3>
                        </div>
                        <div class="recent_inner">
                            @foreach ($posts as $post)
                            <div class="recent_item">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    <h4>{{ $post->title }}</h4>
                                </a>
                                <h5>{{ $post->created_at }}</h5>
                            </div>
                            @endforeach
                        </div>
                    </aside>
                    {{-- <aside class="r_widget tage_widget">
                        <div class="r_widget_title">
                            <h3>Tages</h3>
                        </div>
                        <ul>
                            <li><a href="#">Investment</a></li>
                            <li><a href="#">Mutual Funds</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">investment</a></li>
                            <li><a href="#">Consulting</a></li>
                            <li><a href="#">Growth</a></li>
                        </ul>
                    </aside> --}}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
