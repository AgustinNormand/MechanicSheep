<nav>
    <ul>
        <li><a href="{{route('home')}}">Pagina Principal</a></li>
        @if (Auth::check())
            @include('web.layout.nav.logged')       
        @else
            @include('web.layout.nav.unlogged')
        @endif
        <li><a href="{{route('about')}}">Sobre Nosotros</a></li>
        <li><a href="{{route('faq')}}">Preguntas frecuentes</a></li>
        <li><a href="{{route('services')}}">Servicios disponibles</a></li>
        <li><a href="{{route('contact')}}">Contacto</a></li>
        
    </ul>
</nav>