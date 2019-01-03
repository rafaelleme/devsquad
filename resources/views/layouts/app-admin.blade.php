<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Select2 -->
    <link href="{{ asset('js/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/select2/dist/js/select2.min.js') }}" defer></script>

    <!-- Dropzone -->
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

    <!-- Mask -->
    <script src="{{ asset('js/mask/jquery.mask.min.js') }}"></script>

    <!-- Swal -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">var APP_URL = {!! json_encode(url('/')) !!}</script>
</head>
<body>

    <div id="app">

        @if (Auth::user())
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    <img src="{{ asset('img/logo-small.png') }}" alt="Logo Vintage - Vintage Ecommerce">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <a href="javascript:;">
                                <img src="{{ asset('img/user.jpg') }}" alt="User icon - Vintage Ecommerce">
                            </a>
                        </li>
                        <li class="nav-item dropdown admin-menu-singout">
                            <a class="dropdown-item agis-medium" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                SING OUT
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endif

        <main class="py-4 {{ Auth::user() ? 'admin-bg' : '' }}">
            <div class="container-fluid">
                <div class="row">
                    @if (Auth::user())
                        <div class="col-sm-3 col-lg-2 admin-menu agis-medium">
                            <h3>MENU</h3>
                            <ul class="list-group list-unstyled">
                                <li>
                                    <a href="{{ route('products.index') }}">PRODUCTS</a>
                                </li>
                                <li>
                                    <a href="javascript:;">ORDERS</a>
                                </li>
                                <li>
                                    <a href="javascript:;">CUSTOMERS</a>
                                </li>
                                <li>
                                    <a href="javascript:;">ANALYTICS</a>
                                </li>
                                <li>
                                    <a href="javascript:;">DISCOUNTS</a>
                                </li>
                                <li>
                                    <a href="javascript:;">APPS</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
                <div class="row justify-content-center admin-rights agis-medium">
                    <strong>2018 Vintage - All rights reserved.</strong>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
