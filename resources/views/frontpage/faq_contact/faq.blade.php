@extends('layouts.front')

@section('title', 'FAQ - Meiji Indonesia')

@section('content')
<section class="accordion accordion-2">
    <div class="container"> 
          <div style="text-align: center; margin-bottom: 50px;">
              <h2 style="font-size: 2.5rem; color: #283b6a; margin-bottom: 20px;">{{ translate('FAQ') }}</h2>
              <p style="color: #666; font-size: 1.1rem;">{{ translate('Journey of Excellence and Innovation') }}</p>
          </div>
          <div class="accordion-holder" id="accordion03"> 
            @foreach ($faqs as $faq)  
              <div class="card">
                <div class="card-heading"><a class="card-link collapsed" data-hover="" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse01-{{ $faq->id }}" href="#collapse01-{{ $faq->id }}">{{ $faq->getTranslation('title', app()->getLocale()) }}</a></div>
                <div class="collapse" id="collapse01-{{ $faq->id }}" data-bs-parent="#accordion03">
                  <div class="card-body">{!! $faq->getTranslation('content', app()->getLocale()) !!}</div>
                </div>
              </div>
            @endforeach
        </div>
    </div>
  </section>
@endsection
