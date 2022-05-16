@extends('layouts.frontend', compact('title'))

@section('content')

<div class="banner-area banner-bg-1" style="background-image: url({{ $post_header->takeImage }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner">
                    <h2>Service</h2>
                    <ul class="page-title-link">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('blog', []) }}">Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Blog</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Blog Area =================-->
<section class="blog_area blog_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                @foreach ($posts as $post)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" width="100" src="{{ $post->takeImage }}" alt="">
                            <a href="#" class="blog_item_date">
                                <h3>{{ $post->created_at }}</h3>
                                <p>{{ $post->created_at }}</p>
                            </a>
                        </div>
                        <div class="blog_details">
                            <a class="d-inline-block" href="#">
                                <h2>{{ $post->title }}</h2>
                            </a>
                            <p>{!! Str::limit($post->contents, 200) !!}</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="far fa-user"></i>{{ $post->user->name }}</a></li>
                                {{-- <li><a href="#"><i class="far fa-user"></i>{{ $post->category->name }}</a></li> --}}
                                {{-- <li><a href="#"><i class="far fa-eye"></i><?=$data->views;?></a></li> --}}
                            </ul>
                        </div>
                    </article>
                @endforeach
                    <center>{{ $posts->links() }}</center>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Search Keyword'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_4" type="submit">Search</button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            @foreach ($categories as $category)
                            <li>
                                <a href="{{ $category->slug }}" class="d-flex">
                                    <p>{{ $category->name }}</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        <@foreach ($posts as $post)
                            <div class="media post_item">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>{{ $post->title }}</h3>
                                    </a>
                                    <p>{{ $post->created_at }}</p>
                                </div>
                            </div>
                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
    </div>

</section>
<!--================Blog Area =================-->

@endsection
