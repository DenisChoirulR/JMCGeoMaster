<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold">JMCGeoMaster</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Page -->
        <li class="menu-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ Request::routeIs('provinces.index') ? 'active' : '' }}">
            <a href="{{ route('provinces.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-calendar"></i>
                <div>Province</div>
            </a>
        </li>
        <li class="menu-item {{ Request::routeIs('cities.index') ? 'active' : '' }}">
            <a href="{{ route('cities.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-calendar"></i>
                <div>City</div>
            </a>
        </li>
        <li class="menu-item {{ Request::routeIs('residents.index') ? 'active' : '' }}">
            <a href="{{ route('residents.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div>Resident</div>
            </a>
        </li>
        <li class="menu-item {{ Request::routeIs('reports.province') ? 'active' : '' }}">
            <a href="{{ route('reports.province') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div>Province Report</div>
            </a>
        </li>
        <li class="menu-item {{ Request::routeIs('reports.city') ? 'active' : '' }}">
            <a href="{{ route('reports.city') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div>City Report</div>
            </a>
        </li>
    </ul>
</aside>
