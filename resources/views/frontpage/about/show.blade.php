@extends('layouts.front')

@section('title')
{{ $about->getTranslation('title', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
<section class="page-title bg-overlay bg-overlay-dark bg-parallax" id="page-title">
  <div class="bg-section"><img src="{{ asset('storage/' . $general->breadcrumb) }}" alt="Background"/></div>
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6 offset-lg-3">
        <div class="title">
          <div class="title-heading">
            <h1>{{ $about->getTranslation('title', app()->getLocale()) }}</h1>
          </div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">{{ translate('Home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $about->getTranslation('title', app()->getLocale()) }}</li>
          </ol>
        </div>
        <!-- End .title -->
      </div>
      <!-- End .col-lg-6-->
    </div>
    <!-- End .row-->
  </div>
  <!-- End .container-->
</section>
<br>
<br>
<br>
<div class="about-section">
    <div class="container">
        <div class="about-content">
            {!! $about->getTranslation('content', app()->getLocale()) !!}
        </div>
    </div>
</div>
<br>
<br>
@endsection