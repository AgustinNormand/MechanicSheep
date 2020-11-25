@extends('web.layout')

@section('title', 'jobs')

@section('style')
    <link href="{{ asset('css/jobs.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container cars-container">
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
                    <td>{{$trabajo->SERVICIO}}</td>
                    <td>
                        <a href="#" role="button"> <button type="button" class="btn btn-secondary btn-sm">Detalle</button> </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
