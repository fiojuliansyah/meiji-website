@extends('layouts.front')

@section('title', 'Home - Meiji Indonesia')

@section('content')
<section class="slider" id="slider-1">
    <div class="container-fluid pr-0 pl-0">
      <div class="slider-carousel owl-carousel carousel-navs carousel-dots" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="true" data-dots="true" data-space="0" data-loop="false" data-speed="800">
        @foreach ($sliders as $slider)
          <div class="slide bg-overlay bg-overlay-dark-slider">
            <div class="bg-section"><img src="{{ asset('storage/' . $slider->image) }}" alt="Background"/></div>
            <div class="container">
              <div class="row">
                <div class="col-12 col-lg-7">
                  <div class="slide-content">
                    <h1 class="slide-headline">{{ $slider->getTranslation('title', app()->getLocale()) }}</h1>
                    <p class="slide-desc">{{ $slider->getTranslation('content', app()->getLocale()) }}</p>
                  </div>
                  <!-- End .slide-content -->
                </div>
              </div>
              <!--  End .row-->
            </div>
            <!-- End .container-->
          </div>    
        @endforeach
      </div>
    </div>
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
                  <!-- End .entry-date--><a href="{{ route('frontpage.news.show', [
                                      'lang' => app()->getLocale(),
                                      'category_slug' => $item->category->getTranslation('slug', app()->getLocale()),
                                      'news_slug' => $item->getTranslation('slug', app()->getLocale())
                                  ]) }}"><img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->getTranslation('name', app()->getLocale()) }}"/></a>
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
                    <h4><a href="blog-single-sidebar.html">{{ $item->getTranslation('name', app()->getLocale()) }}</a></h4>
                  </div>
                  <div class="entry-bio">
                    <p>{!! Illuminate\Support\Str::limit(strip_tags($item->getTranslation('content', app()->getLocale())), 150) !!}</p>
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
