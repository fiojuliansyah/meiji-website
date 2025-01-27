@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('View') }} {{ translate('Product') }}</h5>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <!-- Category -->
                <div class="mb-3">
                    <h6>{{ translate('Category') }}</h6>
                    <p>{{ $product->category->getTranslation('name', app()->getLocale()) }}</p>
                </div>

                <!-- Current Image -->
                <div class="mb-3">
                    <h6>{{ translate('Image') }}</h6>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100">
                    @else
                        <p>{{ translate('No image available') }}</p>
                    @endif
                </div>

                <!-- Language Tabs -->
                <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                    @foreach ($languages as $language)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" 
                                id="tab-{{ $language->code }}"
                                data-bs-toggle="tab" 
                                data-bs-target="#lang-{{ $language->code }}" 
                                type="button" 
                                role="tab">
                                {{ $language->name }}
                            </button>
                        </li>
                    @endforeach
                </ul>
                
                <div class="tab-content mt-3" id="languageTabContent">
                    @foreach ($languages as $language)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
                        id="lang-{{ $language->code }}" 
                        role="tabpanel">
                        <!-- Product Name -->
                        <div class="mb-3">
                            <h6>{{ translate('Name') }} ({{ $language->name }})</h6>
                            <p>{{ $product->getTranslation('name', $language->code) }}</p>
                        </div>
                        
                        <!-- Product Content -->
                        <div class="mb-3">
                            <h6>{{ translate('Content') }} ({{ $language->name }})</h6>
                            <p>{!! $product->getTranslation('content', $language->code) !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
