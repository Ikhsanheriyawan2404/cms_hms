@extends('layouts.frontend', compact('title'))

@section('content')
@include('sweetalert::alert')

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

<section class="main_blog_area">
    <div class="container">
        <div class="row main_blog_inner">
            <div class="col-md-9">
                <div class="main_blog_items">
                    <div class="main_blog_item">
                        <div class="main_blog_image">
                            <img src="{{ $post->takeImage }}" alt="">
                        </div>
                        <div class="main_blog_text">
                            <a href="#">
                                <h2>{{ $post->title }}</h2>
                            </a>
                            <div class="blog_author_area">
                                <a href="#"><i class="fa fa-user"></i>By : <span>{{ $post->user->name }}</span></a>
                                {{-- <a href="#"><i class="fa fa-tag"></i><span><?= $single_blog->nama_kategori; ?></span></a>
                                <a href="#"><i class="fa fa-comments-o"></i>Komentar: <?= $jml_komen; ?></a> --}}
                            </div>
                            {!! $post->contents !!}
                        </div>
                    </div>
                    <div class="s_comment_list">
                        {{-- <h3>Komentar <?= $jml_komen; ?></h3> --}}
                        <div class="s_comment_list_inner">
                            @foreach ($comments as $comment)
                                <div class="media">
                                    <div class="media-left">
                                        <img src="img/comment/comment-1.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#">
                                            <h4>{{ $comment->name }}</h4>
                                        </a>
                                        <p>{{ $comment->messages }}</p>
                                        <div class="date_rep">
                                            <a href="#">{{ $comment->created_at }}></a>
                                            <a href="#commentForm">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="s_comment_area">
                        <h3>Tinggalkan Komentar</h3>
                        <div class="s_comment_inner">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> <br>
                            @enderror
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> <br>
                            @enderror
                            @error('messages')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> <br>
                            @enderror
                            <form class="row contact_us_form" action="{{ route('comments.store') }}" method="post" id="commentForm" novalidate="novalidate">
                                @csrf
                                <input type="hidden" value="{{ $post->id }}" name="post_id">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="messages" id="messages" rows="1" placeholder="Wrtie message" required></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" value="submit" class="btn submit_blue form-control">submit now</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar_area">
                    <aside class="r_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Search Keywords">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </aside>
                    <aside class="r_widget categories_widget">
                        <div class="r_widget_title">
                            <h3>Categories</h3>
                        </div>
                        <ul>
                            @foreach ($categories as $category)

                            <li><a href="#">{{ $category->name }} <span>({{ $categories->count() }})</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

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
                                <a href="#">
                                    <h4>{{ $post->title }}</h4>
                                </a>
                                <h5>{{ $post->created_at }}</h5>
                            </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
