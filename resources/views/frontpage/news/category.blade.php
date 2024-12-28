@extends('layouts.front')

@section('title')
    {{ $category->getTranslation('name', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
    <section class="blog blog-grid" id="blog">
        <div class="container">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 2.5rem; color: #283b6a; margin-bottom: 20px;">{{ translate('Our News') }}</h2>
                <p style="color: #666; font-size: 1.1rem;">{{ translate('Journey of Excellence and Innovation') }}</p>
            </div>
            <div class="row">
                @forelse($news as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="blog-entry">
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
                                    'news_slug' => $item->getTranslation('slug', app()->getLocale())
                                ]) }}">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->getTranslation('name', app()->getLocale()) }}"/>
                                </a>
                            </div>
                            <div class="entry-content">
                                <div class="entry-meta">
                                    <div class="entry-category">
                                        <a href="{{ route('frontpage.news.category', [
                                            'lang' => app()->getLocale(),
                                            'slug' => $category->getTranslation('slug', app()->getLocale())
                                        ]) }}">
                                            {{ $category->getTranslation('name', app()->getLocale()) }}
                                        </a>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="entry-author">
                                        <p>Meiji Indonesia</p>
                                    </div>
                                </div>
                                <div class="entry-title">
                                    <h4>
                                        <a href="{{ route('frontpage.news.show', [
                                            'lang' => app()->getLocale(),
                                            'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                            'news_slug' => $item->getTranslation('slug', app()->getLocale())
                                        ]) }}">
                                            {{ $item->getTranslation('name', app()->getLocale()) }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="entry-bio">
                                    <p>{!! Illuminate\Support\Str::limit(strip_tags($item->getTranslation('content', app()->getLocale())), 150) !!}</p>
                                </div>
                                <div class="entry-more">
                                    <a class="btn btn--white btn-line btn-line-before btn-line-inversed"
                                       href="{{ route('frontpage.news.show', [
                                           'lang' => app()->getLocale(),
                                           'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                           'news_slug' => $item->getTranslation('slug', app()->getLocale())
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

            @if($news->hasPages())
                <div class="row">
                    <div class="col-12 clearfix text--center">
                        {{ $news->links('vendor.pagination.custom') }}
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection