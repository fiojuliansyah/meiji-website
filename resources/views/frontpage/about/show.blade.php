@extends('layouts.front')

@section('title')
    {{ $about->getTranslation('title', app()->getLocale()) }} - Meiji Indonesia
@endsection
@section('content')
<section class="team-single team-single-standard">
    <div class="container"> 
      <div class="row"> 
        <div class="col-12 col-lg-4">
            <div class="sidebar sidebar-doctors">
                <div class="widget widget-download">
                    <div class="widget-content">
                      <ul class="list-unstyled">
                          @foreach ($abouts as $otherAbout)
                            @if ($otherAbout->id != $about->id)   
                              <li>
                                <a href="{{ route('frontpage.about.show', ['lang' => app()->getLocale(), 'slug' => $otherAbout->getTranslation('slug', app()->getLocale())]) }}">
                                  <span>{{ $otherAbout->getTranslation('title', app()->getLocale()) }}</span>
                                </a>
                              </li>
                            @endif   
                          @endforeach
                      </ul>
                    </div>
                </div>
                <!-- End .widget-download-->
            </div>
            <!-- End .sidebar-->
        </div>
        <div class="col-12 col-lg-8">
            <div class="entry-bio">
                {!! $about->getTranslation('content', app()->getLocale()) !!}
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
