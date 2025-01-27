@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('View') }} {{ translate('Page') }}</h5>
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
                                <p>{{ $page->title[$language->code] ?? translate('No title available') }}</p>
                            </div>
                            
                            <!-- Content -->
                            <div class="mb-3">
                                <h6>{{ translate('Content') }} ({{ $language->name }})</h6>
                                <p>{!! $page->content[$language->code] ?? translate('No content available') !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Show in Header -->
                <div class="mb-3">
                    <h6>{{ translate('Show in Header') }}</h6>
                    <p>
                        @if ($page->is_header)
                            <span class="badge bg-success">{{ translate('Yes') }}</span>
                        @else
                            <span class="badge bg-danger">{{ translate('No') }}</span>
                        @endif
                    </p>
                </div>

                <!-- Show in Footer -->
                <div class="mb-3">
                    <h6>{{ translate('Show in Footer') }}</h6>
                    <p>
                        @if ($page->is_footer)
                            <span class="badge bg-success">{{ translate('Yes') }}</span>
                        @else
                            <span class="badge bg-danger">{{ translate('No') }}</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
