@extends('layouts.app')

@section('content')
 <div class="nxl-content">
             
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Sliders</h5>
                        </div>
                    </div>
                    <div class="page-header-right ms-auto">
                        <div class="page-header-right-items">
                            <div class="d-flex d-md-none">
                                <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                    <i class="feather-arrow-left me-2"></i>
                                    <span>Back</span>
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
                    <table id="example2" class="table">
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
                                    <td>{{ $slider->getTranslation('content', app()->getLocale()) }}</td>
                                    <td class="text-end">
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('sliders.edit', ['lang' => app()->getLocale(), 'slider' => $slider->id]) }}" class="d-block"><i class='bx bxs-edit'></i></a>
                                            <a href="javascript:;" class="ms-3 d-block" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $slider->id }}"><i class='bx bxs-trash'></i></a>
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
