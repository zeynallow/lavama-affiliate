<ul>
    <li>
        <div class="menu-title">
            {{auth()->user()?->getDefaultMerchant()?->name}}
        </div>

        <ul>
            <li>
                <a href="{{route('merchant.dashboard')}}" {!! (\Request::route()->getName() == 'merchant.dashboard') ? 'class="active"' : null!!}>
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-bar-chart-box-line"></i></span>
                        <span>Analytics</span>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{route('merchant.programs')}}" {!! (\Request::route()->getName() == 'merchant.programs') ? 'class="active"' : null!!}>
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-radar-line"></i></span>
                        <span>Programs</span>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{route('merchant.campaigns')}}">
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-apps-2-line"></i></span>
                        <span>Campaigns</span>
                    </span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-apps-2-line"></i></span>
                        <span>Partners</span>
                    </span>
                    <div class="menu-arrow"></div>
                </a>

                <ul class="submenu-children" data-level="1">
                    <li>
                        <a href="#">
                            <span>Join requests</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span>Partners list</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-apps-2-line"></i></span>
                        <span>Finance</span>
                    </span>
                    <div class="menu-arrow"></div>
                </a>

                <ul class="submenu-children" data-level="1">
                    <li>
                        <a href="#">
                            <span>Transfers</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span>Account</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#">
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-apps-2-line"></i></span>
                        <span>Settings</span>
                    </span>
                    <div class="menu-arrow"></div>
                </a>

                <ul class="submenu-children" data-level="1">
                    <li>
                        <a href="#">
                            <span>Profile</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span>Merchant</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Plans</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Payment and invoices</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>FAQ</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-apps-2-line"></i></span>
                        <span>For developers</span>
                    </span>
                </a>
            </li>

        </ul>
    </li>

</ul>
