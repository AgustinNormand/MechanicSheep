@extends('web.layout')

@section('title', 'cars')

@section('style')
    <link href="{{ asset('css/cars.css') }}" rel="stylesheet">
@endsection

@section('content')
<h1>"Complete el siguente formulario para localizar un vehiculo.";</h1>

<form action="{{route('cars.locate')}}" method="post">

    @csrf
    
    <label for="PATENTE">
        Patente:
        <input type="text" name="PATENTE" value={{old('PATENTE')}}>
    </label>

    @error('PATENTE')
        <br>
        <small>*{{$message}}</small>
        <br>
    @enderror

    <br>
    <input type="submit" value="Enviar">
</form>
@endsection
