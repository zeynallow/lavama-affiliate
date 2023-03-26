<div class="hover-dropdown-fade w-auto px-0 ms-6 position-relative">
    <div class="hp-cursor-pointer rounded-4 border hp-border-color-dark-80">
        <div class="rounded-3 overflow-hidden m-4 d-flex">
            <div class="avatar-item hp-bg-info-4 d-flex"
                 style="width: 32px; height: 32px;">
                <img src="/app-assets/img/memoji/user-avatar-4.png">
            </div>
        </div>
    </div>
    @php
        $user = auth()->user();
    @endphp
    @if($user)
        <div class="hp-header-profile-menu dropdown-fade position-absolute pt-18"
             style="top: 100%; width: 260px;">
            <div class="rounded hp-bg-black-0 hp-bg-dark-100 px-18 py-24">
            <span class="d-block h5 hp-text-color-black-100 hp-text-color-dark-0 mb-16">
                {{$user->fullname}}
                <span class="hp-badge-text fw-normal hp-text-color-dark-30">[{{$user->provider}}]</span>
            </span>

                <div class="divider mt-18 mb-16"></div>

                <div class="row">
                    <div class="col-12">
                        <a href="app-contact.html"
                           class="d-flex align-items-center fw-medium hp-p1-body my-4 py-8 px-10 hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 rounded"
                           target="_self"
                           style="margin-left: -10px; margin-right: -10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                 height="20" viewBox="0 0 24 24" fill="none"
                                 class="me-8">
                                <path
                                    d="M21.08 8.58v6.84c0 1.12-.6 2.16-1.57 2.73l-5.94 3.43c-.97.56-2.17.56-3.15 0l-5.94-3.43a3.15 3.15 0 0 1-1.57-2.73V8.58c0-1.12.6-2.16 1.57-2.73l5.94-3.43c.97-.56 2.17-.56 3.15 0l5.94 3.43c.97.57 1.57 1.6 1.57 2.73Z"
                                    stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M12 11a2.33 2.33 0 1 0 0-4.66A2.33 2.33 0 0 0 12 11ZM16 16.66c0-1.8-1.79-3.26-4-3.26s-4 1.46-4 3.26"
                                    stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                            <span>Explore Creators</span>
                        </a>
                    </div>

                    <div class="col-12">
                        <a href="page-knowledge-base-1.html"
                           class="d-flex align-items-center fw-medium hp-p1-body my-4 py-8 px-10 hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 rounded"
                           target="_self"
                           style="margin-left: -10px; margin-right: -10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                 height="20" viewBox="0 0 24 24" fill="none"
                                 class="me-8">
                                <path
                                    d="M8 2v3M16 2v3M3.5 9.09h17M21 8.5V17c0 3-1.5 5-5 5H8c-3.5 0-5-2-5-5V8.5c0-3 1.5-5 5-5h8c3.5 0 5 2 5 5Z"
                                    stroke="currentColor" stroke-width="1.5"
                                    stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M15.695 13.7h.009M15.695 16.7h.009M11.995 13.7h.01M11.995 16.7h.01M8.294 13.7h.01M8.294 16.7h.01"
                                    stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                            <span>Help Desk</span>
                        </a>
                    </div>
                </div>

                <div class="divider my-12"></div>

                <div class="row">
                    <div class="col-12">
                        <a href="page-pricing.html"
                           class="d-flex align-items-center fw-medium hp-p1-body py-8 px-10 hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 rounded"
                           target="_self"
                           style="margin-left: -10px; margin-right: -10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                 height="20" viewBox="0 0 24 24" fill="none"
                                 class="me-8">
                                <path
                                    d="M10 22h4c5 0 7-2 7-7V9c0-5-2-7-7-7h-4C5 2 3 4 3 9v6c0 5 2 7 7 7Z"
                                    stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M16.5 7.58v1c0 .82-.67 1.5-1.5 1.5H9c-.82 0-1.5-.67-1.5-1.5v-1c0-.82.67-1.5 1.5-1.5h6c.83 0 1.5.67 1.5 1.5Z"
                                    stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M8.136 14h.012M11.995 14h.012M15.854 14h.012M8.136 17.5h.012M11.995 17.5h.012M15.854 17.5h.012"
                                    stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                            <span>Pricing List</span>
                        </a>
                    </div>
                </div>

                <div class="divider mt-12 mb-18"></div>

                <div class="row">
                    <div class="col-12">
                        <a class="hp-p1-body fw-medium" href="profile-information.html">Account
                            Settings</a>
                    </div>

                    <div class="col-12 mt-24">
                        <a class="hp-p1-body fw-medium" href="{{route('auth.handleSignOut')}}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
