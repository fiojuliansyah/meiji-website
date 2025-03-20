@extends('layouts.front')

@section('title')
    {{ $category->getTranslation('name', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
<section class="page-title page-title-4 bg-overlay bg-overlay-dark bg-parallax" id="page-title" style="position: relative; overflow: hidden;">
    <div class="bg-section" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
        <img src="{{ asset('storage/' . $general->breadcrumb) }}" alt="Background" style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.7) contrast(1.1);" />
        <!-- Menambahkan overlay gradient untuk efek lebih menarik -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(45,52,88,0.7) 0%, rgba(10,10,20,0.8) 100%);"></div>
    </div>
    <div class="container" style="position: relative; z-index: 2;">
        <div class="row" style="padding-bottom: 150px;">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-0">
                <div class="title" style="position: relative;">
                    <!-- Menambahkan elemen dekoratif -->
                    <div style="position: absolute; width: 120px; height: 120px; border: 2px solid rgba(255,255,255,0.2); border-radius: 50%; top: -60px; left: -40px; z-index: -1;"></div>
                    <div style="position: absolute; width: 80px; height: 80px; border: 2px solid rgba(255,255,255,0.15); border-radius: 50%; bottom: -30px; right: 20px; z-index: -1;"></div>
                    
                    <div class="title-card" style="position: relative; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border-radius: 15px; padding: 30px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); border-left: 4px solid #FF0000; animation: fadeIn 0.8s ease-out;">
                        <!-- Menambahkan garis dekoratif -->
                        <div style="position: absolute; width: 40px; height: 3px; background: #FF0000; top: 20px; right: 30px;"></div>
                        <div style="position: absolute; width: 20px; height: 3px; background: #FF0000; top: 30px; right: 30px;"></div>
                        
                        <div class="card-icon" style="position: relative; margin-bottom: 15px;"> 
                            <div style="position: absolute; width: 60px; height: 60px; background: rgba(52,152,219,0.2); border-radius: 50%; left: -5px; top: -5px; transform: scale(1.2); animation: pulse 2s infinite;"></div>
                            <i class="flaticon-029-cardiogram-1" style="position: relative; font-size: 48px; color: #ffffff; text-shadow: 0 2px 10px rgba(0,0,0,0.3);"></i>
                        </div>
                        <h4 style="position: relative; padding-top: 15px; color: #ffffff; font-size: 28px; font-weight: 700; text-shadow: 0 2px 5px rgba(0,0,0,0.3); letter-spacing: 1px; margin-bottom: 0;">{{ $category->getTranslation('name', app()->getLocale()) }}</h4>
                        
                        <!-- Menambahkan aksen garis bawah animasi -->
                        <div style="width: 100px; height: 3px; background: linear-gradient(90deg, #FF0000, transparent); margin-top: 20px; position: relative; overflow: hidden;">
                            <div style="position: absolute; width: 50px; height: 100%; background: rgba(255,255,255,0.3); animation: shimmer 2s infinite;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Menambahkan CSS untuk animasi -->
    <style>
        @keyframes pulse {
            0% { transform: scale(1.2); opacity: 0.7; }
            50% { transform: scale(1.5); opacity: 0.3; }
            100% { transform: scale(1.2); opacity: 0.7; }
        }
        
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes shimmer {
            0% { left: -50px; }
            100% { left: 100%; }
        }
    </style>
</section>
    <br>
    <br>
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
