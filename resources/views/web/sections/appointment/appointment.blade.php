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
                <select name="select_vehiculo" class="form-control" id="myCar" required>
                    @foreach ($vehiculos as $vehiculo)
                        <option value={{$vehiculo->ID_VEHICULO}}>{{$vehiculo->PATENTE}} - {{$vehiculo->modelo->marca->RAZON_SOCIAL}} - {{$vehiculo->modelo->NOMBRE_FANTASIA}}</option>
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
                        <option value="{{$servicio/*Acá iria $servicio->ID_SERVICIO*/}}">{{$servicio}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="problem">Cual es el problema en su auto?</label>
                <textarea name="problem" class="form-control" id="problem" rows="1">Esto debería ocultarse si seleccionó "Service". Si selecionó "otro", deberia ser "required"</textarea>
            </div>

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
                            <input name="days_of_preference[]" class="form-check-input" type="checkbox" value="monday-8">
                            <label class="form-check-label" for="monday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="days_of_preference[]" class="form-check-input" type="checkbox" value="monday-2">
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
                            <input name="days_of_preference[]" class="form-check-input" type="checkbox" value="tuesday-8">
                            <label class="form-check-label" for="tuesday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="days_of_preference[]" class="form-check-input" type="checkbox" value="tuesday-2">
                            <label class="form-check-label" for="tuesday-2">
                                2 PM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check"> 
                                <p>Miércoles</p>     
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="days_of_preference[]" class="form-check-input" type="checkbox" value="wednesday-8">
                            <label class="form-check-label" for="wednesday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="days_of_preference[]" class="form-check-input" type="checkbox" value="wednesday-2">
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
                            <input name="days_of_preference[]" class="form-check-input" type="checkbox" value="thursday-8">
                            <label class="form-check-label" for="thursday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="days_of_preference[]" class="form-check-input" type="checkbox" value="thursday-2">
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
                            <input name="days_of_preference[]" class="form-check-input" type="checkbox" value="friday-8">
                            <label class="form-check-label" for="friday-8">
                                8 AM
                            </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="days_of_preference[]" class="form-check-input" type="checkbox" value="friday-2">
                            <label class="form-check-label" for="friday-2">
                                2 PM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check">
                            <input name="checkbox-any" class="form-check-input" type="checkbox" id="any">
                            <label class="form-check-label" for="any">
                                Cualquier día y horario
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @error('days-of-preference')
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


