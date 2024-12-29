@extends('layouts.front')

@section('title', 'FAQ')

@section('content')
<section class="page-title">
  <div class="bg-layer" style="background-image: url({{ asset('storage/' . $general->breadcrumb) }});"></div>
  <div class="auto-container">
      <div class="content-box">
          <h1>{{ translate('Faqs') }}</h1>
          <ul class="bread-crumb clearfix">
              <li><a href="/">{{ translate('Home') }}</a></li>
              <li>{{ translate('Faqs') }}</li>
          </ul>
      </div>
  </div>
</section>

<section class="faq-section sec-pad">
  <div class="auto-container">
          <div class="faq-content">
              <div class="upper-box">
                  <div class="title">
                      <h2>{{ translate('FAQ') }}</h2>
                  </div>
              </div>
              <ul class="accordion-box">
                  @foreach ($faqs as $faq) 
                    <li class="accordion block">
                        <div class="acc-btn active">
                            <div class="icon-outer"><i class="flaticon-down-arrow"></i></div>
                            <h4>{{ $faq->getTranslation('title', app()->getLocale()) }}</h4>
                        </div>
                        <div class="acc-content current">
                            <div class="text">
                                <p>{!! $faq->getTranslation('content', app()->getLocale()) !!}</p>
                            </div>
                        </div>
                    </li>
                  @endforeach
              </ul>
          </div>
  </div>
</section>
@endsection
