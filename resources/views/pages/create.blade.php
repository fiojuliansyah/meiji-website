@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Create') }} {{ translate('Page') }}</h5>
            </div>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>{{ translate('Back') }}</span>
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
                <form action="{{ route('pages.store', ['lang' => app()->getLocale()]) }}" method="POST">
                    @csrf

                    <!-- Tabs for Translations -->
                    <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                        @foreach ($languages as $language)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $language->code }}"
                                    data-bs-toggle="tab" data-bs-target="#lang-{{ $language->code }}" type="button" role="tab"
                                    aria-controls="lang-{{ $language->code }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    {{ $language->name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                    <br>

                    <div class="tab-content" id="languageTabContent">
                        @foreach ($languages as $language)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="lang-{{ $language->code }}"
                                role="tabpanel" aria-labelledby="tab-{{ $language->code }}">
                                
                                <div class="mb-3">
                                    <label for="title_{{ $language->code }}" class="form-label">
                                        {{ translate('Title') }} ({{ $language->name }})
                                    </label>
                                    <input class="form-control" type="text" name="translations[{{ $language->code }}][title]"
                                        id="title_{{ $language->code }}" placeholder="{{ translate('Enter title') }} {{ $language->name }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="content_{{ $language->code }}" class="form-label">
                                        {{ translate('Content') }} ({{ $language->name }})
                                    </label>
                                    <textarea class="editor" name="translations[{{ $language->code }}][content]"
                                        id="content_{{ $language->code }}" placeholder="{{ translate('Enter content') }} {{ $language->name }}" required></textarea>
                                </div>
                                
                            </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label for="is_header" class="form-label">{{ translate('Show in Header') }}</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_header" name="is_header" value="1">
                                <label class="form-check-label" for="is_header">{{ translate('Enable') }}</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="is_footer" class="form-label">{{ translate('Show in Footer') }}</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_footer" name="is_footer" value="1">
                                <label class="form-check-label" for="is_footer">{{ translate('Enable') }}</label>
                            </div>
                        </div>                        
                    <div class="mb-3">
                        <label class="form-label">
                            Date Published
                        </label>
                        <input class="form-control" type="date" name="date_published" >
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">{{ translate('Create') }} {{ translate('Page') }}</button>
                    </div>
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
                versionCheck: false,
                height: 300,
                removeButtons: 'PasteFromWord'
            });
        });

        var tabButtons = document.querySelectorAll('[data-bs-toggle="tab"]');
        tabButtons.forEach(function(button) {
            button.addEventListener('shown.bs.tab', function() {
                for (var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].resize();
                }
            });
        });
    });
</script>
@endpush
