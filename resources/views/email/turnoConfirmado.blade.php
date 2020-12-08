<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmacion turno</title>
{{--    <link href="{{ asset('css/contactUs.css') }}" rel="stylesheet">--}}
</head>
    <body>
        <p> <strong>¡Hola {{$turno->user->persona->NOMBRE}} {{$turno->user->persona->APELLIDO}}! </strong></p>
        <p> <strong>Tú turno ha sido confirmado con éxito </strong></p>
        <p>Datos del turno:</p>
        <p>Fecha/hora: {{$fechaTurno}}</p>
        <p>Patente: {{$turno->vehiculo->PATENTE}}</p>
        <p>Modelo: {{$turno->vehiculo->modelo->NOMBRE_FANTASIA}}</p>
        <p>Marca: {{$turno->vehiculo->modelo->marca->RAZON_SOCIAL}}</p>
        <p>Servicio: {{$turno->servicios->first()->NOMBRE}}</p>
        <br>
        <p>* No olvide que ante cualquier inconveniente podrá cancelarlo hasta 48hs antes del mismo sin penalización</p>
        <p>Hacé click <a href="www.mechanicsheep.com.ar" target="_blank">acá</a> para ingresar a nuestro sitio.</p>
        <br>
        <p>Saludos,</p>
        <p>MechanicSheep, Agentes Oficiales Renault.</p>
    </body>
</html>
