@extends('web.layout')

@section('title', 'jobs')

@section('style')
    <link href="{{ asset('css/jobs.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container jobs-container">
        <h1>Trabajos</h1>
        <div class="row">
            <div class="col-sm">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Kilómetros</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Visualizar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trabajos as $trabajo)
                        <tr>
                            <td>{{$trabajo->FECHA}}</td>
                            <td>{{$trabajo->DESCRIPCION}}</td>
                            <td>{{$trabajo->KILOMETROS}}</td>
                            <td>{{$trabajo->servicio->NOMBRE}}</td>
                            <td>
                                <button type="button" class="btn btn-secondary btn-sm btnDetalles" value="{{$trabajo->NRO_TRABAJO}}">Detalle</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @foreach ($trabajos as $trabajo)
                <div class="col-sm d-none detalles" id="{{$trabajo->NRO_TRABAJO}}">
                    <ul class="list-group">
                        @foreach ($trabajo->detalle as $detalle)
                            <li class="list-group-item">{{$detalle->DESCRIPCION}}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach          
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jobs-show.js') }}"></script>
@endsection
