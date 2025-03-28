@extends('layouts.front')

@section('title')
    {{ $category->getTranslation('name', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
<section class="page-title bg-overlay bg-overlay-dark" id="page-title">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="title">
                    <div class="title-card">
                        <div class="card-icon">
                            <i class="flaticon-029-cardiogram-1"></i>
                        </div>
                        <h4>{{ $category->getTranslation('name', app()->getLocale()) }}</h4>
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
