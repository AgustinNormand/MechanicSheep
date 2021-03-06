<nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <a class="navbar-brand" href="{{route('home')}}">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
            <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
        </svg>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            @if (Auth::check())
                @include('web.header.nav.logged')
            @else
                @include('web.header.nav.unlogged')
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{route('appointments.request')}}">Pedir turno</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('services')}}">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('faq')}}">Preguntas frecuentes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('contact.index')}}">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}">Acerca de nosotros</a>
            </li>
        </ul>
    </div>
</nav>

