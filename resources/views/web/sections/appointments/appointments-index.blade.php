@extends('web.layout')

@section('title', 'ListAp')

@section('style')
    <link href="{{ asset('css/list-ap.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container listAp">
        <h1 class="tituloTurnos">Mis turnos</h1>
        <table id="tableMisTurnos" class="table table-hover table-striped table-bordered tablaTurnos">
            <thead class="text-center">
            <tr>
                <th scope="col">Fecha Solicitud</th>
                <th scope="col">Fecha Confirmada</th>
                <th scope="col">Estado</th>
                <th scope="col">Vehículo</th>
                <th scope="col">Servicio</th>
                <th scope="col">Acción</th>
            </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($turnos as $turno)
                    @if ($turno->turno_confirmado)
                        @if ($turno->turno_confirmado->ESTADO==1)
                            <tr>
                                <th scope="row">{{ $turno->FECHA_SOLICITUD }}</th>
                                <td>{{ $turno->turno_confirmado->FECHA_HORA }}</td>
                                <td>Confirmado</td>
                                <td>{{ $turno->vehiculo->PATENTE }}</td>
                                <td>{{ $turno->servicios->first()->NOMBRE }}</td>
                                <td>
                                    <div class="row justify-content-around">
                                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal_{{ ($turno->ID_TURNO_P)}}">Visualizar</button>
                                        <form action="{{route('appointments.cancel', $turno->ID_TURNO_P)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input class="btn btn-secondary btn-sm" type="submit" value="Cancelar">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @else
                            <tr class="turnoCancelado d-none">
                                <th scope="row">{{ $turno->FECHA_SOLICITUD }}</th>
                                <td>{{ $turno->turno_confirmado->FECHA_HORA }}</td>
                                <td>Cancelado</td>
                                <td>{{ $turno->vehiculo->PATENTE }}</td>
                                <td>{{ $turno->servicios->first()->NOMBRE }}</td>
                                <td>
                                    <div class="row justify-content-around">
                                        <button type="button" class="btn btn-secondary justify-content-start btn-sm" data-toggle="modal" data-target="#exampleModal_{{ ($turno->ID_TURNO_P)}}">Visualizar</button>
                                    </div>
                                </td>
                            </tr>
                        @endif

                        <div class="modal fade" id="exampleModal_{{ ($turno->ID_TURNO_P) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-center" id="exampleModalLabel">Detalle de turno</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form>
                                            <h5 class="text-center">Fecha Confirmada</h5>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="fecha" value="{{ $turno->turno_confirmado->FECHA_HORA }}" readonly>
                                            </div>

                                            <h5 class="text-center">Estado</h5>
                                            <div class="form-group">
                                                @if ($turno->turno_confirmado->ESTADO == 1)
                                                    <input type="text" class="form-control" id="estado" value="Confirmado" readonly>
                                                @else
                                                    <input type="text" class="form-control" id="estado" value="Rechazado" readonly>
                                                @endif
                                            </div>

                                            @if ($turno->COMENTARIOS)
                                                <h5 class="text-center">Comentarios</h5>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="comentsMisTurnos" readonly>{{$turno->COMENTARIOS}}</textarea>
                                                </div>
                                            @endif

                                            <h5 class="text-center">Servicio</h5>
                                            @foreach ($turno->servicios as $servicio)
                                                <div class="form-group">
                                                    <label for="servicio" class="col-form-label text-center"> Servicio N°: {{ $loop->iteration }}</label>
                                                    <input type="text" class="form-control" id="servicio" value="{{ $servicio->NOMBRE }}" readonly>
                                                </div>
                                            @endforeach

                                            <h5 class="text-center">Vehiculo</h5>

                                            <div class="form-group">
                                                <label for="patente" class="col-form-label">Patente:</label>
                                                <input type="text" class="form-control" id="patente" value="{{ $turno->vehiculo->PATENTE }}" readonly>
                                            </div>


                                        </form>
                                    </div>

                                    <div class="modal-footer justify-content-between">
                                        <a href="{{route('cars.show', $turno->vehiculo->ID_VEHICULO)}}" role="button"> <button type="button" class="btn btn-secondary">Ver Vehiculo</button> </a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                        @if($turno->ESTADO==0)
                            <tr class="turnoCancelado d-none">
                        @else
                            <tr>
                        @endif
                            <th scope="row">{{ $turno->FECHA_SOLICITUD }}</th>
                            <td> - </td>
                            <td>
                                @if ($turno->ESTADO==1)
                                    <p>Pendiente</p>
                                @else
                                    <p>Cancelado</p>
                                @endif
                            </td>
                            <td>{{ $turno->vehiculo->PATENTE }}</td>
                            <td>{{ $turno->servicios->first()->NOMBRE }}</td>
                            <td>
                                <div class="row justify-content-around">
                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal_{{ ($turno->ID_TURNO_P) }}">Visualizar</button>
                                    @if ($turno->ESTADO==1)
                                        <form action="{{route('appointments.cancel', $turno->ID_TURNO_P)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input class="btn btn-secondary btn-sm" type="submit" value="Cancelar">
                                        </form>
                                    @endif
                                </div>
                            </td>

                        </tr>

                        <div class="modal fade" id="exampleModal_{{ ($turno->ID_TURNO_P) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-center" id="exampleModalLabel">Detalle de turno</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form>
                                            <h5 class="pt-mt-5 text-center">Horarios de Preferencia</h5>
                                            @foreach ($turno->pref_hora_turno as $preferencia)
                                                <div class="form-group">
                                                    <label for="recipient-name1" class="col-form-label ml-1"> Horario N°: {{ $loop->iteration }}</label>
                                                    <div class="row justify-content-around">
                                                    <input type="text" class="form-control col-md-5" id="recipient-day{{ $loop->iteration }}" value="{{ $preferencia->DIA }}" readonly>
                                                    <input type="text" class="form-control col-md-5" id="recipient-hour{{ $loop->iteration }}" value="{{ $preferencia->HORA }}" readonly>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <h5 class="text-center">Estado</h5>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="estado" value="Pendiente" readonly>
                                            </div>

                                            @if ($turno->COMENTARIOS)
                                                <h5 class="text-center">Comentarios</h5>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="comentsMisTurnos" readonly>{{$turno->COMENTARIOS}}</textarea>
                                                </div>
                                            @endif

                                            <h5 class="text-center">Servicio</h5>
                                            @foreach ($turno->servicios as $servicio)
                                                <div class="form-group">
                                                    <label for="servicio" class="col-form-label text-center"> Servicio N°: {{ $loop->iteration }}</label>
                                                    <input type="text" class="form-control" id="servicio" value="{{ $servicio->NOMBRE }}" readonly>
                                                </div>
                                            @endforeach

                                            <h5 class="text-center">Vehiculo</h5>

                                            <div class="form-group">
                                                <label for="patente" class="col-form-label">Patente:</label>
                                                <input type="text" class="form-control" id="patente" value="{{ $turno->vehiculo->PATENTE }}" readonly>
                                            </div>

                                        </form>
                                    </div>

                                    <div class="modal-footer justify-content-between">
                                        <a href="{{route('cars.show', $turno->vehiculo->ID_VEHICULO)}}" role="button"> <button type="button" class="btn btn-secondary">Ver Vehiculo</button> </a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/appointments-index.js') }}"></script>
@endsection
