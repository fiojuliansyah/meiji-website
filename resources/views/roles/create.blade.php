@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Create Role') }}</div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('roles.store', ['lang' => app()->getLocale()]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ translate('Role Name') }}</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ translate('Permissions') }}</label>
                        <div class="row">
                            @foreach ($permissions as $group => $groupPermissions)
                                <div class="col-3" style="padding: 20px">
                                    <h5>{{ $group }}</h5>
                                    @foreach ($groupPermissions as $permission)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $permission->id }}">
                                            <label class="form-check-label">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ translate('Create Role') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
