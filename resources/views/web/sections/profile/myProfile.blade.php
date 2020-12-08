@extends('web.layout')

@section('title', 'profile')

@section('style')
    <link href="{{ asset('css/myProfile.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" id="profile-form">
        <h1>Datos personales</h1>
        <div class="form-group">
            <button type="button" class="btn btn-secondary btn-lg" id="boton-modificar">Modificar</button>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <form action="{{ route('profile.update')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <fieldset disabled>
                            <div class="form-group">
                                <label for="fname">Nombre</label>
                                <input type="text" id="fname" name="fname" class="form-control" placeholder="Nombre" value="{{$persona->NOMBRE}}" required>
                            </div>
                            <div class="form-group">
                                <label for="lname">Apellido</label>
                                <input type="text" id="lname" name="lname" class="form-control" placeholder="Apellido" value="{{$persona->APELLIDO}}" required>
                            </div>
                            <!--<div class="form-group">
                                <label for="tdoc">Tipo Documento</label>
                                <input type="text" id="tdoc" name="tdoc" class="form-control" placeholder="Tipo Documento" value="{{$persona->tipo_doc->NOMBRE}}">
                            </div>-->
                            <div class="form-group">
                                <label for="tdoc">Tipo Documento</label>
                                <select name="tdoc" class="form-control" required>
                                    @foreach($tiposDeDoc as $tipoDeDoc)
                                    @if($tipoDeDoc->NOMBRE == $persona->tipo_doc->NOMBRE)
                                        <option value="{{$tipoDeDoc->ID_TIPO_DOC}}" selected>{{$tipoDeDoc->NOMBRE}}</option>
                                    @else
                                        <option value="{{$tipoDeDoc->ID_TIPO_DOC}}">{{$tipoDeDoc->NOMBRE}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ndoc">Nro Documento</label>
                                <input type="number" id="ndoc" name="ndoc" class="form-control" placeholder="Nro Documento" value="{{$persona->NRO_DOC}}" required>
                            </div>
                            <div class="form-group">
                                <label for="born">Fecha Nacimiento</label>
                                <input type="date" id="born" name="born" class="form-control" placeholder="yyyy-mm-dd" value="{{$persona->FECHA_NAC}}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{$persona->EMAIL}}" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary btn-lg">Guardar</button>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-6">
                        <fieldset disabled>
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="text" id="address" name="address" class="form-control" placeholder="Dirección" value="{{$persona->CALLE}}" required>
                            </div>
                            <div class="form-group">
                                <label for="addressNumber">Número</label>
                                <input type="number" id="addressNumber" name="addressNumber" class="form-control" placeholder="Número" value="{{$persona->NRO_CALLE}}" required>
                            </div>
                            <div class="form-group">
                                <label for="city">Localidad</label>
                                <input type="text" id="city" name="city" class="form-control" placeholder="Localidad" value="{{$persona->LOCALIDAD}}" required>
                            </div>
                            <div class="form-group">
                                <label for="pais">Pais</label>
                                <input type="text" id="pais" name="pais" class="form-control" placeholder="Pais" value="{{$persona->PAIS}}" required>
                            </div>
                            <div class="form-group">
                                <label for="tel">Teléfono</label>
                                <input type="text" id="tel" name="tel" class="form-control" placeholder="Teléfono" value="{{$persona->TELEFONO}}" required>
                            </div>
                            <div class="form-group">
                                <label for="codPos">Codigo Postal</label>
                                <input type="number" id="codPos" name="codPos" class="form-control" placeholder="Codigo Postal" value="{{$persona->CODIGO_POSTAL}}" required>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary btn-lg" id="boton-cancelar">Cancelar</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
