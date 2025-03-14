@extends('layouts.front')

@section('title', 'Home - Meiji Indonesia')

@section('content')
<section class="innovative-slider" style="
    position: relative; 
    width: 100%; 
    height: 100vh; 
    overflow: hidden; 
    background-color: #0f0f0f;">
    
    <div class="slider-wrapper" style="
        position: relative; 
        width: 100%; 
        height: 100%; 
        display: flex; 
        align-items: center; 
        justify-content: center;">
        
        @foreach ($sliders as $slider)
        <div class="slide" style="
            position: absolute; 
            width: 100%; 
            height: 100%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            opacity: 0;
            transition: all 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            background: linear-gradient(135deg, 
                rgba(0,0,0,0.9) 0%, 
                rgba(0,0,0,0.7) 100%), 
                url('{{ asset('storage/' . $slider->image) }}');
            background-size: cover;
            background-position: center;
            color: white;
            z-index: 1;
            clip-path: circle(0% at center);">
            
            <!-- Interactive Wave Background -->
            <div class="wave-background" style="
                position: absolute; 
                top: 0; 
                left: 0; 
                width: 100%; 
                height: 100%; 
                z-index: -1;
                overflow: hidden;">
                <svg viewBox="0 0 1440 320" preserveAspectRatio="none" style="
                    position: absolute; 
                    bottom: 0; 
                    width: 100%; 
                    height: 200px;">
                    <path fill="#4ecdc4" fill-opacity="0.3" d="
                        M0,160 
                        C220,210 440,260 660,224 
                        C880,188 1100,84 1320,52 
                        L1440,32 
                        L1440,320 
                        L0,320 
                        Z">
                    </path>
                </svg>
            </div>
            
            <div class="slide-content" style="
                max-width: 1000px; 
                padding: 40px; 
                text-align: center; 
                background: rgba(0,0,0,0.4); 
                border-radius: 30px; 
                backdrop-filter: blur(15px);
                transform: perspective(1000px) translateZ(-100px);
                transition: all 1s ease;
                position: relative;
                overflow: hidden;">
                
                <!-- Glitch Effect Overlay -->
                <div class="glitch-overlay" style="
                    position: absolute; 
                    top: 0; 
                    left: 0; 
                    width: 100%; 
                    height: 100%; 
                    background: rgba(0,0,0,0.2);
                    pointer-events: none;
                    z-index: 2;
                    mix-blend-mode: overlay;"></div>
                
                <h1 style="
                    font-size: 4.5rem; 
                    font-weight: 900; 
                    margin-bottom: 20px; 
                    background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    text-transform: uppercase;
                    letter-spacing: 5px;
                    line-height: 1.2;
                    position: relative;
                    z-index: 3;">
                    {{ $slider->getTranslation('title', app()->getLocale()) }}
                </h1>
                
                <p style="
                    font-size: 1.6rem; 
                    margin-bottom: 30px; 
                    color: rgba(255,255,255,0.9); 
                    line-height: 1.6;
                    max-width: 800px;
                    margin-left: auto;
                    margin-right: auto;
                    position: relative;
                    z-index: 3;">
                    {{ $slider->getTranslation('content', app()->getLocale()) }}
                </p>
                
                <a href="#" style="
                    display: inline-block;
                    padding: 15px 50px;
                    background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
                    color: white;
                    text-decoration: none;
                    border-radius: 60px;
                    font-weight: bold;
                    text-transform: uppercase;
                    letter-spacing: 3px;
                    transition: all 0.4s ease;
                    position: relative;
                    z-index: 3;
                    box-shadow: 0 15px 30px rgba(0,0,0,0.3);
                    transform: perspective(500px) translateZ(20px);
                    will-change: transform;">
                    Discover More
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Futuristic Navigation -->
    <div class="slider-navigation" style="
        position: absolute; 
        bottom: 30px; 
        left: 0; 
        width: 100%; 
        display: flex; 
        justify-content: center; 
        z-index: 10;">
        @foreach ($sliders as $index => $slider)
        <button class="nav-dot" data-slide="{{ $index }}" style="
            width: 20px; 
            height: 20px; 
            background: rgba(255,255,255,0.3); 
            border: 2px solid #4ecdc4; 
            border-radius: 50%; 
            margin: 0 15px; 
            cursor: pointer;
            transition: all 0.3s ease;
            transform: perspective(500px) translateZ(10px);
            will-change: transform, background;">
        </button>
        @endforeach
    </div>
    
    <style>
        @keyframes glitchAnimation {
            0% { clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%); }
            5% { clip-path: polygon(0 10%, 100% 0, 100% 100%, 0 90%); }
            10% { clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%); }
            15% { clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%); }
        }
        
        @keyframes waveAnimation {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
    </style>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.nav-dot');
        let currentSlide = 0;

        // Advanced Slide Navigation
        function showSlide(index) {
            // Reset all slides
            slides.forEach((slide, i) => {
                slide.style.opacity = '0';
                slide.style.clipPath = 'circle(0% at center)';
                dots[i].style.background = 'rgba(255,255,255,0.3)';
                slide.style.zIndex = '1';
            });

            // Show current slide with advanced animation
            slides[index].style.opacity = '1';
            slides[index].style.clipPath = 'circle(150% at center)';
            slides[index].style.zIndex = '10';
            dots[index].style.background = 'linear-gradient(45deg, #ff6b6b, #4ecdc4)';
        }

        // Dot Navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });

        // Glitch Effect
        function applyGlitchEffect(slide) {
            const glitchOverlay = slide.querySelector('.glitch-overlay');
            glitchOverlay.style.animation = 'glitchAnimation 0.3s linear infinite';
        }

        // Auto Slide with Advanced Transitions
        function autoSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
            applyGlitchEffect(slides[currentSlide]);
        }

        // Initial Setup
        showSlide(0);
        applyGlitchEffect(slides[0]);

        // Auto slide every 6 seconds
        setInterval(autoSlide, 6000);

        // Interactive Hover Effects
        dots.forEach(dot => {
            dot.addEventListener('mouseenter', () => {
                dot.style.transform = 'scale(1.2) perspective(500px) translateZ(20px)';
            });
            dot.addEventListener('mouseleave', () => {
                dot.style.transform = 'perspective(500px) translateZ(10px)';
            });
        });
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
      <div class="heading heading-9">
        <div class="row">
          <div class="col-12 col-lg-5">
            <h2 class="heading-title">{{ $page->getTranslation('doctor_title', app()->getLocale()) }}</h2>
            <p class="heading-desc">{!! $page->getTranslation('doctor_content', app()->getLocale()) !!}</p>
          </div>
          <div class="col-12 col-lg-6 offset-lg-1">
            <div class="doctor-action"><a class="btn btn--secondary btn-line btn-line-after" href="{{ $page->doctor_link }}"> <span>{{ translate('Read More') }}</span><span class="line"> <span></span></span></a>
            </div>
          </div>
        </div>
      </div>
      <!-- End .row-->
    </div>
    @if ($page->news_section == 1)    
      <div class="container">
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
