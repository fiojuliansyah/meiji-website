@extends('layouts.front')

@section('title', 'Home - Meiji Indonesia')

@section('content')
<section class="slider" id="slider-1" style="position: relative; width: 100%; overflow: hidden;">
  <div class="container-fluid" style="padding: 0;">
    <div class="slider-carousel owl-carousel carousel-navs carousel-dots" 
         style="position: relative; width: 100%; height: 100vh; display: flex; align-items: center; justify-content: center;"
         data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="true" data-dots="true" data-space="0" data-loop="false" data-speed="800">
      @foreach ($sliders as $slider)
        <div class="slide bg-overlay" style="
          position: relative; 
          width: 100%; 
          height: 100vh; 
          background-size: cover; 
          background-position: center; 
          display: flex; 
          align-items: center; 
          color: white; 
          background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('storage/' . $slider->image) }}');">
          <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 15px;">
            <div class="row" style="align-items: center;">
              <div class="col-12 col-lg-7" style="
                background: rgba(0,0,0,0.6); 
                padding: 30px; 
                border-radius: 10px; 
                transition: all 0.3s ease;">
                <div class="slide-content" style="text-align: left;">
                  <h1 class="slide-headline" style="
                    font-size: 2.5rem; 
                    font-weight: bold; 
                    margin-bottom: 20px; 
                    color: #fff; 
                    text-shadow: 2px 2px 4px rgba(0,0,0,0.5); 
                    animation: fadeInUp 1s ease;">
                    {{ $slider->getTranslation('title', app()->getLocale()) }}
                  </h1>
                  <p class="slide-desc" style="
                    font-size: 1.2rem; 
                    line-height: 1.6; 
                    color: #e0e0e0; 
                    margin-bottom: 25px; 
                    animation: fadeInUp 1s ease 0.5s; 
                    animation-fill-mode: backwards;">
                    {{ $slider->getTranslation('content', app()->getLocale()) }}
                  </p>
                  <a href="#" class="btn btn--primary btn-line btn-line-after">
                    Learn More
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>    
      @endforeach
    </div>
    
    <!-- Custom Navigation Arrows -->
    <div style="
      position: absolute; 
      top: 50%; 
      width: 100%; 
      display: flex; 
      justify-content: space-between; 
      transform: translateY(-50%); 
      z-index: 10;">
      <button style="
        background: rgba(0,0,0,0.5); 
        color: white; 
        border: none; 
        padding: 10px 15px; 
        margin-left: 20px; 
        cursor: pointer; 
        border-radius: 50%; 
        transition: all 0.3s ease;"
        onclick="prevSlide()">
        &#10094;
      </button>
      <button style="
        background: rgba(0,0,0,0.5); 
        color: white; 
        border: none; 
        padding: 10px 15px; 
        margin-right: 20px; 
        cursor: pointer; 
        border-radius: 50%; 
        transition: all 0.3s ease;"
        onclick="nextSlide()">
        &#10095;
      </button>
    </div>
  </div>
  
  <!-- Embedded Styles and Scripts -->
  <style>
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const carousel = document.querySelector('.slider-carousel');
      let currentSlide = 0;
      const slides = carousel.querySelectorAll('.slide');
      
      function showSlide(index) {
        // Hide all slides
        slides.forEach(slide => slide.style.display = 'none');
        
        // Wrap around if index is out of bounds
        currentSlide = (index + slides.length) % slides.length;
        
        // Show current slide
        slides[currentSlide].style.display = 'flex';
      }
      
      window.nextSlide = function() {
        showSlide(currentSlide + 1);
      }
      
      window.prevSlide = function() {
        showSlide(currentSlide - 1);
      }
      
      // Initialize first slide
      showSlide(0);
    });
  </script>
</section>

  <section class="cta cta-3" id="cta-3">
    <div class="container">
      <div class="heading heading-6">
        <div class="row">
          <div class="col-12 col-lg-5">
            <p class="heading-subtitle">{{ translate('About') }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-5">
            <h2 class="heading-title">{{ $page->getTranslation('about_title', app()->getLocale()) }}</h2>
          </div>
          <!--End .col-lg-5-->
          <div class="col-12 col-lg-6 offset-lg-1">
            <div class="prief-set">
              <p>{!! $page->getTranslation('about_content', app()->getLocale()) !!}</p>
            </div>
            <div class="card-action"> 
                  <a class="btn btn--primary btn-line btn-line-after" href="{{ $page->about_link ?? '' }}">
                    <span>{{ translate('Company History') }}</span><span class="line"><span></span></span>
                  </a>
            </div>
          </div>
          <!--End .col-lg-6-->
        </div>
      </div>
    </div>
  </section>

  <section class="about about-3" id="about-3">
    <div class="bg-section"> <img src="/front/assets/images/background/pattern.png" alt="background"/></div>
    <div class="container">
      <div class="video-card">
        <div class="row g-0">
          <div class="col-12 col-lg-6">
            <div class="card-left"> 
              <p class="title">{{ $page->getTranslation('randd_title', app()->getLocale()) }}</p>
              <p class="desc">{!! $page->getTranslation('randd_content', app()->getLocale()) !!}</p>
              <a class="btn btn--primary btn-line btn-line-after" href="{{ $page->about_link ?? '' }}">
                <span>{{ translate('Read More') }}</span><span class="line"><span></span></span>
              </a>
            </div>
          </div>
          <div class="col-12 col-lg-6 about-img-holder">
            <div class="about-img"><img class="img-fluid" src="{{ asset('storage/' . $general->breadcrumb) }}" alt="about Image"/></div>
          </div>
        </div>
      </div>
      <!-- End .video-card-->
    </div>
    <!-- End .container-->
  </section>

  <section class="team team-grid team-grid-2" id="teamGrid-1">
    <div class="container"> 
      <div class="row"> 
        <div class="col-12 col-lg-5"> 
          <div class="heading heading-5">
            <h2 class="heading-title">{{ $page->getTranslation('doctor_title', app()->getLocale()) }}</h2>
            <p class="heading-desc">{!! $page->getTranslation('doctor_content', app()->getLocale()) !!}</p>
          </div>
        </div>
      </div>
      <div class="row"> 
        <div class="col-12"> 
          <div class="carousel owl-carousel carousel-navs" data-slide="3" data-slide-rs="2" data-autoplay="true" data-nav="true" data-dots="false" data-space="30" data-loop="true" data-speed="3000">
                        <div>
                          <div class="team-member" data-hover="">
                            <div class="team-member-holder">
                              <div class="team-img"><a class="link" href="#"></a><img src="/front/assets/images/team/grid/1.jpg" alt="team member"/></div>
                            </div>
                          </div>
                        </div>
                        <div>
                          <div class="team-member" data-hover="">
                            <div class="team-member-holder">
                              <div class="team-img"><a class="link" href="#"></a><img src="/front/assets/images/team/grid/2.jpg" alt="team member"/></div>
                            </div>
                          </div>
                        </div>
                        <div>
                          <div class="team-member" data-hover="">
                            <div class="team-member-holder">
                              <div class="team-img"><a class="link" href="#"></a><img src="/front/assets/images/team/grid/3.jpg" alt="team member"/></div>
                            </div>
                          </div>
                        </div>
                        <div>
                          <div class="team-member" data-hover="">
                            <div class="team-member-holder">
                              <div class="team-img"><a class="link" href="#"></a><img src="/front/assets/images/team/grid/4.jpg" alt="team member"/></div>
                            </div>
                          </div>
                        </div>
                        <div>
                          <div class="team-member" data-hover="">
                            <div class="team-member-holder">
                              <div class="team-img"><a class="link" href="#"></a><img src="/front/assets/images/team/grid/5.jpg" alt="team member"/></div>
                            </div>
                          </div>
                        </div>
                        <div>
                          <div class="team-member" data-hover="">
                            <div class="team-member-holder">
                              <div class="team-img"><a class="link" href="#"></a><img src="/front/assets/images/team/grid/6.jpg" alt="team member"/></div>
                            </div>
                          </div>
                        </div>
          </div>
        </div>
        <div class="col-12"> 
          <div class="action-bar">
            <a class="btn btn--primary btn-line btn-line-after" href="{{ $page->doctor_link ?? '' }}"><span>Read More</span><span class="line"><span></span></span></a>
          </div>
        </div>
      </div>
      <!-- .row-->
    </div>
    @if ($page->news_section == 1)    
      <div class="container mt-4">
        <div class="row"> 
          <div class="col-12 col-lg-6 offset-lg-3">
            <div class="heading heading-7 text-center">
              <h2 class="heading-title">{{ translate('Recent News') }}</h2>
            </div>
          </div>
        </div>
        <!-- End .row-->
        <div class="carousel owl-carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="200">
          @foreach ($news as $item) 
            <div>
              <div class="blog-entry" data-hover="">
                <div class="entry-img">
                  <div class="entry-date">
                    <div class="entry-content">
                      <span class="day">{{ $item->created_at->format('d') }}</span>
                      <span class="month">{{ $item->created_at->format('M') }}</span>
                      <span class="year">{{ $item->created_at->format('Y') }}</span>
                    </div>
                  </div>
                  <a href="{{ route('frontpage.news.show', [
                        'lang' => app()->getLocale(),
                        'category_slug' => $item->category->getTranslation('slug', app()->getLocale()),
                        'news_slug' => $item->getTranslation('slug', app()->getLocale())
                    ]) }}" 
                    style="display: block; width: 500px; height: 200px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $item->image) }}" 
                        alt="{{ $item->getTranslation('name', app()->getLocale()) }}"
                        style="width: auto; height: 100%; max-width: 100%; object-fit: cover; 
                                transform: scale(1); transition: transform 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.1)'" 
                        onmouseout="this.style.transform='scale(1)'" />
                </a>
                </div>
                <!-- End .entry-img-->
                <div class="entry-content">
                  <div class="entry-meta">
                    <div class="entry-category">
                      <a href="{{ route('frontpage.news.category', [
                                      'lang' => app()->getLocale(),
                                      'slug' => $item->category->getTranslation('slug', app()->getLocale())
                                  ]) }}">{{ $item->category->getTranslation('name', app()->getLocale()) }}</a>
                    </div>
                    <div class="divider"></div>
                    <div class="entry-author"> 
                      <p>Meiji Indonesia</p>
                    </div>
                  </div>
                  <div class="entry-title">
                    <h4><a href="{{ route('frontpage.news.category', [
                      'lang' => app()->getLocale(),
                      'slug' => $item->category->getTranslation('slug', app()->getLocale())
                  ]) }}">{!! Illuminate\Support\Str::limit(strip_tags($item->getTranslation('name', app()->getLocale())), 20) !!}</a></h4>
                  </div>
                  <div class="entry-bio">
                    <p>{!! Illuminate\Support\Str::limit(strip_tags($item->getTranslation('content', app()->getLocale())), 80) !!}</p>
                  </div>
                  <div class="entry-more"> <a class="btn btn--white btn-line btn-line-before btn-line-inversed" href="{{ route('frontpage.news.show', [
                    'lang' => app()->getLocale(),
                    'category_slug' => $item->category->getTranslation('slug', app()->getLocale()),
                    'news_slug' => $item->getTranslation('slug', app()->getLocale())
                ]) }}"> 
                      <div class="line"> <span> </span></div><span>{{ translate('Read More') }}</span></a></div>
                </div>
              </div>
              <!-- End .entry-content-->
            </div>
          @endforeach
        </div>
        <!-- End .carousel-->
      </div>
    @endif
    <!-- End .container-->
  </section>
@endsection
