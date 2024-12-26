@extends('layouts.front')

@section('title', 'Home - Meiji Indonesia')

@section('content')
<main>

    <!-- banner-area -->
    <section class="banner-area p-relative pt-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="banner__content pt-145 mb-135">
                        <span class="banner__sub-title text-danger mb-20">Welcoome to Meiji Indonesia</span>
                        <h2 class="banner__title mb-30">passion for better <br>Medicine</h2>
                        <p>Your full service lab for clinical trials. Our mission is to ensure the <br>generation of
                            accurate and precise findings</p>
                        <div class="banner__btn">
                            <a class="tp-btn" href="contact.html">Appointment</a>
                            <a class="tp-btn-second ml-25" href="#">About us</a>
                        </div>
                    </div>
                    <div class="banner__box-item">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="banner__item d-flex align-items-center mb-30 wow fadeInUp"
                                    data-wow-delay=".2s">
                                    <div class="banner__item-icon">
                                        <i class="flaticon-rating"></i>
                                    </div>
                                    <div class="banner__item-content">
                                        <span>100% Customer Satisfaction</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="banner__item pink-border d-flex align-items-center mb-30 wow fadeInUp"
                                    data-wow-delay=".4s">
                                    <div class="banner__item-icon pink-icon">
                                        <i class="flaticon-target"></i>
                                    </div>
                                    <div class="banner__item-content">
                                        <span>Help and Acess is Our Mission</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="banner__item green-border d-flex align-items-center mb-30 wow fadeInUp"
                                    data-wow-delay=".6s">
                                    <div class="banner__item-icon green-icon">
                                        <i class="flaticon-premium-badge"></i>
                                    </div>
                                    <div class="banner__item-content">
                                        <span>100% Quality Laboratory service</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bannerscroll d-none d-xl-block">
            <div class="banner-scroll-btn">
                <a class="bannerscroll-icon" href="#tp-about-scroll"><i class="fa-light fa-computer-mouse"></i>
                    <span>Scrool Down</span></a>
            </div>
        </div>
        <div class="banner__shape d-none d-lg-block">
            <img src="{{ asset('frontpage_assets/img/banner/banner-01.png') }}"
                alt="banner-img">
            <div class="banner__video-btn">
                <a class="banner__video-icon popup-video" href="https://www.youtube.com/watch?v=d8w5SICzzxc"><i
                        class="fa-solid fa-play"></i></a>
            </div>
        </div>
    </section>
    <!-- banner-area-end -->

    <!-- services-area -->
    <section class="services-area pt-95 pb-90 grey-bg mt-60 fix"
        data-background="{{ asset('frontpage_assets/img/shape/shape-bg-01.png') }}">
        <div class="container">
            <div class="row mb-125">
                <div class="col-lg-12">
                    <div class="search-form">
                        <form action="#">
                            <input type="text" placeholder="What are you looking for?">
                            <button class="tp-btn search-btn" type="submit">Search Here <i
                                    class="fa-light fa-magnifying-glass ml-5"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="tp-section">
                        <span class="tp-section__sub-title left-line mb-20">our Services</span>
                        <h3 class="tp-section__title mb-50">Service Area</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="tp-services d-flex align-items-center">
                        <div class="services-p"><i class="fa-regular fa-arrow-left"></i></div>
                        <div class="services-n"><i class="fa-regular fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="services-slider  wow fadeInUp" data-wow-delay=".3s">
                <div class="swiper-container service-active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="services-item mb-40">
                                <div class="services-item__icon mb-30">
                                    <i class="flaticon-hemoglobin-test-meter"></i>
                                </div>
                                <div class="services-item__content">
                                    <h4 class="services-item__tp-title mb-30"><a href="services-details.html">HEMOGLOBIN
                                            TEST</a></h4>
                                    <p>Nam eget dui vel quam sodales semper quis porttitor tortor. Vivamus quis ex
                                        nulla.Nam eget dui vel quam</p>
                                    <div class="services-item__btn">
                                        <a class="btn-hexa" href="services-01.html"><i></i>Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="services-item mb-40">
                                <div class="services-item__icon pink-icon mb-30">
                                    <i class="flaticon-blood-test"></i>
                                </div>
                                <div class="services-item__content">
                                    <h4 class="services-item__tp-title mb-30"><a href="services-details.html">BLOOD
                                            TESTING</a></h4>
                                    <p>Nam eget dui vel quam sodales semper quis porttitor tortor. Vivamus quis ex
                                        nulla.Nam eget dui vel quam</p>
                                    <div class="services-item__btn">
                                        <a class="btn-hexa pink-hexa" href="services-01.html"><i></i>Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="services-item mb-40">
                                <div class="services-item__icon green-icon mb-30">
                                    <i class="flaticon-biochemistry"></i>
                                </div>
                                <div class="services-item__content">
                                    <h4 class="services-item__tp-title mb-30"><a
                                            href="services-details.html">BIOCHEMISTRY</a></h4>
                                    <p>Nam eget dui vel quam sodales semper quis porttitor tortor. Vivamus quis ex
                                        nulla.Nam eget dui vel quam</p>
                                    <div class="services-item__btn">
                                        <a class="btn-hexa green-hexa" href="services-01.html"><i></i>Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="services-item mb-40">
                                <div class="services-item__icon sky-icon mb-30">
                                    <i class="flaticon-dna-1"></i>
                                </div>
                                <div class="services-item__content">
                                    <h4 class="services-item__tp-title mb-30"><a
                                            href="services-details.html">HISTOPATOLOGY</a></h4>
                                    <p>Nam eget dui vel quam sodales semper quis porttitor tortor. Vivamus quis ex
                                        nulla.Nam eget dui vel quam</p>
                                    <div class="services-item__btn">
                                        <a class="btn-hexa sky-hexa" href="services-01.html"><i></i>Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->

    <!-- about-area -->
    <section id="tp-about-scroll" class="about-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="about__thumb mb-60 wow fadeInLeft" data-wow-delay=".4s">
                        <div class="about__img">
                            <img src="{{ asset('frontpage_assets/img/about/about-bg-01.png') }}"
                                alt="about-bg-img">
                            <div class="about__exprience">
                                <h3 class="counter">12</h3>
                                <i>Years of <br>Experience</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12">
                    <div class="tp-about__content pt-125 ml-60 mb-50 wow fadeInRight" data-wow-delay=".4s">
                        <div class="tp-section">
                            <span class="tp-section__sub-title left-line mb-25">About Us</span>
                            <h3 class="tp-section__title tp-ab-sm-title mb-45">Best Laboratory For Testing And Research
                            </h3>
                            <i>Your full service lab for clinical trials. Our mission is to ensure the generation of
                                accurate and precise findings</i>
                            <p class=" mr-20 mb-45">Exerci tation ullamcorper suscipit lobortis nisl aliquip ex ea
                                commodo claritatem insitamconse quat.Exerci tation ullamcorper suscipit loborti
                                excommodo habent claritatem insitamconse quat.Exerci tationlobortis nisl aliquip ex ea
                                commodo habent claritatem insitamconse quat.</p>
                        </div>
                        <div class="tp-about__info-list mb-55">
                            <ul>
                                <li><i class="fa-solid fa-check"></i>Extramural Funding</li>
                                <li><i class="fa-solid fa-check"></i>Bacteria Markers</li>
                                <li><i class="fa-solid fa-check"></i>Nam nec mi euismod euismod</li>
                                <li><i class="fa-solid fa-check"></i>In aliquet dui nec lectus</li>
                            </ul>
                        </div>
                        <div class="tp-about__btn">
                            <a class="tp-btn" href="about.html">Our HIstory</a>
                            <a class="tp-btn-second ml-25" href="about.html">About us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->

    <!-- counter-area -->
    <section class="counter-area pt-40 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="counter__item blue-border mb-30 wow fadeInUp" data-wow-delay=".2s">
                        <div class="counter__icon mb-15">
                            <i></i>
                        </div>
                        <div class="counter__content">
                            <h4 class="counter__title"><span class="counter">1492</span></h4>
                            <p>Laboratories in 100+ states</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="counter__item pink-border mb-30 wow fadeInUp" data-wow-delay=".4s">
                        <div class="counter__icon pink-hard mb-15">
                            <i></i>
                        </div>
                        <div class="counter__content">
                            <h4 class="counter__title"><span class="counter">152</span></h4>
                            <p>Laboratory specialists</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="counter__item sky-border mb-30 wow fadeInUp" data-wow-delay=".6s">
                        <div class="counter__icon sky-hard mb-15">
                            <i></i>
                        </div>
                        <div class="counter__content">
                            <h4 class="counter__title"><span class="counter">1022</span></h4>
                            <p>Material collection points</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="counter__item green-border mb-30 wow fadeInUp" data-wow-delay=".8s">
                        <div class="counter__icon green-hard mb-15">
                            <i></i>
                        </div>
                        <div class="counter__content">
                            <h4 class="counter__title"><span class="counter">24332</span></h4>
                            <p>Patients diagnosed in 2022</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- counter-area-end -->

    <!-- gallery-area -->
    <section class="gallery-area grey-bg pt-120 pb-130"
        data-background="{{ asset('frontpage_assets/img/shape/shape-bg-01.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-section text-center">
                        <span class="tp-section__sub-title left-line right-line mb-25">Work Gallery</span>
                        <h3 class="tp-section__title mb-70">Bioxlab Gallery</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="tp-gallery ml-15 mr-15 wow fadeInUp" data-wow-delay=".4s">
                <div class="swiper-container gall-active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="tp-gallery__item p-relative mb-70">
                                <div class="tp-gallery__img p-relative">
                                    <img src="{{ asset('frontpage_assets/img/gallery/gal-thum-01.jpg') }}"
                                        alt="gallery-img">
                                    <div class="tp-gallery__info">
                                        <a class="popup-image"
                                            href="{{ asset('frontpage_assets/img/gallery/gal-thum-01.jpg') }}"><i
                                                class="fa-solid fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="tp-gallery__content">
                                    <h4 class="tp-gallery__title"><a href="portfolio-details.html">COVID ANALYSIS</a>
                                    </h4>
                                    <span><i class="fa-solid fa-tag"></i><a
                                            href="services-details.html">Radiologist</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tp-gallery__item p-relative mb-70">
                                <div class="tp-gallery__img p-relative">
                                    <img src="{{ asset('frontpage_assets/img/gallery/gal-thum-02.jpg') }}"
                                        alt="gallery-img">
                                    <div class="tp-gallery__info">
                                        <a class="popup-image"
                                            href="{{ asset('frontpage_assets/img/gallery/gal-thum-02.jpg') }}"><i
                                                class="fa-solid fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="tp-gallery__content">
                                    <h4 class="tp-gallery__title"><a href="portfolio-details.html">Hiv Analysis &
                                            Testing</a></h4>
                                    <span><i class="fa-solid fa-tag"></i><a
                                            href="services-details.html">Anaesthetist</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tp-gallery__item p-relative mb-70">
                                <div class="tp-gallery__img p-relative">
                                    <img src="{{ asset('frontpage_assets/img/gallery/gal-thum-03.jpg') }}"
                                        alt="gallery-img">
                                    <div class="tp-gallery__info">
                                        <a class="popup-image"
                                            href="{{ asset('frontpage_assets/img/gallery/gal-thum-03.jpg') }}"><i
                                                class="fa-solid fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="tp-gallery__content">
                                    <h4 class="tp-gallery__title"><a href="portfolio-details.html">Zyrtec Analysis</a>
                                    </h4>
                                    <span><i class="fa-solid fa-tag"></i><a
                                            href="services-details.html">Gynaecologist</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tp-gallery__item p-relative mb-70">
                                <div class="tp-gallery__img p-relative">
                                    <img src="{{ asset('frontpage_assets/img/gallery/gal-thum-04.jpg') }}"
                                        alt="gallery-img">
                                    <div class="tp-gallery__info">
                                        <a class="popup-image"
                                            href="{{ asset('frontpage_assets/img/gallery/gal-thum-04.jpg') }}"><i
                                                class="fa-solid fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="tp-gallery__content">
                                    <h4 class="tp-gallery__title"><a href="portfolio-details.html">Asthma Apply</a>
                                    </h4>
                                    <span><i class="fa-solid fa-tag"></i><a
                                            href="services-details.html">Genetics</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tp-gallery__item p-relative mb-70">
                                <div class="tp-gallery__img p-relative">
                                    <img src="{{ asset('assets/img/gallery/gal-thum-01.jpg') }}"
                                        alt="gallery-img">
                                    <div class="tp-gallery__info">
                                        <a class="popup-image"
                                            href="{{ asset('assets/img/gallery/gal-thum-01.jpg') }}"><i
                                                class="fa-solid fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="tp-gallery__content">
                                    <h4 class="tp-gallery__title"><a href="portfolio-details.html">neurological
                                            ANALYSIS</a></h4>
                                    <span><i class="fa-solid fa-tag"></i><a
                                            href="services-details.html">Forensic</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <a class="tp-btn-second" href="portfolio-details.html">Explore More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- gallery-area-end -->

    <!-- choose-area -->
    <section class="choose-area theme-bg pt-120 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-section text-center">
                        <span class="tp-section__sub-title left-line right-line mb-25">Our Specialists</span>
                        <h3 class="tp-section__title title-white mb-85">Why Choose Us</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="tp-choose__item ml-15 mb-100 wow fadeInUp" data-wow-delay=".2s">
                        <div class="tp-choose__icon mb-40">
                            <i class="flaticon-microscope"></i>
                        </div>
                        <div class="tp-choose__content">
                            <h4 class="tp-choose__title mb-20">High Quality <br>Services</h4>
                            <p>Nam eget dui vel quam sodales <br>semper quis porttitor tortor.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="tp-choose__item ml-35 mb-100 wow fadeInUp" data-wow-delay=".4s">
                        <div class="tp-choose__icon pink-icon mb-40">
                            <i class="flaticon-thinking"></i>
                        </div>
                        <div class="tp-choose__content">
                            <h4 class="tp-choose__title mb-20">Fast Working <br>Process</h4>
                            <p>Nam eget dui vel quam sodales <br>semper quis porttitor tortor.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="tp-choose__item ml-55 mb-100 wow fadeInUp" data-wow-delay=".6s">
                        <div class="tp-choose__icon green-icon mb-40">
                            <i class="flaticon-24-hours-1"></i>
                        </div>
                        <div class="tp-choose__content">
                            <h4 class="tp-choose__title mb-20">24/7 Customer <br> Support</h4>
                            <p>Nam eget dui vel quam sodales <br>semper quis porttitor tortor.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="tp-choose__item ml-75 mb-100 wow fadeInUp" data-wow-delay=".8s">
                        <div class="tp-choose__icon sky-icon mb-40">
                            <i class="flaticon-team"></i>
                        </div>
                        <div class="tp-choose__content">
                            <h4 class="tp-choose__title mb-20">We have <br> Expert Team</h4>
                            <p>Nam eget dui vel quam sodales <br>semper quis porttitor tortor.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="tp-choose-option">
                        <span>Laboratories Used For Scientific Research : <a href="#">Take Many Forms<i
                                    class="fa-solid fa-arrow-right"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- choose-area-end -->

    <!-- appoinment-area -->
    <section class="appoinment-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-12 col-md-12 p-0">
                    <div class="appoinment-thumb">
                        <img src="{{ asset('frontpage_assets/img/banner/appoinment-01.jpg') }}"
                            alt="appoinment-img">
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-7 col-lg-12 col-md-12 p-0">
                    <div class="visitor-info">
                        <h4 class="appoinment-title mb-25"><i class="fa-light fa-file-signature"></i>Book your visit
                        </h4>
                        <div class="visitor-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="visitor-form__input">
                                            <input type="text" placeholder="Your name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="visitor-form__input">
                                            <input type="email" placeholder="Your mail">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="visitor-form__input">
                                            <input type="text" placeholder="Medical Research">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="visitor-form__input">
                                            <input type="text" placeholder="mm / dd / yyyy">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="visitor-form__input">
                                            <textarea placeholder="Type your massage" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="visit-btn mt-20">
                                            <button class="tp-btn">Book Now</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <div class="visit-serial mt-45">
                                            <span>24/7 Emergency Service : <a href="tel:+88978897">+88 978 897 6545<i
                                                        class="fa-regular fa-arrow-right"></i></a></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- appoinment-area-end -->

    <!-- team-area -->
    <section class="team-area grey-bg pt-120 pb-80"
        data-background="{{ asset('frontpage_assets/img/shape/shape-bg-01.png') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="tp-section">
                        <span class="tp-section__sub-title left-line mb-25">Our Team</span>
                        <h3 class="tp-section__title mb-75">Meet Specialist</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="tp-team-arrow d-flex align-items-center">
                        <div class="team-p"><i class="fa-regular fa-arrow-left"></i></div>
                        <div class="team-n"><i class="fa-regular fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="swiper-container team-active wow fadeInUp" data-wow-delay=".3s">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="tp-team mb-50">
                            <div class="tp-team__thumb fix">
                                <a href="#"><img
                                        src="{{ asset('frontpage_assets/img/team/team-thumb-01.jpg') }}"
                                        alt="team-thumb"></a>
                            </div>
                            <div class="tp-team__content">
                                <h4 class="tp-team__title mb-15"><a href="team-details.html">Cameron Williamson</a>
                                </h4>
                                <span class="tp-team__position mb-30">Genetic Specialist</span>
                                <p>Providing insight-driven transformation to investment banks, wealth and asset mana,
                                    exchanges, Finance </p>
                                <div class="tp-team__social">
                                    <a class="tp-youtube" href="#"><i class="fa-brands fa-youtube"></i></a>
                                    <a class="tp-twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a class="tp-fb" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a class="tp-skype" href="#"><i class="fa-brands fa-skype"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-team mb-50">
                            <div class="tp-team__thumb fix">
                                <a href="#"><img
                                        src="{{ asset('frontpage_assets/img/team/team-thumb-02.jpg') }}"
                                        alt="team-thumb"></a>
                            </div>
                            <div class="tp-team__content">
                                <h4 class="tp-team__title mb-15"><a href="team-details.html">Savannah Nguyen</a></h4>
                                <span class="tp-team__position mb-30">Anaesthetist Specialist</span>
                                <p>Providing insight-driven transformation to investment banks, wealth and asset mana,
                                    exchanges, Finance </p>
                                <div class="tp-team__social">
                                    <a class="tp-youtube" href="#"><i class="fa-brands fa-youtube"></i></a>
                                    <a class="tp-twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a class="tp-fb" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a class="tp-skype" href="#"><i class="fa-brands fa-skype"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-team mb-50">
                            <div class="tp-team__thumb fix">
                                <a href="#"><img
                                        src="{{ asset('frontpage_assets/img/team/team-thumb-03.jpg') }}"
                                        alt="team-thumb"></a>
                            </div>
                            <div class="tp-team__content">
                                <h4 class="tp-team__title mb-15"><a href="team-details.html">Darlene Robertson</a>
                                </h4>
                                <span class="tp-team__position mb-30">Gynaecologist Specialist</span>
                                <p>Providing insight-driven transformation to investment banks, wealth and asset mana,
                                    exchanges, Finance </p>
                                <div class="tp-team__social">
                                    <a class="tp-youtube" href="#"><i class="fa-brands fa-youtube"></i></a>
                                    <a class="tp-twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a class="tp-fb" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a class="tp-skype" href="#"><i class="fa-brands fa-skype"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-team mb-50">
                            <div class="tp-team__thumb fix">
                                <a href="#"><img
                                        src="{{ asset('frontpage_assets/img/team/team-thumb-04.jpg') }}"
                                        alt="team-thumb"></a>
                            </div>
                            <div class="tp-team__content">
                                <h4 class="tp-team__title mb-15"><a href="team-details.html">Jhon Methweu</a></h4>
                                <span class="tp-team__position mb-30">Radiologist Specialist</span>
                                <p>Providing insight-driven transformation to investment banks, wealth and asset mana,
                                    exchanges, Finance </p>
                                <div class="tp-team__social">
                                    <a class="tp-youtube" href="#"><i class="fa-brands fa-youtube"></i></a>
                                    <a class="tp-twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a class="tp-fb" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a class="tp-skype" href="#"><i class="fa-brands fa-skype"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team-area-end -->

    <!-- testimonial-area -->
    <section class="testimonial-area testimonial-bg pt-125 pb-130"
        data-background="{{ asset('frontpage_assets/img/shape/shape-bg-02.png') }}">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-lg-12">
                    <div class="tp-section text-center">
                        <span
                            class="tp-section__sub-title sub-title-white left-line-white right-line-white mb-25">Testimonial</span>
                        <h3 class="tp-section__title title-white mb-70">Customer Feedback</h3>
                    </div>
                </div>
            </div>
            <div class="swiper-container tp-test-active pt-40">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="tp-testi p-relative mb-70">
                            <div class="tp-testi__avata">
                                <img src="{{ asset('frontpage_assets/img/icon/testi-ava-01.jpg') }}"
                                    alt="testimonial-avata">
                            </div>
                            <div class="tp-testi__content text-center">
                                <p>BIoxlab is another theme that is beautiful and professinally constructed by the
                                    Developers. The price for the template is checp but not qualityh of product.what a
                                    bargain , This theme works for many types of web sites and seems to be durble dows
                                    nt break and it.</p>
                                <h5 class="tp-testi__avata-title">Darlene Robertson</h5>
                                <span class="tp-testi__ava-position">Secretary of (FlaxStudio)</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-testi p-relative mb-70">
                            <div class="tp-testi__avata">
                                <img src="{{ asset('frontpage_assets/img/icon/testi-ava-02.jpg') }}"
                                    alt="testimonial-avata">
                            </div>
                            <div class="tp-testi__content text-center">
                                <p>BIoxlab is another theme that is beautiful and professinally constructed by the
                                    Developers. The price for the template is checp but not qualityh of product.what a
                                    bargain , This theme works for many types of web sites and seems to be durble dows
                                    nt break and it.</p>
                                <h5 class="tp-testi__avata-title">Courtney Henry</h5>
                                <span class="tp-testi__ava-position">CEO of (FlaxStudio)</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-testi p-relative mb-70">
                            <div class="tp-testi__avata">
                                <img src="{{ asset('frontpage_assets/img/icon/testi-ava-03.jpg') }}"
                                    alt="testimonial-avata">
                            </div>
                            <div class="tp-testi__content text-center">
                                <p>BIoxlab is another theme that is beautiful and professinally constructed by the
                                    Developers. The price for the template is checp but not qualityh of product.what a
                                    bargain , This theme works for many types of web sites and seems to be durble dows
                                    nt break and it.</p>
                                <h5 class="tp-testi__avata-title">Kathryn Murphy</h5>
                                <span class="tp-testi__ava-position">Manager of (FlaxStudio)</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-testi p-relative mb-70">
                            <div class="tp-testi__avata">
                                <img src="{{ asset('frontpage_assets/img/icon/testi-ava-07.png') }}"
                                    alt="testimonial-avata">
                            </div>
                            <div class="tp-testi__content text-center">
                                <p>BIoxlab is another theme that is beautiful and professinally constructed by the
                                    Developers. The price for the template is checp but not qualityh of product.what a
                                    bargain , This theme works for many types of web sites and seems to be durble dows
                                    nt break and it.</p>
                                <h5 class="tp-testi__avata-title">Darlene Robertson</h5>
                                <span class="tp-testi__ava-position">Programmer of (FlaxStudio)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="tp-test-arrow d-flex align-items-center justify-content-center">
                        <div class="tp-test-prv"><i class="fa-regular fa-arrow-left"></i></div>
                        <div class="tp-test-nxt"><i class="fa-regular fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->

    <!-- brand-area -->
    <div class="brand-area pt-130 pb-130">
        <div class="container">
            <div class="swiper-container brand-active">
                <div class="swiper-wrapper brand-items">
                    <div class="swiper-slide">
                        <a href="#"><img
                                src="{{ asset('frontpage_assets/img/brand/brand-01.png') }}"
                                alt="brand"></a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#"><img
                                src="{{ asset('frontpage_assets/img/brand/brand-01.png') }}"
                                alt="brand"></a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#"><img
                                src="{{ asset('frontpage_assets/img/brand/brand-01.png') }}"
                                alt="brand"></a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#"><img
                                src="{{ asset('frontpage_assets/img/brand/brand-01.png') }}"
                                alt="brand"></a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#"><img
                                src="{{ asset('frontpage_assets/img/brand/brand-01.png') }}"
                                alt="brand"></a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#"><img
                                src="{{ asset('frontpage_assets/img/brand/brand-01.png') }}"
                                alt="brand"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area-end -->

    <!-- cta-area -->
    <section class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-bg theme-light-bg pt-65 pb-70"
                        data-background="{{ asset('frontpage_assets/img/shape/shape-bg-03.png') }}">
                        <div class="cta-content ml-90">
                            <h2 class="cta-title mb-35">Looking for a best <br> lebatory Service</h2>
                            <a href="tel:+9159008855" class="tp-cta-btn"><svg width="14" height="19" viewBox="0 0 14 19"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="2" cy="2" r="2" fill="white" />
                                    <circle cx="7" cy="2" r="2" fill="white" />
                                    <circle cx="12" cy="2" r="2" fill="white" />
                                    <circle cx="12" cy="7" r="2" fill="white" />
                                    <circle cx="12" cy="12" r="2" fill="white" />
                                    <circle cx="7" cy="7" r="2" fill="white" />
                                    <circle cx="7" cy="12" r="2" fill="white" />
                                    <circle cx="7" cy="17" r="2" fill="white" />
                                    <circle cx="2" cy="7" r="2" fill="white" />
                                    <circle cx="2" cy="12" r="2" fill="white" />
                                </svg><span>Call :</span>+91 590 088
                                55</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-area-end -->

    <!-- blog-area -->
    <section class="blog-area pt-125 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <div class="tp-section">
                        <span class="tp-section__sub-title left-line mb-25">Waht’s New</span>
                        <h3 class="tp-section__title mb-65">Blog & Article</h3>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="tp-blog-arrow d-flex align-items-center">
                        <div class="tp-blog-p"><i class="fa-regular fa-arrow-left"></i></div>
                        <div class="tp-blog-n"><i class="fa-regular fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="swiper-container tp-blog-active wow fadeInUp" data-wow-delay=".3s">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="tp-blog mb-30">
                            <div class="tp-blog__thumb p-relative fix">
                                <a href="#"><img
                                        src="{{ asset('frontpage_assets/img/blog/blog-thumb-01.jpg') }}"
                                        alt="blog-item"></a>
                                <div class="tp-blog__date text-center">
                                    <h4>26<span>Dec</span></h4>
                                </div>
                            </div>
                            <div class="tp-blog__content">
                                <span class="tp-blog__category mb-30"><a href="blog-details.html">Medicine</a></span>
                                <h5 class="tp-blog__title mb-20"><a href="blog-details.html">Heart Diseases Tests
                                        Ordered <br> By Doctors</a></h5>
                                <p>Nam eget dui vel quam sodales semper quis porttitor tortor. Vivamus quis ex nulla ...
                                </p>
                                <div class="tp-blog__btn">
                                    <a href="blog.html">Read moRe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-blog mb-30">
                            <div class="tp-blog__thumb p-relative fix">
                                <a href="#"><img
                                        src="{{ asset('frontpage_assets/img/blog/blog-thumb-02.jpg') }}"
                                        alt="blog-item"></a>
                                <div class="tp-blog__date text-center">
                                    <h4>26<span>Dec</span></h4>
                                </div>
                            </div>
                            <div class="tp-blog__content">
                                <span class="tp-blog__category mb-30"><a href="blog-details.html">Medicine</a></span>
                                <h5 class="tp-blog__title mb-20"><a href="blog-details.html">Heart Diseases Tests
                                        Ordered <br> By Doctors</a></h5>
                                <p>Nam eget dui vel quam sodales semper quis porttitor tortor. Vivamus quis ex nulla ...
                                </p>
                                <div class="tp-blog__btn">
                                    <a href="blog.html">Read moRe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-blog mb-30">
                            <div class="tp-blog__thumb p-relative fix">
                                <a href="#"><img
                                        src="{{ asset('frontpage_assets/img/blog/blog-thumb-03.jpg') }}"
                                        alt="blog-item"></a>
                                <div class="tp-blog__date text-center">
                                    <h4>26<span>Dec</span></h4>
                                </div>
                            </div>
                            <div class="tp-blog__content">
                                <span class="tp-blog__category mb-30"><a href="blog-details.html">Medicine</a></span>
                                <h5 class="tp-blog__title mb-20"><a href="blog-details.html">Identifying bases of
                                        disease <br> pathophysio</a></h5>
                                <p>Nam eget dui vel quam sodales semper quis porttitor tortor. Vivamus quis ex nulla ...
                                </p>
                                <div class="tp-blog__btn">
                                    <a href="blog.html">Read moRe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-blog mb-30">
                            <div class="tp-blog__thumb p-relative fix">
                                <a href="#"><img
                                        src="{{ asset('frontpage_assets/img/blog/blog-thumb-03.jpg') }}"
                                        alt="blog-item"></a>
                                <div class="tp-blog__date text-center">
                                    <h4>26<span>Dec</span></h4>
                                </div>
                            </div>
                            <div class="tp-blog__content">
                                <span class="tp-blog__category mb-30"><a href="blog-details.html">Medicine</a></span>
                                <h5 class="tp-blog__title mb-20"><a href="blog-details.html">Coronavirus global health
                                        emergency</a></h5>
                                <p>Nam eget dui vel quam sodales semper quis porttitor tortor. Vivamus quis ex nulla ...
                                </p>
                                <div class="tp-blog__btn">
                                    <a href="blog.html">Read moRe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->

</main>
@endsection
