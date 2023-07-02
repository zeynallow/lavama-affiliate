@extends('layout.main')
@section('content')
    @push('css')
        <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/page-profile.css">
    @endpush
    <div class="hp-main-layout-content">
        <div class="row mb-32 gy-32">

            <div class="col-12">
                <div
                    class="row hp-profile-mobile-menu-btn bg-black-0 hp-bg-color-dark-100 rounded py-12 px-8 px-sm-12 mb-16 mx-0">
                    <div class="d-inline-block" data-bs-toggle="offcanvas" data-bs-target="#profileMobileMenu"
                         aria-controls="profileMobileMenu">
                        <button type="button" class="btn btn-text btn-icon-only">
                            <i class="ri-menu-fill hp-text-color-black-80 hp-text-color-dark-30 lh-1"
                               style="font-size: 24px;"></i>
                        </button>
                    </div>
                </div>

                <div class="row bg-black-0 hp-bg-color-dark-100 rounded pe-16 pe-sm-32 mx-0">


                    @include('merchant.profile.partials.sidebar')

                    <div class="hp-profile-mobile-menu offcanvas offcanvas-start" tabindex="-1" id="profileMobileMenu"
                         aria-labelledby="profileMobileMenuLabel">
                        <div class="offcanvas-header">
                            <div class="hp-menu-header-btn text-end">
                                <div class="d-inline-block" id="profile-menu-dropdown" data-bs-toggle="dropdown"
                                     aria-expanded="false">
                                    <button type="button" class="btn btn-text btn-icon-only">
                                        <i class="ri-more-2-line text-black-100 hp-text-color-dark-30 lh-1"
                                           style="font-size: 24px;"></i>
                                    </button>
                                </div>

                                <ul class="dropdown-menu" aria-labelledby="profile-menu-dropdown">
                                    <li>
                                        <a class="dropdown-item" href="javascript:;">Change Avatar</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="d-inline-block" id="profile-menu-dropdown" data-bs-dismiss="offcanvas"
                                 aria-label="Close">
                                <button type="button" class="btn btn-text btn-icon-only">
                                    <i class="ri-close-fill text-black-80 lh-1" style="font-size: 24px;"></i>
                                </button>
                            </div>
                        </div>

                        <div class="offcanvas-body p-0">
                            @include('merchant.profile.partials.sidebar')
                        </div>
                    </div>

                    <div class="col ps-16 ps-sm-32 py-24 py-sm-32 overflow-hidden">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <h2>Security</h2>
                                <p class="hp-p1-body mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Curabitur sodales sit amet nunc et vehicula. Mauris sed lectus nisi.</p>
                            </div>

                            <div class="divider border-black-40 hp-border-color-dark-80"></div>

                            @include('partials.alert_validation')

                            <div class="col-12">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-12 col-md-6">
                                        <h3>Change Password</h3>
                                    </div>


                                    <div class="col-12 hp-profile-content-list mt-8">
                                        <form method="POST"
                                              action="{{route('merchant.profile.handleUpdatePassword')}}">
                                            @csrf

                                            <div class="mb-24">
                                                <label for="old_password" class="form-label">Old Password <span
                                                        class="text-danger">*</span></label>
                                                <input type="password" class="form-control" id="old_password"
                                                       name="old_password">
                                            </div>

                                            <div class="row mb-24">
                                                <div class="col-6">
                                                    <label for="password" class="form-label">New password <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" id="password"
                                                           name="password">
                                                </div>
                                                <div class="col-6">
                                                    <label for="password_confirmation" class="form-label">Confirm
                                                        Password <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" class="form-control"
                                                           id="password_confirmation"
                                                           name="password_confirmation">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Save</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
@push('js')
@endpush
