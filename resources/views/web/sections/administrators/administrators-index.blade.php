@extends('web.layout')

@section('title', 'ListAp')

@section('style')
    <link href="{{ asset('css/list-ap.css') }}" rel="stylesheet">
@endsection

@section('content')
    <p>Administrator page</p>
    <a href="{{route('configurations.index')}}">Administrar configuración</a>
@endsection

@section('scripts')
<script>
    
</script>   
@endsection