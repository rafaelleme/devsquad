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
</head>
<body>
    <div id="app">

        <div class="container-fluid">
            <div class="row">
                <div class="app-freeshiping agis-medium">
                    <h2>FREE SHIPPING</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row app-menu">
                
                <div class="col-sm-2">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/logo-small.png') }}" alt="Logo Vintage - {{ config('app.name', 'Laravel') }}">
                    </a>
                </div>

                <nav class="offset-sm-1 col-sm-3">
                    <ul class="list-inline">
                        <li class="list-inline-item agis-medium">
                            <a href="#">FOR MEN</a>
                        </li>
                        <li class="list-inline-item agis-medium">
                            <a href="#">FOR WOMAN</a>
                        </li>
                        <li class="list-inline-item agis-medium">
                            <a href="#">OTHERS</a>
                        </li>
                    </ul>
                </nav>

                <div class="offset-sm-1 col-sm-2">
                    <div class="form-group app-search">
                        <input type="search" class="form-control agis-medium" id="search" placeholder="Search...">
                        <a href="javascript:;">
                            <img src="{{ url('img/search.jpg') }}" alt="Search icon - {{ config('app.name', 'Laravel') }}">
                        </a>
                    </div>
                </div>

                <div class="col-sm-3 app-area">
                    <a class="float-right agis-medium mt-4" href="{{ route('admin') }}">
                        ADMIN AREA
                    </a>

                    <a class="float-right mr-5" href="javascript:;">
                        <img src="{{ url('img/cart.jpg') }}" alt="Cart icon - {{ config('app.name', 'Laravel') }}">    
                    </a>
                </div>

            </div>
        </div>


        @yield('content')

        <div class="container-fluid">
            <div class="row app-footer-bg">

                <div class="container">
                    <div class="row app-footer">

                        <div class="col-sm-3">
                            <img src="{{ url('img/product-vintage.jpg') }}" alt="Product only - {{ config('app.name', 'Laravel') }}">
                        </div>

                        <div class="col-sm-3 agis-medium">
                            <h3>ABOUT</h3>
                            <ul class="list-unstyled">
                                <li><a href="javascript:;">OUR MISSION</a></li>
                                <li><a href="javascript:;">ABOUT US</a></li>
                                <li><a href="javascript:;">REVIEWS</a></li>
                            </ul>
                        </div>

                        <div class="col-sm-3 agis-medium">
                            <h3>MENU</h3>
                            <ul class="list-unstyled">
                                <li><a href="javascript:;">FOR MEN</a></li>
                                <li><a href="javascript:;">FOR WOMAN</a></li>
                                <li><a href="javascript:;">OTHERS</a></li>
                            </ul>
                        </div>

                        <div class="col-sm-3 agis-medium">
                            <h3>SOCIAL MEDIA</h3>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="javascript:;">
                                        <img src="{{ url('img/facebook-icon.jpg') }}" alt="Facebook icon - {{ config('app.name', 'Laravel') }}">
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript:;">
                                        <img src="{{ url('img/twitter-icon.jpg') }}" alt="Twitter icon - {{ config('app.name', 'Laravel') }}">
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript:;">
                                        <img src="{{ url('img/youtube-icon.jpg') }}" alt="Youtube icon - {{ config('app.name', 'Laravel') }}">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row mt-5 app-footer-contact">
                         <div class="col-sm-6 agis-medium">
                            <a href="mailto:support@vincerowatches.com">support@vincerowatches.com</a>
                        </div>
                        
                        <div class="col-sm-6 agis-medium">
                            <strong>2018 Vintage - All rights reserved.</strong>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</body>
</html>
