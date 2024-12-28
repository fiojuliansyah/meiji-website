@extends('layouts.app')

@section('content')
<div class="page-wrapper">
   <div class="page-content">
       <!--breadcrumb-->
       <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
           <div class="breadcrumb-title pe-3">{{ translate('Edit') }} {{ translate('About') }}</div>
       </div>
       <!--end breadcrumb-->
       <div class="card">
           <div class="card-body">
               <form action="{{ route('abouts.update', ['lang' => app()->getLocale(), 'about' => $about->id]) }}" method="POST">
                   @csrf
                   @method('PUT')
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
                                   id="title_{{ $language->code }}" value="{{ $about->getTranslation('title', $language->code, false) }}" required>
                           </div>
                           <div class="mb-3">
                               <label for="content_{{ $language->code }}" class="form-label">
                                   {{ translate('Content') }} ({{ $language->name }})
                               </label>
                               <textarea class="editor" name="translations[{{ $language->code }}][content]"
                                   id="content_{{ $language->code }}" required>{{ $about->getTranslation('content', $language->code, false) }}</textarea>
                           </div>
                       </div>
                       @endforeach
                   </div>

                   <!-- Submit Button -->
                   <div class="col-md-12">
                       <button type="submit" class="btn btn-primary">{{ translate('Update') }} {{ translate('About') }}</button>
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
                height: 300,
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form',
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