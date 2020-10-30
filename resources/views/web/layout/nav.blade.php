<nav>
    <ul>
        <li><a href="{{route('home')}}">Pagina Principal</a></li>
        <li><a href="{{route('home')}}">Nosotros</a></li>

        @if (Auth::check())
            @include('web.layout.nav.logged')       
        @else
            @include('web.layout.nav.unlogged')
        @endif
    </ul>
</nav>