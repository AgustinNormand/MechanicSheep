@extends('web.layout')

@section('title', 'cars')

@section('style')
    <link href="{{ asset('css/cars.css') }}" rel="stylesheet">
@endsection

@section('content')
    @foreach($vehiculos as $vehiculo)
        <p> Vehiculo: {{$vehiculo}}</p>
    @endforeach

    <div class="container cars-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Patente</th>
                <th scope="col">Año</th>
                <th scope="col">Opciones</th>
                <th scope="col">Turnos</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>{{$vehiculo->PATENTE}}</td>
                    <td>{{$vehiculo->ANIO}}</td>
                    <td>
                        <a href="{{route('cars.show', $vehiculo)}}" role="button"> <button type="button" class="btn btn-secondary btn-sm">Visualizar</button> </a>
                    </td>
                    <td>
                        <a href="#" role="button"> <button type="button" class="btn btn-secondary btn-sm">Pedir turno</button> </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr class="featurette-divider">
        <div class="container" id="newCar">
            <div id="newCar-border">
                <h3>Para agregar un nuevo vehículo presione aquí</h3>
                <a href="{{route('cars.locate')}}" role="button"> <button type="button" class="btn btn-secondary btn-lg">Agregar</button> </a>
            </div>
        </div>
    </div>


@endsection
