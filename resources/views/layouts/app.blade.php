<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{asset('/')}}front-end/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/remixicon.css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/odometer.min.css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/fancybox.css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/aos.css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/responsive.css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/dark-theme.css">
    <link rel="icon" type="image/png" href="{{asset('/')}}front-end/img/favicon.png">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @include('includes.front-end.preloader')
        @include('includes.front-end.switcher')
        @include('includes.front-end.header')


        @yield('content')


        @include('includes.front-end.footer')
        <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>


        <script data-cfasync="false" src="{{asset('/')}}front-end/js/email-decode.min.js"></script>
        <script src="{{asset('/')}}front-end/js/jquery.min.js"></script>
        <script src="{{asset('/')}}front-end/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('/')}}front-end/js/form-validator.min.js"></script>
        <script src="{{asset('/')}}front-end/js/contact-form-script.js"></script>
        <script src="{{asset('/')}}front-end/js/aos.js"></script>
        <script src="{{asset('/')}}front-end/js/owl.carousel.min.js"></script>
        <script src="{{asset('/')}}front-end/js/odometer.min.js"></script>
        <script src="{{asset('/')}}front-end/js/jquery.countdown.min.js"></script>
        <script src="{{asset('/')}}front-end/js/fancybox.js"></script>
        <script src="{{asset('/')}}front-end/js/jquery.appear.js"></script>
        <script src="{{asset('/')}}front-end/js/tweenmax.min.js"></script>
        <script src="{{asset('/')}}front-end/js/main.js"></script>
    </div>
</body>
</html>
