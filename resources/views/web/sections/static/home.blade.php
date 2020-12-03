@extends('web.layout')

@section('title', 'Home')

@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active" id="one">
{{--            <img class="bd-placeholder-img" width="100%" height="100%" src="https://images.pexels.com/photos/1005633/pexels-photo-1005633.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">--}}
{{--            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>--}}
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1><span class="background">Renault Servicios</span></h1>
                    <p><span class="background">Quien mejor que Renault para cuidar tu Renault. Tenemos planes de mantenimiento pensados para tu auto, para vos y tu bolsillo.</span></p>
{{--                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>--}}
                </div>
            </div>
        </div>
        <div class="carousel-item" id="two">
            <div class="container">
                <div class="carousel-caption">
                    <h1><span class="background">Agendá tu turno</span></h1>
                    <p><span class="background"> Estamos en Luján, Buenos Aires. Somos parte de la Red de Concesionarios Oficiales, siempre a tu disposición.</span></p>
{{--                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>--}}
                </div>
            </div>
        </div>
        <div class="carousel-item" id="three">
            <div class="container">
                <div class="carousel-caption text-right">
                    <h1><span class="background">Promesa Renault</span></h1>
                    <p><span class="background">Nuestro compromiso es tu tranquilidad.</span></p>
{{--                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>--}}
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="200" height="200" src="{{asset('image/home/Mechanic.png')}}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/>
            <h2>Service oficial</h2>
            <p>Consulta los servicios ofrecidos</p>
            <p><a class="btn btn-secondary" href="{{route('services')}}" role="button"> Ver servicios &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="200" height="200" src="{{asset('image/home/Calendar.png')}}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/>
            <h2>¡Saca tu turno!</h2>
            <p>No esperes más. Vení con nosotros</p>
            <p><a class="btn btn-secondary" href="{{route('appointments.request')}}" role="button"> ¡Solicitar! &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="200" height="200" src="{{asset('image/home/Email.png')}}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/>
            <h2>Contactanos</h2>
            <p>Elegí el medio que prefieras y despejá tus dudas</p>
            <p><a class="btn btn-secondary" href="{{route('contact.index')}}" role="button"> Enviar mensaje &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">El mejor servicio de post venta garantizado.</h2>
            <p class="lead">
                Contamos con un equipo de profesionales totalmente capacitado para brindarte la mejor atención.
                ¡El proceso es muy sencillo! Pedí tu turno y listo, ¡ya sos cliente! Luego nosotros nos encargamos de recordar
                las fechas de tus próximos services.
            </p>
        </div>
        <div class="col-md-5">
            <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="https://images.pexels.com/photos/3807649/pexels-photo-3807649.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/>
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading"> Concesionaria oficial Renault. <span class="text-muted">Estamos en la ciudad de Luján, Buenos Aires, Argentina.</span></h2>
            <p class="lead"> Además de realizar tus services oficiales con nosotros, ofrecemos presupuestos y servicios generales de mecánica.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="https://images.unsplash.com/photo-1516154264660-eaad72f264e4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/>
        </div>
    </div>

    <!-- /END THE FEATURETTES -->

</div><!-- /.container -->
@endsection()
