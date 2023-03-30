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
                    <span class="d-block hp-p1-body hp-text-color-dark-0 hp-text-color-black-100 fw-medium mb-6"> SIGN UP FOR FREE </span>
                    <h1 class="mb-0 mb-sm-24">Create Account</h1>
                    <p class="mt-sm-8 mt-sm-0 text-black-60">Please sign up to your personal account if you want to use
                        all our premium products.</p>

                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                            @php
                                Session::forget('error');
                            @endphp
                        </div>
                    @endif

                    <form method="POST" action="{{route('auth.handleSignUp')}}" class="mt-16 mt-sm-32 mb-8">
                        @csrf
                        <div class="row mb-16">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="publisher" name="provider"
                                           id="provider_publisher"
                                           autocomplete="off"
                                           checked>
                                    <label class="form-check-label" for="provider_publisher">Publisher</label>
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

                        <div class="row mb-16">
                            <div class="col-6">
                                <label for="last_name" class="form-label">Last name :</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                       value="{{ old('last_name') }}">
                                @if ($errors->has('last_name'))
                                    <small class="text-danger">{{ $errors->first('last_name') }}</small>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="first_name" class="form-label">First name :</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                       value="{{ old('first_name') }}">
                                @if ($errors->has('first_name'))
                                    <small class="text-danger">{{ $errors->first('first_name') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="mb-16">
                            <label for="email" class="form-label">E-mail :</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
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

                        <div class="mb-16">
                            <label for="password_confirmation" class="form-label">Confirm Password :</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Sign Up
                        </button>

                    </form>

                    <div class="col-12 hp-form-info text-center">
                        <span
                            class="text-black-80 hp-text-color-dark-40 hp-caption me-4">Already have an account?</span>
                        <a class="text-primary-1 hp-text-color-dark-primary-2 hp-caption"
                           href="{{route('auth.signIn')}}">Login</a>
                    </div>

                    <div class="mt-48 mt-sm-96 col-12">
                        <p class="hp-p1-body text-center hp-text-color-black-60 mb-8"> Copyright 2023 Lavama</p>

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
