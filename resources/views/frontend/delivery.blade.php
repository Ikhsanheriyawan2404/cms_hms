@extends('layouts.frontend', compact('title'))

@section('content')

<div class="banner-area banner-bg-1" style="background-image: url({{ $page_header->takeImage }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner">
                    <h2>Delivery</h2>
                    <ul class="page-title-link">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('delivery', []) }}">Delivery</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="features" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Pengiriman Terakhir</h3>
            <p class="lead">{{ $page_header->quote }}</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="features-left">
                    @foreach ($delivery_left as $delivery)
                    <li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                        <i class="flaticon-school-bus"></i>
                        <div class="fl-inner">
                            <h4>{{ $delivery->customer->company }}</h4>
                            <p>{!! $delivery->description !!}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 hidden-xs hidden-sm">
                <img src="uploads/ipad.png" class="img-center img-responsive" alt="">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="features-right">
                    @foreach ($delivery_right as $delivery)
                    <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                        <i class="flaticon-school-bus"></i>
                        <div class="fr-inner">
                            <h4>{{ $delivery->title }}</h4>
                            <p>{!! $delivery->description !!}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

@endsection
