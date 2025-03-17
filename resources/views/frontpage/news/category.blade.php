@extends('layouts.front')

@section('title')
    {{ $category->getTranslation('name', app()->getLocale()) }} - Meiji Indonesia
@endsection

@section('css')
<style>
    /* Custom styling untuk halaman berita */
    .page-title-4 {
        position: relative;
        padding: 110px 0;
        background-size: cover;
        background-position: center;
    }
    
    .page-title .title-card {
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.95);
        padding: 25px;
        margin-top: 20px;
    }
    
    .page-title .title-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }
    
    .page-title .title-card h4 {
        color: #333;
        font-weight: 700;
        margin-bottom: 0;
    }
    
    .breadcrumb {
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 30px;
        padding: 10px 20px;
        display: inline-flex;
    }
    
    .breadcrumb-item a {
        color: #333;
        font-weight: 600;
        transition: color 0.3s ease;
    }
    
    .breadcrumb-item a:hover {
        color: #e63946;
        text-decoration: none;
    }
    
    .breadcrumb-item.active {
        color: #e63946;
        font-weight: 700;
    }
    
    .blog-entry {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        margin-bottom: 30px;
        background: #fff;
        height: 100%;
    }
    
    .blog-entry:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }
    
    .entry-img {
        position: relative;
        overflow: hidden;
        border-radius: 15px 15px 0 0;
    }
    
    .entry-date {
        position: absolute;
        bottom: 15px;
        left: 15px;
        background: rgba(230, 57, 70, 0.85);
        color: #fff;
        padding: 10px 15px;
        border-radius: 8px;
        z-index: 2;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    
    .entry-date .day {
        display: block;
        font-size: 24px;
        font-weight: 700;
        line-height: 1;
        text-align: center;
    }
    
    .entry-date .month, .entry-date .year {
        display: block;
        font-size: 14px;
        text-align: center;
    }
    
    .entry-content {
        padding: 25px;
    }
    
    .entry-meta {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .entry-category a {
        background: #f8f9fa;
        color: #e63946;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .entry-category a:hover {
        background: #e63946;
        color: #fff;
        text-decoration: none;
    }
    
    .divider {
        width: 1px;
        height: 15px;
        background: #ddd;
        margin: 0 10px;
    }
    
    .entry-author p {
        margin: 0;
        font-size: 14px;
        color: #666;
    }
    
    .entry-title h4 {
        font-size: 20px;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 15px;
        color: #333;
    }
    
    .entry-title h4 a {
        color: #333;
        transition: color 0.3s ease;
    }
    
    .entry-title h4 a:hover {
        color: #e63946;
        text-decoration: none;
    }
    
    .entry-bio {
        color: #666;
        margin-bottom: 20px;
        line-height: 1.6;
    }
    
    .entry-more .btn {
        padding: 10px 20px;
        border-radius: 30px;
        position: relative;
        overflow: hidden;
        z-index: 1;
        transition: all 0.3s ease;
        border: 2px solid #e63946;
        color: #e63946;
        font-weight: 600;
        background: transparent;
    }
    
    .entry-more .btn:hover {
        color: #fff;
        background: #e63946;
    }
    
    .entry-more .line {
        display: none;
    }
    
    .pagination {
        margin-top: 50px;
        justify-content: center;
    }
    
    .pagination .page-item .page-link {
        border-radius: 50%;
        margin: 0 5px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #333;
        border: none;
        background: #f8f9fa;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .pagination .page-item.active .page-link,
    .pagination .page-item .page-link:hover {
        background: #e63946;
        color: #fff;
    }
    
    /* Animasi untuk card */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .col-lg-4 {
        animation: fadeInUp 0.5s ease backwards;
    }
    
    .col-lg-4:nth-child(1) { animation-delay: 0.1s; }
    .col-lg-4:nth-child(2) { animation-delay: 0.2s; }
    .col-lg-4:nth-child(3) { animation-delay: 0.3s; }
    .col-lg-4:nth-child(4) { animation-delay: 0.4s; }
    .col-lg-4:nth-child(5) { animation-delay: 0.5s; }
    .col-lg-4:nth-child(6) { animation-delay: 0.6s; }
</style>
@endsection

@section('content')
    <!-- Hero Section dengan Overlay -->
    <section class="page-title page-title-4 bg-overlay bg-overlay-dark bg-parallax" id="page-title">
        <div class="bg-section"><img src="{{ asset('storage/' . $general->breadcrumb) }}" alt="Background" /></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-0">
                    <div class="title">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="">News</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $category->getTranslation('name', app()->getLocale()) }}</li>
                        </ol>
                        <div class="title-card">
                            <div class="card-icon"> <i class="flaticon-029-cardiogram-1"></i></div>
                            <h4>{{ $category->getTranslation('name', app()->getLocale()) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Intro Section -->
    <section class="intro-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="mb-3">{{ translate('Latest News & Updates') }}</h2>
                    <div class="divider-custom my-3">
                        <div class="line"></div>
                        <div class="icon"><i class="fas fa-newspaper"></i></div>
                        <div class="line"></div>
                    </div>
                    <p class="lead text-muted">{{ translate('Stay updated with the latest news and information from Meiji Indonesia') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- News Grid Section -->
    <section class="blog blog-grid py-5" id="blog">
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
                        <div class="empty-state py-5">
                            <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                            <p class="lead">{{ translate('No news found in this category.') }}</p>
                            <a href="/" class="btn btn-outline-primary mt-3">{{ translate('Back to Home') }}</a>
                        </div>
                    </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="row">
                <div class="col-12">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </section>
    
    <!-- Newsletter Section -->
    <section class="newsletter-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto text-center">
                    <h3>{{ translate('Subscribe to Our Newsletter') }}</h3>
                    <p class="text-muted mb-4">{{ translate('Stay updated with our latest news and announcements') }}</p>
                    <form class="newsletter-form">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="{{ translate('Your Email Address') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">{{ translate('Subscribe') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
    // Tambahkan script untuk animasi smooth scroll
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Hover effect untuk card
        const cards = document.querySelectorAll('.blog-entry');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.classList.add('active');
            });
            
            card.addEventListener('mouseleave', function() {
                this.classList.remove('active');
            });
        });
    });
</script>
@endsection