@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Edit Approval Type') }}</h5>
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
                <form action="{{ route('approval_types.update', $approvalType->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">{{ translate('Assigned User') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ $approvalType->name }}" id="">
                    </div>

                    <!-- Assigned User -->
                    <div class="mb-3">
                        <label class="form-label">{{ translate('Assigned User') }}</label>
                        <select name="user_id" class="form-control" required>
                            <option value="" disabled>{{ translate('Select User') }}</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $approvalType->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">
                        {{ translate('Update Approval Type') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
