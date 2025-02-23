@extends('layouts.front')

@section('title')
  {{ $product->getTranslation('name', app()->getLocale()) ?? 'News Detail' }}
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
                            <a href="{{ route('frontpage.products.category', ['lang' => app()->getLocale(), 'slug' => $product->category->getTranslation('slug', app()->getLocale())]) }}">
                                {{ $product->category->getTranslation('name', app()->getLocale()) ?? 'Category' }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ Illuminate\Support\Str::limit(strip_tags($product->getTranslation('name', app()->getLocale())), 20) }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="single-product" id="single-product">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="product-img"><img class="img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="product image"/><a class="img-popup" href="{{ asset('storage/' . $product->image) }}" alt="product image"></a></div>
          <!-- .product-img end-->
        </div>
        <div class="col-12 col-lg-6">
          <div class="product-content">
            <div class="product-title">
              <h3>{{ $product->getTranslation('name', app()->getLocale()) ?? 'Product Name' }}</h3>
            </div>
            <div class="product-tabs">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a class="active" href="#description" data-bs-target="#description" aria-controls="description" role="tab" data-bs-toggle="tab" aria-selected="true">{{ translate('description') }}</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="description" role="tabpanel">
                    {!! $product->getTranslation('content', app()->getLocale()) ?? 'Product Content' !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="shop shop-2"> 
    <div class="container"> 
      <div class="row"> 
        <div class="col-12"> 
          <h5>{{ translate('related products') }}</h5>
        </div>
      </div>
      <div class="row"> 
        @foreach ($related_products as $related)    
            <div class="col-12 col-md-6 col-lg-3">
            <div class="product-item" data-hover="">
                <div class="product-img"><img src="{{ asset('storage/' . $related->image) }}" alt="Product" style="width: 200px; height: 200px; object-fit: cover;"/><a class="add-to-cart" href="{{ route('frontpage.products.show', [
                    'lang' => app()->getLocale(),
                    'category_slug' => $related->category->getTranslation('slug', app()->getLocale()),
                    'products_slug' => $related->getTranslation('slug', app()->getLocale())
                ]) }}">{{ translate('read more') }}</a>
                <div class="badge"></div>
                </div>
                <div class="product-content">
                <div class="product-title"><a href="shop-single.html">{{ $related->getTranslation('name', app()->getLocale()) ?? 'Product Name' }}</a></div>
                </div>
            </div>
            <!-- .product end-->
            </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
