@extends('layout.app')
@section('main')
    <main class="hp-bg-color-dark-90 d-flex min-vh-100">
        <div
            class="hp-sidebar hp-bg-color-black-20 hp-bg-color-dark-90 border-end border-black-40 hp-border-color-dark-80">
            <div class="hp-sidebar-container">
                <div class="hp-sidebar-header-menu">
                    <div class="row justify-content-between align-items-end mx-0">
                        <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible">
                            <div class="hp-cursor-pointer">
                                <svg width="8" height="15" viewBox="0 0 8 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z"
                                        fill="#B2BEC3"></path>
                                    <path
                                        d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z"
                                        fill="#B2BEC3"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="w-auto px-0">
                            <div class="hp-header-logo d-flex align-items-center">
                                <a href="index.html" class="position-relative">
                                    <div
                                        class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center"
                                        style="width: 18px; height: 18px; top: -5px;">
                                        <svg class="hp-fill-color-dark-0" width="12" height="12" viewBox="0 0 12 12"
                                             fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z"
                                                fill="#2D3436"/>
                                        </svg>
                                    </div>

                                    <img class="hp-logo hp-sidebar-visible hp-dark-none"
                                         src="/app-assets/img/logo/logo-small.svg" alt="logo">
                                    <img class="hp-logo hp-sidebar-visible hp-dark-block"
                                         src="/app-assets/img/logo/logo-small-dark.svg" alt="logo">
                                    <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none"
                                         src="/app-assets/img/logo/logo.svg" alt="logo">
                                    <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block"
                                         src="/app-assets/img/logo/logo-dark.svg" alt="logo">
                                    <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none"
                                         src="/app-assets/img/logo/logo-rtl.svg" alt="logo">
                                    <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block"
                                         src="/app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
                                </a>

                                <span class="d-flex">
                                    <span
                                        class="hp-sidebar-hidden hp-caption fw-normal hp-text-color-primary-1">v1.0</span>
                                </span>
                            </div>
                        </div>

                    </div>

                    @include('merchant.partials.sidebar')

                </div>
            </div>
        </div>

        <div class="hp-main-layout">

            <header>
                <div class="row w-100 m-0">
                    <div class="col px-0">
                        <div class="row w-100 align-items-center justify-content-between position-relative">
                            <div class="col w-auto hp-flex-none hp-mobile-sidebar-button me-24 px-0"
                                 data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                                <button type="button" class="btn btn-text btn-icon-only">
                                    <i class="ri-menu-fill hp-text-color-black-80 hp-text-color-dark-30 lh-1"
                                       style="font-size: 24px;"></i>
                                </button>
                            </div>

                            <div
                                class="hp-header-text-info col col-lg-14 col-xl-16 hp-header-start-text d-flex align-items-center hp-horizontal-none">
                                <div class="d-flex overflow-hidden rounded-4 hp-bg-color-black-0 hp-bg-color-dark-100"
                                     style="min-width: 45px; width: 45px; height: 45px;">
                                    <img src="/app-assets/img/memoji/newspaper.svg" alt="Newspaper" height="80%"
                                         style="margin-top: auto; margin-left: auto;">
                                </div>

                                <p class="hp-header-start-text-item hp-input-label fw-normal hp-text-color-black-100 hp-text-color-dark-0 ms-12 mb-0 lh-1 d-flex align-items-center">
                                    Do you know the latest update of 2022?&nbsp;&nbsp;
                                    <span
                                        class="hp-text-color-primary-1">Our roadmap is alive for future updates.</span>
                                </p>
                            </div>


                            <div class="hp-header-search d-none col">
                                <input type="text" class="form-control" placeholder="Search..." id="header-search"
                                       autocomplete="off">
                            </div>

                            <div class="col hp-flex-none w-auto pe-0">
                                <div class="row align-items-center justify-content-end">
                                    @include('merchant.partials.notification')
                                    @include('merchant.partials.profile')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="offcanvas offcanvas-start hp-mobile-sidebar bg-black-20 hp-bg-dark-90" tabindex="-1"
                 id="mobileMenu" aria-labelledby="mobileMenuLabel" style="width: 256px;">
                <div class="offcanvas-header justify-content-between align-items-center ms-16 me-8 mt-16 p-0">
                    <div class="w-auto px-0">
                        <div class="hp-header-logo d-flex align-items-center">
                            <a href="index.html" class="position-relative">
                                <div
                                    class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center"
                                    style="width: 18px; height: 18px; top: -5px;">
                                    <svg class="hp-fill-color-dark-0" width="12" height="12" viewBox="0 0 12 12"
                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z"
                                            fill="#2D3436"/>
                                    </svg>
                                </div>

                                <img class="hp-logo hp-sidebar-visible hp-dark-none"
                                     src="/app-assets/img/logo/logo-small.svg" alt="logo">
                                <img class="hp-logo hp-sidebar-visible hp-dark-block"
                                     src="/app-assets/img/logo/logo-small-dark.svg" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none"
                                     src="/app-assets/img/logo/logo.svg" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block"
                                     src="/app-assets/img/logo/logo-dark.svg" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none"
                                     src="/app-assets/img/logo/logo-rtl.svg" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block"
                                     src="/app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
                            </a>

                            <a href="https://hypeople-studio.gitbook.io/yoda/change-log" target="_blank" class="d-flex">
                                <span
                                    class="hp-sidebar-hidden hp-caption fw-normal hp-text-color-primary-1">v.3.2</span>
                            </a>
                        </div>
                    </div>

                    <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden" data-bs-dismiss="offcanvas"
                         aria-label="Close">
                        <button type="button" class="btn btn-text btn-icon-only bg-transparent">
                            <i class="ri-close-fill lh-1 hp-text-color-black-80" style="font-size: 24px;"></i>
                        </button>
                    </div>
                </div>

                <div
                    class="hp-sidebar hp-bg-color-black-20 hp-bg-color-dark-90 border-end border-black-40 hp-border-color-dark-80">
                    <div class="hp-sidebar-container">
                        <div class="hp-sidebar-header-menu">
                            <div class="row justify-content-between align-items-end mx-0">
                                <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible">
                                    <div class="hp-cursor-pointer">
                                        <svg width="8" height="15" viewBox="0 0 8 15" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z"
                                                fill="#B2BEC3"></path>
                                            <path
                                                d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z"
                                                fill="#B2BEC3"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden">
                                    <div class="hp-cursor-pointer mb-4">
                                        <svg width="8" height="15" viewBox="0 0 8 15" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z"
                                                fill="#B2BEC3"></path>
                                            <path
                                                d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z"
                                                fill="#B2BEC3"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            @include('merchant.partials.sidebar')

                        </div>

                    </div>
                </div>
            </div>

            @yield('content')

            {{--            <footer class="w-100 py-18 px-16 py-sm-24 px-sm-32 hp-bg-color-black-20 hp-bg-color-dark-90">--}}
            {{--                <div class="row">--}}
            {{--                    <div class="col-12">--}}
            {{--                        <p class="hp-badge-text fw-semibold mb-0 text-center text-sm-start hp-text-color-dark-30">--}}
            {{--                            COPYRIGHT ©2021 Hypeople, All rights Reserved</p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </footer>--}}
        </div>
    </main>
@endsection
