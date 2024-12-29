@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">      
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Total Users</p>
                                <h5 class="mb-0">{{ $userCount }}</h5> <!-- Menampilkan jumlah pengguna -->
                            </div>
                            <div class="ms-auto">  
                                <i class='bx bx-group font-30'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Total Sliders</p>
                                <h5 class="mb-0">{{ $sliderCount }}</h5> <!-- Menampilkan jumlah sliders -->
                            </div>
                            <div class="ms-auto">  
                                <i class='bx bx-image-add font-30'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Total Products</p>
                                <h5 class="mb-0">{{ $productCount }}</h5> <!-- Menampilkan jumlah produk -->
                            </div>
                            <div class="ms-auto">  
                                <i class='bx bx-shopping-bag font-30'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Total Pages</p>
                                <h5 class="mb-0">{{ $pageCount }}</h5> <!-- Menampilkan jumlah pages -->
                            </div>
                            <div class="ms-auto">  
                                <i class='bx bx-file font-30'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
</div>
@endsection

@push('js')
<script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/assets/plugins/highcharts/js/highcharts.js"></script>
<script src="/assets/plugins/highcharts/js/exporting.js"></script>
<script src="/assets/plugins/highcharts/js/variable-pie.js"></script>
<script src="/assets/plugins/highcharts/js/export-data.js"></script>
<script src="/assets/plugins/highcharts/js/accessibility.js"></script>
<script src="/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script>
    new PerfectScrollbar('.dashboard-top-countries');
</script>
@endpush
