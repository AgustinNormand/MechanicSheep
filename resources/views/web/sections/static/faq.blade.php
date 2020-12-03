@extends('web.layout')

@section('title', 'About')

@section('style')
    <link href="{{ asset('css/faq.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container" id="faq">
        <h1 id="title">Preguntas frecuentes</h1>
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link faq-button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            ¿CADA CUÁNTO TIEMPO DEBO REALIZAR EL SERVICIO DE MANTENIMINETO DE MI VEHÍCULO RENAULT?
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <ul>
                            <li>
                                En condiciones normales de uso, el plan de mantenimiento de los modelos de la gama Renault estima realizar los servicios cada 10.000 km o año de uso de la unidad, lo que ocurra primero.
                            </li>
                            <li>
                                Su cumplimiento es fundamental para garantizar una correcta vida útil del vehículo, y prevenir incidentes que puedan incluso provocar la inmovilización del vehículo.
                            </li>
                            <li>
                                Para más detalles puede dirigirse a la sección "Servicios" que se encuentra en el menú de la página.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed faq-button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            ¿CUÁL ES EL COSTO DEL SERVICIO DE MANTENIMIENTO PARA MI VEHÍCULO RENAULT?
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        El precio del servicio de mantenimiento dependerá de la versión y el modelo del vehículo,como así también de la zona en la que usted vaya a realizar el mismo. Para conocer el valor de su servicio de mantenimiento, lo invitamos a contactarse con nosotros a través de alguno de los medios de contacto.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed faq-button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            ¿CÓMO PUEDO SOLICITAR UN TURNO PARA REALIZAR UN SERVICE A MI VEHÍCULO RENAULT?
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        Para ello es necesario que estés registrado en nuestra página, si no lo estás, puedes hacerlo dirígiendote a la sección "Mi cuenta" que se encuentra en el menú de la página. Una vez registrado, en la sección de menú "Pedir turno" usted podrá adquirir el turno correspondiente.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed faq-button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            ¿CADA CUANTO DEBO REALIZAR EL CAMBIO DE BATERIA DE MI VEHÍCULO RENAULT?
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        El cambio de bateria se realiza a los 50.000 y 100.000 kms. Para consultar los cambios correspondientes a cada kilometraje que realizamos puede dirigirse a la sección "Servicios" que se encuentra en el menú.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
