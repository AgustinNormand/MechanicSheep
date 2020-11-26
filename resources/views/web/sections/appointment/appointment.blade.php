@extends('web.layout')

@section('title', 'Appointment')

@section('style')
    <link href="{{ asset('css/appointment.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container" id="app-form">
        <h1>Solicitud de turno</h1>
        <form action="{{route('appointment.store')}}" method="post">

            @csrf

            <div class="form-group">
                <label for="myCar">Seleccione un vehículo</label>
                <select class="form-control" id="myCar">
                    @foreach ($vehiculos as $vehiculo)
                        <option>{{$vehiculo->PATENTE}} - {{$vehiculo->modelo->marca->RAZON_SOCIAL}} - {{$vehiculo->modelo->NOMBRE_FANTASIA}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="service">Seleccione un servicio</label>
                <select class="form-control" id="service">
                    <option>Service - 10.000km</option>
                    <option>Service - 20.000km</option>
                    <option>Service - 30.000km</option>
                    <option>Service - 40.000km</option>
                    <option>Service - 50.000km</option>
                    <option>Service - 60.000km</option>
                    <option>Service - 70.000km</option>
                    <option>Service - 80.000km</option>
                    <option>Service - 90.000km</option>
                    <option>Service - 100.000km</option>
                    <option>Service - 110.000km</option>
                    <option>Service - 120.000km</option>
                    <option>Otro servicio mecánico</option>
                </select>
            </div>

            <label for="time-preference">Seleccione una preferencia horaria *</label>
            <div class="container" id="time-preference">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="monday">
                            <label class="form-check-label" for="monday">
                                Lunes
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="monday-8">
                            <label class="form-check-label" for="monday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="monday-2">
                            <label class="form-check-label" for="monday-2">
                                2 PM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="tuesday">
                            <label class="form-check-label" for="tuesday">
                                Martes
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="tuesday-8">
                            <label class="form-check-label" for="tuesday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="tuesday-2">
                            <label class="form-check-label" for="tuesday-2">
                                2 PM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="wednesday">
                            <label class="form-check-label" for="wednesday">
                                Miércoles
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="wednesday-8">
                            <label class="form-check-label" for="wednesday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="wednesday-2">
                            <label class="form-check-label" for="wednesday-2">
                                2 PM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="thursday">
                            <label class="form-check-label" for="thursday">
                                Jueves
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="thursday-8">
                            <label class="form-check-label" for="thursday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="thursday-2">
                            <label class="form-check-label" for="thursday-2">
                                2 PM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="friday">
                            <label class="form-check-label" for="friday">
                                Viernes
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="friday-8">
                            <label class="form-check-label" for="friday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="friday-2">
                            <label class="form-check-label" for="friday-2">
                                2 PM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="any">
                            <label class="form-check-label" for="any">
                                Cualquier día y horario
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="additional-comments">Comentarios/Aclaraciones adicionales</label>
                <textarea class="form-control" id="additional-comments" rows="3"></textarea>
            </div>
            <div class="form-group">
                <input class="btn btn-secondary btn-lg" type="submit" value="Solicitar">
                <a href="{{route('profile')}}" role="button"> <button type="button" class="btn btn-secondary btn-lg">Cancelar</button> </a>
            </div>
        </form>
        <hr class="featurette-divider">
        <p>
            *Aclaración: La preferencia que usted seleccione aquí implica que su turno podría ser asignado la fecha más próxima disponible que encontremos
            en alguno de los días y horarios seleccionados.
        </p>
        <p>
            *Podrá cancelar su turno sin penalización hasta 48 hs previas al mismo.
        </p>
    </div>

@endsection


