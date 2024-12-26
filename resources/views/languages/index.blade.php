@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Language') }}</div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('languages.create') }}" class="btn btn-primary">{{ translate('Create') }}</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ translate('Name') }}</th>
                                <th>{{ translate('Code') }}</th>
                                <th></th>
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $language)   
                                <tr>
                                    <td>{{ $language->name ?? '' }}</td>
                                    <td>{{ $language->code ?? '' }}</td>
                                    <td><a href="{{ route('languages.translations', $language->id) }}" class="btn btn-primary btn-sm radius-30 px-4">{{ translate('View Translations') }}</a></td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('languages.edit', $language->id) }}" class=""><i class='bx bxs-edit'></i></a>
                                            <a href="javascript:;" class="ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $language->id }}"><i class='bx bxs-trash'></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ translate('Name') }}</th>
                                <th>{{ translate('Code') }}</th>
                                <th></th>
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($languages as $language)   
<div class="modal fade" id="exampleModal{{ $language->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ translate('Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">{{ translate('Are you sure you want to delete this language?') }}</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ translate('Close') }}</button>
                <form method="POST" action="{{ route('languages.destroy', ['lang' => app()->getLocale(), 'id' => $language->id]) }}">
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
        $('#example').DataTable();
      } );
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );
     
        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script>
@endpush