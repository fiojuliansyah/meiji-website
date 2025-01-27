@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('View') }} {{ translate('Activity') }}</h5>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="card-body">

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

                            <!-- Title -->
                            <div class="mb-3">
                                <h6>{{ translate('Title') }} ({{ $language->name }})</h6>
                                <p>{{ $activity->getTranslation('title', $language->code, false) }}</p>
                            </div>

                            <!-- Content -->
                            <div class="mb-3">
                                <h6>{{ translate('Content') }} ({{ $language->name }})</h6>
                                <p>{!! $activity->getTranslation('content', $language->code, false) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
