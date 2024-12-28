@extends('layouts.front')

@section('title', 'FAQ - Meiji Indonesia')

@section('content')
<section class="accordion accordion-2">
    <div class="container"> 
          <p>We help create a care plan that addresses your specific condition and we are here to answer all of your questions & acknowledge your concerns. Today the hospital is recognised as a world renowned institution, not only providing outstanding care and treatment, but improving the outcomes.</p>
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
