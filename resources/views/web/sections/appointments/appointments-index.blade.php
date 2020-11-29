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
                        @if ($turno->turno_confirmado->ESTADO==1)
                            <tr>
                                <th scope="row">{{ $turno->turno_confirmado->FECHA_HORA }}</th>
                                <td>Confirmado</td>
                                <td>{{ $turno->vehiculo->PATENTE }}</td>
                                <td>{{ $turno->servicios->first()->NOMBRE }}</td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal_{{ ($turno->ID_TURNO_P)}}">Visualizar</button>
                                    <form action="{{route('appointments.cancel', $turno->ID_TURNO_P)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-secondary btn-sm" type="submit" value="Cancelar">
                                    </form>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <th scope="row">{{ $turno->turno_confirmado->FECHA_HORA }}</th>
                                <td>Cancelado</td>
                                <td>{{ $turno->vehiculo->PATENTE }}</td>
                                <td>{{ $turno->servicios->first()->NOMBRE }}</td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal_{{ ($turno->ID_TURNO_P)}}">Visualizar</button>
                                </td>
                            </tr>
                        @endif

                        <div class="modal fade" id="exampleModal_{{ ($turno->ID_TURNO_P) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detalle de turno</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="fecha" class="col-form-label">Fecha:</label>
                                                <input type="text" class="form-control" id="fecha" value="{{ $turno->turno_confirmado->FECHA_HORA }}" readonly>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="estado" class="col-form-label">Estado:</label>
                                                @if ($turno->turno_confirmado->ESTADO == 1)
                                                    <input type="text" class="form-control" id="estado" value="Confirmado" readonly>
                                                @else    
                                                    <input type="text" class="form-control" id="estado" value="Rechazado" readonly>
                                                @endif
                                            </div>
                
                                            <div class="form-group">
                                                <label for="modelo" class="col-form-label">Modelo:</label>
                                                <input type="text" class="form-control" id="modelo" value="{{ $turno->vehiculo->modelo->NOMBRE_FANTASIA }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="marca" class="col-form-label">Marca:</label>
                                                <input type="text" class="form-control" id="marca" value="{{ $turno->vehiculo->modelo->marca->RAZON_SOCIAL }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="patente" class="col-form-label">Patente:</label>
                                                <input type="text" class="form-control" id="patente" value="{{ $turno->vehiculo->PATENTE }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="vin" class="col-form-label">VIN:</label>
                                                <input type="text" class="form-control" id="vin" value="{{ $turno->vehiculo->VIN }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="anio" class="col-form-label">Año:</label>
                                                <input type="text" class="form-control" id="anio" value="{{ $turno->vehiculo->ANIO }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="numMotor" class="col-form-label">Numero de Motor:</label>
                                                <input type="text" class="form-control" id="numMotor" value="{{ $turno->vehiculo->NUMERO_MOTOR }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="comentarios" class="col-form-label">Comentarios:</label>
                                                <textarea class="form-control" id="comentarios" readonly>{{ $turno->COMENTARIOS }}</textarea>
                                            </div>
                
                                        </form>
                                    </div>               
            
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @else
                        <tr>
                            <th scope="row">{{ $turno->FECHA_SOLICITUD }}</th>
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
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal_{{ ($turno->ID_TURNO_P) }}">Visualizar</button>
                                @if ($turno->ESTADO==1)
                                    <form action="{{route('appointments.cancel', $turno->ID_TURNO_P)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-secondary btn-sm" type="submit" value="Cancelar">
                                    </form>
                                @endif
                            </td>

                        </tr>

                        <div class="modal fade" id="exampleModal_{{ ($turno->ID_TURNO_P) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detalle de turno</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Fecha:</label>
                                                <input type="text" class="form-control" id="recipient-name" value="{{ $turno->FECHA_SOLICITUD }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="estado" class="col-form-label">Estado:</label>
                                                <input type="text" class="form-control" id="estado" value="Pendiente" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="modelo" class="col-form-label">Modelo:</label>
                                                <input type="text" class="form-control" id="modelo" value="{{ $turno->vehiculo->modelo->NOMBRE_FANTASIA }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="marca" class="col-form-label">Marca:</label>
                                                <input type="text" class="form-control" id="marca" value="{{ $turno->vehiculo->modelo->marca->RAZON_SOCIAL }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="patente" class="col-form-label">Patente:</label>
                                                <input type="text" class="form-control" id="patente" value="{{ $turno->vehiculo->PATENTE }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="vin" class="col-form-label">VIN:</label>
                                                <input type="text" class="form-control" id="vin" value="{{ $turno->vehiculo->VIN }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="anio" class="col-form-label">Año:</label>
                                                <input type="text" class="form-control" id="anio" value="{{ $turno->vehiculo->ANIO }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="numMotor" class="col-form-label">Numero de Motor:</label>
                                                <input type="text" class="form-control" id="numMotor" value="{{ $turno->vehiculo->NUMERO_MOTOR }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="comentarios" class="col-form-label">Comentarios:</label>
                                                <textarea class="form-control" id="comentarios" readonly>{{ $turno->COMENTARIOS }}</textarea>
                                            </div>
                
                                        </form>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
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

@section('scripts')
<script>
    
</script>   
@endsection