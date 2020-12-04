@extends('web.layout')

@section('title', 'Contact')

@section('style')
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection

@section('content')

    @if(!empty($successMsg))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ $successMsg }}</div>
    @endif

    <div class="container" id="contact-form">
        <h1>Contacto</h1>
        <form action="{{route('contact.store')}}" method="POST">

            @csrf

            <div class="form-group">
                <label for="fname">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="fname" required>
            </div>
            @error('nombre')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group">
                <label for="lname">Apellido</label>
                <input type="text" name="apellido" class="form-control" id="lname" required>
            </div>
            @error('apellido')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            @error('email')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group">
                <label for="textConsult">Escriba aquí su consulta</label>
                <textarea class="form-control" name="mensaje" id="textConsult" rows="3" required></textarea>
            </div>
            @error('mensaje')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group">
                <button type="submit" class="btn btn-secondary btn-lg">Enviar</button>
            </div>
        </form>
    </div>
@endsection()
