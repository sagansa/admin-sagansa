<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="https://yt3.ggpht.com/yti/APfAmoGttBvvoOAMsBnAXftYUi5cJIEFmqfHEjEs8zh7=s88-c-k-c0x00ffffff-no-rj-mo"
            alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->avatar_url }}" id="profileImage" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" x-ref="username">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.appointments') }}"
                        class="nav-link {{ request()->is('admin/appointments*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Appointments
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.settings') }}"
                        class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a x-ref="profileLink" href="{{ route('admin.profile.edit') }}"
                        class="nav-link {{ request()->is('admin/profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Data Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}"
                                class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products') }}"
                                class="nav-link {{ request()->is('admin/products') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.units') }}"
                                class="nav-link {{ request()->is('admin/units') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Units</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.bank-accounts') }}"
                                class="nav-link {{ request()->is('admin/bank-accounts') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bank Accounts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.material-categories') }}"
                                class="nav-link {{ request()->is('admin/material-categories') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Material Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.online-categories') }}"
                                class="nav-link {{ request()->is('admin/online-categories') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Online Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.franchise-categories') }}"
                                class="nav-link {{ request()->is('admin/franchise-categories') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Franchise Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.restaurant-categories') }}"
                                class="nav-link {{ request()->is('admin/restaurant-categories') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Restaurant Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
