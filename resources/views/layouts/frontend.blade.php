<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Site Metas -->
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/images/hms.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('frontend') }}/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/hms-style.css">

    <!-- Modernizer for Portfolio -->
    <script src="{{ asset('frontend') }}/js/modernizer.js"></script>

    @yield('custom-styles')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__ball"></div>
		</div>
    </div><!-- end loader -->
    <!-- END LOADER -->

    @include('frontend.components.navbar')

    @yield('content')

    @include('frontend.components.footer')

    <!-- ALL JS FILES -->
    <script src="{{ asset('frontend') }}/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('frontend') }}/js/custom.js"></script>
    <script src="{{ asset('frontend') }}/js/portfolio.js"></script>
    <script src="{{ asset('frontend') }}/js/hoverdir.js"></script>

    @yield('custom-scripts')

</body>

</html>
