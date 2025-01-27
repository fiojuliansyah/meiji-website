@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('View') }} {{ translate('Timeline') }}</h5>
            </div>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <a href="{{ route('timelines.index', ['lang' => app()->getLocale()]) }}" class="btn btn-secondary">
                    <i class="feather-arrow-left me-2"></i>{{ translate('Back') }}
                </a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="card-body">

                <!-- Year -->
                <div class="mb-3">
                    <h6>{{ translate('Year') }}</h6>
                    <p>{{ $timeline->year }}</p>
                </div>

                <!-- Current Image -->
                <div class="mb-3">
                    <h6>{{ translate('Image') }}</h6>
                    @if($timeline->image_url)
                        <img src="{{ $timeline->image_url }}" alt="Timeline Image" style="max-width: 300px; height: auto;">
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
                                <p>{{ $timeline->getTranslation('title', $language->code) }}</p>
                            </div>
                            <!-- Content -->
                            <div class="mb-3">
                                <h6>{{ translate('Content') }} ({{ $language->name }})</h6>
                                <p>{!! $timeline->getTranslation('content', $language->code) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
