@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('News') }}</div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('news.create', ['lang' => app()->getLocale()]) }}" class="btn btn-primary">{{ translate('Create News') }}</a>
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
                                <th>{{ translate('Category') }}</th>
                                <th>{{ translate('Name') }}</th>
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $item)   
                                <tr>
                                    <td>
                                        <img src="{{ $item->image_url }}" alt="News Image" width="100">
                                    </td>
                                    <td>{{ $item->category->getTranslation('name', app()->getLocale()) }}</td>
                                    <td>{{ $item->getTranslation('name', app()->getLocale()) }}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('news.edit', ['lang' => app()->getLocale(), 'news' => $item->id]) }}" class=""><i class='bx bxs-edit'></i></a>
                                            <a href="javascript:;" class="ms-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}"><i class='bx bxs-trash'></i></a>
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

@foreach ($news as $item)   
<div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">{{ translate('Are you sure you want to delete this news?') }}</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ translate('Close') }}</button>
                <form method="POST" action="{{ route('news.destroy', ['lang' => app()->getLocale(), 'news' => $item->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ translate('Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@push('js')
<script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });
    });
</script>
@endpush
@endsection