<!DOCTYPE html>
<html lang="en">
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
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    {{-- <link href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/css/all.min.css') }}">
    {{-- <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet"> --}}
    <script src="{{ asset('assets/js/custom/effect-fade.js') }}"></script>
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
                            <a href="https://www.uph.edu/id/admission/graduate#proses-pendaftaran" target="_blank">S2/S3 Program</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ config('app.main_url').'partners' }}">{{ __('lang.corporate_partnership') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ config('app.main_url').'card' }}">{{ __('lang.alumni_card') }}</a>
                        </li>
                        @if(Session::has('user'))
                        <li class="nav-item">
                            <a href="{{ config('app.main_url').'services' }}">{{ __('lang.services') }}</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ config('app.main_url').'profile' }}">{{ __('lang.tracer_study') }}</a>
                        </li>
                        <li class="nav-item pd-side-1">
                            <a href="#" class="link_no_hover">|</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- <div class="container-fluid sticky-top header">
            <div class="container"> -->
        <nav class="navbar navbar-expand-lg navbar-light header">
            <div class="container">
                <button class="navbar-toggler custom-toggler" data-toggle="collapse" data-target="#navbarcontent">
                    <i class="fa fa-bars text-blue"></i>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/00_ALUMNI_MAIN/ALUMNI-HEADER-LOGO.png') }}" alt="UPH Logo" />
                </a>
                <button type="button" class="navbar-usericon link-sign-in" data-toggle="modal"
                                data-target="#modal-account">
                    <i class="fa fa-user"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarcontent">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ config('app.main_url').'reconnect' }}" class="nav-link">{{ __('lang.alumni_reconnect') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ config('app.main_url').'stories' }}" class="nav-link">{{ __('lang.alumni_stories') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ config('app.main_url').'news' }}" class="nav-link">{{ __('lang.news_events') }}</a>
                        </li>
                        {{-- <li class="nav-item {{ (Request::segment(1)=='job')? 'nav-selected':'' }}">
                            <a href="{{ route('job') }}" class="nav-link">Job Listings</a>
                        </li> --}}
                            @if(Auth::user())
                        <li class="nav-item desktop-dropdown">
                            <a class="nav-link p-1" id="desktopDropdown" data-toggle="dropdown"
                                aria-expanded="false">
                                @if(!empty(Auth::user()->photo))
                                <img src="{{ config('app.main_url').'img/students/'.Auth::user()->photo }}"
                                    class="rounded-circle z-depth-0" alt="avatar image" width="40">
                                @else
                                <img src="{{ asset('assets/img/default.png') }}"
                                    class="rounded-circle z-depth-0" alt="avatar image" width="40">
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="desktopDropdown">
                                <a class="dropdown-item" href="{{ config('app.main_url').'profile' }}">{{ __('lang.profile') }}</a>
                                <a class="dropdown-item" href="{{ route('home') }}">{{ __('lang.messages') }}</a>
                                <a class="dropdown-item" href="{{ config('app.main_url').'profile?a=2' }}">{{ __('lang.settings') }}</a>
                                <a class="dropdown-item" href="#" onclick="$('#sign-out').submit();">{{ __('lang.logout') }}</a>
                                <form id="sign-out" method="POST" action="{{ route('logout') }}">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                            @else
                        <li class="nav-item">
{{--                             <button type="button" class="btn nav-link md-btn link-sign-in" data-toggle="modal"
                                    data-target="#modal-account">LOGIN</button> --}}
                            <a href="{{ route('login') }}" class="btn md-btn link-sign-in">{{ __('lang.login') }}</a>
                        </li>
                            @endif

                        <li class="nav-item subheader-mobile">
                            <a href="https://www.uph.edu/id/admission/graduate#proses-pendaftaran" target="_blank" class="nav-link">S2/S3 Program</a>
                        </li>
                        <li class="nav-item subheader-mobile">
                            <a href="{{ config('app.main_url').'partners' }}" class="nav-link">{{ __('lang.corpote_partnership') }}</a>
                        </li>
                        <li class="nav-item subheader-mobile sub-nav-selected">
                            <a href="{{ config('app.main_url').'card' }}" class="nav-link">{{ __('lang.alumni_card') }}</a>
                        </li>
                        @if(Session::has('user'))
                        <li class="nav-item subheader-mobile">
                            <a href="{{ config('app.main_url').'services' }}" class="nav-link">{{ __('lang.services') }}</a>
                        </li>
                        @endif
                        <li class="nav-item subheader-mobile">
                            <a href="{{ config('app.main_url').'tracer-study' }}" class="nav-link">{{ __('lang.tracer_study') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- End Header -->

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
</div>