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
{{--                @foreach ($turnosPendientes as $turnoPendiente)--}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>botones rechazar o enviar</td>
                    </tr>
{{--                @endforeach--}}
                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/moderator-email.js') }}"></script>
@endsection
