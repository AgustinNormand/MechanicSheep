@extends('web.layout')

@section('title', 'ListAp')

@section('style')
    <link href="{{ asset('css/list-ap.css') }}" rel="stylesheet">
@endsection

@section('content')
    <form action="{{route('configurations.store')}}" method="post">
        @csrf
        @foreach ($configurations as $configuration) 
        <label for="{{$configuration->NAME}}">
            {{$configuration->NAME}}
            <input name="{{$configuration->NAME}}" type="text" value="{{$configuration->VALUE}}">
        </label>
        <br>
        @endforeach
        <input type="submit" value="Guardar">
    </form>
@endsection

@section('scripts')
<script>
    
</script>   
@endsection