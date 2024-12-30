@extends('layouts.app')

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="route">Home</a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div class="row">
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-text avatar-lg bg-primary">
                                        <i class="feather-users"></i>
                                    </div>
                                    <div>
                                        <h3 class="fs-2 fw-bold text-dark">{{ $userCount }}</h3>
                                        <p class="fs-6 text-muted">Total Users</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Sliders Widget -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-text avatar-lg bg-success">
                                        <i class="feather-image"></i>
                                    </div>
                                    <div>
                                        <h3 class="fs-2 fw-bold text-dark">{{ $sliderCount }}</h3>
                                        <p class="fs-6 text-muted">Total Sliders</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- News Widget -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-text avatar-lg bg-warning">
                                        <i class="feather-file-text"></i>
                                    </div>
                                    <div>
                                        <h3 class="fs-2 fw-bold text-dark">{{ $newsCount }}</h3>
                                        <p class="fs-6 text-muted">Total News</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Pages Widget -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-text avatar-lg bg-danger">
                                        <i class="feather-book"></i>
                                    </div>
                                    <div>
                                        <h3 class="fs-2 fw-bold text-dark">{{ $pageCount }}</h3>
                                        <p class="fs-6 text-muted">Total Pages</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Products Widget -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-text avatar-lg bg-info">
                                        <i class="feather-box"></i>
                                    </div>
                                    <div>
                                        <h3 class="fs-2 fw-bold text-dark">{{ $productCount }}</h3>
                                        <p class="fs-6 text-muted">Total Products</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Latest Visitor</h5>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr class="border-b">
                                                <th scope="row">Users</th>
                                                <th>Proposal</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($visitors as $visitor)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <a href="javascript:void(0);">
                                                                <span class="d-block">{{ $visitor->ip }}</span>
                                                                <span class="fs-12 d-block fw-normal text-muted">{{ $visitor->url }}</span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-gray-200 text-dark">Sent</span>
                                                    </td>
                                                    <td>{{ $visitor->created_at }}</td>
                                                    <td>
                                                        <span class="badge bg-soft-success text-success">Completed</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pt-4">
                                    {{ $visitors->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                      
        </div>
       
@endsection

