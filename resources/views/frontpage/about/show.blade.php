@extends('layouts.front')

@section('title')
{{ $about->getTranslation('title', app()->getLocale()) }}
@endsection

@section('content')
<section class="page-title">
  <div class="bg-layer" style="background-image: url({{ asset('storage/' . $general->breadcrumb) }});"></div>
  <div class="auto-container">
      <div class="content-box">
          <h1>{{ $about->getTranslation('title', app()->getLocale()) }}</h1>
          <ul class="bread-crumb clearfix">
              <li><a href="index.html">{{ translate('Home' )}}</a></li>
              <li>{{ translate('About' )}}</li>
              <li>{{ $about->getTranslation('title', app()->getLocale()) }}</li>
          </ul>
      </div>
  </div>
</section>
<section class="about-style-three sec-pad">
  <div class="auto-container">
    {!! $about->getTranslation('content', app()->getLocale()) !!}
  </div>
</section>
@endsection