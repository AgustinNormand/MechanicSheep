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
            <table id="tablaPending" class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">Fecha Solicitud</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($turnosPendientes as $turnoPendiente)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($turnoPendiente->FECHA_SOLICITUD)->format('j/m/Y')}}</td>
                        <td>{{$turnoPendiente->user->persona->NOMBRE}}</td>
                        <td>{{$turnoPendiente->vehiculo->modelo->NOMBRE_FANTASIA}}</td>
                        <td>{{$turnoPendiente->vehiculo->modelo->marca->RAZON_SOCIAL}}</td>
                        <td>{{$turnoPendiente->servicios->first()->NOMBRE}}</td>
                        <td>
                            <button type="button" data-target="#exampleModal_{{ ($turnoPendiente->ID_TURNO_P)}}" data-toggle="modal" class="btn btn-secondary btn-sm">Ver detalles</button>
                        </td>

                    </tr>

                    <div class="modal fade" id="exampleModal_{{ ($turnoPendiente->ID_TURNO_P) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="exampleModalLabel">Detalle de turno</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                        <h5 class="pt-mt-5 text-center">Horarios de Preferencia</h5>
                                        @foreach ($turnoPendiente->pref_hora_turno as $preferencia)
                                            <div class="form-group">
                                                <label for="recipient-name1" class="col-form-label ml-1"> Horario N°: {{ $loop->iteration }}</label>
                                                <div class="row justify-content-around">
                                                    <input type="text" class="form-control col-md-5" id="recipient-day{{ $loop->iteration }}" value="{{ $preferencia->DIA }}" readonly>
                                                    <input type="text" class="form-control col-md-5" id="recipient-hour{{ $loop->iteration }}" value="{{ $preferencia->HORA }}" readonly>
                                                </div>
                                            </div>
                                        @endforeach

                                        @if ($turnoPendiente->COMENTARIOS)
                                        <h5 class="text-center">Comentarios</h5>
                                        <div class="form-group">
                                            <textarea class="form-control" id="coments" readonly>{{$turnoPendiente->COMENTARIOS}}</textarea>
                                        </div>
                                        @endif

                                        <form action="{{route('moderator.appointments.set', $turnoPendiente)}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input class="form-control date-time-confirm" type="date" name="fecha_turno" id="fecha_turno" min={{ ($today)->format('Y-m-j') }}>
                                                <input class="form-control date-time-confirm" type="time" name="hora_turno" id="hora_turno">
                                                <button class="btn btn-secondary btn-sm form-control" type="submit">Confirmar</button>
                                            </div>
                                        </form>
                                        <form action="{{route('appointments.cancel', $turnoPendiente->ID_TURNO_P)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <div class="form-group">
                                                <button class="btn btn-secondary btn-sm form-control" onclick="return myFunction();" type="submit">Rechazar</button>
                                            </div>
                                        </form>

                                        <h5 class="text-center">Vehiculo</h5>

                                        <div class="form-group">
                                            <label for="patente" class="col-form-label">Patente:</label>
                                            <input type="text" class="form-control" id="patente" value="{{ $turnoPendiente->vehiculo->PATENTE }}" readonly>
                                        </div>


                                </div>

                                <div class="modal-footer justify-content-between">
                                    <a href="{{route('cars.show', $turnoPendiente->vehiculo->ID_VEHICULO)}}" role="button"> <button type="button" class="btn btn-secondary">Ver Vehiculo</button> </a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-moderator" id="ap-approved">
            <h3>Turnos Confirmados</h3>
            <table id="tablaApproved" class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">Fecha/Hora</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Servicio</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($turnosConfirmados as $turnoConfirmado)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($turnoConfirmado->FECHA_HORA)->format('j/m/Y H:i')}}</td>
                        <td>{{$turnoConfirmado->turno_pendiente->user->persona->NOMBRE}}</td>
                        <td>{{$turnoConfirmado->turno_pendiente->vehiculo->modelo->NOMBRE_FANTASIA}}</td>
                        <td>{{$turnoConfirmado->turno_pendiente->vehiculo->modelo->marca->RAZON_SOCIAL}}</td>
                        <td>{{$turnoConfirmado->turno_pendiente->servicios->first()->NOMBRE}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-moderator" id="ap-approved-cancel">
            <h3>Turnos Confirmados - Cancelados</h3>
            <table id="tableApprovedCancel" class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">Fecha/Hora</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Servicio</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($turnosConfirmadosCancelados as $turnoConfirmadoCancelado)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($turnoConfirmadoCancelado->FECHA_HORA)->format('j/m/Y H:i')}}</td>
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
            <table id="tablaPendingCancel" class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">Fecha Solicitud</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Visualizar</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($turnosPendientesCancelados as $turnoPendienteCancelado)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($turnoPendienteCancelado->FECHA_SOLICITUD)->format('j/m/Y')}}</td>
                        <td>{{$turnoPendienteCancelado->user->persona->NOMBRE}}</td>
                        <td>{{$turnoPendienteCancelado->vehiculo->modelo->NOMBRE_FANTASIA}}</td>
                        <td>{{$turnoPendienteCancelado->vehiculo->modelo->marca->RAZON_SOCIAL}}</td>
                        <td>{{$turnoPendienteCancelado->servicios->first()->NOMBRE}}</td>
                        <td><a href="#" role="button"> <button type="button" class="btn btn-secondary btn-sm" data-target="#exampleModal_{{ ($turnoPendienteCancelado->ID_TURNO_P)}}" data-toggle="modal" >Ver detalles</button> </a></td>
                    </tr>

                    <div class="modal fade" id="exampleModal_{{ ($turnoPendienteCancelado->ID_TURNO_P) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="exampleModalLabel">Detalle de turno</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <h5 class="pt-mt-5 text-center">Horarios de Preferencia</h5>
                                    @foreach ($turnoPendienteCancelado->pref_hora_turno as $preferencia)
                                        <div class="form-group">
                                            <label for="recipient-name1" class="col-form-label ml-1"> Horario N°: {{ $loop->iteration }}</label>
                                            <div class="row justify-content-around">
                                                <input type="text" class="form-control col-md-5" id="recipient-day{{ $loop->iteration }}" value="{{ $preferencia->DIA }}" readonly>
                                                <input type="text" class="form-control col-md-5" id="recipient-hour{{ $loop->iteration }}" value="{{ $preferencia->HORA }}" readonly>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if ($turnoPendienteCancelado->COMENTARIOS)
                                        <h5 class="text-center">Comentarios</h5>
                                        <div class="form-group">
                                            <textarea class="form-control" id="coments" readonly>{{$turnoPendienteCancelado->COMENTARIOS}}</textarea>
                                        </div>
                                    @endif

                                    <h5 class="text-center">Vehiculo</h5>

                                    <div class="form-group">
                                        <label for="patente" class="col-form-label">Patente:</label>
                                        <input type="text" class="form-control" id="patente" value="{{ $turnoPendienteCancelado->vehiculo->PATENTE }}" readonly>
                                    </div>


                                </div>

                                <div class="modal-footer justify-content-between">
                                    <a href="{{route('cars.show', $turnoPendienteCancelado->vehiculo->ID_VEHICULO)}}" role="button"> <button type="button" class="btn btn-secondary">Ver Vehiculo</button> </a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/moderator-ap.js') }}"></script>
    <script>
        function myFunction() {
            if(!confirm("Esta seguro que desea cancelar?"))
            event.preventDefault();
        }
    </script>
@endsection
