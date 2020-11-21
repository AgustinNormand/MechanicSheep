@extends('web.layout')

@section('title', 'About')

@section('content')
    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>{!! \Session::get('success') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <h1>"Bienvenido a la pagina Mi Cuenta / Profile"</h1>
@endsection()