@extends('layouts.frontend', compact('title'))

@section('content')
@include('sweetalert::alert')

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
                                <a class="button btn btn-light btn-radius btn-brd" href="#">Read More</a>
                                <a class="button btn btn-light btn-radius btn-brd" href="#">Contact</a>
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

                    <a href="#services" class="btn btn-light btn-radius btn-brd grd1">Learn More</a>
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

                    <a href="#services" class="btn btn-light btn-radius btn-brd grd1">Learn More</a>
                </div><!-- end messagebox -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div class="parallax section parallax-off" data-stellar-background-ratio="0.9" style="background-image:url({{ $company_profile->takeImage }});">
    <div class="container">
        <div class="row text-center stat-wrap">
            @foreach ($album_vehicles as $album_vehicle)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <span data-scroll class="global-radius icon_wrap effect-1"><i class="flaticon-school-bus"></i></span>
                <p class="stat_count">{{ $album_vehicles->count()}}</p>
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
            <a data-scroll href="#portfolio" class="btn btn-light btn-radius btn-brd">View Our Portfolio</a>
        </div>
    </div><!-- end container -->
</div><!-- end section -->

<div class="parallax section noover" data-stellar-background-ratio="0.7" style="background-image:url('uploads/parallax_05.png');">
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
                    <a href="#services" data-scroll class="btn btn-light btn-radius btn-brd">Learn More</a>
                </div>
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="text-center image-center hidden-sm hidden-xs">
                    <img src="uploads/device_03.png" alt="" class="img-responsive wow fadeInUp">
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
                    @foreach ($deliveries as $delivery)
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
                    <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                        <i class="flaticon-pantone"></i>
                        <div class="fr-inner">
                            <h4>Limitless Colors</h4>
                            <p>Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. </p>
                        </div>
                    </li>
                    <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                        <i class="flaticon-cloud-computing"></i>
                        <div class="fr-inner">
                            <h4>Lifetime Update</h4>
                            <p>Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. </p>
                        </div>
                    </li>
                    <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.4s">
                        <i class="flaticon-line-graph"></i>
                        <div class="fr-inner">
                            <h4>SEO Friendly</h4>
                            <p>Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. </p>
                        </div>
                    </li>
                    <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                        <i class="flaticon-coding"></i>
                        <div class="fr-inner">
                            <h4>Simple Clean Code</h4>
                            <p>Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. </p>
                        </div>
                    </li>
                </ul>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div id="testimonials" class="parallax section db parallax-off" style="background-image:url('uploads/parallax_03.jpg');">
    <div class="container">
        <div class="section-title text-center">
            <h3>Testimonials</h3>
            <p class="lead">We thanks for all our awesome testimonials! There are hundreds of our happy customers! <br>Let's see what others say about GoodWEB Solutions website template!</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="testi-carousel owl-carousel owl-theme">
                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
                            <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
                        </div>
                        <div class="testi-meta">
                            <img src="uploads/testi_01.png" alt="" class="img-responsive alignleft">
                            <h4>James Fernando <small>- Manager of Racer</small></h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Awesome Services!</h3>
                            <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                        </div>
                        <div class="testi-meta">
                            <img src="uploads/testi_02.png" alt="" class="img-responsive alignleft">
                            <h4>Jacques Philips <small>- Designer</small></h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
                            <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                        </div>
                        <div class="testi-meta">
                            <img src="uploads/testi_03.png" alt="" class="img-responsive alignleft">
                            <h4>Venanda Mercy <small>- Newyork City</small></h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->
                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
                            <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
                        </div>
                        <div class="testi-meta">
                            <img src="uploads/testi_01.png" alt="" class="img-responsive alignleft">
                            <h4>James Fernando <small>- Manager of Racer</small></h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Awesome Services!</h3>
                            <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                        </div>
                        <div class="testi-meta">
                            <img src="uploads/testi_02.png" alt="" class="img-responsive alignleft">
                            <h4>Jacques Philips <small>- Designer</small></h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
                            <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                        </div>
                        <div class="testi-meta">
                            <img src="uploads/testi_03.png" alt="" class="img-responsive alignleft">
                            <h4>Venanda Mercy <small>- Newyork City</small></h4>
                        </div>
                        <!-- end testi-meta -->
                    </div><!-- end testimonial -->
                </div><!-- end carousel -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="hr1">

        <div class="row logos">
                @foreach ($customers as $customer)
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{ $customer->takeImage }}" alt="" class="img-repsonsive"></a>
                </div>
                @endforeach
        </div><!-- end row -->

    </div><!-- end container -->
</div><!-- end section -->


{{-- <div class="slider-area">
    <div class="slider-wrapper owl-carousel">
        <?php foreach ($header_home->result() as $data) { ?>
            <div class="slider-item home-one-slider-otem slider-item-four slider-bg-one" style="background-image: url(<{{ asset('frontend') }}/homepage-image/<?= $data->gambar; ?>)">
                <div class="container">
                    <div class="row">
                        <div class="slider-content-area">
                            <div class="slide-text">
                                <h1 class="homepage-three-title"><?= $data->judul; ?> <br><span>Transportation</span> Services</h1>
                                <h2><?= limit_words($data->isi, 3) . ' ...'; ?></h2>
                                <div class="slider-content-btn">
                                    <a class="button btn btn-light btn-radius btn-brd" href="{{ asset('frontend') }}/More</a>
                                    <a class="button btn btn-light btn-radius btn-brd" href="<?= site_url('contact'); ?>">Contact</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div id="about" class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="message-box">
                    <h4>About Us</h4>
                    <h2>PT Harum Manis Logistik (HMS)</h2>
                    <p class="lead"><?= $company_profile->judul; ?></p>
                    <p> <?= limit_words($company_profile->isi, 60); ?> . . . .</p>
                    <a href="<?= site_url('about/detail_about/') . $company_profile->slug; ?>" class="btn btn-light btn-radius btn-brd grd1">Learn More</a>
                </div><!-- end messagebox -->
            </div><!-- end col -->

            <div class="col-md-6">
                <div class="post-media wow fadeIn">
                    <img src="{{ asset('frontend') }}/about-image/<?= $company_profile->gambar; ?>" alt="" class="img-responsive img-rounded">
                    <a href="{{ asset('frontend') }}/http://www.youtube.com/watch?v=waKclt046Mw" data-rel="prettyPhoto[gal]" class="playbutton"><i class="flaticon-play-button"></i></a>
                </div><!-- end media -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="hr1">

        <div class="row">
            <div class="col-md-6">
                <div class="post-media wow fadeIn">
                    <img src="{{ asset('frontend') }}/about-image/<?= $visi_misi->gambar; ?>" alt="" class="img-responsive img-rounded">
                </div><!-- end media -->
            </div><!-- end col -->

            <div class="col-md-6">
                <div class="message-box">
                    <h4></h4>
                    <h2><?= $visi_misi->judul; ?></h2>
                    <p class="lead">PT. Harum Mnis Logistik (HMS)</p>
                    <p><?= limit_words($visi_misi->isi, 60); ?></p>
                    <a href="<?= site_url('about/detail_about/') . $visi_misi->slug; ?>" class="btn btn-light btn-radius btn-brd grd1">Learn More</a>
                </div><!-- end messagebox -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div class="parallax section parallax-off" data-stellar-background-ratio="0.9" style="background-image:url('{{ asset('frontend') }}/uploads/parallax_04.jpg');">
    <div class="container">
        <div class="row text-center stat-wrap">
            <?php foreach ($album_vehicle as $data_vehicle) {
                $album_id = $data_vehicle->albumvehicle_id;
                $query_gallery = $this->db->query("SELECT * FROM gallery_vehicle WHERE albumvehicle_id = '$album_id'");
                $total_gallery = $query_gallery->num_rows();
                if ($total_gallery > 0) {
                    $jml_photo = $total_gallery;
                } else {
                    $jml_photo = 0;
                }
            ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <span data-scroll class="global-radius icon_wrap effect-1"><i class="flaticon-school-bus"></i></span>
                    <p class="stat_count"><?= $jml_photo; ?></p>
                    <h3><?= $data_vehicle->nama; ?></h3>
                </div><!-- end col -->
            <?php } ?>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div id="services" class="parallax section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3><?= $quote_services->judul; ?></h3>
            <p class="lead"><?= $quote_services->quote; ?></p>
        </div><!-- end title -->

        <div class="owl-services owl-carousel owl-theme">
            <?php foreach ($our_services as $data_services) { ?>
                <div class="service-widget">
                    <div class="post-media wow fadeIn">
                        <a href="{{ asset('frontend') }}/services-image/<?= $data_services->gambar; ?>" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                        <img src="{{ asset('frontend') }}/services-image/<?= $data_services->gambar; ?>" alt="" class="img-responsive img-rounded">
                    </div>
                    <div class="service-dit">
                        <h3><?= $data_services->judul; ?></h3>
                        <p><?= $data_services->isi; ?></p>
                    </div>
                </div>
            <?php } ?>
            <!-- end service -->
        </div><!-- end row -->

        <hr class="hr1">

        <div class="text-center">
            <a data-scroll href="<?= site_url('services'); ?>" class="btn btn-light btn-radius btn-brd">Lihat Layanan Kami</a>
        </div>
    </div><!-- end container -->
</div><!-- end section -->

<div class="parallax section noover" data-stellar-background-ratio="0.7" style="background-image:url('{{ asset('frontend') }}/uploads/parallax_05.png');">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-6">
                <div class="customwidget text-left">
                    <h1>Fast Delivery</h1>
                    <p>Dengan Sistem GPS Kami, <br>Dapat kontrol pengiriman lebih efektif</p>
                    <ul class="list-inline">
                        <li><i class="fa fa-check"></i> Profesional</li>
                        <li><i class="fa fa-check"></i> One Stop Solution</li>
                        <li><i class="fa fa-check"></i> Tepat Waktu</li>
                        <li><i class="fa fa-check"></i> Maintenance Support</li>
                    </ul><!-- end list -->
                    <a href="{{ asset('frontend') }}/#services" data-scroll class="btn btn-light btn-radius btn-brd">Learn More</a>
                </div>
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="text-center image-center hidden-sm hidden-xs">
                    <img src="{{ asset('frontend') }}/uploads/device_03.png" alt="" class="img-responsive wow fadeInUp">
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div id="features" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <?php foreach ($quote_deliveried as $data_deliveried) { ?>
                <h3><?= $data_deliveried->judul; ?></h3>
                <p class="lead"><?= $data_deliveried->quote; ?></p>
            <?php } ?>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="features-left">
                    <?php foreach ($deliveries_left->result() as $key => $data_deliveries) { ?>
                        <li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.<?= $key ?>s">
                            <i class="flaticon-school-bus"></i>
                            <div class="fl-inner">
                                <h4><?= $data_deliveries->perusahaan; ?></h4>
                                <p><?= $data_deliveries->tujuan; ?></p>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-4 hidden-xs hidden-sm">
                <img src="{{ asset('frontend') }}/uploads/logo_delivery.png" class="img-center img-responsive" alt="">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="features-right">
                    <?php foreach ($deliveries_right->result() as $key => $data_deliveries) { ?>
                        <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.<?= $key ?>s">
                            <i class="flaticon-school-bus"></i>
                            <div class="fr-inner">
                                <h4><?= $data_deliveries->perusahaan; ?></h4>
                                <p><?= $data_deliveries->tujuan; ?></p>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section --> --}}

@endsection
