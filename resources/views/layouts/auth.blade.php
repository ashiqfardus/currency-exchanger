<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">


<!-- Mirrored from prium.github.io/phoenix/v1.7.0/pages/authentication/simple/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 16:30:19 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href={{asset('assets/img/favicons/apple-touch-icon.png')}}>
    <link rel="icon" type="image/png" sizes="32x32" href={{asset('assets/img/favicons/favicon-32x32.png')}}>
    <link rel="icon" type="image/png" sizes="16x16" href={{asset('assets/img/favicons/favicon-16x16.png')}}>
    <link rel="shortcut icon" type="image/x-icon" href={{asset('assets/img/favicons/favicon.ico')}}>
   <link rel="manifest" href={{asset('assets/img/favicons/manifest.json')}}>
    <meta name="msapplication-TileImage" content={{asset('assets/img/favicons/mstile-150x150.png')}}>
    <meta name="theme-color" content="#ffffff">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    <script src={{asset('assets/vendors/imagesloaded/imagesloaded.pkgd.min.js')}}></script>
    <script src={{asset('assets/vendors/simplebar/simplebar.min.js')}}></script>
    <script src={{asset('assets/js/config.js')}}></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href={{asset('assets/vendors/simplebar/simplebar.min.css')}} rel="stylesheet">
    <link rel="stylesheet" href={{asset('assets/css/line.css')}}>
    <link href={{asset('assets/css/theme-rtl.min.css')}} type="text/css" rel="stylesheet" id="style-rtl">
    <link href={{asset('assets/css/theme.min.css')}} type="text/css" rel="stylesheet" id="style-default">
    <link href={{asset('assets/css/user-rtl.min.css')}} type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href={{asset('assets/css/user.min.css')}} type="text/css" rel="stylesheet" id="user-style-default">
    <link href="{{asset('assets/css/parsley.css')}}" type="text/css" rel="stylesheet">
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
@yield('content')
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


{{----------------------------------------------}}
{{-------------- Start customizer --------------}}
{{----------------------------------------------}}

@include('includes.customizer')

{{----------------------------------------------}}
{{---------------- End customizer --------------}}
{{----------------------------------------------}}


<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src={{asset('assets/vendors/popper/popper.min.js')}}></script>
<script src={{asset('assets/vendors/bootstrap/bootstrap.min.js')}}></script>
<script src={{asset('assets/vendors/anchorjs/anchor.min.js')}}></script>
<script src={{asset('assets/vendors/is/is.min.js')}}></script>
<script src={{asset('assets/vendors/fontawesome/all.min.js')}}></script>
<script src={{asset('assets/vendors/lodash/lodash.min.js')}}></script>
<script src={{asset('assets/js/polyfill.min58be.js?features=window.scroll')}}></script>
<script src={{asset('assets/vendors/list.js/list.min.js')}}></script>
<script src={{asset('assets/vendors/feather-icons/feather.min.js')}}></script>
<script src="{{asset('assets/js/dropify.min.js')}}"></script>
<script src={{asset('assets/vendors/dayjs/dayjs.min.js')}}></script>
<script src={{asset('assets/js/phoenix.js')}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('form').parsley();
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        }
    });
</script>
</body>


<!-- Mirrored from prium.github.io/phoenix/v1.7.0/pages/authentication/simple/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 16:30:19 GMT -->
</html>
