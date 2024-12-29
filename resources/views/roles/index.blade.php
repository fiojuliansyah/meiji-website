@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Roles') }}</div>
            <div class="ms-auto">
                <a href="{{ route('roles.create', ['lang' => app()->getLocale()]) }}" class="btn btn-primary">
                    {{ translate('Create Role') }}
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="rolesTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ translate('Role') }}</th>
                                <th>{{ translate('Group Permissions') }}</th>
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions->groupBy('group') as $group => $permissions)
                                            <span class="badge" style="background-color: {{ '#' . substr(md5($group), 0, 6) }}; color: #fff;">
                                                {{ $group }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('roles.edit', ['lang' => app()->getLocale(), 'role' => $role->id]) }}" class="btn btn-sm btn-primary me-2">
                                                {{ translate('Edit') }}
                                            </a>
                                            <form action="{{ route('roles.destroy', ['lang' => app()->getLocale(), 'role' => $role->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ translate('Are you sure?') }}')">
                                                    {{ translate('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
