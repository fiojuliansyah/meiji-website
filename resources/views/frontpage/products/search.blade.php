@extends('layouts.front')

@section('title', 'Search Results')

@section('content')
<section class="shop-page-section sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Sidebar -->
            @include('frontpage.products.sidebar', ['categories' => $categories])

            <!-- Search Results -->
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="our-shop">
                    <div class="row clearfix">
                        @if($products->count() > 0)
                            @foreach ($products as $item)
                                <div class="col-lg-6 col-md-6 col-sm-12 shop-block">
                                    <div class="shop-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="{{ asset('storage/' . $item->image) }}" alt=""></figure>
                                            </div>
                                            <div class="lower-content">
                                                <h6>{{ $item->category->getTranslation('name', app()->getLocale()) ?? 'Category' }}</h6>
                                                <h3><a href="{{ route('product.details', ['lang' => app()->getLocale(), 'slug' => $item->slug]) }}">
                                                    {{ $item->getTranslation('name', app()->getLocale()) }}
                                                </a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No products found for "{{ $query }}"</p>
                        @endif
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
