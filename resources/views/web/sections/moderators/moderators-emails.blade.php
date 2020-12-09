@extends('web.layout')

@section('title', 'ListEmails')

@section('style')
    <link href="{{ asset('css/list-emails.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" id="container-moderator">
        <h1 >Moderación de correos electrónicos</h1>

        <div class="table-moderator">
            <h3 id="subtitle">Correos pendientes de envío</h3>
            <table class="table table-hover table-striped table-bordered" id="email-table">
                <thead>
                <tr>
                    <th scope="col">Fecha Estimada aviso</th>
                    <th scope="col">Promedio</th>
                    <th scope="col">Fecha último trabajo</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($correosPendientesDeEnvio as $correoPendiente)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($correoPendiente->FECHA_ESTIMADA_AVISO)->format('j/m/Y')}}</td>
                        <td>{{$correoPendiente->PROMEDIO}} días</td>
                        <td>{{$correoPendiente->FECHA_ULTIMO_TRABAJO}}</td>
                        <td>{{$correoPendiente->vehiculo->modelo->NOMBRE_FANTASIA}}</td>
                        <td>{{$correoPendiente->vehiculo->modelo->marca->RAZON_SOCIAL}}</td>
                        <td>{{$correoPendiente->vehiculo->persona->NOMBRE}} {{$correoPendiente->vehiculo->persona->APELLIDO}}</td>
                        <td>
                            <form action="{{route('moderator.emails.set', $correoPendiente)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">Enviar</button>
                            </form>
                            <form action="{{route('moderator.emails.refuse', $correoPendiente)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm" onclick="return myFunction();">Rechazar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/moderator-email.js') }}"></script>
    <script>
        function myFunction() {
            if(!confirm("¿Está seguro que desea rechazar el envío del correo?"))
                event.preventDefault();
        }
    </script>
@endsection
