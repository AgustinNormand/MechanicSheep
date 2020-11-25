@extends('web.layout')

@section('title', 'cars')

@section('style')
    <link href="{{ asset('css/cars.css') }}" rel="stylesheet">
@endsection

@section('content')
<h1>"Complete el siguente formulario para crear un vehiculo.";</h1>

<form action="{{route('cars.store')}}" method="post">

    @csrf
    
    <label for="PATENTE">
        Patente: {{old('PATENTE')}} 
        <input hidden type="text" name="PATENTE" value={{old('PATENTE')}}>
    </label>

    @error('PATENTE')
        <br>
        <small>*{{$message}}</small>
        <br>
    @enderror

    <label for="VIN">
        Vin:
        <input type="text" name="VIN" value={{old('VIN')}}>
    </label>

    @error('VIN')
        <br>
        <small>*{{$message}}</small>
        <br>
    @enderror

    <label for="ANIO">
        Anio:
        <input type="text" name="ANIO" value={{old('ANIO')}}>
    </label>

    @error('ANIO')
        <br>
        <small>*{{$message}}</small>
        <br>
    @enderror

    <label for="NUMERO_MOTOR">
        Numero motor:
        <input type="text" name="NUMERO_MOTOR" value={{old('NUMERO_MOTOR')}}>
    </label>

    @error('NUMERO_MOTOR')
        <br>
        <small>*{{$message}}</small>
        <br>
    @enderror

    <label for="MODELO">
        Modelo:
        <input type="text" name="MODELO" value={{old('MODELO')}}>
    </label>

    @error('MODELO')
        <br>
        <small>*{{$message}}</small>
        <br>
    @enderror

    <br>
    <input type="submit" value="Enviar">
</form>
@endsection
