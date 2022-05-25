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
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
        </li>
        <li class="nav-item">
            @can('homepage-crud')
            <a href="{{ route('homepages.index') }}" class="nav-link {{ request()->routeIs('homepages.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Homepage
            </p>
            </a>
            @endcan
        </li>
        <li class="nav-item">
            @can('about-crud')
            <a href="{{ route('abouts.index') }}" class="nav-link {{ request()->routeIs('abouts.*') || request()->routeIs('about_header.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-exclamation"></i>
            <p>
                Abouts
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            @endcan
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('about_header.index') }}" class="nav-link {{ request()->routeIs('about_header.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        About Header
                    </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('abouts.index') }}" class="nav-link {{ request()->routeIs('abouts.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        About List
                    </p>
                    </a>
                    @endcan
                </li>
            </ul>
        </li>
        <li class="nav-item">
            @can('delivery-crud')
            <a href="{{ route('deliveries.index') }}" class="nav-link {{ request()->routeIs('deliveries.*') || request()->routeIs('delivery_header.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-truck"></i>
            <p>
                Deliveries
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            @endcan
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('delivery_header.index') }}" class="nav-link {{ request()->routeIs('delivery_header.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        Delivery Header
                    </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('deliveries.index') }}" class="nav-link {{ request()->routeIs('deliveries.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Delivery List
                    </p>
                    </a>
                    @endcan
                </li>
            </ul>
        </li>
        <li class="nav-item">
            @can('vehicle-crud')
            <a href="{{ route('vehicles.index') }}" class="nav-link {{ request()->routeIs('vehicles.*') || request()->routeIs('vehicle_header.*') || request()->routeIs('album_vehicle.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-car"></i>
            <p>
                Vehicles
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            @endcan
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('vehicle_header.index') }}" class="nav-link {{ request()->routeIs('vehicle_header.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        Vehicle Header
                    </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('vehicles.index') }}" class="nav-link {{ request()->routeIs('vehicles.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Vehicle List
                    </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('album_vehicle.index') }}" class="nav-link {{ request()->routeIs('album_vehicle.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Album Vehicle
                    </p>
                    </a>
                    @endcan
                </li>
            </ul>
        </li>
        <li class="nav-item">
            @can('service-crud')
            <a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.*') || request()->routeIs('service_header.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tools"></i>
            <p>
                Services
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            @endcan
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('service_header.index') }}" class="nav-link {{ request()->routeIs('service_header.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        Service Header
                    </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Service List
                    </p>
                    </a>
                    @endcan
                </li>
            </ul>
        </li>
        <li class="nav-item">
            @can('blog-list')
            <a href="{{ route('posts.index') }}" class="nav-link {{ request()->routeIs('posts.*') || request()->routeIs('post_header.*') || request()->routeIs('categories.*') || request()->routeIs('comments.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
                Blog
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            @endcan
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    @can('blog-list')
                    <a href="{{ route('post_header.index') }}" class="nav-link {{ request()->routeIs('post_header.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        Blog Header
                    </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('blog-list')
                    <a href="{{ route('posts.index') }}" class="nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Blog List
                    </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('category-crud')
                    <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Category
                    </p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('comment-crud')
                    <a href="{{ route('comments.index') }}" class="nav-link {{ request()->routeIs('comments.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>
                        Comments
                    </p>
                    </a>
                    @endcan
                </li>
            </ul>
        </li>
        <li class="nav-item">
            @can('customer-crud')
            <a href="{{ route('customers.index') }}" class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-friends"></i>
                <p>
                    Customers
                </p>
            </a>
            @endcan
        </li>
        <li class="nav-item">
            @can('contact-crud')
            <a href="{{ route('contacts.index') }}" class="nav-link {{ request()->routeIs('contacts.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                    Contacts
                </p>
            </a>
            @endcan
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
