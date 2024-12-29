<header class="main-header header-style-three">
    <!-- header-top -->
    <div class="header-top-three">
        <div class="auto-container">
            <div class="top-inner">
                @if ($general && $general->logo)
                <div class="logo-box">
                    <figure class="logo"><a href="/"><img src="{{ asset('storage/' . $general->logo) }}" alt=""></a></figure>
                </div>
                @endif
                <div class="right-column">
                    <div class="info-box">
                        <div class="icon-box"><i class="flaticon-add-user"></i></div>
                        <h6>{{ translate('A Doctor?') }}</h6>
                        <a href="index-3.html">{{ translate('Go to Site') }}<i class="flaticon-right-arrow"></i></a>
                    </div>
                    <ul class="menu-right-content">
                        <li class="search-box-outer search-toggler">
                            <i class="flaticon-magnifying-glass"></i>
                        </li>
                    </ul> 
                    <div class="btn-box"><a href="{{ route('frontpage.contact', ['lang' => app()->getLocale()]) }}"><i class="flaticon-down-arrow-1"></i>{{ translate('Contact') }}</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box">
                <div class="menu-area clearfix">
                    <!-- Mobile Navigation Toggler -->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <!-- About Us -->
                                <li class="dropdown">
                                    <a href="#">{{ translate('About Us') }}</a>
                                    <ul>
                                        @foreach($abouts as $about)
                                        <li>
                                            <a href="{{ route('frontpage.about.show', ['lang' => app()->getLocale(), 'slug' => $about->getTranslation('slug', app()->getLocale())]) }}">
                                                {{ $about->getTranslation('title', app()->getLocale()) }}
                                            </a>
                                        </li>
                                        @endforeach
                                        <li>
                                            <a href="{{ route('frontpage.timeline', ['lang' => app()->getLocale()]) }}">
                                                {{ translate('Company History') }}
                                            </a>
                                        </li>
                                    </ul>
                                </li>
    
                                <!-- News -->
                                <li class="dropdown">
                                    <a href="#">{{ translate('News') }}</a>
                                    <ul>
                                        @foreach($news_categories as $nCategory)
                                        <li>
                                            <a href="{{ route('frontpage.news.category', ['lang' => app()->getLocale(), 'slug' => $nCategory->getTranslation('slug', app()->getLocale())]) }}">
                                                {{ $nCategory->getTranslation('name', app()->getLocale()) }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
    
                                <!-- Products -->
                                <li class="dropdown">
                                    <a href="#">{{ translate('Products') }}</a>
                                    <ul>
                                        @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('frontpage.products.category', ['lang' => app()->getLocale(), 'slug' => $category->getTranslation('slug', app()->getLocale())]) }}">
                                                {{ $category->getTranslation('name', app()->getLocale()) }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
    
                                <!-- R&D -->
                                <li class="dropdown">
                                    <a href="#">{{ translate('R&D') }}</a>
                                    <ul>
                                        @foreach($randds as $randd)
                                        <li>
                                            <a href="{{ route('frontpage.randd.show', ['lang' => app()->getLocale(), 'slug' => $randd->getTranslation('slug', app()->getLocale())]) }}">
                                                {{ $randd->getTranslation('title', app()->getLocale()) }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
    
                                <!-- Activity -->
                                <li class="dropdown">
                                    <a href="#">{{ translate('Activity') }}</a>
                                    <ul>
                                        @foreach($activities as $activity)
                                        <li>
                                            <a href="{{ route('frontpage.activity.show', ['lang' => app()->getLocale(), 'slug' => $activity->getTranslation('slug', app()->getLocale())]) }}">
                                                {{ $activity->getTranslation('title', app()->getLocale()) }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
    
                                <!-- Career -->
                                <li class="dropdown">
                                    <a href="#">{{ translate('Career') }}</a>
                                    <ul>
                                        <li>
                                            <a href="#">{{ translate('Job Portal') }}</a>
                                        </li>
                                    </ul>
                                </li>
    
                                <!-- FAQ -->
                                <li><a href="{{ route('frontpage.faq') }}">{{ translate('FAQ') }}</a></li>
    
                                <!-- Pages -->
                                @if ($pages_header->isNotEmpty())
                                <li class="dropdown">
                                    <a href="#">{{ translate('Pages') }}</a>
                                    <ul>
                                        @foreach ($pages_header as $page)
                                        <li>
                                            <a href="{{ route('frontpage.page.show', ['lang' => app()->getLocale(), 'slug' => $page->getTranslation('slug', app()->getLocale())]) }}">
                                                {{ $page->getTranslation('title', app()->getLocale()) }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
    
                <!-- Right Navigation -->
                <div class="nav-right">
                    <!-- Language Selector -->
                    <ul class="social-links clearfix">
                        <form method="POST" action="{{ route('change-language', ['lang' => app()->getLocale()]) }}">
                            @csrf
                            <input type="hidden" name="route" value="{{ $currentRoute }}">
                            <input type="hidden" name="parameters" value="{{ $routeParameters }}">
                            @foreach(App\Models\Language::all() as $language)
                            <li>
                                <button type="submit" name="lang" value="{{ $language->code }}">
                                    <img src="/front/assets/images/module-language/{{ $language->code }}.png" alt="{{ $language->name }}" />
                                </button>
                            </li>
                            @endforeach
                        </form>
                    </ul>
    
                    <!-- Contact Info -->
                    <ul class="menu-right-content">
                        <li class="support-box">
                            <div class="icon-box"><i class="flaticon-dial-pad"></i></div>
                            <a href="{{ route('frontpage.contact') }}" class="btn btn--primary btn-line btn-line-after">
                                <span>{{ $general->phone_1 }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box">
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        
                    </nav>
                </div>
                <div class="nav-right">
                    <ul class="social-links clearfix">
                        <form method="POST" action="{{ route('change-language', ['lang' => app()->getLocale()]) }}">
                            @csrf
                            <input type="hidden" name="route" value="{{ $currentRoute }}">
                            <input type="hidden" name="parameters" value="{{ $routeParameters }}">
                            @foreach(App\Models\Language::all() as $language)
                            <li><button type="submit" name="lang" value="{{ $language->code }}"><img src="/front/assets/images/module-language/{{ $language->code }}.png" alt="{{ $language->name }}" /></button></li>
                            @endforeach
                        </form>
                    </ul>
                    <ul class="menu-right-content">
                        <li class="support-box"> 
                            <div class="icon-box"><i class="flaticon-dial-pad"></i></div>
                            <a href="tel:80045678901">{{ $general->phone_1 }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>