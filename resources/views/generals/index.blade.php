@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('General Settings') }}</h5>
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
                <form action="{{ route('generals.update', ['lang' => app()->getLocale(), 'general' => $general->id]) }}" 
                      method="POST" 
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label">{{ translate('Favicon') }}</label>
                            <input type="file" name="favicon" class="form-control" accept="image/*">
                            @if($general->favicon)
                                <img src="{{ asset('storage/' . $general->favicon) }}" alt="Favicon" class="mt-2" height="50">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">{{ translate('Logo') }}</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            @if($general->logo)
                                <img src="{{ asset('storage/' . $general->logo) }}" alt="Logo" class="mt-2" height="50">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">{{ translate('White Logo') }}</label>
                            <input type="file" name="logo_white" class="form-control" accept="image/*">
                            @if($general->logo_white)
                                <img src="{{ asset('storage/' . $general->logo_white) }}" alt="White Logo" class="mt-2" height="50">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">{{ translate('Breadcrumb') }}</label>
                            <input type="file" name="breadcrumb" class="form-control" accept="image/*">
                            @if($general->breadcrumb)
                                <img src="{{ asset('storage/' . $general->breadcrumb) }}" alt="Breadcrumb" class="mt-2" height="50">
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">{{ translate('Company Name') }}</label>
                            <input type="text" name="name" class="form-control" value="{{ $general->name }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ translate('Email') }}</label>
                            <input type="email" name="email" class="form-control" value="{{ $general->email }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">{{ translate('Phone 1') }}</label>
                            <input type="text" name="phone_1" class="form-control" value="{{ $general->phone_1 }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">{{ translate('Phone 2') }}</label>
                            <input type="text" name="phone_2" class="form-control" value="{{ $general->phone_2 }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">{{ translate('Fax') }}</label>
                            <input type="text" name="fax" class="form-control" value="{{ $general->fax }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ translate('Address') }}</label>
                        <input type="text" name="address" class="form-control" value="{{ $general->address }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ translate('Short Address') }}</label>
                        <input type="text" name="short_address" class="form-control" value="{{ $general->short_address }}">
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
                                        {{ translate('Bio') }} ({{ $language->name }})
                                    </label>
                                    <textarea class="editor"  
                                              name="translations[{{ $language->code }}][bio]">{{ $general->getTranslation('bio', $language->code, false) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">
                                        {{ translate('Disclaimer') }} ({{ $language->name }})
                                    </label>
                                    <textarea class="editor"  
                                              name="translations[{{ $language->code }}][disclaimer]">{{ $general->getTranslation('disclaimer', $language->code, false) }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">
                        {{ translate('Save Changes') }}
                    </button>
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
