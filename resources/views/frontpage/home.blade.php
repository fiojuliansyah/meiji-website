@extends('layouts.front')

@section('title', 'Home - Meiji Indonesia')

@section('content')
<section class="slider" id="slider-1" style="
    position: relative; 
    width: 100%; 
    height: 100vh; 
    overflow: hidden; 
    perspective: 1000px;">
    <div class="slider-container" style="
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
            transform: scale(0.8) rotateY(45deg);
            background: linear-gradient(135deg, 
                rgba(0,0,0,0.8) 0%, 
                rgba(0,0,0,0.5) 100%), 
                url('{{ asset('storage/' . $slider->image) }}');
            background-size: cover;
            background-position: center;
            color: white;
            z-index: 1;">
            
            <!-- Particle Background Effect -->
            <div class="particle-bg" style="
                position: absolute; 
                top: 0; 
                left: 0; 
                width: 100%; 
                height: 100%; 
                z-index: -1;
                opacity: 0.6;
                pointer-events: none;"></div>
            
            <div class="slide-content" style="
                max-width: 1200px; 
                padding: 40px; 
                text-align: center; 
                background: rgba(0,0,0,0.4); 
                border-radius: 20px; 
                backdrop-filter: blur(10px);
                box-shadow: 0 15px 35px rgba(0,0,0,0.2);
                transform: translateZ(50px);
                transition: all 1s ease;">
                
                <h1 style="
                    font-size: 4rem; 
                    font-weight: 900; 
                    margin-bottom: 20px; 
                    background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    text-transform: uppercase;
                    letter-spacing: 3px;
                    line-height: 1.2;">
                    {{ $slider->getTranslation('title', app()->getLocale()) }}
                </h1>
                
                <p style="
                    font-size: 1.5rem; 
                    margin-bottom: 30px; 
                    color: rgba(255,255,255,0.8); 
                    line-height: 1.6;
                    max-width: 800px;
                    margin-left: auto;
                    margin-right: auto;">
                    {{ $slider->getTranslation('content', app()->getLocale()) }}
                </p>
                
                <a href="#" style="
                    display: inline-block;
                    padding: 15px 40px;
                    background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
                    color: white;
                    text-decoration: none;
                    border-radius: 50px;
                    font-weight: bold;
                    text-transform: uppercase;
                    letter-spacing: 2px;
                    transition: all 0.3s ease;
                    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
                    transform: perspective(1000px) translateZ(30px);
                    hover:transform: scale(1.05);">
                    Explore Now
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Navigation -->
    <div style="
        position: absolute; 
        bottom: 30px; 
        left: 0; 
        width: 100%; 
        display: flex; 
        justify-content: center; 
        z-index: 10;">
        @foreach ($sliders as $index => $slider)
        <button class="slide-dot" data-slide="{{ $index }}" style="
            width: 15px; 
            height: 15px; 
            background: rgba(255,255,255,0.5); 
            border: none; 
            border-radius: 50%; 
            margin: 0 10px; 
            cursor: pointer;
            transition: all 0.3s ease;
            transform: perspective(500px) translateZ(10px);">
        </button>
        @endforeach
    </div>
    
    <!-- Embedded Styles and Scripts -->
    <style>
        @keyframes particleAnimation {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-50px) rotate(180deg); }
            100% { transform: translateY(0) rotate(360deg); }
        }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.slide-dot');
        let currentSlide = 0;

        // Particle Background Effect
        function createParticles(particleBg) {
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.style.position = 'absolute';
                particle.style.width = `${Math.random() * 5 + 2}px`;
                particle.style.height = particle.style.width;
                particle.style.background = 'rgba(255,255,255,0.3)';
                particle.style.borderRadius = '50%';
                particle.style.top = `${Math.random() * 100}%`;
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.animation = `particleAnimation ${Math.random() * 5 + 3}s infinite`;
                particleBg.appendChild(particle);
            }
        }

        // Initialize particles for each slide
        document.querySelectorAll('.particle-bg').forEach(createParticles);

        // Slide navigation function
        function showSlide(index) {
            // Reset all slides
            slides.forEach((slide, i) => {
                slide.style.opacity = '0';
                slide.style.transform = 'scale(0.8) rotateY(45deg)';
                dots[i].style.background = 'rgba(255,255,255,0.5)';
                slide.style.zIndex = '1';
            });

            // Show current slide
            slides[index].style.opacity = '1';
            slides[index].style.transform = 'scale(1) rotateY(0)';
            slides[index].style.zIndex = '10';
            dots[index].style.background = 'linear-gradient(45deg, #ff6b6b, #4ecdc4)';
        }

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });

        // Auto slide
        function autoSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        // Initial slide
        showSlide(0);

        // Auto slide every 5 seconds
        setInterval(autoSlide, 5000);
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
