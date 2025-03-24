@extends('layouts.front')

@section('title')
    {{ $product->getTranslation('name', app()->getLocale()) ?? 'News Detail' }}
@endsection

@push('css')
    <style>
        .bg-blur {
            /* Add the blur effect */
            filter: blur(8px);
            -webkit-filter: blur(8px);

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endpush

@section('content')
    <section class="page-title page-title-blank bg-white" id="page-title">
        <div class="container">
            <div class="title">
                <ol class="breadcrumb breadcrumb-long">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a
                            href="{{ route('frontpage.products.category', ['lang' => app()->getLocale(), 'slug' => $product->category->getTranslation('slug', app()->getLocale())]) }}">
                            {{ $product->category->getTranslation('name', app()->getLocale()) ?? 'Category' }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ Illuminate\Support\Str::limit(strip_tags($product->getTranslation('name', app()->getLocale())), 20) }}
                    </li>
                </ol>
            </div>
        </div>
    </section>
    <section class="single-product
@if ($product->category->is_validate != null) bg-blur @endif
  " id="single-product">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="product-img"><img class="img-fluid" src="{{ asset('storage/' . $product->image) }}"
                            alt="product image" /><a class="img-popup" href="{{ asset('storage/' . $product->image) }}"
                            alt="product image"></a></div>
                    <!-- .product-img end-->
                </div>
                <div class="col-12 col-lg-6">
                    <div class="product-content">
                        <div class="product-title">
                            <h3>{{ $product->getTranslation('name', app()->getLocale()) ?? 'Product Name' }}</h3>
                        </div>
                        <div class="product-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"><a class="active" href="#description" data-bs-target="#description"
                                        aria-controls="description" role="tab" data-bs-toggle="tab"
                                        aria-selected="true">{{ translate('description') }}</a></li>
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
                            <div class="product-img"><img src="{{ asset('storage/' . $related->image) }}" alt="Product"
                                    style="width: 200px; height: 200px; object-fit: cover;" /><a class="add-to-cart"
                                    href="{{ route('frontpage.products.show', [
                                        'lang' => app()->getLocale(),
                                        'category_slug' => $related->category->getTranslation('slug', app()->getLocale()),
                                        'products_slug' => $related->getTranslation('slug', app()->getLocale()),
                                    ]) }}">{{ translate('read more') }}</a>
                                <div class="badge"></div>
                            </div>
                            <div class="product-content">
                                <div class="product-title"><a
                                        href="shop-single.html">{{ $related->getTranslation('name', app()->getLocale()) ?? 'Product Name' }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- .product end-->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@if ($product->category->is_validate != null)
    @section('modal')
        <div class="modal fade" id="disclaimerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="disclaimerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="disclaimerModalLabel">{{ translate('Important Disclaimer') }}</h5>
                    </div>
                    <div class="modal-body p-0">
                        <div class="card border-0 m-0">
                            <div class="row g-0">
                                <div class="card-body p-4">
                                    @if ($general && $general->logo)
                                        <img class="logo logo-dark" src="{{ asset('storage/' . $general->logo) }}"
                                            alt="Meiji Logo" width="120px" />
                                    @endif
                                    <br>
                                    <br>
                                    <div class="card-text">
                                        {!! $general->getTranslation('discalimer', app()->getLocale()) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn--primary me-2" id="agreeButton" data-bs-dismiss="modal">
                            {{ translate('Agree') }}
                        </button>
                        <a href="{{ route('frontpage.products.category', ['lang' => app()->getLocale(), 'slug' => $product->category->getTranslation('slug', app()->getLocale())]) }}"
                            class="btn btn-secondary">
                            {{ translate('Not Agree') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var disclaimerModal = new bootstrap.Modal(document.getElementById('disclaimerModal'), {
                    backdrop: 'static'
                });

                document.getElementById('single-product').classList.add('bg-blur');

                disclaimerModal.show();

                document.getElementById('agreeButton').addEventListener('click', function() {
                    document.getElementById('single-product').classList.remove('bg-blur');
                });
            });
        </script>
    @endpush
@endif
