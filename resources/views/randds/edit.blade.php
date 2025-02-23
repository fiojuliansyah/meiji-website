@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Edit') }} {{ translate('RandD') }}</h5>
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
                <form action="{{ route('randds.update', ['lang' => app()->getLocale(), 'randd' => $randd->id]) }}" method="POST">
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
                                        {{ translate('Title') }} ({{ $language->name }})
                                    </label>
                                    <input type="text" 
                                           name="translations[{{ $language->code }}][title]"
                                           class="form-control"
                                           value="{{ $randd->getTranslation('title', $language->code, false) }}"
                                           required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        {{ translate('Content') }} ({{ $language->name }})
                                    </label>
                                    <textarea class="editor"
                                              name="translations[{{ $language->code }}][content]"
                                              required>{{ $randd->getTranslation('content', $language->code, false) }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Date Published
                        </label>
                        <input class="form-control" type="date" name="date_published" value="{{ $randd->date_published }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            End Date
                        </label>
                        <input class="form-control" type="date" name="end_date" value="{{ $randd->end_date }}">
                    </div>

                    <div class="mb-3">
                        <label for="is_published" class="form-label">{{ translate('Publish') }}</label>
                        <div class="form-check form-switch">
                            <input type="hidden" name="is_published" value="">
                            <input class="form-check-input" type="checkbox" id="is_publish" name="is_published" value="1"
                                {{ $randd->is_published ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">{{ translate('Enable') }}</label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">
                        {{ translate('Update') }} {{ translate('RandD') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.editor').forEach(function(element) {
            CKEDITOR.replace(element, {
                versionCheck: false,
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
@endsection