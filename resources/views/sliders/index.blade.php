@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Sliders') }}</div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('sliders.create', ['lang' => app()->getLocale()]) }}" class="btn btn-primary">{{ translate('Create Slider') }}</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ translate('Image') }}</th>
                                <th>{{ translate('Title') }}</th>
                                <th>{{ translate('Content') }}</th>
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)   
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image" width="100">
                                    </td>
                                    <td>{{ $slider->getTranslation('title', app()->getLocale()) }}</td>
                                    <td>{{ $slider->getTranslation('content', app()->getLocale()) }}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('sliders.edit', ['lang' => app()->getLocale(), 'slider' => $slider->id]) }}" class=""><i class='bx bxs-edit'></i></a>
                                            <a href="javascript:;" class="ms-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $slider->id }}"><i class='bx bxs-trash'></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ translate('Image') }}</th>
                                <th>{{ translate('Title') }}</th>
                                <th>{{ translate('Content') }}</th>
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </tfoot>
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

@push('js')
<script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );
     
        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    });
</script>
@endpush
