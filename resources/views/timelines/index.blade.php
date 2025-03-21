@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Timelines') }}</h5>
            </div>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <a href="{{ route('timelines.create', ['lang' => app()->getLocale()]) }}" class="btn btn-primary">
                    <i class="feather-plus-circle me-2"></i>{{ translate('Create Timeline') }}
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
                                <th>{{ translate('Year') }}</th>
                                <th>{{ translate('Image') }}</th>
                                <th>{{ translate('Title') }}</th>
                                <th>{{ translate('Content') }}</th>
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timelines as $timeline)   
                                <tr>
                                    <td>{{ $timeline->year }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $timeline->image) }}" alt="Timeline Image" width="100">
                                    </td>
                                    <td>{{ $timeline->getTranslation('title', app()->getLocale()) }}</td>
                                    <td>{{ $timeline->getTranslation('content', app()->getLocale()) }}</td>
                                    <td>
                                        <!-- Dropdown for Edit and Delete Actions -->
                                        <div class="dropdown">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather feather-more-horizontal"></i> <!-- More options icon -->
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('timelines.edit', ['lang' => app()->getLocale(), 'timeline' => $timeline->id]) }}">
                                                        <i class="feather feather-edit-3 me-2"></i> {{ translate('Edit') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $timeline->id }}">
                                                        <i class="feather feather-trash-2 me-2"></i> {{ translate('Delete') }}
                                                    </a>
                                                </li>
                                            </ul>
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
@foreach ($timelines as $timeline)
<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="deleteModal{{ $timeline->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">{{ translate('Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">{{ translate('Are you sure you want to delete this timeline?') }}</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ translate('Close') }}</button>
                <form method="POST" action="{{ route('timelines.destroy', ['lang' => app()->getLocale(), 'timeline' => $timeline->id]) }}">
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
        $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });
    });
</script>
@endpush
