@extends('layouts.frontend', compact('title'))

@section('content')

<div class="banner-area banner-bg-1" style="background-image: url({{ $about_header->takeImage }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner">
                    <h2>About Us</h2>
                    <ul class="page-title-link">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about', []) }}">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="profile_about" class="section wb">
    <div class="container">
        <div class="row ">
            <div class="col-md-3 col-sm-6">
                @foreach ($abouts as $about)
                    <div class="aboutmenu-item text-center">
                        <div class="footer-links hov">
                            <h4><a href="{{ route('about.details', $about->slug) }}">{{ $about->title }}<span class="icon icon-arrow-right2"></span></a></h4>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-9">
                @if (!$aboutBySlug)
                <div class="post-media wow fadeIn">
                    <img src="{{ $aboutBySlug->takeImage }}" alt="" class="img-responsive img-rounded">
                    </br>
                    <div class="message-box">
                        <h2>{{ $aboutBySlug->title }}</h2>
                        <p>{!! $aboutBySlug->contents !!}</p>
                    </div>
                </div><!-- end media -->
                @else
                <div class="post-media wow fadeIn">
                    <img src="{{ $about->takeImage }}" alt="" class="img-responsive img-rounded">
                    </br>
                    <div class="message-box">
                        <h2>{{ $about->title }}</h2>
                        <p>{!! $about->contents !!}</p>
                    </div>
                </div><!-- end media -->
                @endif
            </div><!-- end col -->
        </div><!-- end row -->
        <hr class="hr1">
    </div><!-- end container -->
</div><!-- end section -->

@endsection
