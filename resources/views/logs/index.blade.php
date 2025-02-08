@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Activity Logs') }}</h5>
            </div>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <!-- Add any additional buttons here if needed -->
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
                                <th>{{ translate('Description') }}</th>
                                <th>{{ translate('Created At') }}</th>
                                <th>{{ translate('Causer') }}</th>
                                <th>{{ translate('Subject') }}</th>
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)   
                                <tr>
                                    <td>{{ $activity->description }}</td>
                                    <td>{{ $activity->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ $activity->causer ? $activity->causer->name : translate('Unknown') }}</td>
                                    <td>
                                        @if ($activity->subject)
                                            {{ $activity->subject_type }}: {{ $activity->subject->id }}
                                        @else
                                            {{ translate('N/A') }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather feather-more-horizontal"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <!-- Option for viewing activity details, or any additional actions -->
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('activities.show', $activity->id) }}">
                                                        <i class="feather feather-eye me-2"></i> {{ translate('View') }}
                                                    </a>
                                                </li>
                                                <!-- Add delete or other actions if needed -->
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ translate('Description') }}</th>
                                <th>{{ translate('Created At') }}</th>
                                <th>{{ translate('Causer') }}</th>
                                <th>{{ translate('Subject') }}</th>
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
<!-- Optionally add modals for confirming deletion of activities, etc. -->
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
