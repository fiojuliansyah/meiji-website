@extends('layouts.front')

@section('title', 'Prescription Product - Meiji Indonesia')

@section('content')
<section class="shop" id="shop">
    <div class="container">
        <div class="row">
            @foreach ($products as $item)                
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="product-item" data-hover="">
                        <div class="product-img"><img src="{{ asset('storage/' . $item->image) }}" alt="Product"/><a class="add-to-cart" href="{{ route('frontpage.products.show', [
                            'lang' => app()->getLocale(),
                            'category_slug' => $category->getTranslation('slug', app()->getLocale()),
                            'products_slug' => $item->getTranslation('slug', app()->getLocale())
                        ]) }}">{{ translate('Read More') }}</a>
                            <div class="badge"></div>
                        </div>
                        <div class="product-content">
                            <div class="product-title"><a href="shop-single.html">{{ $item->getTranslation('name', app()->getLocale()) }}</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
