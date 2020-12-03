@extends('web.layout')

@section('title', 'About')

@section('style')
    <link href="{{ asset('css/aboutUs.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 id="title">¿Quiénes somos?</h1>
                <p id="description">
                    MechanicSheep se encarga de todo para tu tranquilidad y seguridad. Al confiarnos el mantenimiento y reparación de tu Renault, podés estar seguro de que todo será rápido y fácil: equipos para escucharte y aconsejarte, repuestos Renault originales de alta calidad y soluciones a la medida independientemente de la tarea a realizar o de la antigüedad de tu vehículo.
                </p>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row">
            <div class="col-sm-4 img-about">
                <img src="{{asset('image/about/Mechanic-1.jpg')}}">
            </div>
            <div class="col-sm-4 img-about">
                <img src="{{asset('image/about/Mechanic-2.jpg')}}">
            </div>
            <div class="col-sm-4 img-about">
                <img src="{{asset('image/about/Mechanic-3.jpg')}}">
            </div>
        </div>
    </div>




@endsection()
