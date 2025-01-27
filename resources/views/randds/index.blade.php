@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('RandD') }}</h5>
            </div>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <a href="{{ route('randds.create', ['lang' => app()->getLocale()]) }}" class="btn btn-primary">
                    <i class="feather-plus-circle me-2"></i>{{ translate('Create About') }}
                </a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ translate('Title') }}</th>
                                <th>{{ translate('Approval') }}</th>
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($randds as $randd)   
                                <tr>
                                    <td>{{ $randd->getTranslation('title', app()->getLocale()) }}</td>
                                    <td>
                                        @foreach ($randd->requiredApprovals as $requirement)
                                            <div>
                                                {{ $requirement->approvalType->name }}
                                                @php
                                                    $approval = $randd->approvals->firstWhere('approval_type_id', $requirement->approval_type_id);
                                                @endphp
                                    
                                                @if ($approval)
                                                    @if ($approval->status === 'approved')
                                                        <span class="badge bg-success">{{ translate('Approved') }}</span>
                                                    @elseif ($approval->status === 'rejected')
                                                        <span class="badge bg-danger">{{ translate('Rejected') }}</span>
                                                        <p class="text-muted mt-1"><small>{{ $approval->rejection_description }}</small></p>
                                                    @endif
                                                @else
                                                    <span class="badge bg-warning">{{ translate('Pending') }}</span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        <!-- Dropdown for Actions -->
                                        <div class="dropdown">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather feather-more-horizontal"></i> <!-- More Options Icon -->
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('randds.edit', ['lang' => app()->getLocale(), 'randd' => $randd->id]) }}">
                                                        <i class="feather feather-edit-3 me-2"></i> {{ translate('Edit') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $randd->id }}">
                                                        <i class="feather feather-trash-2 me-2"></i> {{ translate('Delete') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ translate('Title') }}</th>
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
@foreach ($randds as $randd)   
<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="deleteModal{{ $randd->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">{{ translate('Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">{{ translate('Are you sure you want to delete this randd?') }}</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ translate('Close') }}</button>
                <form method="POST" action="{{ route('randds.destroy', ['lang' => app()->getLocale(), 'randd' => $randd->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ translate('Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@push('js')
<!-- jQuery and DataTables CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush
