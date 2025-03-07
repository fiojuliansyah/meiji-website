@extends('layouts.front')

@section('title')
    {{ $about->getTranslation('title', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
    <section class="hero hero-4 bg-overlay bg-overlay-theme">
        <div class="bg-section"></div>
        <div class="container">
            <div class="hero-content">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="team-modern team-modern-2">
                            <div class="team-member">
                                <div class="team-member-holder">
                                    <div class="team-img"><a class="link" href="javascript:void(0)"></a><img
                                            src="{{ asset('storage/' . $general->breadcrumb) }}" alt="team member" /></div>
                                    <!-- End .team-img-->
                                    <div class="team-content-holder">
                                        <div class="team-content">
                                            <div class="team-title">
                                                <h4><a
                                                        href="javascript:void(0)">{{ $about->getTranslation('title', app()->getLocale()) }}</a>
                                                </h4>
                                            </div>
                                            <div class="team-cat"><a href="javascript:void(0)">PT. Meiji Indonesian
                                                    Pharmaceutical Industries</a></div>
                                            <div class="team-desc">
                                                <p>Muldoone obtained his undergraduate degree in Biomedical Engineering at
                                                    Tulane University prior to attending St George University School of
                                                    Medicine.</p>
                                            </div>
                                        </div>
                                        <!-- End .team-content-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="team-single team-single-modern">
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
                                        <a href="{{ route('frontpage.about.show', ['lang' => app()->getLocale(), 'slug' => $about->getTranslation('slug', app()->getLocale())]) }}">
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
    <br>
    <br>
@endsection
