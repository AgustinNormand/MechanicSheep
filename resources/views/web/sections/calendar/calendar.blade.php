@extends('web.layout')

@section('title', 'Calendar')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.css">

    {{--  Custom css  --}}
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

@endsection

@section('content')
    <div class="container" id="calendar-size">
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
                        <div class="d-none">
                            <input type="text" name="txtID" id="txtID">
                            <input type="text" name="txtDate" id="txtDate">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="txtTitle">Título</label>
                                <input class="form-control" type="text" name="txtTitle" id="txtTitle">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txtHour">Hora</label>
                                <input class="form-control" type="time" min="07:00" max="19:00" step="600" name="txtHour" id="txtHour">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="txtDesc">Descripción</label>
                                <textarea class="form-control" type="text" name="txtDesc" id="txtDesc" cols="30" rows="3">
                                </textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="txtColor">Color</label>
                                <input class="form-control" type="color" name="txtColor" id="txtColor">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnAdd" class="btn btn-success">Agregar</button>
                        <button id="btnUpt" class="btn btn-warning">Modificar</button>
                        <button id="btnDel" class="btn btn-danger">Eliminar</button>
                        <button id="btnCancel" data-dismiss="modal" class="btn btn-default">Cancelar</button>
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
