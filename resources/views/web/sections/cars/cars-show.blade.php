@extends('web.layout')

@section('title', 'cars')

@section('style')
    <link href="{{ asset('css/cars.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container cars-container">
        <h1>Datos del vehículo</h1>
        <div class="row">
            <div class="col-6">
                <form>
                    <div class="form-group">
                        <label for="patente">Patente</label>
                        <input type="text" class="form-control" id="patente" disabled value="{{$vehiculo->PATENTE}}">
                    </div>
                    <div class="form-group">
                        <label for="VIN">VIN</label>
                        <input type="text" class="form-control" id="VIN" value="{{$vehiculo->VIN}}">
                    </div>
                    <div class="form-group">
                        <label for="anio">Año</label>
                        <input type="text" class="form-control" id="anio" value="{{$vehiculo->ANIO}}">
                    </div>
                    <div class="form-group">
                        <label for="nro_motor">Número de motor</label>
                        <input type="email" class="form-control" id="nro_motor" value="{{$vehiculo->NUMERO_MOTOR}}">
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input type="email" class="form-control" id="modelo">
                    </div>
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="email" class="form-control" id="marca">
                    </div>
                </form>
            </div>
            <div class="col-6">
                <div class="container">
                    <a href="#" role="button"> <button type="submit" class="btn btn-secondary btn-lg">Guardar</button> </a>
                    <a href="{{route('jobs.show')}}" role="button"> <button type="submit" class="btn btn-secondary btn-lg">Ver trabajos</button> </a>
                </div>
            </div>
        </div>
    </div>
@endsection
