<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta</a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{route('profile')}}">Datos personales</a>
        <a class="dropdown-item" href="{{route('cars.index')}}">Mis Vehiculos </a>
        <a class="dropdown-item" href="{{route('appointments.index')}}">Mis Turnos</a>
        <!--<a class="dropdown-item" href="#">Trabajos realizados</a>-->
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

@if (Auth::user()->hasRole("ADMINISTRADOR"))
    @include('web.header.nav.administrator')
@endif

@if (Auth::user()->hasAnyRole(["ADMINISTRADOR", "MODERADOR"]))
    @include('web.header.nav.moderator')
@endif
