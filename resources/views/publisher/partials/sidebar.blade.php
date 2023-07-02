<ul>
    <li>
        <div class="menu-title">
            {{auth()->user()?->getDefaultMerchant()?->name}}
        </div>

        <ul>
            <li>
                <a href="{{route('publisher.dashboard')}}" {!! (\Request::route()->getName() == 'merchant.dashboard') ? 'class="active"' : null!!}>
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-bar-chart-box-line"></i></span>
                        <span>Analytics</span>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{route('publisher.campaigns')}}">
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-apps-2-line"></i></span>
                        <span>Campaigns</span>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{route('publisher.merchants')}}">
                    <span>
                        <span class="submenu-item-icon"><i class="hp-text-color-dark-0 ri-2x ri-apps-2-line"></i></span>
                        <span>Merchants</span>
                    </span>
                </a>
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
                        <a href="{{route('publisher.settings.profile')}}">
                            <span>Profile</span>
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

        </ul>
    </li>

</ul>
