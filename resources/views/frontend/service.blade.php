@extends('layouts.frontend', compact('title'))

@section('content')

<div class="banner-area banner-bg-1" style="background-image: url({{ $page_header->takeImage }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner">
                    <h2>Service</h2>
                    <ul class="page-title-link">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('service', []) }}">Service</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="services" class="parallax section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Layanan Kami</h3>
            <p class="lead">{{ $page_header->title }}</p>
        </div><!-- end title -->

        <div class="owl-services owl-carousel owl-theme">
            @foreach ($services as $service)
            <div class="service-widget">
                <div class="post-media wow fadeIn">
                    <a href="{{ $service->takeImage }}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                    <img src="{{ $service->takeImage }}" alt="" class="img-responsive img-rounded">
                </div>
                <div class="service-dit">
                    <h3>{{ $service->title }}</h3>
                    <p>{!! $service->contents !!}</p>
                </div>
            </div>
            <!-- end service -->
            @endforeach
        </div><!-- end row -->

        <hr class="hr1">

        {{-- <div class="text-center">
            <a data-scroll href="#portfolio" class="btn btn-light btn-radius btn-brd">View Our Portfolio</a>
        </div> --}}
    </div><!-- end container -->
</div><!-- end section -->

@endsection
