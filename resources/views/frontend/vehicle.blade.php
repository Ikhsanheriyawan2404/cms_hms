@extends('layouts.frontend', compact('title'))

@section('content')

<div class="banner-area banner-bg-1" style="background-image: url({{ $vehicle_header->takeImage }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner">
                    <h2>Our Vehicle</h2>
                    <ul class="page-title-link">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('vehicle', []) }}">Kendaraan Kami</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="portfolio" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Kendaraan Kami</h3>
            <p class="lead">{{ $vehicle_header->description }}</p>
        </div><!-- end title -->
    </div><!-- end container -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="portfolio-filter text-center">
                    <ul>
                        <li><a class="btn btn-dark btn-radius btn-brd active" href="#" data-filter="*"><span class="oi hidden-xs" data-glyph="grid-three-up"></span> All</a></li>
                        @foreach ($album_vehicles as $album_vehicle)
                        <li><a class="btn btn-dark btn-radius btn-brd" data-toggle="tooltip" data-placement="top" title="{{ $album_vehicles->count() }}" href="#" data-filter=".cat{{ $album_vehicle->id }}">{{ $album_vehicle->name }}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>

        <hr class="invis">

        <div id="da-thumbs" class="da-thumbs portfolio">
            @foreach ($vehicles as $vehicle)
            <div class="post-media pitem item-w1 item-h1 cat{{ $vehicle->album_vehicle_id }}">
                <a href="{{ $vehicle->takeImage }}" data-rel="prettyPhoto[gal]">
                    <img src="{{ $vehicle->takeImage }}" alt="" class="img-responsive">
                    <div>
                        <h3>{{ $vehicle->name }} <small>{{ $vehicle->description }}</small></h3>
                        <i class="flaticon-unlink"></i>
                    </div>
                </a>
            </div>
            @endforeach

            <div class="post-media pitem item-w1 item-h1 cat2">
                <a href="uploads/portfolio_10.jpg" data-rel="prettyPhoto[gal]">
                    <img src="uploads/portfolio_10.jpg" alt="" class="img-responsive">
                    <div>
                        <h3>Danny Jeffers <small>Web Design</small></h3>
                        <i class="flaticon-unlink"></i>
                    </div>
                </a>
            </div>
        </div><!-- end portfolio -->
    </div><!-- end container -->
</div><!-- end section -->

@endsection
