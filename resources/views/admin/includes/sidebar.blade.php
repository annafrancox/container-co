<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-x: hidden; background-color: #222222;">
    <span>
        <a href="{{ route('dashboard') }}" id="link-logo" class="brand-link icone-img link-logo">
            <span class="fa-stack">
                <img src="{{ asset('img/sidebar-logo-fechada.png') }}" id="img-logo-close" class="brand-image display-none mt-1">
                <img src="{{ asset('img/sidebar-logo.png') }}" id="img-logo" class="img-logo">
            </span>
        </a>
    </span>

    <div class="sidebar">
        <div class="user-panel pb-2 pt-2 d-flex">
            <div class="image">
                <a href="{{ route('users.show', Auth::user()->id ) }}">
                    <img src="{{ asset( Auth::user()->profile_path ) }}" class="img-circle" alt="User Image">
                </a>
            </div>
            <div class="info">
                <a href="{{ route('users.show', Auth::user()->id ) }}" class="d-block">{{ collect(explode(' ', Auth::user()->name))->slice(0, 2)->implode(' ') }}</a>
            </div>
            <div class="info align-self-center">
                <form id="logout-form" method="post" action="{{ route('logout') }}">
                    @csrf
                    <button style="background-color: #222222;" class="btn-dark border-0" type="submit"><a href="" onclick="$('#logout-form').submit()" class="d-block"><i class="nav-icon fas fa-power-off"></i></a></button>
                </form>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            </ul>
            @can('create', App\Models\User::class)
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="{{ route('users.index') }}" class="nav-link {{ Route::is('users.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Usuários</p>
                        </a>
                    </li>
                </ul>
            @else
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('users.edit', Auth::user()->id) }}" class="nav-link {{  Route::is('users.edit', Auth::user()->id) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Meu Perfil</p>
                    </a>
                </li>
            </ul>
            @endcan
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('categories.index') }}" class="nav-link {{  Route::is('categories.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-filter"></i>
                        <p>Categorias</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('containers.index') }}" class="nav-link {{  Route::is('containers.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Containers</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('products.index') }}" class="nav-link {{  Route::is('products.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>Produtos</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Fim Sidebar Menu -->

    </div>
</aside>
<!-- Fim Sidebar -->
