<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="author" content="Ayman Fikry"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Medisch Responsive Bootstrap 4 Medical HTML5 Template"/>
    <title>@yield('title') - PT Meiji Indonesia</title>
    @if ($general && $general->favicon)
      <link rel="icon" href="{{ asset('storage/' . $general->favicon) }}" type="image/png" />
    @endif
    <!--  Fonts ==
    -->
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&amp;family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;family=Rubik:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet"/>
    <!--  Stylesheets==
    -->
    <link href="/front/assets/css/vendor.min.css" rel="stylesheet"/>
    <link href="/front/assets/css/style.css" rel="stylesheet"/>
  </head>
  <body>
    <div class="preloader">
      <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
    </div>
    <div class="cursor">
      <div class="cursor__inner cursor__inner--circle"></div>
      <div class="cursor__inner cursor__inner--dot"></div>
    </div>
    <!-- End .cursor-->
    <!-- Document Wrapper-->
    <div class="wrapper clearfix" id="wrapperParallax">
      @include('layouts.partials_front.header')
     
      @yield('content')
      
      @include('layouts.partials_front.footer')
      <div class="backtop" id="back-to-top" data-hover="">
        <svg class="bi bi-chevron-up" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"></path>
        </svg>
      </div>
    </div>
    <!--  Footer Scripts==
    -->
    <script src="/front/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/front/assets/js/vendor.min.js"></script>
    <script src="/front/assets/js/functions.js"></script>
    @stack('js')
  </body>
</html>