@extends('web.layout')

@section('title', 'ListAp')

@section('style')
    <link href="{{ asset('css/list-ap.css') }}" rel="stylesheet">
@endsection

@section('content')
    <br>
    <h3>Turnos Pendientes</h3>
    @foreach ($turnosPendientes as $turnoPendiente)
        <p>{{$turnoPendiente}}
            {{$turnoPendiente->pref_hora_turno}}
            <form action="{{route('moderator.appointments.set', $turnoPendiente)}}" method="post">
                @csrf
                <input type="date" name="fecha_turno" id="fecha_turno">
                <input type="time" name="hora_turno" id="hora_turno">
                <button class="btn btn-secondary btn-sm" type="submit">Confirmar</button>
            </form>
        </p>
    @endforeach

    <br>
    <h3>Turnos Confirmados</h3>
    @foreach ($turnosConfirmados as $turnoConfirmado)
        <p>{{$turnoConfirmado}}</p>
    @endforeach

    <br>
    <h3>Turnos Confirmados Cancelados</h3>
    @foreach ($turnosConfirmadosCancelados as $turnoConfirmadoCancelado)
        <p>{{$turnoConfirmadoCancelado}}</p>
    @endforeach

    <br>
    <h3>Turnos Pendientes Cancelados</h3>
    @foreach ($turnosPendientesCancelados as $turnoPendienteCancelado)
        <p>{{$turnoPendienteCancelado}}</p>
    @endforeach
@endsection

@section('scripts')
<script>
    
</script>   
@endsection