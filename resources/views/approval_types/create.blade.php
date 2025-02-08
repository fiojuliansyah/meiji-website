@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Create Approval Type') }}</h5>
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
                <form action="{{ route('approval_types.store') }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label">{{ translate('Name') }}</label>
                        <input type="text" 
                               name="name" 
                               class="form-control" 
                               placeholder="{{ translate('Enter Approval Type Name') }}" 
                               required>
                    </div>

                    <!-- Assigned User -->
                    <div class="mb-3">
                        <label class="form-label">{{ translate('Assigned User') }}</label>
                        <select name="user_id" class="form-control" required>
                            <option value="" disabled selected>{{ translate('Select User') }}</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Assigned Module -->
                    <div class="mb-3">
                        <label class="form-label">{{ translate('Assigned Module') }}</label>
                        <select name="approval_module_id" class="form-control" required>
                            <option value="" disabled selected>{{ translate('Select Module') }}</option>
                            @foreach ($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Toggle is_edit -->
                    <div class="mb-3 form-check">
                        <input type="hidden" name="is_edit" value="">
                        <input type="checkbox" name="is_edit" value="1" class="form-check-input" id="is_edit">
                        <label class="form-check-label" for="is_edit">{{ translate('Is Editable') }}</label>
                    </div>

                    <!-- Toggle is_preview -->
                    <div class="mb-3 form-check">
                        <input type="hidden" name="is_preview" value="">
                        <input type="checkbox" name="is_preview" value="1" class="form-check-input" id="is_preview">
                        <label class="form-check-label" for="is_preview">{{ translate('Is Previewable') }}</label>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-100">
                            {{ translate('Create Approval Type') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
