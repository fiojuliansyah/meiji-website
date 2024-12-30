@extends('layouts.app')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">{{ translate('Visitors') }}</h5>
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
                                <th>{{ translate('IP') }}</th>
                                <th>{{ translate('URL') }}</th>
                                <th>{{ translate('Location') }}</th>
                                <th>{{ translate('Coordinates') }}</th>
                                <th>{{ translate('Last Visit') }}</th>
                                <th>{{ translate('Platform') }}</th>
                                <th>{{ translate('Browser') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visitors as $visitor)
                            <tr>
                                <td>{{ $visitor->ip }}</td>
                                <td>{{ $visitor->url }}</td>
                                <td>
                                    @if(isset($visitor->location))
                                        {{ $visitor->location['city'] }}, {{ $visitor->location['country'] }}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($visitor->location))
                                        {{ $visitor->location['latitude'] }}, {{ $visitor->location['longitude'] }}
                                        <a href="https://www.google.com/maps?q={{ $visitor->location['latitude'] }},{{ $visitor->location['longitude'] }}" target="_blank">({{ translate('Map') }})</a>
                                    @endif
                                </td>
                                <td>{{ $visitor->created_at }}</td>
                                <td>{{ $visitor->platform }}</td>
                                <td>{{ $visitor->browser }}</td>
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
