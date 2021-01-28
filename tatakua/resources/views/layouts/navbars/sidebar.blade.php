<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Menu Principal') }}</p>
                </a>
            </li>
            <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i><img style="width:25px" src="{{ asset('/img/laravel.svg') }}"></i>
                    <p>{{ __('Pruebas') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> UP </span>
                                <span class="sidebar-normal">{{ __('Mi perfil de usuario') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> UM </span>
                                <span class="sidebar-normal"> {{ __('Administracion de Usuarios') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="material-icons">group</i>
                    <p>Usuarios</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'employee' ? ' active' : '' }}" >
                <a class="nav-link" href="#">
                    <i class="icon-sidebar" style="content: url('../img/employee.png');"></i>
                    <p>{{ __('Empleados') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'client' ? ' active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="icon-sidebar" style="content: url('../img/client.svg');"></i>
                    <p>{{ __('Clientes') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="icon-sidebar" style="content: url('../img/empanada.svg');"></i>
                    <p>{{ __('Productos') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="material-icons">notifications</i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="material-icons">language</i>
                    <p>{{ __('RTL Support') }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>
