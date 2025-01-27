@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Pages') }}</div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('pages.create', ['lang' => app()->getLocale()]) }}" class="btn btn-primary">{{ translate('Create Page') }}</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ translate('Title') }}</th>
                                <th>{{ translate('Approval') }}</th>
                                {{-- <th>{{ translate('Content') }}</th> --}}
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)   
                                <tr>
                                    <td>
                                        {{ $page->getTranslation('title', app()->getLocale()) }}
                                        
                                        @if ($page->is_header)
                                            <span class="badge bg-success ms-2">{{ translate('Header') }}</span>
                                        @endif
                                        @if ($page->is_footer)
                                            <span class="badge bg-info ms-2">{{ translate('Footer') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($page->requiredApprovals as $requirement)
                                            <div>
                                                {{ $requirement->approvalType->name }}
                                                @php
                                                    $approval = $page->approvals->firstWhere('approval_type_id', $requirement->approval_type_id);
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
                                    {{-- <td>{!! $page->getTranslation('content', app()->getLocale()) !!}</td> --}}
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('pages.edit', ['lang' => app()->getLocale(), 'page' => $page->id]) }}" class=""><i class='bx bxs-edit'></i></a>
                                            <a href="javascript:;" class="ms-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $page->id }}"><i class='bx bxs-trash'></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ translate('Title') }}</th>
                                {{-- <th>{{ translate('Content') }}</th> --}}
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($pages as $page)   
<div class="modal fade" id="deleteModal{{ $page->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">{{ translate('Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">{{ translate('Are you sure you want to delete this page?') }}</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ translate('Close') }}</button>
                <form method="POST" action="{{ route('pages.destroy', ['lang' => app()->getLocale(), 'page' => $page->id]) }}">
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
