<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('title', 'Manage - Meiji Indonesia')
    </title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('frontpage_assets/img/logo/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontpage_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontpage_assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontpage_assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('frontpage_assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontpage_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontpage_assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('frontpage_assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontpage_assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontpage_assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontpage_assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontpage_assets/css/style.css') }}">
</head>

<body>
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>

    <div id="preloadertp">
        <img src="{{ asset('frontpage_assets/img/logo-meiji-1.png') }}" alt="">
    </div>
    @include('layouts.partials_front.header')
    @include('layouts.partials_front.sidebar')

    <div class="body-overlay"></div>

    @yield('content')

    @include('layouts.partials_front.footer')

    <script src="{{ asset('frontpage_assets/js/jquery.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/waypoints.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/slick.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/counterup.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/wow.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/meanmenu.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('frontpage_assets/js/main.js') }}"></script>


</body>

</html>
