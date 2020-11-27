@extends('web.layout')

@section('title', 'Calendar')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.css">

    {{--  Custom css  --}}
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

@endsection

@section('content')
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Datos del evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="txtID" id="txtID">
                        <br>
                        <input type="text" name="txtDate" id="txtDate">
                        <br>
                        <input type="text" name="txtTitle" id="txtTitle">
                        <br>
                        <input type="text" name="txtHour" id="txtHour">
                        <br>
                        <input type="text" name="txtDesc" id="txtDesc">
                        <br>
                        <input type="color" name="txtColor" id="txtColor">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button id="btnAdd" class="btn btn-success">Agregar</button>
                        <button id="btnUpt" class="btn btn-warning">Modificar</button>
                        <button id="btnDel" class="btn btn-danger">Eliminar</button>
                        <button id="btnCancel" class="btn btn-default">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id='calendar'></div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js"></script>

    <script src="{{ asset('js/calendar.js') }}"></script>
@endsection
