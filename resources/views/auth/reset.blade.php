@extends('layout.app')
@section('main')
    <div class="row hp-authentication-page">
        <div class="hp-bg-black-20 hp-bg-color-dark-90 col-lg-6 col-12">
            <div class="row hp-image-row h-100 px-8 px-sm-16 px-md-0 pb-32 pb-sm-0 pt-32 pt-md-0">
                <div class="hp-logo-item m-16 m-sm-32 m-md-64 w-auto px-0 col-12">
                    <div class="hp-header-logo d-flex align-items-center">
                        @include('partials.logo')
                    </div>
                </div>

                <div class="col-12 px-0">
                    <div class="row h-100 w-100 mx-0 align-items-center justify-content-center">
                        <div class="hp-bg-item text-center mb-32 mb-md-0 px-0 col-12">
                            <img class="hp-dark-none m-auto w-100"
                                 src="/app-assets/img/pages/authentication/authentication-bg.svg"
                                 alt="Background Image">
                            <img class="hp-dark-block m-auto w-100"
                                 src="/app-assets/img/pages/authentication/authentication-bg-dark.svg"
                                 alt="Background Image">
                        </div>

                        <div class="hp-text-item text-center col-xl-9 col-12">
                            <h2 class="hp-text-color-black-100 hp-text-color-dark-0 mx-16 mx-lg-0 mb-16"> Very good
                                works are waiting for you </h2>
                            <p class="h4 mb-0 fw-normal hp-text-color-black-80 hp-text-color-dark-30"> Lorem Ipsum is
                                simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry's standard dummy text ever. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 py-sm-64 py-lg-0">
            <div class="row align-items-center justify-content-center h-100 mx-4 mx-sm-n32">
                <div class="col-12 col-md-9 col-xl-7 col-xxxl-5 px-8 px-sm-0 pt-24 pb-48">
                    <h1 class="mb-0 mb-sm-24">Reset Password</h1>
                    <p class="mt-sm-8 mt-sm-0 text-black-60">Email verification is done. Please choose another
                        password.</p>

                    <form class="mt-16 mt-sm-32 mb-8">
                        <div class="mb-24">
                            <label for="resetPassword" class="form-label">Password :</label>
                            <input type="password" class="form-control" id="resetPassword"
                                   placeholder="At least 6 characters">
                        </div>

                        <div class="mb-24">
                            <label for="resetConfirmPassword" class="form-label">Confirm Password :</label>
                            <input type="password" class="form-control" id="resetConfirmPassword"
                                   placeholder="At least 6 characters">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Reset Password
                        </button>
                    </form>

                    <div class="col-12 hp-form-info text-center">
                        <span class="text-black-80 hp-text-color-dark-40 hp-caption me-4">Go back to</span>
                        <a class="text-primary-1 hp-text-color-dark-primary-2 hp-caption"
                           href="auth-login.html">Login</a>
                    </div>

                    <div class="mt-48 mt-sm-96 col-12">
                        <p class="hp-p1-body text-center hp-text-color-black-60 mb-8"> Copyright 2021 Hypeople LTD. </p>

                        <div class="row align-items-center justify-content-center mx-n8">
                            <div class="w-auto hp-flex-none px-8 col">
                                <a href="javascript:;" class="hp-text-color-black-80 hp-text-color-dark-40"> Privacy
                                    Policy </a>
                            </div>

                            <div class="w-auto hp-flex-none px-8 col">
                                <a href="javascript:;" class="hp-text-color-black-80 hp-text-color-dark-40"> Term of
                                    use </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
