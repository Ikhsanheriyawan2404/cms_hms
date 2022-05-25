@extends('layouts.frontend', compact('title'))

@section('content')

<div class="slider-area">
    <div class="slider-wrapper owl-carousel">
        @foreach ($homepages as $homepage)
        <div class="slider-item home-one-slider-otem slider-item-four slider-bg-one" style="background-image: url({{ $homepage->takeImage }})">
            <div class="container">
                <div class="row">
                    <div class="slider-content-area">
                        <div class="slide-text">
                            <h1 class="homepage-three-title">{{ $homepage->title }}</h1>
                            <h2>
                                {!! $homepage->sub_title !!}
                            </h2>
                            <div class="slider-content-btn">
                                <a class="button btn btn-light btn-radius btn-brd" href="{{ route('about', []) }}">Read More</a>
                                <a class="button btn btn-light btn-radius btn-brd" href="{{ route('contact') }}">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div id="about" class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="message-box">
                    <h4>About Us</h4>
                    <h2>{{ $company_profile->title }}</h2>
                    <p class="lead">{!! $company_profile->contents !!}</p>

                    <a href="{{ route('about.details', $company_profile->slug) }}" class="btn btn-light btn-radius btn-brd grd1">Learn More</a>
                </div><!-- end messagebox -->
            </div><!-- end col -->

            <div class="col-md-6">
                <div class="post-media wow fadeIn">
                    <img src="{{ $company_profile->takeImage }}" alt="" class="img-responsive img-rounded">
                    <a href="https://www.youtube.com/watch?v=nhqpWsgqRCk&t=47s" data-rel="prettyPhoto[gal]" class="playbutton"><i class="flaticon-play-button"></i></a>
                </div><!-- end media -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="hr1">

        <div class="row">
            <div class="col-md-6">
                <div class="post-media wow fadeIn">
                    <img src="{{ $visi_misi->takeImage }}" alt="" class="img-responsive img-rounded">
                </div><!-- end media -->
            </div><!-- end col -->

            <div class="col-md-6">
                <div class="message-box">
                    <h4>Who We are</h4>
                    <h2>{{ $visi_misi->title }}</h2>
                    <p class="lead">
                        {!! $visi_misi->contents !!}
                    </p>

                    <a href="{{ route('about.details', $visi_misi->slug) }}" class="btn btn-light btn-radius btn-brd grd1">Learn More</a>
                </div><!-- end messagebox -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div class="parallax section parallax-off" data-stellar-background-ratio="0.9" style="background-image:url({{ asset('img') }}/parallax_05.png);">
    <div class="container">
        <div class="row text-center stat-wrap">
            @foreach ($album_vehicles as $album_vehicle)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <span data-scroll class="global-radius icon_wrap effect-1"><i class="flaticon-school-bus"></i></span>
                <p class="stat_count">{{ $album_vehicle->vehicles->count()}}</p>
                <h3>{{ $album_vehicle->name }}</h3>
            </div><!-- end col -->
            @endforeach

        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div id="services" class="parallax section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Layanan Kami</h3>
            <p class="lead">{{ $service_header->title }}</p>
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

        <div class="text-center">
            <a data-scroll href="{{ route('service', []) }}" class="btn btn-light btn-radius btn-brd">Lihat Layanan Kami</a>
        </div>
    </div><!-- end container -->
</div><!-- end section -->

<div class="parallax section noover" data-stellar-background-ratio="0.7" style="background-image:url({{ asset('img') }}/parallax_05.png);">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-6">
                <div class="customwidget text-left">
                    <h1>Beautiful Websites</h1>
                    <p>Full access control of the background parallax effects, <br>change your awesome background elements and edit colors from style.css or colors.css</p>
                    <ul class="list-inline">
                        <li><i class="fa fa-check"></i> Custom Sections</li>
                        <li><i class="fa fa-check"></i> Parallax's</li>
                        <li><i class="fa fa-check"></i> Icons & PSD</li>
                        <li><i class="fa fa-check"></i> Limitless Colors</li>
                    </ul><!-- end list -->
                    <a href="{{ route('blog') }}" data-scroll class="btn btn-light btn-radius btn-brd">Learn More</a>
                </div>
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="text-center image-center hidden-sm hidden-xs">
                    <img src="{{ asset('img') }}/parallax_06.png" alt="" class="img-responsive wow fadeInUp">
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div id="features" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Pengiriman Terakhir</h3>
            <p class="lead">{{ $delivery_header->quote }}</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="features-left">
                    @foreach ($delivery_left as $delivery)
                    <li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                        <i class="flaticon-school-bus"></i>
                        <div class="fl-inner">
                            <h4>{{ $delivery->title }}</h4>
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
                        <i class="flaticon-pantone"></i>
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
