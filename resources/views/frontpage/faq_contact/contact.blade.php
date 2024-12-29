@extends('layouts.front')

@section('title', 'Contact - Meiji Indonesia')

@section('content')
<section class="page-title">
  <div class="bg-layer" style="background-image: url({{ asset('storage/' . $general->breadcrumb) }});"></div>
  <div class="auto-container">
      <div class="content-box">
          <h1>{{ $contact->getTranslation('title', app()->getLocale()) }}</h1>
          <ul class="bread-crumb clearfix">
              <li><a href="index.html">{{ translate('Home') }}</a></li>
              <li>{{ translate('Contact') }}</li>
          </ul>
      </div>
  </div>
</section>
<br>
<br>
<section class="location-style-two bg-color-1">
  <div class="pattern-layer" style="background-image: url(/frontpage/assets/images/shape/shape-22.png);"></div>
  <div class="google-map-inner">
      {!! $contact->map_url ?? '' !!}
      <div class="map-content">
          <div class="image-box"><img src="{{ asset('storage/' . $general->breadcrumb) }}" alt=""></div>
          <div class="inner-box">
              <h6>Indonesia</h6>
              <h3>{{ $general->short_address }}</h3>
              <ul class="info clearfix">
                  <li>{{ $general->address }}</li>
                  <li><a href="">{{ $general->phone_1 }}</a></li>
              </ul>
          </div>
      </div>
  </div>
  <div class="auto-container">
      <div class="row clearfix">
          <div class="col-lg-4 col-md-12 col-sm-12 content-column">
              <div class="content-box">
                  <div class="sec-title">
                      <span class="sub-title">Locations</span>
                      <h2>Find nearest branch</h2>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
