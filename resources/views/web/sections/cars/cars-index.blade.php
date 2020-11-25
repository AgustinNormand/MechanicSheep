@extends('web.layout')

@section('title', 'cars')

@section('style')
    <link href="{{ asset('css/cars.css') }}" rel="stylesheet">
@endsection

@section('content')
<a href="{{route('cars.locate')}}">Agregar vehiculo</a>
    @foreach($vehiculos as $vehiculo)
        <p> Vehiculo: {{$vehiculo}}</p>
    @endforeach
@endsection
