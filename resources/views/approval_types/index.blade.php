@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Approval Types') }}</h5>
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
                <div class="btn-group">
                    <a href="{{ route('approval_types.create') }}" class="btn btn-primary">
                        {{ translate('Create Approval Type') }}
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
                <div class="table-responsive">
                    <table id="approvalTypeTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ translate('Name') }}</th>
                                <th>{{ translate('Assigned User') }}</th>
                                <th>{{ translate('Assigned Module') }}</th>
                                <th>{{ translate('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($approvalTypes as $type)
                                <tr>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->user->name ?? translate('Not Assigned') }}</td>
                                    <td>{{ $type->module->name ?? translate('Not Assigned') }}</td>
                                    <td>
                                        <div class="hstack gap-2 justify-content-end">
                                            <div class="dropdown">
                                                <a href="javascript:void(0)" class="btn btn-sm btn-light" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                    <i class="feather feather-more-horizontal"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('approval_types.edit', $type->id) }}">
                                                            <i class="feather feather-edit-3 me-3"></i>
                                                            <span>{{ translate('Edit') }}</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $type->id }}">
                                                            <i class="feather feather-trash-2 me-3"></i>
                                                            <span>{{ translate('Delete') }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
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

@section('modal')
    @foreach ($approvalTypes as $type)
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{ $type->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">{{ translate('Confirmation') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ translate('Are you sure you want to delete this approval type?') }}
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route('approval_types.destroy', $type->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ translate('Delete') }}</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ translate('Close') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('js')
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#approvalTypeTable').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#approvalTypeTable_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush
