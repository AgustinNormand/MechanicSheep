<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta</a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Mis Vehiculos </a>
        <a class="dropdown-item" href="{{route('ListAp')}}">Mis Turnos</a>
        <a class="dropdown-item" href="#">Trabajos realizados</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">Cerrar sesión</a>
        <a class="dropdown-item" href="{{route('change.password')}}">Cambiar Contraseña</a>
        <form method="POST" id="logout-form" action="{{ route('logout') }}">
            @csrf
        </form>
    </div>
</li>

@if (Auth::check() and Auth::user()->isAdmin)
    @include('web.header.nav.administrator')
@endif

@if (Auth::check() and Auth::user()->isModerator or Auth::user()->isAdmin)
    @include('web.header.nav.moderator')
@endif
