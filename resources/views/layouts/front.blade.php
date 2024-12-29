<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>@yield('title') - PT Meiji Indonesia</title>

<!-- Fav Icon -->
@if ($general && $general->favicon)
  <link rel="icon" href="{{ asset('storage/' . $general->favicon) }}" type="image/png" />
@endif

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Saira:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="/frontpage/assets/css/font-awesome-all.css" rel="stylesheet">
<link href="/frontpage/assets/css/flaticon.css" rel="stylesheet">
<link href="/frontpage/assets/css/owl.css" rel="stylesheet">
<link href="/frontpage/assets/css/bootstrap.css" rel="stylesheet">
<link href="/frontpage/assets/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="/frontpage/assets/css/animate.css" rel="stylesheet">
<link href="/frontpage/assets/css/nice-select.css" rel="stylesheet">
<link href="/frontpage/assets/css/timePicker.css" rel="stylesheet">
<link href="/frontpage/assets/css/jquery-ui.css" rel="stylesheet">
<link href="/frontpage/assets/css/color.css" rel="stylesheet">
<link href="/frontpage/assets/css/style.css" rel="stylesheet">
<link href="/frontpage/assets/css/responsive.css" rel="stylesheet">

</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper home_3">


        <!-- preloader -->
        {{-- <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">x</div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="b" class="letters-loading">
                                b
                            </span>
                            <span data-text-preloader="i" class="letters-loading">
                                i
                            </span>
                            <span data-text-preloader="o" class="letters-loading">
                                o
                            </span>
                            <span data-text-preloader="g" class="letters-loading">
                                g
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="n" class="letters-loading">
                                n
                            </span>
                            <span data-text-preloader="i" class="letters-loading">
                                i
                            </span>
                            <span data-text-preloader="x" class="letters-loading">
                                x
                            </span>
                        </div>
                    </div>  
                </div>
            </div>
        </div> --}}
        <!-- preloader end -->


        <!--Search Popup-->
        <div id="search-popup" class="search-popup">
            <div class="popup-inner">
                <div class="upper-box clearfix">
                    <figure class="logo-box pull-left"><a href="index.html"><img src="/frontpage/assets/images/logo-5.png" alt=""></a></figure>
                    <div class="close-search pull-right"><i class="fa-solid fa-xmark"></i></div>
                </div>
                <div class="overlay-layer"></div>
                <div class="auto-container">
                    <div class="search-form">
                        <form method="post" action="https://azim.commonsupport.com/Biogenix/index.html">
                            <div class="form-group">
                                <fieldset>
                                    <input type="search" class="form-control" name="search-input" value="" placeholder="Type your keyword and hit" required >
                                    <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- main header -->
        @include('layouts.partials_front.header')
        <!-- main-header end -->


        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="/frontpage/assets/images/logo-6.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->


        <!-- banner-style-three -->
        @yield('content')
        <!-- banner-style-three end -->


        <!-- footer-style-three -->
        @include('layouts.partials_front.footer')
        
        <!-- footer-style-three end -->


        <!-- scroll to top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="flaticon-up-arrow"></i>
        </button>
        
    </div>


    <!-- jequery plugins -->
    <script src="/frontpage/assets/js/jquery.js"></script>
    <script src="/frontpage/assets/js/popper.min.js"></script>
    <script src="/frontpage/assets/js/bootstrap.min.js"></script>
    <script src="/frontpage/assets/js/owl.js"></script>
    <script src="/frontpage/assets/js/wow.js"></script>
    <script src="/frontpage/assets/js/validation.js"></script>
    <script src="/frontpage/assets/js/jquery.fancybox.js"></script>
    <script src="/frontpage/assets/js/appear.js"></script>
    <script src="/frontpage/assets/js/scrollbar.js"></script>
    <script src="/frontpage/assets/js/isotope.js"></script>
    <script src="/frontpage/assets/js/jquery.nice-select.min.js"></script>
    <script src="/frontpage/assets/js/circle-progress.js"></script>
    <script src="/frontpage/assets/js/jquery.countTo.js"></script>
    <script src="/frontpage/assets/js/jquery-ui.js"></script>
    <script src="/frontpage/assets/js/timePicker.js"></script>

    <!-- main-js -->
    <script src="/frontpage/assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->
</html>
