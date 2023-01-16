<!DOCTYPE html>
<html lang="en-US" dir="ltr">


<!-- Mirrored from prium.github.io/phoenix/v1.7.0/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 16:27:34 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicons/favicon.ico')}}">

{{--    <link rel="manifest" href="{{asset('assets/img/favicons/manifest.json')}}">--}}
    <meta name="msapplication-TileImage" content="{{asset('assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('assets/vendors/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendors/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="{{asset('assets/vendors/simplebar/simplebar.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/line.css')}}">
    <link href="{{asset('assets/css/theme-rtl.min.css')}}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{asset('assets/css/theme.min.css')}}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{asset('assets/css/user-rtl.min.css')}}" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('assets/css/user.min.css')}}" type="text/css" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" href="{{asset('assets/css/toastr.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/toastr.js')}}"></script>
    <script>
        $(function() {
            $.toastr.config({
                time: 3000
            });
            setTimeout(function () {
                @if(Session::has('success'))
                $.toastr.success('{{Session::get('success')}}', {position: 'top-right'});
                @endif
                @if(Session::has('error'))
                $.toastr.error('{{Session::get('error')}}', {position: 'top-right'});
                @endif
            }, 1000);
        })
    </script>
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>

<body>
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container-fluid px-0" data-layout="container">
        @include('includes.admin.navbar.navbar-vertical')
        @include('includes.admin.navbar.navbar-top-expand')
        <script>
            var navbarTopShape = localStorage.getItem('phoenixNavbarTopShape');
            var navbarPosition = localStorage.getItem('phoenixNavbarPosition');
            var body = document.querySelector('body');
            var navbarDefault = document.querySelector('#navbarDefault');

            var documentElement = document.documentElement;
            var navbarVertical = document.querySelector('.navbar-vertical');


            navbarDefault.removeAttribute('style');
            navbarVertical.removeAttribute('style');


            var navbarTopStyle = localStorage.getItem('phoenixNavbarTopStyle');
            var navbarTop = document.querySelector('.navbar-top');
            if (navbarTopStyle === 'darker') {
                navbarTop.classList.add('navbar-darker');
            }

            var navbarVerticalStyle = localStorage.getItem('phoenixNavbarVerticalStyle');
            var navbarVertical = document.querySelector('.navbar-vertical');
            if (navbarVerticalStyle === 'darker') {
                navbarVertical.classList.add('navbar-darker');
            }
        </script>

        {{-------------------------------------}}
        {{---    Main content start here    ---}}
        {{-------------------------------------}}

        @yield('content')

        {{-------------------------------------}}
        {{---    Main content ends here    ----}}
        {{-------------------------------------}}


    </div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

@include('includes.customizer');

<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src={{asset('assets/vendors/popper/popper.min.js')}}></script>
<script src="{{asset('assets/vendors/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/anchorjs/anchor.min.js')}}"></script>
<script src="{{asset('assets/vendors/is/is.min.js')}}"></script>
<script src="{{asset('assets/vendors/fontawesome/all.min.js')}}"></script>
<script src="{{asset('assets/vendors/lodash/lodash.min.js')}}"></script>
<script src={{asset('assets/js/polyfill.min58be.js?features=window.scroll')}}></script>
<script src="{{asset('assets/vendors/list.js/list.min.js')}}"></script>
<script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/vendors/dayjs/dayjs.min.js')}}"></script>
<script src="{{asset('assets/js/phoenix.js')}}"></script>
<script src="{{asset('assets/vendors/echarts/echarts.min.js')}}"></script>
<script src="{{asset('assets/vendors/chart/chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/%40googlemaps/markerclusterer%402.0.14/dist/index.min.js')}}"></script>
<script src="{{asset('assets/js/ecommerce-dashboard.js')}}"></script>
</body>
</html>
