@extends('layouts.front')

@section('title')
    {{ $about->getTranslation('title', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')

<section class="team-single team-single-standard">
    <div class="container"> 
      <div class="row"> 
        <div class="col-12 col-lg-4">
            <div class="sidebar sidebar-doctors sidebar-doctors-3">
                <div class="team-modern team-modern-3">
                  <div class="team-member">
                    <div class="team-member-holder">
                      <div class="team-img"><a class="link" href="javascript:void(0)"></a><img src="{{ asset('storage/' . $general->breadcrumb) }}" alt="member"/></div>
                      <!-- End .team-img-->
                      <div class="team-content-holder">
                        <div class="team-content"> 
                          <div class="team-cat"><a href="javascript:void(0)">PT. Meiji Indonesian
                            Pharmaceutical Industries</a></div>
                          <div class="team-desc">
                            {!! $general->getTranslation('bio', app()->getLocale()) !!}                        
                          </div>
                          <div class="team-social"> <a href="javascript:void(0)"><i class="fab fa-facebook-f"> </i></a><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a><a href="javascript:void(0)"><i class="fas fa-envelope"></i></a><a href="javascript:void(0)"><i class="fas fa-phone-alt"></i></a></div>
                        </div>
                        <!-- End .team-content-->
                      </div>
                    </div>
                  </div>
                </div>
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
