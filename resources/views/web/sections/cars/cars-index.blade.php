@extends('web.layout')

@section('title', 'cars')

@section('style')
    <link href="{{ asset('css/cars.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1 class="tituloVehiculos">Mis vehiculos</h1>
    <div class="container cars-container">
        <table id="tableCars" class="table table-hover table-striped table-bordered">
            <thead>
            <tr class="text-center">
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
                        <div class="row justify-content-around">
                            <a href="{{route('cars.show', $vehiculo)}}" role="button"> <button type="button" class="btn btn-secondary btn-sm">Visualizar</button> </a>
                            <form action="{{route('cars.destroy', $vehiculo)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="row justify-content-around">
                            <a href="{{route('appointments.request', $vehiculo)}}" role="button"> <button type="button" class="btn btn-secondary btn-sm">Pedir turno</button> </a>
                        </div>
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

@section('scripts')
    <script src="{{ asset('js/cars-index.js') }}"></script>
@endsection
