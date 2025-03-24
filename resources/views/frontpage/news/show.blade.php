@extends('layouts.front')

@section('title')
  {{ $news->getTranslation('name', app()->getLocale()) ?? 'News Detail' }}
@endsection

@section('content')
<section class="page-title page-title-blank bg-white" id="page-title">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title">
                    <ol class="breadcrumb breadcrumb-long">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('frontpage.news.category', ['lang' => app()->getLocale(), 'slug' => $news->category->getTranslation('slug', app()->getLocale())]) }}">
                                {{ $news->category->getTranslation('name', app()->getLocale()) ?? 'Category' }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ Illuminate\Support\Str::limit(strip_tags($news->getTranslation('name', app()->getLocale())), 80) ?? 'News Title' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog blog-single" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <!-- Blog Entry-->
                <div class="blog-entry">
                    <div class="entry-img">
                        <a href="#"><img src="{{ asset('storage/' . $news->image) }}" alt="entry image"/></a>
                        @if ($news->date_published)
                            <div class="entry-date">
                                <div class="entry-content">
                                    <span class="day">{{ \Carbon\Carbon::parse($news->date_published)->format('d') }}</span>
                                    <span class="month">{{ \Carbon\Carbon::parse($news->date_published)->format('M') }}</span>
                                    <span class="year">{{ \Carbon\Carbon::parse($news->date_published)->format('Y') }}</span>
                                </div>
                            </div>
                         @else
                            
                        @endif
                    </div>
                    <div class="entry-content">
                        <div class="entry-meta">
                            <div class="entry-category">
                                <a href="{{ route('frontpage.news.category', ['lang' => app()->getLocale(), 'slug' => $news->category->getTranslation('slug', app()->getLocale())]) }}">
                                    {{ $news->category->getTranslation('name', app()->getLocale()) ?? 'Category' }}
                                </a>
                            </div>
                        </div>
                        <div class="entry-title">
                            <h4>{{ $news->getTranslation('name', app()->getLocale()) ?? 'News Title' }}</h4>
                        </div>
                        <div class="entry-bio">
                            <p>{!! $news->getTranslation('content', app()->getLocale()) ?? 'Content not available.' !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="sidebar sidebar-blog">
                    <div class="widget widget-recent-posts">
                        <div class="widget-title">
                            <h5>Recent Posts</h5>
                        </div>
                        <div class="widget-content">
                            @foreach($recent_posts as $post)
                            <div class="post">
                                <div class="post-img">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="post img"
                                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 5px;">
                                </div>
                                <div class="post-content">
                                    <div class="post-date">
                                        <span class="date">{{ $post->created_at->format('M d') }}</span>
                                    </div>
                                    <div class="post-title">
                                        <a href="{{ route('frontpage.news.show', [
                                            'lang' => app()->getLocale(),
                                            'category_slug' => $post->category->getTranslation('slug', app()->getLocale()),
                                            'news_slug' => $post->getTranslation('slug', app()->getLocale())
                                        ]) }}">
                                            {{ \Illuminate\Support\Str::limit($post->getTranslation('name', app()->getLocale()), 10, '...') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>                        
                    </div>

                    <!-- Categories-->
                    <div class="widget widget-categories">
                        <div class="widget-title">
                            <h5>{{ translate('categories') }}</h5>
                        </div>
                        <div class="widget-content">
                            <ul class="list-unstyled">
                                @foreach($news_categories as $nCategory)
                                <li>
                                    <a href="{{ route('frontpage.news.category', [
                                        'lang' => app()->getLocale(),
                                        'slug' => $nCategory->getTranslation('slug', app()->getLocale())
                                    ]) }}">
                                        {{ $nCategory->getTranslation('name', app()->getLocale()) }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
