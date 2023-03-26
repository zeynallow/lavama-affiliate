<ul>
    <li>
        <div class="menu-title">
            {{auth()->user()?->getDefaultVendor()?->name}}
        </div>

        <ul>
            <li>
                <a href="{{route('app-vendor.dashboard')}}" {!! (\Request::route()->getName() == 'app-vendor.dashboard') ? 'class="active"' : null!!}>
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-bar-chart-box-line"></i></span>
                        <span>Analytics</span>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{route('app-vendor.programs')}}" {!! (\Request::route()->getName() == 'app-vendor.programs') ? 'class="active"' : null!!}>
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-radar-line"></i></span>
                        <span>Proqramlar</span>
                    </span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-apps-2-line"></i></span>
                        <span>Partynorlar</span>
                    </span>
                    <div class="menu-arrow"></div>
                </a>

                <ul class="submenu-children" data-level="1">
                    <li>
                        <a href="#">
                            <span>Qoşulma istəkləri</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span>Partnyorların siyahısı</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-apps-2-line"></i></span>
                        <span>Maliyyə</span>
                    </span>
                    <div class="menu-arrow"></div>
                </a>

                <ul class="submenu-children" data-level="1">
                    <li>
                        <a href="#">
                            <span>Köçürmələr</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span>Hesab</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-apps-2-line"></i></span>
                        <span>Kampaniyalar</span>
                    </span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-apps-2-line"></i></span>
                        <span>Ayarlar</span>
                    </span>
                    <div class="menu-arrow"></div>
                </a>

                <ul class="submenu-children" data-level="1">
                    <li>
                        <a href="#">
                            <span>Profil</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span>Şirkət məlumatları</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Tariflər</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Ödəniş və fakturalar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Kömək</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-apps-2-line"></i></span>
                        <span>İnteqrasiya</span>
                    </span>
                </a>
            </li>

        </ul>
    </li>

</ul>
