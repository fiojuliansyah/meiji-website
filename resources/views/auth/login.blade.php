@extends('layouts.guest')

@section('content')
{{-- <div class="auth-left d-lg-block d-none">
    <div class="d-flex align-items-center flex-column h-100 justify-content-center">
        <img src="/assets/images/auth/auth-img.png" alt="">
    </div>
</div>
<div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
    <div class="max-w-464-px mx-auto w-100">
        <div>
            <a href="index.html" class="mb-40 max-w-290-px">
                <img src="/assets/images/logo.png" alt="">
            </a>
            <h4 class="mb-12">Sign In to your Account</h4>
            <p class="mb-32 text-secondary-light text-lg">Welcome back! please enter your detail</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="icon-field mb-16">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="mage:email"></iconify-icon>
                </span>
                <input type="email" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Email">
            </div>
            <div class="position-relative mb-20">
                <div class="icon-field">
                    <span class="icon top-50 translate-middle-y">
                        <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                    </span> 
                    <input type="password" class="form-control h-56-px bg-neutral-50 radius-12" id="your-password" placeholder="Password">
                </div>
                <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#your-password"></span>
            </div>
            <div class="">
                <div class="d-flex justify-content-between gap-2">
                    <div class="form-check style-check d-flex align-items-center">
                        <input class="form-check-input border border-neutral-300" type="checkbox" value="" id="remeber">
                        <label class="form-check-label" for="remeber">Remember me </label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-primary-600 fw-medium">Forgot Password?</a>
                </div>
            </div>

            <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"> Sign In</button>

            <div class="mt-32 center-border-horizontal text-center">
                <span class="bg-base z-1 px-4">Or sign in with</span>
            </div>
            <div class="mt-32 d-flex align-items-center gap-3">
                <button type="button" class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50"> 
                    <iconify-icon icon="ic:baseline-facebook" class="text-primary-600 text-xl line-height-1"></iconify-icon>
                    Google
                </button>
                <button type="button" class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50"> 
                    <iconify-icon icon="logos:google-icon" class="text-primary-600 text-xl line-height-1"></iconify-icon>
                    Google
                </button>
            </div>
            <div class="mt-32 text-center text-sm">
                <p class="mb-0">Don’t have an account? <a href="{{ route('register') }}" class="text-primary-600 fw-semibold">Sign Up</a></p>
            </div>
            
        </form>
    </div>
</div> --}}
<div class="wrapper">
    <div class="authentication-header"></div>
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">
                        <img src="/assets/images/logo-img.png" width="180" alt="" />
                    </div>
                    <div class="card rounded-4">
                        <div class="card-body">
                            <div class="p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Sign in</h3>
                                    <p>Don't have an account yet? <a href="authentication-signup.html">Sign up here</a>
                                    </p>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="Email Address">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection