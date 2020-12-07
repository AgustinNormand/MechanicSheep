<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmacion turno</title>
    <!--<link href="{{ asset('css/contactUs.css') }}" rel="stylesheet">-->
</head>
    <body>
        <br>
        <p>Turno Confirmado</p>
        <p>Fecha: {{$fechaTurno}}</p>
        <p>Nombre: {{$turno->user->persona->NOMBRE}}</p>
        <p>Hacé click <a href="www.mechanicsheep.com.ar" target="_blank">acá</a> para ingresar a nuestro sitio.</p>
        <br>
        <p>Saludos,</p>
        <p>MechanicSheep, Agentes Oficiales Renault.</p>
    </body>
</html>
