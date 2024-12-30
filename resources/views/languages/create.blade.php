@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Create') }} {{ translate('Language') }}</h5>
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
                <form action="{{ route('languages.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">{{ translate('Language') }} {{ translate('Name') }}</label>
                            <input class="form-control" type="text" name="name" placeholder="{{ translate('Name') }} {{ translate('Language') }}" aria-label="default input example" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ translate('Code') }}</label>
                            <input class="form-control" type="text" name="code" placeholder="{{ translate('Code') }}" aria-label="default input example" required>
                        </div>
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">{{ translate('Create') }} {{ translate('Language') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
