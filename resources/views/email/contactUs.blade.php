<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us - Appointment</title>
    <link href="{{ asset('css/contactUs.css') }}" rel="stylesheet">
</head>
    <body>
        <br>
        <p>Hola {{$nombre_persona}},</p>
        <p>¡Esperamos que te encuentres bien!</p>
        @if($esEstimado)
            <p>Según nuestros cálculos, tu {{ucfirst(strtolower($vehiculo->modelo->marca->RAZON_SOCIAL))}} {{ucfirst(strtolower($vehiculo->modelo->NOMBRE_FANTASIA))}} está cerca de su próximo service!.</p>
        @else
            <p>Ya pasó 1 año desde que realizaste el service a tu {{ucfirst(strtolower($vehiculo->modelo->marca->RAZON_SOCIAL))}} {{ucfirst(strtolower($vehiculo->modelo->NOMBRE_FANTASIA))}}, es necesario hacerle el próximo service!.</p>
        @endif
        <p>No te olvides que podes sacar un turno desde nuestro sitio web.</p>
        <p>Ingresá, registrate, y solicitanos un turno!.</p>
        <p>Hacé click <a href="www.mechanicsheep.com.ar" target="_blank">acá</a> para ingresar a nuestro sitio.</p>
        <br>
        <p>Saludos,</p>
        <p>MechanicSheep, Agentes Oficiales Renault.</p>
    </body>
</html>
