@extends('web.layout')

@section('title', 'profile')

@section('style')
    <link href="{{ asset('css/myProfile.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" id="profile-form">
        <h1>Datos personales</h1>
        <div class="form-group">
            <a href="#" role="button"> <button type="button" class="btn btn-secondary btn-lg">Modificar</button> </a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <form>
                        <fieldset disabled>
                            <div class="form-group">
                                <label for="fname">Nombre</label>
                                <input type="text" id="fname" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="lname">Apellido</label>
                                <input type="text" id="lname" class="form-control" placeholder="Apellido">
                            </div>
                            <div class="form-group">
                                <label for="tdoc">Tipo Documento</label>
                                <input type="text" id="tdoc" class="form-control" placeholder="Tipo Documento">
                            </div>
                            <div class="form-group">
                                <label for="ndoc">Nro Documento</label>
                                <input type="number" id="ndoc" class="form-control" placeholder="Nro Documento">
                            </div>
                            <div class="form-group">
                                <label for="born">Fecha Nacimiento</label>
                                <input type="date" id="born" class="form-control" placeholder="Fecha Nacimiento">
                            </div>
                            <div class="form-group">
                                <a href="#" role="button"> <button type="button" class="btn btn-secondary btn-lg">Guardar</button> </a>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-6">
                    <form>
                        <fieldset disabled>
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="text" id="address" class="form-control" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="addressNumber">Número</label>
                                <input type="number" id="addressNumber" class="form-control" placeholder="Número">
                            </div>
                            <div class="form-group">
                                <label for="city">Localidad</label>
                                <input type="text" id="city" class="form-control" placeholder="Localidad">
                            </div>
                            <div class="form-group">
                                <label for="tel">Teléfono</label>
                                <input type="tel" id="tel" class="form-control" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <a href="#" role="button"> <button type="button" class="btn btn-secondary btn-lg">Cancelar</button> </a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()
