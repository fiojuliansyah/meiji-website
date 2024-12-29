@extends('layouts.app')

@section('content')
<div class="nxl-content">


<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">{{translate('Homepage Settings')}}</h5>
        </div>
    </div>
    <div class="page-header-right ms-auto">
        <div class="page-header-right-items">
            <div class="d-flex d-md-none">
                <a href="javascript:void(0)" class="page-header-right-close-toggle">
                    <i class="feather-arrow-left me-2"></i>
                    <span>Back </span>
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
                <form action="{{ route('homepages.update', ['lang' => app()->getLocale(), 'homepage' => $homepage->id]) }}" 
                      method="POST">
                    @csrf
                    @method('PUT')

                    <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                        @foreach ($languages as $language)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active' : '' }}" 
                                        id="tab-{{ $language->code }}"
                                        data-bs-toggle="tab" 
                                        data-bs-target="#lang-{{ $language->code }}" 
                                        type="button" role="tab">
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
                                <label class="form-label">{{ translate('About Title') }} ({{ $language->name }})</label>
                                <input type="text" name="translations[{{ $language->code }}][about_title]" 
                                       class="form-control" 
                                       value="{{ $homepage->getTranslation('about_title', $language->code, false) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ translate('About Content') }} ({{ $language->name }})</label>
                                <textarea class="editor" 
                                          name="translations[{{ $language->code }}][about_content]">{{ $homepage->getTranslation('about_content', $language->code, false) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ translate('R&D Title') }} ({{ $language->name }})</label>
                                <input type="text" name="translations[{{ $language->code }}][randd_title]" 
                                       class="form-control" 
                                       value="{{ $homepage->getTranslation('randd_title', $language->code, false) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ translate('R&D Content') }} ({{ $language->name }})</label>
                                <textarea class="editor" 
                                          name="translations[{{ $language->code }}][randd_content]">{{ $homepage->getTranslation('randd_content', $language->code, false) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ translate('Doctor Title') }} ({{ $language->name }})</label>
                                <input type="text" name="translations[{{ $language->code }}][doctor_title]" 
                                       class="form-control" 
                                       value="{{ $homepage->getTranslation('doctor_title', $language->code, false) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ translate('Doctor Content') }} ({{ $language->name }})</label>
                                <textarea class="editor" 
                                          name="translations[{{ $language->code }}][doctor_content]">{{ $homepage->getTranslation('doctor_content', $language->code, false) }}</textarea>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">{{ translate('About Link') }}</label>
                            <input type="text" name="about_link" class="form-control" value="{{ $homepage->about_link }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ translate('Doctor Link') }}</label>
                            <input type="text" name="doctor_link" class="form-control" value="{{ $homepage->doctor_link }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="news_section" class="form-label">{{ translate('Show News Section') }}</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="news_section" name="news_section" value="1"
                                {{ $homepage->news_section ? 'checked' : '' }}>
                            <label class="form-check-label" for="news_section">{{ translate('Enable') }}</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ translate('Save Changes') }}</button>
                </form>
            </div>
        </div>
    
</div>
</div>
@endsection

@push('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.editor').forEach(function(element) {
            CKEDITOR.replace(element, {
                height: 300,
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form',
                removeButtons: 'PasteFromWord'
            });
        });

        document.querySelectorAll('[data-bs-toggle="tab"]').forEach(function(button) {
            button.addEventListener('shown.bs.tab', function() {
                for (var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].resize();
                }
            });
        });
    });
</script>
@endpush
