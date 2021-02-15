<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Alumni - UPH | Universitas Pelita Harapan</title>
    <meta name="description" content="">
    <meta name="format-detection" content="telephone=no">
    <meta property="og:url" content="">
    <meta property="og:title" content="Alumni - UPH | Universitas Pelita Harapan">
    <meta property="og:type" content="website">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="twitter:card" content="summary">
    <link rel="icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/css/all.min.css') }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/custom/effect-fade.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div id="app">
    <!-- Subheader dan header -->
    <div class="fixed-top">
        <div class="container-fluid home-subheader">
            <div class="container">
                <nav class="navbar navbar-top navbar-expand-md">
                    <ul class="mr-auto">

                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#">S2/S3 Program</a>
                        </li>
                        <li class="nav-item">
                            <a href="Alumni-Partners.html">Corporate Partnership</a>
                        </li>
                        <li class="nav-item">
                            <a href="Alumni-Card.html">Alumni Card</a>
                        </li>
                        <li class="nav-item">
                            <a href="Alumni-Support-Service.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="Alumni-Tracer-Study.html">Tracer Study</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- <div class="container-fluid sticky-top header"> -->
        <nav class="navbar navbar-expand-lg navbar-light header">
            <div class="container">
                <button class="navbar-toggler custom-toggler" data-toggle="collapse" data-target="#navbarcontent">
                    <i class="fa fa-bars text-blue"></i>
                </button>
                <a class="navbar-brand" href="Alumni-Home.html">
                    <img src="img/00_ALUMNI_MAIN/ALUMNI-HEADER-LOGO.png" alt="UPH Logo" />
                </a>
                <button type="button" class="navbar-usericon">
                    <i class="fa fa-user"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarcontent">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="Alumni-Reconnect.html" class="nav-link">Alumni Reconnect</a>
                        </li>
                        <li class="nav-item">
                            <a href="Alumni-Stories.html" class="nav-link">Alumni Stories</a>
                        </li>
                        <li class="nav-item">
                            <a href="Alumni-News-Event.html" class="nav-link">News & Events</a>
                        </li>
                        <li class="nav-item">
                            <a href="Alumni-Job-Listing.html" class="nav-link">Job Listings</a>
                        </li>
                        <li class="nav-item desktop-dropdown">
                            <a class="dropdown-item" href="javascript:;" onclick="$('#logout-form').submit();">Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        
                        <li class="nav-item subheader-mobile">
                            <a href="#" class="nav-link">S2/S3 Program</a>
                        </li>
                        <li class="nav-item subheader-mobile">
                            <a href="Alumni-Partners.html" class="nav-link">Corporate Partnership</a>
                        </li>
                        <li class="nav-item subheader-mobile">
                            <a href="Alumni-Card.html" class="nav-link">Alumni Card</a>
                        </li>
                        <li class="nav-item subheader-mobile">
                            <a href="Alumni-Support-Service.html" class="nav-link">Services</a>
                        </li>
                        <li class="nav-item subheader-mobile">
                            <a href="Alumni-Tracer-Study.html" class="nav-link">Tracer Study</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
   <footer class="page-footer">
    <div class="container">
        <div class="row footer-top">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <img class="footer-logo" src="{{ asset('assets/img/00_ALUMNI_MAIN/ALUMNI-HEADER-LOGO.png') }}" width="60%" />
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                <div class="footer-icons d-inline-block">
                    <a href="https://www.linkedin.com/in/uphalumnirelations" target="_blank"><img src="{{ asset('assets/img/00_ALUMNI_MAIN/ALUMNI-HEADER-LINKEDIN.png') }}" alt="linkedIn"
                            class="footer-icon" /></a>
                    <a href="https://www.facebook.com/uphalumnirelations" target="_blank"><img src="{{ asset('assets/img/00_ALUMNI_MAIN/ALUMNI-HEADER-FACEBOOK.png') }}" alt="facebook"
                            class="footer-icon" /></a>
                    <a href="https://www.instagram.com/uphalumnirelations/" target="_blank"><img src="{{ asset('assets/img/00_ALUMNI_MAIN/ALUMNI-HEADER-INSTAGRAM.png') }}" alt="instagram"
                            class="footer-icon" /></a>
                </div>
            </div>
        </div>
        <hr class="footer-hr">
        </hr>
        <div class="row footer-desc">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <ul>
                    <li class="font-weight-bold text-grey-old">Tower Building C, 4<sup>th</sup> Floor.</li>
                    <li class="text-grey">M.H Thamrin Boulevard 1100, <br>Lippo Village - Tangerang 15811</li>
                </ul>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <ul>
                    <li class="text-grey"><i class="fa fa-phone-alt"></i> (021) 5460901 ext.2534</li>
                    <li class="text-grey"><i class="fab fa-whatsapp"></i> 0812 8890 0947</li>
                    <li class="text-grey"><i class="fa fa-envelope"></i> alumni.relations@uph.edu</li>
                </ul>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center">
                <a href="tel:0215460901" class="btn w-100 lg-btn">
                    <i class="fa fa-phone-alt pr-2"></i>{{ __('lang.call_us') }}</a>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center">
                <a href="https://wa.me/6281288900947" target="_blank" class="btn w-100 lg-btn">
                    <i class="fab fa-whatsapp pr-2"></i>{{ __('lang.chat_us') }}</a>
            </div>
        </div>
    </div>
    <div class="footer-copyright">Copyright © 2020 | UPH Alumni Relations</div>
  </footer>
  </div>