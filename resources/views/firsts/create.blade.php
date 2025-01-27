<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="/assets/plugins/bs-stepper/css/bs-stepper.css" rel="stylesheet" />
	<!-- loader-->
	<link href="/assets/css/pace.min.css" rel="stylesheet" />
	<script src="/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="/assets/css/app.css" rel="stylesheet">
	<link href="/assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="/assets/css/dark-theme.css" />
	<link rel="stylesheet" href="/assets/css/semi-dark.css" />
	<link rel="stylesheet" href="/assets/css/header-colors.css" />
	<title>Install Wizard</title>
</head>

<body>
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ translate('Install') }}</div>
        </div>

        <div class="card">
            <div class="card-body">-
                <form action="{{ route('installation.complete') }}" 
                      method="POST" 
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label">{{ translate('Favicon') }}</label>
                            <input type="file" name="favicon" class="form-control" accept="image/*">
                            @if($general && $general->favicon)
                                <img src="{{ asset('storage/' . $general->favicon) }}" alt="Favicon" class="mt-2" height="50">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">{{ translate('Logo') }}</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            @if($general && $general->logo)
                                <img src="{{ asset('storage/' . $general->logo) }}" alt="Logo" class="mt-2" height="50">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">{{ translate('White Logo') }}</label>
                            <input type="file" name="logo_white" class="form-control" accept="image/*">
                            @if($general && $general->logo_white)
                                <img src="{{ asset('storage/' . $general->logo_white) }}" alt="White Logo" class="mt-2" height="50">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">{{ translate('Breadcrumb') }}</label>
                            <input type="file" name="breadcrumb" class="form-control" accept="image/*">
                            @if($general && $general->breadcrumb)
                                <img src="{{ asset('storage/' . $general->breadcrumb) }}" alt="White Logo" class="mt-2" height="50">
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">{{ translate('Company Name') }}</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ translate('Email') }}</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">{{ translate('Phone 1') }}</label>
                            <input type="text" name="phone_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">{{ translate('Phone 2') }}</label>
                            <input type="text" name="phone_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">{{ translate('Fax') }}</label>
                            <input type="text" name="fax" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ translate('Address') }}</label>
                        <input type="text" name="address" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ translate('Short Address') }}</label>
                        <input type="text" name="short_address" class="form-control">
                    </div>

                    <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                        @foreach ($languages as $language)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active' : '' }}" 
                                        id="tab-{{ $language->code }}"
                                        data-bs-toggle="tab" 
                                        data-bs-target="#lang-{{ $language->code }}" 
                                        type="button" role="tab">
                                    {{ $language->name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                    
                    <div class="tab-content mt-3" id="languageTabContent">
                        @foreach ($languages as $language)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
                             id="lang-{{ $language->code }}" 
                             role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label">{{ translate('Bio') }} ({{ $language->name }})</label>
                                <textarea class="editor"  
                                          name="translations[{{ $language->code }}][bio]"
                                          ></textarea>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">{{ translate('Save Changes') }}</button>
                </form>
            </div>
        </div>
    </div>
    

	<!-- Bootstrap JS -->
	<script src="/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.editor').forEach(function(element) {
                CKEDITOR.replace(element, {
                    height: 300,
                    filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                    filebrowserUploadMethod: 'form',
                    removeButtons: 'PasteFromWord'
                });
            });

            document.querySelectorAll('[data-bs-toggle="tab"]').forEach(function(button) {
                button.addEventListener('shown.bs.tab', function() {
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].resize();
                    }
                });
            });
        });
    </script>
</body>

</html>
