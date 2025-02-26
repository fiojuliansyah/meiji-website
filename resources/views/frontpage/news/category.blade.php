@extends('layouts.front')

@section('title')
    {{ $category->getTranslation('name', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
<section class="page-title bg-overlay bg-overlay-dark bg-parallax" id="page-title">
    <div class="bg-section"><img src="{{ asset('storage/' . $general->breadcrumb) }}" alt="Background"/></div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
          <div class="title">
            <div class="title-heading">
              <h1>{{ $category->getTranslation('name', app()->getLocale()) }}</h1>
            </div>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">{{ translate('Home') }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $category->getTranslation('name', app()->getLocale()) }}</li>
            </ol>
          </div>
          <!-- End .title -->
        </div>
        <!-- End .col-lg-6-->
      </div>
      <!-- End .row-->
    </div>
    <!-- End .container-->
  </section>
<section class="blog blog-grid" id="blog">
    <div class="container">
        <div class="row">
            @forelse($news as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="blog-entry">
                        <div style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%; overflow: hidden; margin-bottom: 20px;">
                            <div style="position: absolute; top: 15px; left: 15px; z-index: 10; background-color: rgba(255, 255, 255, 0.9); border-radius: 4px; padding: 8px 12px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                                <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                    <span style="font-size: 1.5rem; font-weight: bold; line-height: 1;">{{ $item->created_at->format('d') }}</span>
                                    <span style="font-size: 0.9rem; text-transform: uppercase; margin: 2px 0;">{{ $item->created_at->format('M') }}</span>
                                    <span style="font-size: 0.8rem; color: #666;">{{ $item->created_at->format('Y') }}</span>
                                </div>
                            </div>
                            <a href="{{ route('frontpage.news.show', [
                                'lang' => app()->getLocale(),
                                'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                'news_slug' => $item->getTranslation('slug', app()->getLocale())
                            ]) }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: block;">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->getTranslation('name', app()->getLocale()) }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;"/>
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
                                <h5>
                                    <a href="{{ route('frontpage.news.show', [
                                        'lang' => app()->getLocale(),
                                        'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                        'news_slug' => $item->getTranslation('slug', app()->getLocale())
                                    ]) }}">
                                        {{ $item->getTranslation('name', app()->getLocale()) }}
                                    </a>
                                </h5>
                            </div>
                            <div class="entry-bio">
                                <p>{!! Illuminate\Support\Str::limit(strip_tags($item->getTranslation('content', app()->getLocale())), 100) !!}</p>
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

        {{ $news->links() }}
    </div>
</section>
@endsection