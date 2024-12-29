@extends('layouts.front')

@section('title')
    {{ $news->getTranslation('name', app()->getLocale()) ?? 'News Detail' }}
@endsection

@section('content')
    <section class="page-title blog-details">
        <div class="bg-layer" style="background-image: url({{ asset('storage/' . $general->breadcrumb) }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{ $news->getTranslation('name', app()->getLocale()) ?? 'News Title' }}</h1>
                <div class="post-discription">
                    <ul class="post-info clearfix">
                        <li class="category"><a
                                href="{{ route('frontpage.news.category', ['lang' => app()->getLocale(), 'slug' => $news->category->getTranslation('slug', app()->getLocale())]) }}">{{ $news->category->getTranslation('name', app()->getLocale()) ?? 'Category' }}</a>
                        </li>
                        <li>{{ $news->created_at->format('d M Y') }}</li>
                        <li><a
                                href="{{ route('frontpage.news.category', ['lang' => app()->getLocale(), 'slug' => $news->category->getTranslation('slug', app()->getLocale())]) }}">By
                                Admin</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="sidebar-page-container blog-details sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="content-one">
                            <figure class="image-box"><img src="{{ asset('storage/' . $news->image) }}" alt="">
                            </figure>
                            <div class="text">
                                {!! $news->getTranslation('content', app()->getLocale()) ?? 'Content not available.' !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h3>{{ translate('categories') }}</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    @foreach ($news_categories as $nCategory)
                                        <li><a
                                                href="{{ route('frontpage.news.category', [
                                                    'lang' => app()->getLocale(),
                                                    'slug' => $nCategory->getTranslation('slug', app()->getLocale()),
                                                ]) }}">{{ $nCategory->getTranslation('name', app()->getLocale()) }}<i
                                                    class="flaticon-right-arrow"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h3>{{ translate('Recent Post') }}</h3>
                            </div>
                            <div class="post-inner">
                                @foreach ($recent_posts as $post)
                                    <div class="post">
                                        <figure class="post-thumb"><a
                                                href="{{ route('frontpage.news.show', [
                                                    'lang' => app()->getLocale(),
                                                    'category_slug' => $post->category->getTranslation('slug', app()->getLocale()),
                                                    'news_slug' => $post->getTranslation('slug', app()->getLocale()),
                                                ]) }}">
                                                <img src="{{ asset('storage/' . $post->image) }}"
                                                    alt="{{ $post->getTranslation('name', app()->getLocale()) }}"></a>
                                        </figure>
                                        <span class="post-date">{{ $post->created_at->format('d M Y') }}</span>
                                        <h5>
                                            <a href="{{ route('frontpage.news.show', [
                                                    'lang' => app()->getLocale(),
                                                    'category_slug' => $post->category->getTranslation('slug', app()->getLocale()),
                                                    'news_slug' => $post->getTranslation('slug', app()->getLocale()),
                                                ]) }}">
                                                
                                                {{ $post->getTranslation('name', app()->getLocale()) }}
                                            </a>
                                        </h5>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
