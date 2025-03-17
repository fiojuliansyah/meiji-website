@extends('layouts.front')

@section('title')
    {{ $category->getTranslation('name', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
<section class="page-title page-title-4 bg-overlay bg-overlay-dark bg-parallax" id="page-title" style="position: relative; padding: 80px 0; margin: 0; overflow: hidden;">
    <div class="bg-section" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
        <img src="{{ asset('storage/' . $general->breadcrumb) }}" alt="Background" style="width: 100%; height: 100%; object-fit: cover;" />
    </div>
    <div class="container" style="position: relative; z-index: 2; max-width: 1140px; margin: 0 auto; padding: 0 15px;">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 ofset-lg-0" style="position: relative; width: 100%; padding-right: 15px; padding-left: 15px;">
                <div class="title" style="margin-bottom: 0;">
                    <ol class="breadcrumb" style="display: flex; flex-wrap: wrap; padding: 0.75rem 1rem; margin-bottom: 1rem; list-style: none; background-color: transparent; border-radius: 0.25rem;">
                        <li class="breadcrumb-item" style="display: inline-block; margin-right: 5px;"><a href="/" style="color: #ffffff; text-decoration: none;">Home</a></li>
                        <li class="breadcrumb-item" style="display: inline-block; margin-right: 5px;"><a href="" style="color: #ffffff; text-decoration: none;">News</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="display: inline-block; color: #ffffff;">
                            {{ $category->getTranslation('name', app()->getLocale()) }}</li>
                    </ol>
                    <div class="title-card" style="display: flex; align-items: center;">
                        <div class="card-icon" style="margin-right: 15px;"> 
                            <i class="flaticon-029-cardiogram-1" style="font-size: 40px; color: #ffffff;"></i>
                        </div>
                        <h4 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 600;">{{ $category->getTranslation('name', app()->getLocale()) }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <div class="entry-date">
                                    <div class="entry-content">
                                        <span class="day">{{ $item->created_at->format('d') }}</span>
                                        <span class="month">{{ $item->created_at->format('M') }}</span>
                                        <span class="year">{{ $item->created_at->format('Y') }}</span>
                                    </div>
                                </div>
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
