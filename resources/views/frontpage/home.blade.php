@extends('layouts.front')

@section('title', 'Home - Meiji Indonesia')

@section('content')
<section class="slider" id="slider-1">
    <div class="container-fluid pr-0 pl-0">
      <div class="slider-carousel owl-carousel carousel-navs carousel-dots" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="true" data-dots="true" data-space="0" data-loop="false" data-speed="800">
        <!--  Start .slide-->
        <div class="slide bg-overlay bg-overlay-dark-slider">
          <div class="bg-section"><img src="/front/assets/images/sliders/5.jpg" alt="Background"/></div>
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-7">
                <div class="slide-content">
                  <h1 class="slide-headline">true healthcare for your family</h1>
                  <p class="slide-desc">The health and well-being of our patients and their health care team will always be our priority, so we follow the best practices for cleanliness. </p>
                  <div class="slide-action"><a class="btn btn--primary btn-line btn-line-after" href="doctors-modern.html"> <span>find a doctor</span><span class="line"> <span></span></span></a><a class="btn btn--white btn-line btn-line-after btn-line-inversed" href="page-about.html"> <span>more about us</span><span class="line"> <span></span></span></a></div>
                </div>
                <!-- End .slide-content -->
              </div>
            </div>
            <!--  End .row-->
          </div>
          <!-- End .container-->
        </div>
        <!-- End .slide-->
        <!--  Start .slide-->
        <div class="slide bg-overlay bg-overlay-dark-slider">
          <div class="bg-section"><img src="/front/assets/images/sliders/6.jpg" alt="Background"/></div>
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-7">
                <div class="slide-content">
                  <h1 class="slide-headline">delivering best medical care</h1>
                  <p class="slide-desc">The health and well-being of our patients and their health care team will always be our priority, so we follow the best practices for cleanliness. </p>
                  <div class="slide-action"><a class="btn btn--primary btn-line btn-line-after" href="doctors-modern.html"> <span>find a doctor</span><span class="line"> <span></span></span></a><a class="btn btn--white btn-line btn-line-after btn-line-inversed" href="page-about.html"> <span>more about us</span><span class="line"> <span></span></span></a></div>
                </div>
                <!-- End .slide-content -->
              </div>
            </div>
            <!--  End .row-->
          </div>
          <!-- End .container-->
        </div>
        <!-- End .slide-->
      </div>
      <!-- End .slider-carousel-->
    </div>
    <!--  End .container-fluid-->
  </section>

  <section class="about about-1" id="about-1">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="heading heading-2">
            <div class="row"> 
              <div class="col-12 col-lg-10">
                <h2 class="heading-title">Caring For The Health And Well Being Of You And Your Family.</h2>
              </div>
              <div class="col-12 col-lg-10 offset-lg-2">
                <p class="paragraph">We provide all aspects of medical practice for your family, including general check-ups or assisting with injuries.</p>
                <p class="heading-desc">We will work with you to develop individualised care plans, including management of chronic diseases. If we cannot assist, we can provide referrals or advice about the type you require. We treat all enquiries in confidence.</p>
                <div class="signature-block"><a class="btn btn--primary btn-line btn-line-after" href="#"><span>find a doctor</span><span class="line"> <span></span></span></a>
                  <div class="signature-body"> 
                    <h6>john winston</h6>
                    <p>pediatrician</p><img class="signature-img" src="/front/assets/images/signature/1.png" alt="signature"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End .col-lg-6-->
        <div class="col-12 col-lg-5 offset-lg-1">
          <div class="about-img"><img class="img-fluid" src="/front/assets/images/about/1.jpg" alt="about Image"/><a class="popup-video btn-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4"> <i class="fas fa-play"></i><span>watch our presentation!</span></a></div>
        </div>
        <!-- End .col-lg-5-->
        <div class="col-12"> 
          <div class="about-image-bottom"> <img src="/front/assets/images/about/2.jpg" alt="image"/></div>
        </div>
      </div>
      <!-- End .row-->
    </div>
    <!-- End .container-->
  </section>
@endsection
