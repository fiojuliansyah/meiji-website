@extends('layouts.app')

@section('content')
<div class="page-wrapper">
  <div class="page-content">
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">{{ translate('Contact Settings') }}</div>
      </div>

      <div class="card">
          <div class="card-body">
              <form action="{{ route('contacts.update', ['lang' => app()->getLocale(), 'contact' => $contact->id]) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="mb-3">
                      <label class="form-label">{{ translate('Map URL') }}</label>
                      <input type="text" name="map_url" class="form-control" value="{{ $contact->map_url }}" required>
                  </div>

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
                  <br>
                  <div class="tab-content" id="languageTabContent">
                      @foreach ($languages as $language)
                      <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
                           id="lang-{{ $language->code }}" 
                           role="tabpanel">
                          <div class="mb-3">
                              <label class="form-label">{{ translate('Title') }} ({{ $language->name }})</label>
                              <input type="text" 
                                     name="translations[{{ $language->code }}][title]"
                                     class="form-control"
                                     value="{{ $contact->getTranslation('title', $language->code, false) }}" 
                                     required>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">{{ translate('Content') }} ({{ $language->name }})</label>
                              <textarea class="editor" 
                                        name="translations[{{ $language->code }}][content]">{{ $contact->getTranslation('content', $language->code, false) }}</textarea>
                          </div>
                      </div>
                      @endforeach
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