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
                    <h1 class="mb-0 mb-sm-24">Login</h1>
                    <p class="mt-sm-8 mt-sm-0 text-black-60">Welcome back, please login to your account.</p>

                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                            @php
                                Session::forget('error');
                            @endphp
                        </div>
                    @endif

                    <form method="POST" action="{{route('auth.handleSignIn')}}" class="mt-16 mt-sm-32 mb-8">
                        @csrf

                        <div class="row mb-16">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="user" name="provider"
                                           id="provider_user"
                                           autocomplete="off"
                                           checked>
                                    <label class="form-check-label" for="provider_user">User</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="merchant" name="provider"
                                           id="provider_merchant"
                                           autocomplete="off">
                                    <label class="form-check-label" for="provider_merchant">Merchant</label>
                                </div>
                            </div>
                            @if ($errors->has('provider'))
                                <small class="text-danger">{{ $errors->first('provider') }}</small>
                            @endif
                        </div>

                        <div class="mb-16">
                            <label for="email" class="form-label">E-mail :</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @if ($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>

                        <div class="mb-16">
                            <label for="password" class="form-label">Password :</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @if ($errors->has('password'))
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            @endif
                        </div>

                        <div class="row align-items-center justify-content-between mb-16">
                            <div class="col hp-flex-none w-auto">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember_me">
                                    <label class="form-check-label ps-4" for="remember_me">Remember me</label>
                                </div>
                            </div>

                            <div class="col hp-flex-none w-auto">
                                <a class="hp-button text-black-80 hp-text-color-dark-40" href="#">Forgot
                                    Password?</a>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Sign In
                        </button>
                    </form>

                    <div class="col-12 hp-form-info text-center">
                        <span
                            class="text-black-80 hp-text-color-dark-40 hp-caption me-4">Don’t you have an account?</span>
                        <a class="text-primary-1 hp-text-color-dark-primary-2 hp-caption"
                           href="{{route('auth.signUp')}}">Create
                            an account</a>
                    </div>

                    <div class="mt-48 mt-sm-96 col-12">
                        <p class="hp-p1-body text-center hp-text-color-black-60 mb-8"> Copyright 2023 Lavama </p>

                        <div class="row align-items-center justify-content-center mx-n8">
                            <div class="w-auto hp-flex-none px-8 col">
                                <a href="#" class="hp-text-color-black-80 hp-text-color-dark-40"> Privacy
                                    Policy </a>
                            </div>

                            <div class="w-auto hp-flex-none px-8 col">
                                <a href="#" class="hp-text-color-black-80 hp-text-color-dark-40"> Term of
                                    use </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
