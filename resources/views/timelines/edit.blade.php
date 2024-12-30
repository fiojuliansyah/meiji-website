@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Edit') }} {{ translate('Timeline') }}</h5>
            </div>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('timelines.update', ['lang' => app()->getLocale(), 'timeline' => $timeline->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Year Input -->
                    <div class="mb-3">
                        <label for="year" class="form-label">{{ translate('Year') }}</label>
                        <input type="text" name="year" id="year" class="form-control" value="{{ $timeline->year }}" required>
                    </div>

                    <!-- Current Image -->
                    <div class="mb-3">
                        <label class="form-label">{{ translate('Current Image') }}</label>
                        <div>
                            <img src="{{ $timeline->image_url }}" alt="Timeline Image" width="200">
                        </div>
                    </div>

                    <!-- Image Input -->
                    <div class="mb-3">
                        <label for="image" class="form-label">{{ translate('Timeline') }} {{ translate('Image') }}</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <small class="text-muted">{{ translate('Leave empty to keep current image') }}</small>
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
                                <div class="mb-3">
                                    <label class="form-label">
                                        {{ translate('Title') }} ({{ $language->name }})
                                    </label>
                                    <input type="text" 
                                           name="translations[{{ $language->code }}][title]"
                                           class="form-control"
                                           value="{{ $timeline->getTranslation('title', $language->code) }}"
                                           placeholder="{{ translate('Enter title') }} {{ $language->name }}"
                                           required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        {{ translate('Content') }} ({{ $language->name }})
                                    </label>
                                    <textarea class="form-control"
                                           name="translations[{{ $language->code }}][content]"
                                           rows="3"
                                           placeholder="{{ translate('Enter content') }} {{ $language->name }}"
                                           required>{{ $timeline->getTranslation('content', $language->code) }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">
                        {{ translate('Update') }} {{ translate('Timeline') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection