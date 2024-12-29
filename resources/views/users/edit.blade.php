@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Edit User') }}</div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.update', ['lang' => app()->getLocale(), 'user' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ translate('Name') }}</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ translate('Email') }}</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">{{ translate('Role') }}</label>
                        <select name="role" id="role" class="form-select" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" {{ $user->roles->contains($role) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <h5>{{ translate('Change Password (Optional)') }}</h5>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ translate('New Password') }}</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{ translate('Confirm New Password') }}</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ translate('Update User') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
