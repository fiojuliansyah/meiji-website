@extends('layouts.front')

@section('title', 'Home - Meiji Indonesia')

@section('content')
<section class="banner-style-three centred">
  <div class="banner-carousel owl-theme owl-carousel owl-dots-none nav-style-one">
    @foreach ($sliders as $slider)
        <div class="slide-item">
          <div class="image-layer" style="background-image:url('{{ asset('storage/' . $slider->image) }}')"></div>
            <div class="auto-container">
                <div class="content-box">
                  <h2>{{ $slider->getTranslation('title', app()->getLocale()) }}</h2>
                  <p>{{ $slider->getTranslation('content', app()->getLocale()) }}</p>
                    <div class="btn-box">
                        <a href="/" class="theme-btn light">Read More</a>
                    </div>
                </div> 
            </div>
        </div
    @endforeach
  </div>
</section>

<section class="about-section sec-pad">
  <div class="auto-container">
      <div class="row clearfix">
          <div class="col-lg-6 col-md-12 col-sm-12 image-column">
              <div class="image-box">
                  <div class="shape-box">
                      <div class="shape shape-1 hexagon_shape"></div>
                      <div class="shape shape-2 hexagon_shape"></div>
                      <div class="shape shape-3 hexagon_shape"></div>
                  </div>
                  <div class="image-inner hexagon_shape">
                      <figure class="image"><img src="{{ asset('storage/' . $general->breadcrumb) }}" alt=""></figure>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 content-column">
              <div class="content-box">
                  <div class="sec-title">
                      <span class="sub-title">{{ translate('About') }}</span>
                      <h2>{{ $page->getTranslation('about_title', app()->getLocale()) }}</h2>
                  </div>
                  <div class="text">
                    {!! $page->getTranslation('about_content', app()->getLocale()) !!}
                  </div>
                  <div class="btn-box">
                      <a href="{{ $page->about_link }}" class="theme-btn">{{ translate('Read More') }}</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<section class="video-section sec-pad">
  <div class="bg-layer" style="background-image: url(/frontpage/assets/images/background/video-bg.jpg);"></div>
  <div class="auto-container">
      <div class="content-inner">
          <div class="content-box">
              <div class="sec-title light">
                  <span class="sub-title">{{ $page->getTranslation('doctor_title', app()->getLocale()) }}</span>
                  <h2>{!! $page->getTranslation('doctor_content', app()->getLocale()) !!}</h2>
              </div>
              <div class="btn-box">
                  <a href="{{ $page->doctor_link }}" class="theme-btn">{{ translate('Read More') }}</a>
              </div>
          </div>
      </div>
  </div>
</section>

<section class="news-section sec-pad">
  <div class="auto-container">
      <div class="sec-title">
          <span class="sub-title">{{ translate('News') }}</span>
          <h2>{{ translate('Explore our latest post') }}</h2>
      </div>
      <div class="row clearfix">
        @foreach ($news as $item) 
          <div class="col-lg-4 col-md-6 col-sm-12 news-block">
              <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                  <div class="inner-box">
                      <div class="image-box">
                          <figure class="image"><img src="{{ asset('storage/' . $item->image) }}" alt=""></figure>
                          <div class="link-btn"><a href="{{ route('frontpage.news.show', [
                                                    'lang' => app()->getLocale(),
                                                    'category_slug' => $item->category->getTranslation('slug', app()->getLocale()),
                                                    'news_slug' => $item->getTranslation('slug', app()->getLocale()),
                                                ]) }}"><i class="flaticon-zoom-in"></i></a></div>
                      </div>
                      <div class="lower-content">
                          <div class="category"><a href="{{ route('frontpage.news.show', [
                                                    'lang' => app()->getLocale(),
                                                    'category_slug' => $item->category->getTranslation('slug', app()->getLocale()),
                                                    'news_slug' => $item->getTranslation('slug', app()->getLocale()),
                                                ]) }}">{{ $item->category->getTranslation('name', app()->getLocale()) }}</a></div>
                          <ul class="post-info clearfix">
                              <li>{{ $item->created_at->format('d M Y') }}</li>
                              <li><a href="">By Admin</a></li>
                          </ul>
                          <h3><a href="">{{ $item->getTranslation('name', app()->getLocale()) }}</a></h3>
                          <div class="lower-box">
                              <div class="link"><a href="{{ route('frontpage.news.show', [
                                                    'lang' => app()->getLocale(),
                                                    'category_slug' => $item->category->getTranslation('slug', app()->getLocale()),
                                                    'news_slug' => $item->getTranslation('slug', app()->getLocale()),
                                                ]) }}">Read More</a></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        @endforeach
      </div>
  </div>
</section>
@endsection
