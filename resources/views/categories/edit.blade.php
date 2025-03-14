@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Edit Category') }}</h5>
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
                <form action="{{ route('categories.update', ['lang' => app()->getLocale(), 'category' => $category->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
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
                                        {{ translate('Name') }} ({{ $language->name }})
                                    </label>
                                    <input type="text" 
                                           name="translations[{{ $language->code }}][name]"
                                           class="form-control"
                                           value="{{ $category->getTranslation('name', $language->code) }}"
                                           required>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Validation Toggle -->
                    <div class="mb-3 form-check">
                        <input type="hidden" name="is_validate" value="">
                        <input type="checkbox" name="is_validate" value="1" class="form-check-input" id="is_validate" {{ $category->is_validate ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_validate">{{ translate('Is Validate') }}</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">
                        {{ translate('Update Category') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection