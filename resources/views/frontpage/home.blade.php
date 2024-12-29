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

@endsection
