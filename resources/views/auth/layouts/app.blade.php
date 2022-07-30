<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - Tiki.vn - Website bán sách hàng đầu VN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('resources/assets/front-end/css/icon.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('resources/assets/front-end/css/materialize.min.css') }}"  media="screen,projection"/>

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/front-end/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/front-end/css/swiper.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('resources/assets/front-end/css/style.css') }}">

    <script src="{{ URL::asset('resources/assets/front-end/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('resources/assets/front-end/js/materialize.min.js') }}"></script>
    <script src="{{ URL::asset('resources/assets/front-end/js/swiper.jquery.min.js') }}"></script>
    <script src="{{ URL::asset('resources/views/lib/jquery.number.min.js') }}"></script>
    <script src="{{ URL::asset('resources/assets/front-end/js/myscript.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('resources/views/lib/rateYo/jquery.rateyo.min.css') }}">
    <script src="{{ asset('resources/views/lib/rateYo/jquery.rateyo.min.js') }}"></script>
    
    <link rel="icon" href="{{ asset('resources\assets\logo.ico') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('resources/assets/auth/css/app.css') }}" rel="stylesheet"> -->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <header id="header" >
        <div class="header-form-container navbar-fixed">
            <nav class="nav-extended">
                <div class="nav-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col l2">
                                <!-- <img src="resources/assets/logo.png" class="responsive-img" style="width: 40px"  alt="logo"> -->
                                <a href="{{ route('homepage') }}" class="brand-logo" style="position: relative">Bookbyte</a>
                                <!-- <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a> -->
                            </div>
                            <div class="col l1">
                              <a href="" class="show-menu"><i class="material-icons">menu</i></a>
                            </div>
                            <div class="col l5 offset-l4">
                                <ul class="">
                                    @if (Auth::guest())
                                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                        <li><a href="{{ route('register') }}">Đăng ký</a></li>
                                    @else
                                    <li class="col s6">
                                        <a class="dropdown-button" href="#!" data-activates="dropdown1">
                                            @php
                                                echo substr(Auth::user()->name, 0, 8);
                                            @endphp...<i class="material-icons right">arrow_drop_down</i>
                                        </a>
                                    </li>
                                    @endif
                                    <!-- <li id="header-cart " class="col s5">
                                        <a data-reactroot="" rel="nofollow" href="{{ route('cart.index') }}" class="header-cart item">
                                            Giỏ hàng<span class="cart-count">{{Cart::count()}}</span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div> <!--end container-->
                </div>
            </nav> <!-- end .nav-extand -->
        </div>
    </header><!-- /header -->

    <main class="wrap">
        <div class="container">
            @yield('content')
        </div>
        
        <div class="center-align">
            @include('front-end.pagination')
        </div>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('resources/assets/auth/js/app.js') }}"></script>
</body>
</html>
