@extends('web.layout')

@section('title', 'Appointment')

@section('style')
    <link href="{{ asset('css/appointment.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" id="app-form">
        <h1>Solicitud de turno</h1>
        <form action="{{route('appointments.store')}}" method="post">

            @csrf

            <div class="form-group">
                <label for="myCar">Seleccione un vehículo</label>
                <select name="select_vehiculo" class="form-control" id="myCar" required>
                    @foreach ($vehiculos as $vehiculo)
                        {{$selected = old('select_vehiculo') == $vehiculo->ID_VEHICULO ? 'selected' : ''}}
                        @if ($vehiculoSeleccionado == $vehiculo->ID_VEHICULO and $selected == '')
                            {{$selected = "selected"}}
                        @endif
                        <option value={{$vehiculo->ID_VEHICULO}} {{$selected}}>
                            {{$vehiculo->PATENTE}} - {{$vehiculo->modelo->marca->RAZON_SOCIAL}} - {{$vehiculo->modelo->NOMBRE_FANTASIA}}
                        </option>
                    @endforeach
                </select>
                @error('select-vehiculo')
                    <small>*{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="service">Seleccione un servicio</label>
                <select name="select_servicios" class="form-control" id="service" required>
                    @foreach ($servicios as $servicio)
                        {{$selected = old('select_servicios') == $servicio->ID_SERVICIO ? 'selected' : ''}}
                        <option value="{{$servicio->ID_SERVICIO}}" {{$selected}}>
                            {{$servicio->NOMBRE}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group d-none" id="problemaDelAuto">
                <label for="problem">Cual es el problema en su auto?</label>
                <textarea name="problem" class="form-control" id="problem" rows="1"></textarea>
            </div>

            @error('problem')
                    <small>*{{$message}}</small>
                @enderror

            <label for="time-preference">Seleccione una preferencia horaria *</label>
            <div class="container" id="time-preference">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                            <p>Lunes</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="preferencia_horaria[]" class="form-check-input" type="checkbox" value="Lunes-8hs" @if( is_array(old('preferencia_horaria')) && in_array('Lunes-8hs', old('preferencia_horaria'))) checked @endif>
                            <label class="form-check-label" for="monday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="preferencia_horaria[]" class="form-check-input" type="checkbox" value="Lunes-14hs" @if( is_array(old('preferencia_horaria')) && in_array('Lunes-14hs', old('preferencia_horaria'))) checked @endif>
                            <label class="form-check-label" for="monday-2">
                                2 PM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                                <p>Martes</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="preferencia_horaria[]" class="form-check-input" type="checkbox" value="Martes-8hs" @if( is_array(old('preferencia_horaria')) && in_array('Martes-8hs', old('preferencia_horaria'))) checked @endif>
                            <label class="form-check-label" for="tuesday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="preferencia_horaria[]" class="form-check-input" type="checkbox" value="Martes-14hs" @if( is_array(old('preferencia_horaria')) && in_array('Martes-14hs', old('preferencia_horaria'))) checked @endif>
                            <label class="form-check-label" for="tuesday-2">
                                2 PM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                                <p>Miercoles</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="preferencia_horaria[]" class="form-check-input" type="checkbox" value="Miercoles-8hs" @if( is_array(old('preferencia_horaria')) && in_array('Miercoles-8hs', old('preferencia_horaria'))) checked @endif>
                            <label class="form-check-label" for="wednesday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="preferencia_horaria[]" class="form-check-input" type="checkbox" value="Miercoles-14hs" @if( is_array(old('preferencia_horaria')) && in_array('Miercoles-14hs', old('preferencia_horaria'))) checked @endif>
                            <label class="form-check-label" for="wednesday-2">
                                2 PM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                                <p>Jueves</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="preferencia_horaria[]" class="form-check-input" type="checkbox" value="Jueves-8hs" @if( is_array(old('preferencia_horaria')) && in_array('Jueves-8hs', old('preferencia_horaria'))) checked @endif>
                            <label class="form-check-label" for="thursday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="preferencia_horaria[]" class="form-check-input" type="checkbox" value="Jueves-14hs" @if( is_array(old('preferencia_horaria')) && in_array('Jueves-14hs', old('preferencia_horaria'))) checked @endif>
                            <label class="form-check-label" for="thursday-2">
                                2 PM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                                <p>Viernes</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="preferencia_horaria[]" class="form-check-input" type="checkbox" value="Viernes-8hs" @if( is_array(old('preferencia_horaria')) && in_array('Viernes-8hs', old('preferencia_horaria'))) checked @endif>
                            <label class="form-check-label" for="friday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="preferencia_horaria[]" class="form-check-input" type="checkbox" value="Viernes-14hs" @if( is_array(old('preferencia_horaria')) && in_array('Viernes-14hs', old('preferencia_horaria'))) checked @endif>
                            <label class="form-check-label" for="friday-2">
                                2 PM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                            <button type="button" class="btn btn-secondary btn-sm" id="buttonAny">Cualquier dia y horario</button>
                        </div>
                    </div>
                </div>
            </div>

            @error('preferencia_horaria')
                <small>*{{$message}}</small>
            @enderror

            <div class="form-group">
                <label for="additional-comments">Comentarios/Aclaraciones adicionales</label>
                <textarea name="additional-comments" class="form-control" id="additional-comments" rows="3"></textarea>
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

@section('scripts')
    <script src="{{ asset('js/appointments-request.js') }}"></script>
@endsection
