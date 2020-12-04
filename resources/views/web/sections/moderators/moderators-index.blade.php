@extends('web.layout')

@section('title', 'ListAp')

@section('style')
    <link href="{{ asset('css/list-ap.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" id="container-moderator">
        <h1 >Moderación de turnos</h1>

        <div class="btn-group" id="btn-moderator">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                Seleccione la lista de turnos que desea visualizar
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                <button data-value="ap-approved" class="dropdown-item" type="button">Turnos confirmados</button>
                <button data-value="ap-pending" class="dropdown-item" type="button">Turnos pendientes</button>
                <button data-value="ap-approved-cancel" class="dropdown-item" type="button">Turnos confirmados - cancelados</button>
                <button data-value="ap-pending-cancel" class="dropdown-item" type="button">Turnos pendientes - cancelados</button>
            </div>
        </div>

        <div class="table-moderator" id="ap-pending">
            <h3>Turnos Pendientes</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Fecha Solicitud</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($turnosPendientes as $turnoPendiente)
                    <tr>
                        <td>{{$turnoPendiente->FECHA_SOLICITUD}}</td>
                        <td>{{$turnoPendiente->user->persona->NOMBRE}}</td>
                        <td>{{$turnoPendiente->vehiculo->modelo->NOMBRE_FANTASIA}}</td>
                        <td>{{$turnoPendiente->vehiculo->modelo->marca->RAZON_SOCIAL}}</td>
                        <td>
                            <a href="#" role="button"> <button type="button" class="btn btn-secondary btn-sm">Ver detalles</button> </a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-moderator" id="ap-approved">
            <h3>Turnos Confirmados</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Servicio</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($turnosConfirmados as $turnoConfirmado)
                    <tr>
                        <td>{{$turnoConfirmado->FECHA_HORA}}</td>
                        <td>{{$turnoConfirmado->turno_pendiente->user->persona->NOMBRE}}</td>
                        <td>{{$turnoConfirmado->turno_pendiente->vehiculo->modelo->NOMBRE_FANTASIA}}</td>
                        <td>{{$turnoConfirmado->turno_pendiente->vehiculo->modelo->marca->RAZON_SOCIAL}}</td>
                        <td>{{$turnoConfirmado->turno_pendiente->servicios->NOMBRE}}</td>
                    </tr>
                  <p>{{$turnoConfirmado}}</p>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-moderator" id="ap-approved-cancel">
            <h3>Turnos Confirmados - Cancelados</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Servicio</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($turnosConfirmadosCancelados as $turnoConfirmadoCancelado)
                    <tr>
                        <td>{{$turnoConfirmadoCancelado->FECHA_HORA}}</td>
                        <td>{{$turnoConfirmadoCancelado->turno_pendiente->user->persona->NOMBRE}}</td>
                        <td>{{$turnoConfirmadoCancelado->turno_pendiente->vehiculo->modelo->NOMBRE_FANTASIA}}</td>
                        <td>{{$turnoConfirmadoCancelado->turno_pendiente->vehiculo->modelo->marca->RAZON_SOCIAL}}</td>
                        <td>{{$turnoConfirmadoCancelado->turno_pendiente->servicios->first()->NOMBRE}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-moderator" id="ap-pending-cancel">
            <h3>Turnos Pendientes - Cancelados</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Fecha Solicitud</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Visualizar</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($turnosPendientesCancelados as $turnoPendienteCancelado)
                    <tr>
                        <td>{{$turnoPendienteCancelado->FECHA_SOLICITUD}}</td>
                        <td>{{$turnoPendienteCancelado->user->persona->NOMBRE}}</td>
                        <td>{{$turnoPendienteCancelado->vehiculo->modelo->NOMBRE_FANTASIA}}</td>
                        <td>{{$turnoPendienteCancelado->vehiculo->modelo->marca->RAZON_SOCIAL}}</td>
                        <td><a href="#" role="button"> <button type="button" class="btn btn-secondary btn-sm">Ver detalles</button> </a></td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>

    </div>



    <h3>Turnos Pendientes</h3>
    @foreach ($turnosPendientes as $turnoPendiente)
        <p>{{$turnoPendiente}}
            {{$turnoPendiente->pref_hora_turno}}
            <form action="{{route('moderator.appointments.set', $turnoPendiente)}}" method="post">
                @csrf
                <input type="date" name="fecha_turno" id="fecha_turno">
                <input type="time" name="hora_turno" id="hora_turno">
                <button class="btn btn-secondary btn-sm" type="submit">Confirmar</button>
            </form>
        </p>
    @endforeach

@endsection

@section('scripts')
    <script src="{{ asset('js/moderator.js') }}"></script>
@endsection
