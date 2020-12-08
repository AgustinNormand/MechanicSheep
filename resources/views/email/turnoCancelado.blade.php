<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cancelacion turno</title>
{{--    <link href="{{ asset('css/contactUs.css') }}" rel="stylesheet">--}}
</head>
    <body>
        <p> <strong>¡Hola {{$turno->user->persona->NOMBRE}} {{$turno->user->persona->APELLIDO}}! </strong></p>
        <p> <strong>Tú turno ha sido cancelado</strong></p>
        <br>
        <p>Hacé click <a href="www.mechanicsheep.com.ar" target="_blank">acá</a> para ingresar a nuestro sitio.</p>
        <br>
        <p>Saludos,</p>
        <p>MechanicSheep, Agentes Oficiales Renault.</p>
    </body>
</html>