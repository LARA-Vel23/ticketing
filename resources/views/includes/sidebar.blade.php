<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
      <div class="sidebar-brand">
        <div class="sidebar-brand-full">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="100">
        </div>
        <div class="sidebar-brand-narrow">
            <img src="{{ asset('images/logo_narrow.png') }}" alt="Logo" width="30">
        </div>
      </div>
      <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        @if(auth()->user()->is_admin)
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ?? 'active' }}" href="{{ route('home') }}">
                    <i class="nav-icon cil-speedometer"></i>
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li class="nav-title">{{ __('User Management') }}</li>
            <li class="nav-group" aria-expanded="false">
                <a class="nav-link nav-group-toggle" href="javascript:void(0);">
                    <i class="nav-icon cil-people"></i>
                    {{ __('User') }}
                </a>
                <ul class="nav-group-items compact" style="height: 0px;">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet">
                                </span>
                            </span>
                            {{ __('Admin') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('merchant.index') }}">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet">
                                </span>
                            </span>
                            {{ __('Merchant') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-group" aria-expanded="false">
                <a class="nav-link nav-group-toggle" href="javascript:void(0);">
                    <i class="nav-icon cil-lock-locked"></i>
                    {{ __('Security') }}
                </a>
                <ul class="nav-group-items compact" style="height: 0px;">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('role.index') }}">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet">
                                </span>
                            </span>
                            {{ __('Roles') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('permission.index') }}">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet">
                                </span>
                            </span>
                            {{ __('Permissions') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ip.index') }}">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet">
                                </span>
                            </span>
                            {{ __('IP Address') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-title">{{ __('Payment Management') }}</li>
            <li class="nav-group" aria-expanded="false">
                <a class="nav-link nav-group-toggle" href="javascript:void(0);">
                    <i class="nav-icon cil-list-rich"></i>
                    {{ __('Transaction') }}
                </a>
                <ul class="nav-group-items compact" style="height: 0px;">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet">
                                </span>
                            </span>
                            {{ __('Processing') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet">
                                </span>
                            </span>
                            {{ __('History') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-group" aria-expanded="false">
                <a class="nav-link nav-group-toggle" href="javascript:void(0);">
                    <i class="nav-icon cil-chart-line"></i>
                    {{ __('Reports') }}
                </a>
                <ul class="nav-group-items compact" style="height: 0px;">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet">
                                </span>
                            </span>
                            {{ __('Fund') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet">
                                </span>
                            </span>
                            {{ __('Balance') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);">
                    <i class="nav-icon cil-money"></i>
                    {{ __('Exchange Rate') }}
                </a>
            </li>
            <li class="nav-group" aria-expanded="false">
                <a class="nav-link nav-group-toggle" href="javascript:void(0);">
                    <i class="nav-icon cil-settings"></i>
                    {{ __('Configuration') }}
                </a>
                <ul class="nav-group-items compact" style="height: 0px;">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet">
                                </span>
                            </span>
                            {{ __('Bank') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('country.index') }}">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet">
                                </span>
                            </span>
                            {{ __('Country') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('currency.index') }}">
                            <span class="nav-icon">
                                <span class="nav-icon-bullet">
                                </span>
                            </span>
                            {{ __('Currency') }}
                        </a>
                    </li>
                </ul>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ?? 'active' }}" href="{{ route('dashboard') }}">
                    <i class="nav-icon cil-speedometer"></i>
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li class="nav-title">{{ __('Finance Management') }}</li>
            <li class="nav-item">
                <a class="nav-link {{ false ?? 'active' }}" href="javascript:void(0);">
                    <i class="nav-icon cil-money"></i>
                    {{ __('Transaction') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ false ?? 'active' }}" href="javascript:void(0);">
                    <i class="nav-icon cil-wallet"></i>
                    {{ __('Balance') }}
                </a>
            </li>
            <li class="nav-title">{{ __('Payment Management') }}</li>
            <li class="nav-item">
                <a class="nav-link {{ false ?? 'active' }}" href="javascript:void(0);">
                    <i class="nav-icon cil-bank"></i>
                    {{ __('Bank') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ false ?? 'active' }}" href="javascript:void(0);">
                    <i class="nav-icon cil-settings"></i>
                    {{ __('Service') }}
                </a>
            </li>
        @endif
        <li class="nav-title">{{ __('My Account') }}</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ auth()->user()->is_admin ? route('admin.profile') : route('profile') }}">
                <i class="nav-icon cil-user"></i>
                {{ __('Profile') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ auth()->user()->is_admin ? route('admin.profile.change_password') : route('profile.change_password') }}">
                <i class="nav-icon bi bi-key"></i>
                {{ __('Change Password') }}
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
            >
                <i class="nav-icon cil-power-standby"></i>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>
