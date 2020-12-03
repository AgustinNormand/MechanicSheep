<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
    <!--<link href="{{ asset('css/contactUs.css') }}" rel="stylesheet">-->
</head>
<body>
    <span id="name"> Nuevo mensaje de contacto </span> <br><br>

    <p><strong>Nombre: </strong> {{$contacto['nombre']}}</p>
    <p><strong>Apellido: </strong> {{$contacto['apellido']}}</p>
    <p><strong>Email: </strong> {{$contacto['email']}}</p>
    <p><strong>Mensaje: </strong> {{$contacto['mensaje']}}</p>

</body>
</html>