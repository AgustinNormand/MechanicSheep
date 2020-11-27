@extends('web.layout')

@section('title', 'ListAp')

@section('style')
    <link href="{{ asset('css/list-ap.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container listAp">
        <h1>Mis turnos</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Vehículo</th>
                <th scope="col">Servicio</th>
                <th scope="col">Acción</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($turnos as $turno)
                    @if ($turno->turno_confirmado)
                        <tr>
                            <th scope="row">{{ $turno->turno_confirmado->FECHA_HORA }}</th>
                            <td>Confirmado</td>
                            <td>{{ $turno->vehiculo->PATENTE }}</td>
                            <td>{{ $turno->servicios->first()->NOMBRE }}</td>
                            <td>
                                <a href="#" role="button"><button type="button" class="btn btn-secondary btn-sm">Visualizar</button> </a>
                                <a href="#" role="button"><button type="button" class="btn btn-secondary btn-sm">Cancelar</button> </a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <th scope="row">{{ $turno->FECHA_SOLICITUD }}</th>
                            <td>Pendiente</td>
                            <td>{{ $turno->vehiculo->PATENTE }}</td>
                            <td>{{ $turno->servicios->first()->NOMBRE }}</td>
                            <td>
                                <a href="#" role="button"><button type="button" class="btn btn-secondary btn-sm">Visualizar</button> </a>
                                <a href="#" role="button"><button type="button" class="btn btn-secondary btn-sm">Cancelar</button> </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

{{--
Acá hay que tener en cuenta la posibilidad de una paginación (o scroll infinito estaría mejor)
Y hay que agregar una condición para indicar un aviso que diga "no hay turnos registrados hasta el momento o bien, que muestre la tabla
--}}
@endsection
