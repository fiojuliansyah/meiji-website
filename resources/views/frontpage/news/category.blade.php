@extends('layouts.front')

@section('title')
    {{ $category->getTranslation('name', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
    <div class="container">
        <div class="row" style="padding-bottom: 80px;">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-0">
                <div class="title">
                    <!-- Simple decorative element -->
                    <div class="title-decoration"></div>
                    
                    <div class="title-card">
                        <!-- Simple decorative accent -->
                        <div class="title-accent"></div>
                        
                        <div class="card-icon"> 
                            <div class="icon-bg"></div>
                            <i class="flaticon-029-cardiogram-1"></i>
                        </div>
                        <h4 class="category-title">{{ $category->getTranslation('name', app()->getLocale()) }}</h4>
                        
                        <!-- Simple underline accent -->
                        <div class="title-underline">
                            <div class="underline-highlight"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        /* Moving styles to a style block instead of inline */
        .title-decoration {
            position: absolute;
            width: 100px;
            height: 100px;
            border: 2px solid rgba(255,255,255,0.2);
            border-radius: 50%;
            top: -50px;
            left: -30px;
            z-index: -1;
        }
        
        .title-card {
            position: relative;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            border-left: 4px solid #FF0000;
            animation: fadeIn 0.6s ease-out;
        }
        
        .title-accent {
            position: absolute;
            width: 30px;
            height: 3px;
            background: #FF0000;
            top: 20px;
            right: 25px;
        }
        
        .card-icon {
            position: relative;
            margin-bottom: 15px;
        }
        
        .icon-bg {
            position: absolute;
            width: 50px;
            height: 50px;
            background: rgba(52,152,219,0.2);
            border-radius: 50%;
            left: -5px;
            top: -5px;
            animation: pulse 2s infinite;
        }
        
        .card-icon i {
            position: relative;
            font-size: 40px;
            color: #ffffff;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }
        
        .category-title {
            padding-top: 10px;
            color: #FF0000;
            font-size: 26px;
            font-weight: 700;
            text-shadow: 0 1px 3px rgba(0,0,0,0.2);
            margin-bottom: 0;
        }
        
        .title-underline {
            width: 80px;
            height: 2px;
            background: linear-gradient(90deg, #FF0000, transparent);
            margin-top: 15px;
            position: relative;
            overflow: hidden;
        }
        
        .underline-highlight {
            position: absolute;
            width: 40px;
            height: 100%;
            background: rgba(255,255,255,0.3);
            animation: shimmer 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1.1); opacity: 0.7; }
            50% { transform: scale(1.3); opacity: 0.3; }
            100% { transform: scale(1.1); opacity: 0.7; }
        }
        
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(15px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes shimmer {
            0% { left: -40px; }
            100% { left: 100%; }
        }
    </style>

    <section class="blog blog-grid" id="blog">
        <div class="container">
            <div class="row">
                @forelse ($news as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="blog-entry" data-hover="">
                            <div class="entry-img">
                                @if ($item->date_published)
                                    <div class="entry-date">
                                        <div class="entry-content">
                                            <span class="day">{{ \Carbon\Carbon::parse($item->date_published)->format('d') }}</span>
                                            <span class="month">{{ \Carbon\Carbon::parse($item->date_published)->format('M') }}</span>
                                            <span class="year">{{ \Carbon\Carbon::parse($item->date_published)->format('Y') }}</span>
                                        </div>
                                    </div>
                                @else
                                    
                                @endif
                                <a href="{{ route('frontpage.news.show', [
                                    'lang' => app()->getLocale(),
                                    'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                    'news_slug' => $item->getTranslation('slug', app()->getLocale()),
                                ]) }}"
                                    style="display: block; width: 500px; height: 200px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                        alt="{{ $item->getTranslation('name', app()->getLocale()) }}"
                                        style="width: auto; height: 100%; max-width: 100%; object-fit: cover; 
                                        transform: scale(1); transition: transform 0.3s ease;"
                                        onmouseover="this.style.transform='scale(1.1)'"
                                        onmouseout="this.style.transform='scale(1)'" />
                                </a>
                            </div>
                            <!-- End .entry-img-->
                            <div class="entry-content">
                                <div class="entry-meta">
                                    <div class="entry-category"><a
                                            href="{{ route('frontpage.news.show', [
                                                'lang' => app()->getLocale(),
                                                'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                                'news_slug' => $item->getTranslation('slug', app()->getLocale()),
                                            ]) }}">{{ $category->getTranslation('name', app()->getLocale()) }}</a>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="entry-author">
                                        <p>Meiji Indonesia</p>
                                    </div>
                                </div>
                                <div class="entry-title">
                                    <h4>
                                        <a
                                            href="{{ route('frontpage.news.show', [
                                                'lang' => app()->getLocale(),
                                                'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                                'news_slug' => $item->getTranslation('slug', app()->getLocale()),
                                            ]) }}">
                                            {!! Illuminate\Support\Str::limit(strip_tags($item->getTranslation('name', app()->getLocale())), 20) !!}
                                        </a>
                                    </h4>
                                </div>
                                <div class="entry-bio">
                                    <p>{!! Illuminate\Support\Str::limit(strip_tags($item->getTranslation('content', app()->getLocale())), 80) !!}</p>
                                </div>
                                <div class="entry-more"> <a
                                        class="btn btn--white btn-line btn-line-before btn-line-inversed"
                                        href="{{ route('frontpage.news.show', [
                                            'lang' => app()->getLocale(),
                                            'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                            'news_slug' => $item->getTranslation('slug', app()->getLocale()),
                                        ]) }}">
                                        <div class="line"><span></span></div>
                                        <span>{{ translate('Read More') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>{{ translate('No news found in this category.') }}</p>
                    </div>
                @endforelse
            </div>
            <!-- End .row-->
            {{ $news->links() }}
            <!-- End .row-->
        </div>
        <!-- End .container-->
    </section>
@endsection
