<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion  shadow-test color-custom " id="accordionSidebar"
    style="z-index: 1">

    <!-- Sidebar - Brand -->
    <div class=" bg-light">
        <div class="sidebar-brand d-flex align-items-center justify-content-center my-3" href="/">
            <img class="w-75 rounded-circle" src="{{ URL::asset('img/logo.png') }}">
            {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> --}}
        </div>
    </div>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('/admin') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Nav Item - Transaction -->
    <li class="nav-item {{ Request::is('admin/histories') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('histories.list') }}">
            <i class="fas fa-poll-h"></i>
            <span>Transaction Histories</span></a>
    </li>

    <!-- Nav Item - Offices -->
    <li class="nav-item  {{ Request::is('admin/regions') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('regions.list') }}">
            <i class="fas fa-briefcase"></i>
            <span>Regions</span></a>
    </li>

    <!-- Nav Item - Offices -->
    <li class="nav-item  {{ Request::is('admin/offices') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('offices.list') }}">
            <i class="fas fa-briefcase"></i>
            <span>Offices</span></a>
    </li>

    <li class="nav-item  {{ Request::is('admin/types') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('types.list') }}">
            <i class="fas fa-briefcase"></i>
            <span>Types</span></a>
    </li>

    <!-- Nav Item - Items -->
    <li class="nav-item  {{ Request::is('admin/items') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('items.list') }}">
            <i class="fas fa-th-large"></i>
            <span>Items</span></a>
    </li>

    <!-- Nav Item - Employees -->
    <li class="nav-item  {{ Request::is('admin/employees') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('employees.list') }}">
            <i class="fas fa-users"></i>
            <span>Employees</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    {{-- <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!
        </p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>
<!-- End of Sidebar -->
