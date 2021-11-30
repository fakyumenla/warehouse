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

    {{-- <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Transaction -->
    <li class="nav-item {{ Request::is('admin/histories') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('histories.list') }}">
            <i class="fas fa-poll-h"></i>
            <span>Histories</span></a>
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
