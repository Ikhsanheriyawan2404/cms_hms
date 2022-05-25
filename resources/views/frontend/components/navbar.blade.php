<div class="top-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="left-top">
                    <div class="email-box">
                        <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> cvharumanis@yahoo.co.id</a>
                    </div>
                    <div class="phone-box">
                        <a href="tel:1234567890"><i class="fa fa-phone" aria-hidden="true"></i> +62 852-2453-3384</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="right-top">
                    <div class="social-box">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss-square" aria-hidden="true"></i></a></li>
                        <ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header header_style_01">
    <nav class="megamenu navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="{{ asset('img') }}/logoheader_hms.png" alt="image"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home', []) }}">Home</a></li>
                    <li><a class="{{ request()->routeIs('about.*') ? 'active' : '' }}" href="{{ route('about')}}">About us</a></li>
                    <li><a class="{{ request()->routeIs('delivery') ? 'active' : '' }}" href="{{ route('delivery')}}">Deliveries</a></li>
                    <li><a class="{{ request()->routeIs('vehicle') ? 'active' : '' }}" href="{{ route('vehicle', []) }}">Our Vehicle</a></li>
                    <li><a class="{{ request()->routeIs('service') ? 'active' : '' }}" href="{{ route('service', []) }}">Services</a></li>
                    <li><a class="{{ request()->routeIs('blog') ? 'active' : '' }} || {{ request()->routeIs('blog.*') ? 'active' : '' }}" href="{{ route('blog', []) }}">Blog</a></li>
                    <li><a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact', []) }}">Contact</a></li>
                    @hasanyrole('Author|Superadmin')
                        <li><a class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard', []) }}">Dashboard</a></li>
                    @endhasrole
                </ul>
            </div>
        </div>
    </nav>
</header>
