<li><a href="{{route('home')}}">Mi Cuenta</a></li>
<li><a href="{{route('home')}}">Mis Vehiculos</a></li>
<li><a href="{{route('home')}}">Mis Turnos</a></li>
<li><a href="{{route('home')}}">Trabajos</a></li>
@if (Auth::check() and Auth::user()->isAdmin)
    @include('layouts.partials.nav.admin')
@endif

@if (Auth::check() and Auth::user()->isModerator or Auth::user()->isAdmin)
    @include('layouts.partials.nav.moderator')
@endif 

<li>
    <a href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">Cerrar sesión </a>
</li>

<form method="POST" id="logout-form" action="{{ route('logout') }}">
    @csrf
</form>

