<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('asset') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="{{ route('users.index') }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('homepages.index') }}" class="nav-link {{ request()->routeIs('homepages.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box"></i>
            <p>
                Homepage
            </p>
            </a>
        </li>
        <li class="nav-item">
            @can('user-list')
            <a href="{{ route('abouts.index') }}" class="nav-link {{ request()->routeIs('abouts.*') || request()->routeIs('about_headers.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
                About
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            @endcan
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('about_header.index') }}" class="nav-link {{ request()->routeIs('about_header.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-about_header"></i>
                    <p>
                        About Header
                    </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('abouts.index') }}" class="nav-link {{ request()->routeIs('abouts.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-tag"></i>
                    <p>
                        About List
                    </p>
                    </a>
                    @endcan
                </li>
            </ul>
        </li>
        <li class="nav-item">
            @can('user-list')
            <a href="{{ route('deliveries.index') }}" class="nav-link {{ request()->routeIs('deliveries.*') || request()->routeIs('deliveries.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
                Delivery
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            @endcan
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('delivery_header.index') }}" class="nav-link {{ request()->routeIs('delivery_header.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-about_header"></i>
                    <p>
                        Delivery Header
                    </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('deliveries.index') }}" class="nav-link {{ request()->routeIs('deliveries.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-tag"></i>
                    <p>
                        Delivery List
                    </p>
                    </a>
                    @endcan
                </li>
            </ul>
        </li>
        <li class="nav-item">
            @can('user-list')
            <a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.*') || request()->routeIs('services.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
                Service
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            @endcan
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('service_header.index') }}" class="nav-link {{ request()->routeIs('service_header.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-about_header"></i>
                    <p>
                        Service Header
                    </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-tag"></i>
                    <p>
                        Service List
                    </p>
                    </a>
                    @endcan
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('customers.index') }}" class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box"></i>
            <p>
                Pelanggan
            </p>
            </a>
        </li>
        <li class="nav-item">
            @can('user-list')
            <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
                Pengguna
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            @endcan
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Data Pengguna
                    </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('role-list')
                    <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-tag"></i>
                    <p>
                        Role Pengguna
                    </p>
                    </a>
                    @endcan
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt" style="color: rgb(184, 0, 0);"></i>
            <p>
                <span>Keluar</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </p>
            </a>
        </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
