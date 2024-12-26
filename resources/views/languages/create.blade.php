@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Create') }} {{ translate('Language') }}</div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('languages.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                        <input class="form-control mb-3" type="text" name="name" placeholder="{{ translate('Name') }} {{ translate('Language') }}" aria-label="default input example">
                        </div>
                        <div class="col">
                            <input class="form-control mb-3" type="text" name="code" placeholder="Code" aria-label="default input example">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">{{ translate('Create') }} {{ translate('Language') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection