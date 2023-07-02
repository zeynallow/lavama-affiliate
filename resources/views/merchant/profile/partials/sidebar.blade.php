<div class="col hp-profile-menu py-24" style="flex: 0 0 240px;">
    <div class="w-100">
        <div class="hp-profile-menu-header mt-16 mt-lg-0 text-center">
            <div class="hp-menu-header-btn mb-12 text-end">
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

            <div class="d-flex justify-content-center">
                <div class="d-inline-block position-relative">
                    <div
                        class="avatar-item d-flex align-items-center justify-content-center rounded-circle"
                        style="width: 80px; height: 80px;">
                        <img src="../../../app-assets/img/memoji/memoji-1.png">
                    </div>

                    <span
                        class="position-absolute translate-middle badge rounded-pill bg-primary text-white border-none">
                                                    12
                                                </span>
                </div>
            </div>

            <h3 class="mt-24 mb-4">{{$user->full_name}}</h3>
            <span class="hp-p1-body">{{$user->email}}</span>
        </div>
    </div>

    <div class="hp-profile-menu-body pt-10 w-100 text-start mt-48 mt-lg-0">
        <ul class="me-n1 mx-lg-n12">
            <li class="mt-4 mb-16">
                <a href="{{route('merchant.profile.index')}}"
                   class="{{(request()->route()->getName() == 'merchant.profile.index') ? 'active' : null}} position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                    <i class="iconly-Curved-User me-16"></i>
                    <span>Personal Information</span>

                    <span
                        class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                        style="width: 2px;"></span>
                </a>
            </li>

            <li class="mt-4 mb-16">
                <a href="{{route('merchant.profile.notification')}}"
                   class=" {{(request()->route()->getName() == 'merchant.profile.notification') ? 'active' : null}} position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                    <i class="iconly-Curved-Notification me-16"></i>
                    <span>Notifications</span>

                    <span
                        class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                        style="width: 2px;"></span>
                </a>
            </li>


            <li class="mt-4 mb-16">
                <a href="{{route('merchant.profile.security')}}"
                   class="{{(request()->route()->getName() == 'merchant.profile.security') ? 'active' : null}} position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                    <i class="iconly-Curved-Password me-16"></i>
                    <span>Security</span>

                    <span
                        class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                        style="width: 2px;"></span>
                </a>
            </li>

        </ul>
    </div>

    <div class="hp-profile-menu-footer">
        <img src="/app-assets/img/pages/profile/menu-img.svg" alt="Profile Image">
    </div>
</div>

