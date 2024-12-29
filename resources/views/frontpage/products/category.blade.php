@extends('layouts.front')

@section('title')
{{ $category->getTranslation('name', app()->getLocale()) ?? 'Category' }}
@endsection

@section('content')
<section class="page-title">
    <div class="bg-layer" style="background-image: url({{ asset('storage/' . $general->breadcrumb) }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>{{ $category->getTranslation('name', app()->getLocale()) ?? 'Category' }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>{{ $category->getTranslation('name', app()->getLocale()) ?? 'Category' }}</li>
                <li>{{ translate('Product') }}</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->


<!-- shop-page-section -->
<section class="shop-page-section sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="shop-sidebar">
                    <!-- Search Widget -->
                    <div class="sidebar-widget search-widget">
                        <div class="widget-title">
                            <h3>Search</h3>
                        </div>
                        <div class="search-form">
                            <form action="{{ route('products.search') }}" method="GET">
                                <div class="form-group">
                                    <input type="search" name="query" placeholder="Enter Keyword..." value="{{ request('query') }}" required="">
                                    <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Categories Widget -->
                    <div class="sidebar-widget category-widget">
                        <div class="widget-title">
                            <h3>Categories</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="category-list clearfix">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('frontpage.products.category', ['lang' => app()->getLocale(), 'slug' => $category->getTranslation('slug', app()->getLocale())]) }}">
                                        {{ $category->getTranslation('name', app()->getLocale()) }}
                                        <i class="fa-solid fa-circle-chevron-right"></i>
                                    </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Display -->
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="our-shop">
                    <div class="row clearfix">
                        @foreach ($products as $item)
                            <div class="col-lg-6 col-md-6 col-sm-12 shop-block">
                                <div class="shop-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="{{ asset('storage/' . $item->image) }}" alt=""></figure>
                                        </div>
                                        <div class="lower-content">
                                            <h6>{{ $item->category->getTranslation('name', app()->getLocale()) ?? 'Category' }}</h6>
                                            <h3><a href="{{ route('frontpage.products.show', [
                                                    'lang' => app()->getLocale(),
                                                    'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                                                    'products_slug' => $item->getTranslation('slug', app()->getLocale())
                                                ]) }}">
                                                {{ $item->getTranslation('name', app()->getLocale()) }}
                                            </a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-box">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
