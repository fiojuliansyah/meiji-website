@extends('layouts.front')

@section('title')
    {{ $category->getTranslation('name', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
    <section class="page-title page-title-4 bg-overlay bg-overlay-dark bg-parallax" id="page-title" style="position: relative; padding: 120px 0; overflow: hidden; background-color: #0e1317;">
        <div class="bg-section" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
            <img src="{{ asset('storage/' . $general->breadcrumb) }}" alt="Background" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7; filter: brightness(0.6);" />
        </div>
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 ofset-lg-0" style="text-align: center;">
                    <div class="title" style="padding: 30px; background-color: rgba(0,0,0,0.5); border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
                        <ol class="breadcrumb" style="display: flex; justify-content: center; padding: 15px 0; margin-bottom: 20px; list-style: none; background-color: transparent;">
                            <li class="breadcrumb-item" style="margin: 0 5px; font-size: 16px; font-weight: 500; color: #ffffff;"><a href="/" style="color: #ffffff; text-decoration: none; transition: color 0.3s ease;">Home</a></li>
                            <li class="breadcrumb-item" style="margin: 0 5px; font-size: 16px; font-weight: 500; color: #ffffff;"><a href="" style="color: #ffffff; text-decoration: none; transition: color 0.3s ease;">News</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="margin: 0 5px; font-size: 16px; font-weight: 700; color: #3498db;">
                                {{ $category->getTranslation('name', app()->getLocale()) }}</li>
                        </ol>
                        <div class="title-card" style="display: flex; flex-direction: column; align-items: center; padding: 20px 0;">
                            <div class="card-icon" style="background-color: #3498db; width: 80px; height: 80px; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-bottom: 15px; box-shadow: 0 4px 10px rgba(52, 152, 219, 0.5);">
                                <i class="flaticon-029-cardiogram-1" style="font-size: 36px; color: #ffffff;"></i>
                            </div>
                            <h4 style="padding-top: 15px; margin: 0; color: #ffffff; font-size: 32px; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); letter-spacing: 1px;">{{ $category->getTranslation('name', app()->getLocale()) }}</h4>
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
