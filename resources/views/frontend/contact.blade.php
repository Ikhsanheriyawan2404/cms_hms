@extends('layouts.frontend', compact('title'))

@section('content')
@include('sweetalert::alert')

<div class="banner-area banner-bg-1" style="background-image: url({{ $page_header->takeImage }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner">
                    <h2>Hubungi Kami</h2>
                    <ul class="page-title-link">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('contact', []) }}">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="contact" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Get in touch</h3>
            <p class="lead">Let us give you more details about the special offer website you want us. Please fill out the form below. <br>We have million of website owners who happy to work with us!</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="contact_form">
                    <div id="message"></div>
                    <form class="row" action="{{ route('contacts.store', []) }}" method="post">
                        @csrf
                        <fieldset class="row-fluid">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama">

                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="email" name="email" id="email" class="form-control @error('name') is-invalid @enderror" placeholder="Your Email">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="number" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Your Phone">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @error('messages')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <textarea class="form-control @error('messages') is-invalid @enderror" name="messages" id="messages" rows="6" placeholder="Give us more details.."></textarea>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                                <button type="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Submit</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-md-offset-1 col-sm-10 col-md-10 col-sm-offset-1 pd-add">
                <div class="address-item">
                    <div class="address-icon">
                        <i class="icon icon-location2"></i>
                    </div>
                    <h3>Headquarters</h3>
                    <p>PO Box 16122 Collins Street West
                        <br> Victoria 8007 Australia</p>
                </div>
                <div class="address-item">
                    <div class="address-icon">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <h3>Email Us</h3>
                    <p>info@yoursite.com
                        <br>info@yoursite.com</p>
                </div>
                <div class="address-item">
                    <div class="address-icon">
                        <i class="icon icon-headphones"></i>
                    </div>
                    <h3>Call Us</h3>
                    <p>+61 3 8376 6284
                        <br>+61 3 8376 6185</p>
                </div>
            </div>
        </div><!-- end row -->

    </div><!-- end container -->

    <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.428090594675!2d108.53001131477183!3d-6.717499995143633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x858cc53015e74665!2zNsKwNDMnMDMuMCJTIDEwOMKwMzEnNTUuOSJF!5e0!3m2!1sid!2sid!4v1652609029036!5m2!1sid!2sid" style="border:0;" width="100%" height="400" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div><!-- end section -->

@endsection
