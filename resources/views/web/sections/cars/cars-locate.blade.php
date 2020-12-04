@extends('web.layout')

@section('title', 'cars')

@section('style')
    <link href="{{ asset('css/cars.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container cars-container" id="newCar-form">
        <h1>Agregar/localizar vehículo</h1>
        <form class="formVehiculo" action="{{route('cars.locate')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="PATENTE">Patente</label>
                <input name="PATENTE" type="text" class="form-control" id="PATENTE" value='{{old('PATENTE')}}' required>
            </div>
            @error('PATENTE')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group datosVehiculo d-none">
                <label for="ANIO">Año</label>
                <input name="ANIO" type="text" class="form-control" id="ANIO" value={{old('ANIO')}}>
            </div>
            @error('ANIO')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group datosVehiculo d-none">
                <label for="MARCA">Marca</label>
                <input name ="MARCA" type="text" class="form-control" id="MARCA" value={{old('MARCA')}}>
            </div>
            @error('MARCA')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group datosVehiculo d-none">
                <label for="MODELO">Modelo</label>
                <input name ="MODELO" type="text" class="form-control" id="MODELO" value={{old('MODELO')}}>
            </div>
            @error('MODELO')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group datosVehiculo d-none">
                <label for="VIN">VIN</label>
                <input name="VIN" type="text" class="form-control" id="VIN" value={{old('VIN')}}>
            </div>
            @error('VIN')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group datosVehiculo d-none">
                <label for="NUMERO_MOTOR">Número de motor</label>
                <input name="NUMERO_MOTOR" type="text" class="form-control" id="NUMERO_MOTOR" value={{old('NUMERO_MOTOR')}}>
            </div>
            @error('NUMERO_MOTOR')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <div class="form-group">
                <input class="btn btn-secondary" type="submit" value="Enviar">
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/cars-locate.js') }}"></script>
@endsection


