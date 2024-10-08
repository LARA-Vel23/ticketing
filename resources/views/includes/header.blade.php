<header class="header header-sticky p-0 mb-4">
    <div class="container-fluid border-bottom px-4">
        <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
            <i class="icon icon-lg cil-menu"></i>
        </button>
        <ul class="header-nav">
            {{-- <li class="nav-item py-1">
                <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li> --}}
            {{-- <li class="nav-item dropdown">
                <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
                    <i class="icon icon-lg theme-icon-active cil-contrast"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
                            <i class="icon icon-lg me-3 cil-sun"></i>Light
                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
                            <i class="icon icon-lg me-3 cil-moon"></i>Dark
                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
                            <i class="icon icon-lg me-3 cil-contrast"></i>Auto
                        </button>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item py-1">
                <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md">
                        <img class="avatar-img" src="https://picsum.photos/100/100" alt="{{ auth()->user()->email }}">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header text-light fw-semibold rounded-top mb-2" style="background: #212631 !important;">{{ __('Account') }}</div>
                    <a class="dropdown-item" href="javascript:void(0);">
                        <i class="cil-user me-2" style="font-size: 1em;"></i>
                        {{ __('Profile') }}
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                        <i class="bi bi-key me-2" style="font-size: 1em;"></i>
                        {{ __('Change Password') }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0);">
                        <i class="cil-arrow-thick-to-left me-2" style="font-size: 1em;"></i>
                        {{ __('Logout') }}
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <div class="container-fluid px-4">
        @yield('breadcrumbs')
    </div>
</header>
