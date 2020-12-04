@extends('web.layout')

@section('title', 'ListAp')

@section('style')
    <link href="{{ asset('css/administrator.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" id="administrator-form">
        <h1 id="main-title">Parámetros de configuración</h1>
        <form action="{{route('configurations.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm">
                    @for($i = 0; $i < count($configurations)/2; $i++)
                        <div class="form-group">
                            <label for="{{$configurations[$i]->NAME}}">
                                {{$configurations[$i]->NAME}}
                            </label>
                            <input name="{{$configurations[$i]->NAME}}" id="{{$configurations[$i]->NAME}}" type="text" class="form-control" value="{{$configurations[$i]->VALUE}}">
                        </div>
                    @endfor
                    <button id="send-button" type="submit" value="Guardar" class="btn btn-primary">Guardar</button>
                </div>
                <div class="col-sm">
                    @for($i = count($configurations)/2; $i < count($configurations); $i++)
                        <div class="form-group">
                            <label for="{{$configurations[$i]->NAME}}">
                                {{$configurations[$i]->NAME}}
                            </label>
                            <input name="{{$configurations[$i]->NAME}}" id="{{$configurations[$i]->NAME}}" type="text" class="form-control" value="{{$configurations[$i]->VALUE}}">
                        </div>
                    @endfor

                </div>
            </div>
        </form>
    </div>
@endsection

