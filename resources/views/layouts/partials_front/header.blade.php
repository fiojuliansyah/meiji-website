<header class="header header-light header-topbar header-topbar6" id="navbar-spy">
    <!-- Start .top-bar-->
    <div class="top-bar">
        <div class="block-left"> 
          <p class="headline"> 
            &nbsp; {{ $general->name }} &nbsp; 
          </p>
          <div class="carousel owl-carousel" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="false" data-space="0" data-loop="true" data-speed="800">
            @foreach ($categories as $category)  
                <a href="{{ route('frontpage.products.category', [
                    'lang' => app()->getLocale(),
                    'slug' => $category->getTranslation('slug', app()->getLocale())
                ]) }}" style="color: red">
                {{ $category->getTranslation('name', app()->getLocale()) }} 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 8" width="11" height="8" style="color: red">
                    <g>
                    <g>
                        <g>
                        <path class="shp1" d="M11 4L7.01 0L7.01 3L0 3L0 5L7.01 5L7.01 8L11 4Z"></path>
                        </g>
                    </g>
                    </g>
                </svg>
                </a>
            @endforeach
           </div>
        </div>
        <div class="block-right">
          <div class="top-contact">
            <div class="contact-infos"><i class="fas fa-phone-alt"></i>
                <div class="contact-body"> <a href="tel:123-456-7890">{{ translate('Phone') }}: {{ $general->phone_1 }}</a></div>
            </div>
            <div class="contact-infos"><i class="fas fa-map-marker-alt"></i>
                <div class="contact-body"> <a href="#">{{ translate('Location') }}: {{ $general->short_address }} </a></div>
            </div>
            <!-- Start .module-language-->
              <div class="module module-language">
                  @php
                      $currentLanguage = App\Models\Language::where('code', app()->getLocale())->first();
                  @endphp
                  <div class="selected">
                      <img src="/front/assets/images/module-language/{{ app()->getLocale() }}.png" alt="{{ $currentLanguage->name }}" />
                      <span style="color: #283b6a">{{ $currentLanguage->name }}</span>
                      <i class="fas fa-chevron-down" style="color: #283b6a"></i>
                  </div>
                  <div class="lang-list">
                      <ul>
                      <form method="POST" action="{{ route('change-language', ['lang' => app()->getLocale()]) }}">
                          @csrf
                          <input type="hidden" name="route" value="{{ $currentRoute }}">
                          <input type="hidden" name="parameters" value="{{ $routeParameters }}">
                          @foreach(App\Models\Language::all() as $language)
                          <li>
                              <img src="/front/assets/images/module-language/{{ $language->code }}.png" alt="{{ $language->name }}" />
                              <button type="submit" name="lang" value="{{ $language->code }}">{{ $language->name }}</button>
                          </li>
                          <br>
                          @endforeach
                      </form>
                      </ul>
                  </div>
              </div>
          </div>
        </div>
    </div>
    <!-- End .top-bar-->
    <nav class="navbar navbar-expand-xl navbar-sticky" id="primary-menu">
        <div class="container"><a class="navbar-brand" href="/">
            @if ($general && $general->logo)
                <img class="logo logo-dark"
                        src="{{ asset('storage/' . $general->logo) }}" alt="Meiji Logo" />
                        <img class="logo logo-mobile"
                        src="{{ asset('storage/' . $general->logo) }}" alt="Meiji Logo" /></a>
            @endif
            <div class="module-holder module-holder-phone">
                <!--  Start Module Search  -->
                <div class="module module-search float-left">
                    <div class="module-icon search-icon"><i class="icon-search" data-hover=""></i></div>
                </div>
                <!--  End .module-search-->
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ">
                    <li class="nav-item has-dropdown" data-hover=""><a class="dropdown-toggle" href="#"
                            data-toggle="dropdown"><span>{{ translate('About Us') }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach($abouts as $about)
                                <li class="nav-item">
                                    <a href="{{ route('frontpage.about.show', ['lang' => app()->getLocale(), 'slug' => $about->getTranslation('slug', app()->getLocale())]) }}">
                                        <span>{{ $about->getTranslation('title', app()->getLocale()) }}</span>
                                    </a>
                                </li>
                            @endforeach
                            <li class="nav-item">
                                <a href="{{ route('frontpage.timeline', ['lang' => app()->getLocale()]) }}">
                                    <span>{{ translate('Company History') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-dropdown" data-hover=""><a class="dropdown-toggle" href="#"
                            data-toggle="dropdown"><span>{{ translate('News') }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach($news_categories as $nCategory)
                            <li class="nav-item">
                                <a href="{{ route('frontpage.news.category', [
                                    'lang' => app()->getLocale(),
                                    'slug' => $nCategory->getTranslation('slug', app()->getLocale())
                                ]) }}">
                                    <span>{{ $nCategory->getTranslation('name', app()->getLocale()) }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item has-dropdown" data-hover=""><a class="dropdown-toggle" href="#"
                        data-toggle="dropdown"><span>{{ translate('Products') }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                            <li class="nav-item">
                                <a href="{{ route('frontpage.products.category', [
                                    'lang' => app()->getLocale(),
                                    'slug' => $category->getTranslation('slug', app()->getLocale())
                                ]) }}">
                                    <span>{{ $category->getTranslation('name', app()->getLocale()) }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item has-dropdown" data-hover=""><a class="dropdown-toggle" href="#"
                        data-toggle="dropdown"><span>{{ translate('R&D') }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach($randds as $randd)
                                <li class="nav-item">
                                    <a href="{{ route('frontpage.randd.show', ['lang' => app()->getLocale(), 'slug' => $randd->getTranslation('slug', app()->getLocale())]) }}">
                                        <span>{{ $randd->getTranslation('title', app()->getLocale()) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item has-dropdown" data-hover=""><a class="dropdown-toggle" href="#"
                        data-toggle="dropdown"><span>{{ translate('Activity') }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach($activities as $activity)
                                <li class="nav-item">
                                    <a href="{{ route('frontpage.activity.show', ['lang' => app()->getLocale(), 'slug' => $activity->getTranslation('slug', app()->getLocale())]) }}">
                                        <span>{{ $activity->getTranslation('title', app()->getLocale()) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item has-dropdown" data-hover=""><a class="dropdown-toggle" href="#"
                        data-toggle="dropdown"><span>{{ translate('Career') }}</span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="#">
                                    <span>{{ translate('Job Portal') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-hover=""><a href="{{ route('frontpage.faq') }}"><span>{{ translate('FAQ') }}</span></a>
                    </li>
                    @if ($pages_header->isNotEmpty())
                        <li class="nav-item has-dropdown" data-hover="">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                <span>{{ translate('Pages') }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($pages_header as $page)  
                                    <li class="nav-item">
                                        <a href="{{ route('frontpage.page.show', ['lang' => app()->getLocale(), 'slug' => $page->getTranslation('slug', app()->getLocale())]) }}">
                                            <span>{{ $page->getTranslation('title', app()->getLocale()) }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                </ul>
                <div class="module-holder">
                    <!-- Start .module-contact-->
                    <div class="module-contact module-contact-2 module-contact-3"><a
                            class="btn btn--primary btn-line btn-line-after" href="{{ route('frontpage.contact') }}">
                            <span>{{ translate('Contact') }}</span><span class="line"> <span></span></span></a></div>

                </div>
                <!--  End .module-holder-->
            </div>
        </div>
        <!--  End .container-->
    </nav>
    <!--  End .navbar-->
</header>
