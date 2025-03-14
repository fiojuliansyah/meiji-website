@extends('layouts.front')

@section('title')
    {{ $category->getTranslation('name', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
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
                                'news_slug' => $item->getTranslation('slug', app()->getLocale())
                            ]) }}" style="display: block; width: 500px; height: 200px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $item->image) }}" 
                                     alt="{{ $item->getTranslation('name', app()->getLocale()) }}"
                                     style="width: 100%; height: auto; transform: scale(1); transition: transform 0.3s ease;"
                                     onmouseover="this.style.transform='scale(1.1)'" 
                                     onmouseout="this.style.transform='scale(1)'" />
                        </a>
                    </div>
                    <!-- End .entry-img-->
                    <div class="entry-content">
                        <div class="entry-meta">
                            <div class="entry-category"><a href="{{ route('frontpage.news.show', [
                                'lang' => app()->getLocale(),
                                'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                'news_slug' => $item->getTranslation('slug', app()->getLocale())
                            ]) }}">{{ $category->getTranslation('name', app()->getLocale()) }}</a>
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
                                    {!! Illuminate\Support\Str::limit(strip_tags($item->getTranslation('name', app()->getLocale())), 20) !!}
                                </a>
                            </h4>
                        </div>
                        <div class="entry-bio">
                            <p>{!! Illuminate\Support\Str::limit(strip_tags($item->getTranslation('content', app()->getLocale())), 80) !!}</p>
                        </div>
                        <div class="entry-more"> <a class="btn btn--white btn-line btn-line-before btn-line-inversed"
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
      <!-- End .row-->
      {{ $news->links() }}
      <!-- End .row-->
    </div>
    <!-- End .container-->
  </section>
@endsection