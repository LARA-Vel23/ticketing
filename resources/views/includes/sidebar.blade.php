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
        <li class="nav-item">
            <a class="nav-link {{ Request::is('home') ?? 'active' }}" href="{{ route('home') }}">
                <i class="nav-icon cil-speedometer"></i>
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin.index') ?? 'active' }}" href="{{ route('admin.index') }}">
                <i class="nav-icon cil-people"></i>
                {{ __('Admin') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('merchant.index') ?? 'active' }}" href="{{ route('merchant.index') }}">
                <i class="nav-icon cil-user"></i>
                {{ __('Merchant') }}
            </a>
        </li>
    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>
