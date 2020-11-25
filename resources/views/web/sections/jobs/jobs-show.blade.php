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
                                <a href="#" role="button"> <button type="button" class="btn btn-secondary btn-sm">Detalle</button> </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm">
                <ul class="list-group">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
