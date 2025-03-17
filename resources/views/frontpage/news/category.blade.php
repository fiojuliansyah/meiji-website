@extends('layouts.front')

@section('title')
    {{ $category->getTranslation('name', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('content')
<section class="blog blog-grid" id="blog" style="padding: 60px 0; background-color: #f9f9f9;">
    <div class="container">
      <div class="row" style="margin-bottom: 40px;">
        <div class="col-12 text-center" style="margin-bottom: 30px;">
          <h2 style="font-size: 32px; font-weight: 700; color: #0b3b8e; margin-bottom: 15px;">{{ $category->getTranslation('name', app()->getLocale()) }}</h2>
          <div style="width: 80px; height: 3px; background-color: #e61e25; margin: 0 auto;"></div>
        </div>
      </div>
      <div class="row">
        @forelse ($news as $item)
            <div class="col-12 col-md-6 col-lg-4" style="margin-bottom: 30px;">
                <div class="blog-entry" style="border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08); transition: transform 0.3s ease, box-shadow 0.3s ease; background-color: #fff;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.08)';">
                    <div class="entry-img" style="position: relative; height: 200px; overflow: hidden;">
                        <div class="entry-date" style="position: absolute; top: 15px; left: 15px; z-index: 5; background-color: rgba(255,255,255,0.9); border-radius: 4px; padding: 8px 12px; box-shadow: 0 3px 8px rgba(0,0,0,0.1);">
                            <div class="entry-content" style="text-align: center;">
                                <span class="day" style="display: block; font-size: 22px; font-weight: 700; color: #e61e25; line-height: 1;">{{ $item->created_at->format('d') }}</span>
                                <span class="month" style="display: block; font-size: 14px; font-weight: 600; color: #0b3b8e; text-transform: uppercase;">{{ $item->created_at->format('M') }}</span>
                                <span class="year" style="display: block; font-size: 12px; color: #666;">{{ $item->created_at->format('Y') }}</span>
                            </div>
                        </div>
                        <a href="{{ route('frontpage.news.show', [
                                'lang' => app()->getLocale(),
                                'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                'news_slug' => $item->getTranslation('slug', app()->getLocale())
                            ]) }}" 
                            style="display: block; width: 100%; height: 100%; overflow: hidden;">
                            <img src="{{ asset('storage/' . $item->image) }}" 
                                alt="{{ $item->getTranslation('name', app()->getLocale()) }}"
                                style="width: 100%; height: 100%; object-fit: cover; 
                                        transform: scale(1); transition: transform 0.5s ease;"
                                onmouseover="this.style.transform='scale(1.1)'" 
                                onmouseout="this.style.transform='scale(1)'" />
                        </a>
                    </div>
                    <!-- End .entry-img-->
                    <div class="entry-content" style="padding: 20px;">
                        <div class="entry-meta" style="display: flex; align-items: center; margin-bottom: 12px;">
                            <div class="entry-category">
                                <a href="{{ route('frontpage.news.index', [
                                    'lang' => app()->getLocale(),
                                    'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                ]) }}" 
                                style="font-size: 13px; color: #e61e25; font-weight: 600; text-decoration: none; text-transform: uppercase;">
                                    {{ $category->getTranslation('name', app()->getLocale()) }}
                                </a>
                            </div>
                            <div class="divider" style="width: 1px; height: 14px; background-color: #ddd; margin: 0 10px;"></div>
                            <div class="entry-author"> 
                                <p style="margin: 0; font-size: 13px; color: #777;">Meiji Indonesia</p>
                            </div>
                        </div>
                        <div class="entry-title" style="margin-bottom: 12px;">
                            <h4 style="font-size: 18px; font-weight: 700; line-height: 1.4; margin: 0;">
                                <a href="{{ route('frontpage.news.show', [
                                    'lang' => app()->getLocale(),
                                    'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                    'news_slug' => $item->getTranslation('slug', app()->getLocale())
                                ]) }}" style="color: #333; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='#0b3b8e';" onmouseout="this.style.color='#333';">
                                    {!! Illuminate\Support\Str::limit(strip_tags($item->getTranslation('name', app()->getLocale())), 60) !!}
                                </a>
                            </h4>
                        </div>
                        <div class="entry-bio" style="margin-bottom: 20px;">
                            <p style="font-size: 14px; line-height: 1.6; color: #666; margin: 0;">{!! Illuminate\Support\Str::limit(strip_tags($item->getTranslation('content', app()->getLocale())), 100) !!}</p>
                        </div>
                        <div class="entry-more"> 
                            <a class="btn btn--white" 
                                href="{{ route('frontpage.news.show', [
                                    'lang' => app()->getLocale(),
                                    'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                    'news_slug' => $item->getTranslation('slug', app()->getLocale())
                                ]) }}"
                                style="display: inline-block; padding: 8px 20px; background-color: transparent; color: #0b3b8e; border: 1px solid #0b3b8e; border-radius: 4px; font-size: 14px; font-weight: 600; text-decoration: none; transition: all 0.3s ease;" 
                                onmouseover="this.style.backgroundColor='#0b3b8e'; this.style.color='#fff';" 
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#0b3b8e';">
                                <span>{{ translate('Read More') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center" style="padding: 50px 0;">
                <img src="{{ asset('images/no-data.svg') }}" alt="No Data" style="width: 100px; margin-bottom: 20px; opacity: 0.5;">
                <p style="font-size: 16px; color: #777;">{{ translate('No news found in this category.') }}</p>
            </div>
        @endforelse
      </div>
      <!-- End .row-->
      <div class="row">
        <div class="col-12 d-flex justify-content-center" style="margin-top: 20px;">
            {{ $news->links() }}
        </div>
      </div>
      <!-- End .row-->
    </div>
    <!-- End .container-->
  </section>

<style>
  /* Tambahan styling untuk pagination */
  .pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
    margin: 30px 0 0;
  }
  
  .pagination li {
    margin: 0 5px;
  }
  
  .pagination .page-item .page-link {
    height: 40px;
    width: 40px;
    line-height: 40px;
    text-align: center;
    border-radius: 50%;
    padding: 0;
    background-color: #f5f5f5;
    color: #333;
    border: none;
    font-weight: 600;
    display: inline-block;
    transition: all 0.3s ease;
  }
  
  .pagination .page-item.active .page-link,
  .pagination .page-item .page-link:hover {
    background-color: #0b3b8e;
    color: #fff;
  }
</style>
@endsection