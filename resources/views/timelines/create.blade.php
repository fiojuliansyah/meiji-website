@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Create') }} {{ translate('Timeline') }}</div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('timelines.store', ['lang' => app()->getLocale()]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Year Input -->
                    <div class="mb-3">
                        <label for="year" class="form-label">{{ translate('Year') }}</label>
                        <input class="form-control" type="text" name="year" id="year" required>
                    </div>

                    <!-- Image Input -->
                    <div class="mb-3">
                        <label for="image" class="form-label">{{ translate('Timeline') }} {{ translate('Image') }}</label>
                        <input class="form-control" type="file" name="image" id="image" required>
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
                                <textarea class="form-control" name="translations[{{ $language->code }}][content]"
                                    id="content_{{ $language->code }}" rows="3" placeholder="{{ translate('Enter content') }} {{ $language->name }}" required></textarea>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">{{ translate('Create') }} {{ translate('Timeline') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection