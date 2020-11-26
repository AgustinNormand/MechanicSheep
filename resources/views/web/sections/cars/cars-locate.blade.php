@extends('web.layout')

@section('title', 'cars')

@section('style')
    <link href="{{ asset('css/cars.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container cars-container" id="newCar-form">
        <h1>Agregar/localizar vehículo</h1>
        <form action="{{route('cars.locate')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="PATENTE">Patente</label>
                <input name="PATENTE" type="text" class="form-control" id="PATENTE" value={{old('PATENTE')}}>
            </div>
            @error('PATENTE')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group">
                <a href="#" role="button"> <button type="submit" class="btn btn-secondary">Enviar</button> </a>
            </div>

            <div class="form-group">
                <label for="ANIO">Año</label>
                <input name="ANIO" type="text" class="form-control" id="ANIO" value={{old('ANIO')}}>
            </div>
            @error('ANIO')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" value={{old('MODELO')}}>
            </div>
            @error('MODELO')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group">
                <label for="VIN">VIN</label>
                <input name="VIN" type="text" class="form-control" id="VIN" value={{old('VIN')}}>
            </div>
            @error('VIN')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group">
                <label for="NUMERO_MOTOR">Número de motor</label>
                <input name="NUMERO_MOTOR" type="text" class="form-control" id="NUMERO_MOTOR" value={{old('NUMERO_MOTOR')}}>
            </div>
            @error('NUMERO_MOTOR')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group">
                <a href="#" role="button"> <button type="submit" class="btn btn-secondary">Enviar</button> </a>
            </div>
        </form>
    </div>

@endsection
