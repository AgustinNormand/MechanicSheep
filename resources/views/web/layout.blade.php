<!-- Esqueleto para todas las demás vistas -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MechanicSheep - @yield('title')</title>
    <!-- favicon -->
    <!-- estilos -->
</head>
<body>    
    @include('web.layout.header')

    <main>
        @yield('content')
    </main>
    
    @include('web.layout.footer')
</body>
</html>