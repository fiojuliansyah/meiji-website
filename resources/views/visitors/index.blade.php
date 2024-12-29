@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Visitors') }}</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>IP</th>
                                    <th>URL</th>
                                    <th>Location</th>
                                    <th>Coordinates</th>
                                    <th>Last Visit</th>
                                    <th>Platform</th>
                                    <th>Browser</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visitors as $visitor)
                                <tr>
                                    <td>{{ $visitor->ip }}</td>
                                    <td>{{ $visitor->url }}</td>
                                    <td>
                                        @if(isset($visitor->location))
                                            {{ $visitor->location['city'] }}, 
                                            {{ $visitor->location['country'] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($visitor->location))
                                            {{ $visitor->location['latitude'] }}, 
                                            {{ $visitor->location['longitude'] }}
                                            <a href="https://www.google.com/maps?q={{ $visitor->location['latitude'] }},{{ $visitor->location['longitude'] }}" 
                                               target="_blank">(Map)</a>
                                        @endif
                                    </td>
                                    <td>{{ $visitor->created_at }}</td>
                                    <td>{{ $visitor->platform }}</td>
                                    <td>{{ $visitor->browser }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        <tfoot>
                            <tr>
                                <th>IP</th>
                                <th>URL</th>
                                <th>Location</th>
                                <th>Coordinates</th>
                                <th>Last Visit</th>
                                <th>Platform</th>
                                <th>Browser</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
