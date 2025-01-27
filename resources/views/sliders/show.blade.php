@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('View') }} {{ translate('Slider') }}</h5>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="card-body">

                <!-- Slider Image -->
                <div class="mb-3">
                    <h6>{{ translate('Slider') }} {{ translate('Image') }}</h6>
                    @if ($slider->image)
                        <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image" style="max-width: 300px; height: auto;">
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
                            <!-- Title -->
                            <div class="mb-3">
                                <h6>{{ translate('Title') }} ({{ $language->name }})</h6>
                                <p>{{ $slider->getTranslation('title', $language->code) }}</p>
                            </div>
                            <!-- Content -->
                            <div class="mb-3">
                                <h6>{{ translate('Content') }} ({{ $language->name }})</h6>
                                <p>{!! $slider->getTranslation('content', $language->code) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
