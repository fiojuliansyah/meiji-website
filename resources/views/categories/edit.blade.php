@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Edit Category') }}</div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.update', ['lang' => app()->getLocale(), 'category' => $category->id]) }}" method="POST">
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
                                <label for="name_{{ $language->code }}" class="form-label">
                                    {{ translate('Name') }} ({{ $language->name }})
                                </label>
                                <input class="form-control" type="text" name="translations[{{ $language->code }}][name]"
                                    id="name_{{ $language->code }}" 
                                    value="{{ $category->getTranslation('name', $language->code) }}" required>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">{{ translate('Update Category') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection