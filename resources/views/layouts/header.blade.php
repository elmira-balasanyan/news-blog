<!DOCTYPE HTML>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Megazine Template</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''/>
    <meta name='keywords' content=''/>
    <meta name='author' content=''/>

    <!-- Facebook and Twitter integration -->
    <meta property='og:title' content=''/>
    <meta property='og:image' content=''/>
    <meta property='og:url' content=''/>
    <meta property='og:site_name' content=''/>
    <meta property='og:description' content=''/>
    <meta name='twitter:title' content=''/>
    <meta name='twitter:image' content=''/>
    <meta name='twitter:url' content=''/>
    <meta name='twitter:card' content=''/>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel='shortcut icon' href='favicon.ico'>

    <link href='https://fonts.googleapis.com/css?family=Montserrat:300,400,700' rel='stylesheet'>

    <!-- Animate.css -->
    <link rel='stylesheet' href='{{asset('assets/css/animate.css')}}'>
    <!-- Icomoon Icon Fonts-->
    <link rel='stylesheet' href='{{asset('assets/css/icomoon.css')}}'>
    <!-- Bootstrap  -->
    <link rel='stylesheet' href='{{asset('assets/css/bootstrap.css')}}'>
    <!-- Flexslider  -->
    <link rel='stylesheet' href='{{asset('assets/css/flexslider.css')}}'>
    <!-- Magnific Popup -->
    <link rel='stylesheet' href='{{asset('assets/css/magnific-popup.css')}}'>
    <!-- Owl Carousel -->
    <link rel='stylesheet' href='{{asset('assets/css/owl.carousel.min.css')}}'>
    <link rel='stylesheet' href='{{asset('assets/css/owl.theme.default.min.css')}}'>
    <!-- Theme style  -->
    <link rel='stylesheet' href='{{asset('assets/css/style.css')}}'>

    <!-- Modernizr JS -->
    <script src='{{asset('assets/js/modernizr-2.6.2.min.js')}}'></script>
    <script src='{{asset('assets/js/respond.min.js')}}'></script>

    {{-- Select2--}}
    <link href='https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css' rel='stylesheet'/>
</head>
<body>
<div class='container-fluid'>
    <div class='row'>

        <div class='col-md-1'>
            <a href='#' class='js-colorlib-nav-toggle colorlib-nav-toggle'><i></i></a>
            <aside id='colorlib-aside' role='complementary' class='js-fullheight'>
                <h1 id='colorlib-logo'><a href='/'>Megazine</a></h1>
                <nav id='colorlib-main-menu' role='navigation'>
                    <ul>
                        @if((Auth::id()) == 1)
                            <li class='' colorlib' . '{{ 'Admin' ? '-active' : '' }}''>
                            <a href='{{ asset('/admin') }}'>Admin panel</a>
                            </li>
                        @endif

                        <br>

                        @foreach($categories as $category)
                            <li class="'colorlib' . '{{ $category->field ? '-active' : '' }}' ">
                                <a href='{{ asset('categories/' . $category->id . '/show') }}'>{{ $category->field }}</a>
                            </li>
                        @endforeach

                        <br>

                        @if (Route::has('login'))
                            <div class='top-right links'>
                                @auth
                                @else
                                    <a href='{{ route('login') }}' class='btn btn-primary with-arrow'> Login <i
                                            class='icon-arrow-right22'></i></a>
                                    @if (Route::has('register'))
                                        <a href='{{ route('register') }}' class='btn btn-primary with-arrow'> Sign Up <i
                                                class='icon-arrow-right22'></i></a>
                                    @endif
                                @endauth
                            </div>
                        @endif

                        @if(Auth::check())
                            <form id='logout-form' action='{{ url('logout') }}' method='POST'>
                                @csrf
                                <li><i class='fa fa-user'></i> {{Auth::user()->name}}:</li>
                                <button type='submit' class='btn btn-primary with-arrow'>Logout</button>
                            </form>
                        @endif
                    </ul>
                </nav>

                <div id='colorlib-page' style='margin-top: 20px'>
                    <p>
                        <small>
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            All rights reserved | This template is made with <i class='icon-heart' aria-hidden='true'></i>
                            by <a href='https://colorlib.com' target='_blank'>Colorlib</a>
                        </small>
                    </p>
                </div>
            </aside>
        </div>




