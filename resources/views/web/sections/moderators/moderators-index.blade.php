@extends('web.layout')

@section('title', 'ListAp')

@section('style')
    <link href="{{ asset('css/list-ap.css') }}" rel="stylesheet">
@endsection

@section('content')
    <p>Moderator page</p>
    <a href="{{route('moderator.appointments.index')}}">Moderar turnos</a>
@endsection

@section('scripts')
<script>
    
</script>   
@endsection