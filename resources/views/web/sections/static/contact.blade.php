@extends('web.layout')

@section('title', 'Contact')

@section('style')
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" id="contact-form">
        <h1>Contacto</h1>
        <form>
            <div class="form-group">
                <label for="fname">Nombre</label>
                <input type="text" class="form-control" id="fname" placeholder="Juan">
            </div>
            <div class="form-group">
                <label for="lname">Apellido</label>
                <input type="text" class="form-control" id="lname" placeholder="Perez">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="JuanPerez@example.com">
            </div>
            <div class="form-group">
                <label for="textConsult">Escriba aquí su consulta</label>
                <textarea class="form-control" id="textConsult" rows="3"></textarea>
            </div>
            <div class="form-group">
                <a href="#" role="button"> <button type="button" class="btn btn-secondary btn-lg">Enviar</button> </a>
            </div>
        </form>
    </div>
@endsection()
