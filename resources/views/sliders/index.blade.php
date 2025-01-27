@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Sliders') }}</h5>
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
                    <a href="{{ route('sliders.create', ['lang' => app()->getLocale()]) }}"
                       class="btn btn-primary">{{ translate('Create Slider') }}</a>
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
                    <table id="sliderTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ translate('Image') }}</th>
                                <th>{{ translate('Title') }}</th>
                                <th>{{ translate('Approval') }}</th>
                                {{-- <th>{{ translate('Content') }}</th> --}}
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)   
                                <tr>
                                    <td>
                                        <div class="hstack gap-3">
                                            <div class="avatar-image avatar-lg rounded">
                                                <img class="img-fluid" src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image">
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="d-block">{{ $slider->getTranslation('title', app()->getLocale()) }}</a>
                                                <span class="fs-12 text-muted">{{ translate('Slider') }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $slider->getTranslation('title', app()->getLocale()) }}</td>
                                    <td>
                                        @foreach ($slider->requiredApprovals as $requirement)
                                            <div>
                                                {{ $requirement->approvalType->name }}
                                                @php
                                                    $approval = $slider->approvals->firstWhere('approval_type_id', $requirement->approval_type_id);
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
                                    {{-- <td>{{ $slider->getTranslation('content', app()->getLocale()) }}</td> --}}
                                    <td>
                                        <div class="hstack gap-2 justify-content-end">
                                            <div class="dropdown">
                                                <a href="javascript:void(0)" class="btn btn-sm btn-light" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                    <i class="feather feather-more-horizontal"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('sliders.edit', ['lang' => app()->getLocale(), 'slider' => $slider->id]) }}">
                                                            <i class="feather feather-edit-3 me-3"></i>
                                                            <span>{{ translate('Edit') }}</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0)" class="ms-3 d-block" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $slider->id }}">
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

@foreach ($sliders as $slider)   
<div class="modal fade" id="deleteModal{{ $slider->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">{{ translate('Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">{{ translate('Are you sure you want to delete this slider?') }}</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ translate('Close') }}</button>
                <form method="POST" action="{{ route('sliders.destroy', ['lang' => app()->getLocale(), 'slider' => $slider->id]) }}">
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

@section('modal')  
    <!-- Modal content here -->
@endsection

@push('js')
<!-- DataTables CDN -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#sliderTable').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#sliderTable_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush
