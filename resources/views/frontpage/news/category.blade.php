@extends('layouts.front')

@section('title')
    {{ $category->getTranslation('name', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{ asset('storage/' . $general->breadcrumb) }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{ $category->getTranslation('name', app()->getLocale()) }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/">Home</a></li>
                    <li>{{ translate('News') }}</li>
                    <li>{{ $category->getTranslation('name', app()->getLocale()) }}</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="blog-grid sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                @forelse($news as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset('storage/' . $item->image) }}" alt="">
                                    </figure>
                                    <div class="link-btn"><a
                                            href="{{ route('frontpage.news.show', [
                                                'lang' => app()->getLocale(),
                                                'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                                'news_slug' => $item->getTranslation('slug', app()->getLocale()),
                                            ]) }}"><i
                                                class="flaticon-zoom-in"></i></a></div>
                                </div>
                                <div class="lower-content">
                                    <div class="category"><a
                                            href="{{ route('frontpage.news.show', [
                                                'lang' => app()->getLocale(),
                                                'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                                'news_slug' => $item->getTranslation('slug', app()->getLocale()),
                                            ]) }}">{{ $category->getTranslation('name', app()->getLocale()) }}</a>
                                    </div>
                                    <ul class="post-info clearfix">
                                        <li>{{ $item->created_at->format('d M Y') }}</li>
                                        <li><a
                                                href="{{ route('frontpage.news.show', [
                                                    'lang' => app()->getLocale(),
                                                    'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                                    'news_slug' => $item->getTranslation('slug', app()->getLocale()),
                                                ]) }}">By
                                                Admin</a></li>
                                    </ul>
                                    <h3><a
                                            href="{{ route('frontpage.news.show', [
                                                'lang' => app()->getLocale(),
                                                'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                                'news_slug' => $item->getTranslation('slug', app()->getLocale()),
                                            ]) }}">{{ $item->getTranslation('name', app()->getLocale()) }}</a></h3>
                                    <div class="lower-box">
                                        <div class="link"><a
                                                href="{{ route('frontpage.news.show', [
                                                    'lang' => app()->getLocale(),
                                                    'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                                    'news_slug' => $item->getTranslation('slug', app()->getLocale()),
                                                ]) }}">{{ translate('Read More') }}</a></div>
                                    </div>
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
        </div>
    </section>
@endsection
