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

                    @include('publisher.profile.partials.sidebar')

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
                            @include('publisher.profile.partials.sidebar')
                        </div>
                    </div>

                    <div class="col ps-16 ps-sm-32 py-24 py-sm-32 overflow-hidden">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <h2>Personal Informations</h2>
                                <p class="hp-p1-body mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Curabitur sodales sit amet nunc et vehicula. Mauris sed lectus nisi.</p>
                            </div>

                            <div class="divider border-black-40 hp-border-color-dark-80"></div>

                            @include('partials.alert_validation')

                            <div class="col-12">
                                <div class="row align-items-center justify-content-between">

                                    <div class="col-12 hp-profile-content-list mt-8 pb-0 pb-sm-120">
                                        @include('partials.alert_validation')

                                        <form method="POST" action="{{route('publisher.profile.handleUpdateProfile')}}">
                                            @csrf

                                            <div class="row mb-24">
                                                <div class="col-6">
                                                    <label for="name" class="form-label">Last Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="last_name"
                                                           name="last_name"
                                                           value="{{$user->last_name}}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="name" class="form-label">First Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="first_name"
                                                           name="first_name"
                                                           value="{{$user->first_name}}">
                                                </div>
                                            </div>

                                            <div class="row mb-24">
                                                <div class="col-6">
                                                    <label for="name" class="form-label">E-mail<span
                                                            class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                           value="{{$user->email}}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="name" class="form-label">Phone <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="phone" name="phone"
                                                           value="{{$user->phone}}">
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
