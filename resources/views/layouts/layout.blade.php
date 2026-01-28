<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{ env('APP_NAME') }} @yield('title')</title>
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ Vitx::asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ Vitx::asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ Vitx::asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ Vitx::asset('assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ Vitx::asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ Vitx::asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ Vitx::asset('assets/js/config.js') }}"></script>
    <script src="{{ Vitx::asset('vendors/simplebar/simplebar.min.js') }}"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ Vitx::asset('vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">

    <link href="{{ Vitx::asset('vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link href="{{ Vitx::asset('assets/css/theme.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ Vitx::asset('assets/css/user.css') }}" rel="stylesheet" id="user-style-default">
</head>

<body>
    <main class="main" id="top" data-it="1">

        @yield('main-content')
        @include('common.register-modal')
    </main>

    <script src="{{ Vitx::asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ Vitx::asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ Vitx::asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ Vitx::asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ Vitx::asset('vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ Vitx::asset('vendors/typed.js/typed.umd.js') }}"></script>
    <script src="{{ Vitx::asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ Vitx::asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="{{ Vitx::asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ Vitx::asset('assets/js/theme.js') }}"></script>
    <script src="{{ Vitx::asset('assets/js/sweet-alert.js') }}"></script>
    @yield('scripts')

</body>

</html>
