@extends('web.layout')

@section('title', 'Services')

@section('style')
    <link href="{{ asset('css/services.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" id="services">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">¿Por qué es tan importante hacer el service oficial preconizado por Renault?</h2>
                <ul class="lead">
                    <li>Porque te damos seguridad por contar con profesionales especializados.</li>
                    <li>Porque tenemos el equipamiento con la tecnología necesaria para tu vehículo.</li>
                    <li>Porque tenemos un plan de mantenimiento personalizado para tu modelo.</li>
                    <li>Porque nuestros repuestos son originales para brindarte la confianza y durabilidad que estás buscando.</li>
                    <li>Porque cumplir con los planes de mantenimiento permite mantener la garantía de tu vehículo.</li>
                    <li>Porque nuestros precios son transparentes.</li>
                    <li>Porque tenemos la red de servicio más amplia del país.</li>
                </ul>
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="https://cdn.group.renault.com/ren/ar/servicios-editorial/renault-editorial-servicios-003.jpg.ximg.xsmall.jpg/1573249904077.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading"> Te proponemos realizar las siguientes operaciones cada vez que hagas el service</h2>
                <p class="lead">
                    Contamos con todo el equipamiento necesario para garantizar el funcionamiento óptimo de tu vehículo, lo que hará que no te preocupes por nada.
                    Nosotros nos ocupamos de cuidar tu auto, vos solamente encargate de
                    disfrutarlo.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="https://cdn.group.renault.com/ren/ar/servicios-editorial/renault-editorial-servicios-001.jpg.ximg.xsmall.jpg/1573249902982.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/>
            </div>
        </div>

        <hr class="featurette-divider">

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">10k</th>
                    <td>Lámparas</td>
                    <td>Escobillas</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">20k</th>
                    <td>Lámparas</td>
                    <td>Escobillas</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">30k</th>
                    <td>Lámparas</td>
                    <td>Escobillas</td>
                    <td>Past.Freno</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">40k</th>
                    <td>Lámparas</td>
                    <td>Escobillas</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">50k</th>
                    <td>Lámparas</td>
                    <td>Escobillas</td>
                    <td>Batería</td>
                    <td>Amortiguadores</td>
                    <td>Neumáticos</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">60k</th>
                    <td>Lámparas</td>
                    <td>Escobillas</td>
                    <td>Past.Freno</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">70k</th>
                    <td>Lámparas</td>
                    <td>Escobillas</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">80k</th>
                    <td>Lámparas</td>
                    <td>Escobillas</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">90k</th>
                    <td>Lámparas</td>
                    <td>Escobillas</td>
                    <td>Past.Freno</td>
                    <td>Amortiguadores</td>
                    <td>Disc.Freno</td>
                    <td>Neumáticos</td>
                </tr>
                <tr>
                    <th scope="row">100k</th>
                    <td>Lámparas</td>
                    <td>Escobillas</td>
                    <td>Batería</td>
                    <td>Embrague</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection()
