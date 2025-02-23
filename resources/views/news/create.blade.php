@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Create') }} {{ translate('News') }}</h5>
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
                <form action="{{ route('news.store', ['lang' => app()->getLocale()]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Category Selection -->
                    <div class="mb-3">
                        <label for="news_category_id" class="form-label">{{ translate('Category') }}</label>
                        <select class="form-control" name="news_category_id" required>
                            <option value="">{{ translate('Select Category') }}</option>
                            @foreach($news_categories as $news_category)
                                <option value="{{ $news_category->id }}">
                                    {{ $news_category->getTranslation('name', app()->getLocale()) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Image Input -->
                    <div class="mb-3">
                        <label for="image" class="form-label">{{ translate('Image') }}</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
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
                                        {{ translate('Name') }} ({{ $language->name }})
                                    </label>
                                    <input type="text" 
                                           name="translations[{{ $language->code }}][name]"
                                           class="form-control"
                                           required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        {{ translate('Content') }} ({{ $language->name }})
                                    </label>
                                    <textarea class="editor"
                                              name="translations[{{ $language->code }}][content]"
                                              required></textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Date Published
                        </label>
                        <input class="form-control" type="date" name="date_published" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            End Date
                        </label>
                        <input class="form-control" type="date" name="end_date" >
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">
                        {{ translate('Create') }} {{ translate('News') }}
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
                removeButtons: 'PasteFromWord',
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['lang' => app()->getLocale(), '_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
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