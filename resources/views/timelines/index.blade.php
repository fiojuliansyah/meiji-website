@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Timelines') }}</div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('timelines.create', ['lang' => app()->getLocale()]) }}" class="btn btn-primary">{{ translate('Create Timeline') }}</a>
                </div>
            </div>
        </div>
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
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('timelines.edit', ['lang' => app()->getLocale(), 'timeline' => $timeline->id]) }}" class=""><i class='bx bxs-edit'></i></a>
                                            <a href="javascript:;" class="ms-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $timeline->id }}"><i class='bx bxs-trash'></i></a>
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

@foreach ($timelines as $timeline)   
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
<script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
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