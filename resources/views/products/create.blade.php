@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Create') }} {{ translate('Product') }}</div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.store', ['lang' => app()->getLocale()]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Category Selection -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">{{ translate('Category') }}</label>
                        <select class="form-control" name="category_id" required>
                            <option value="">{{ translate('Select Category') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->getTranslation('name', app()->getLocale()) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Image Input -->
                    <div class="mb-3">
                        <label for="image" class="form-label">{{ translate('Image') }}</label>
                        <input type="file" class="form-control" name="image" accept="image/*" required>
                    </div>

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
                                <label for="name_{{ $language->code }}" class="form-label">
                                    {{ translate('Name') }} ({{ $language->name }})
                                </label>
                                <input class="form-control" type="text" name="translations[{{ $language->code }}][name]"
                                    id="name_{{ $language->code }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="content_{{ $language->code }}" class="form-label">
                                    {{ translate('Content') }} ({{ $language->name }})
                                </label>
                                <textarea class="editor" name="translations[{{ $language->code }}][content]"
                                    id="content_{{ $language->code }}" required></textarea>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">{{ translate('Create') }} {{ translate('Product') }}</button>
                    </div>
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
                height: 300,
                removeButtons: 'PasteFromWord',
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['lang' => app()->getLocale(), '_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
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
@endsection