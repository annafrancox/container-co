<aside class="main-sidebar elevation-4 sidebar-dark-primary"  style="overflow-x: hidden;">
    <span>
        <a href="/" class="brand-link">
            <img src="{{ asset('img/logo.png') }}" alt="" class="brand-image" >
        </a>
    </span>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="pb-1 mt-3 mb-3 user-panel d-flex">
            <div class="profilelogout info align-self-right">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-power-off"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 sidebarlink">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="/contentbox" class="nav-link {{ Route::is('contentbox.index') ? 'active' : '' }}">
                        <i class="pl-1 pr-2 fas fa-boxes"></i>
                        <p>
                            Boxes Zone
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="/users" class="nav-link {{ Route::is('user.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Usuários
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
