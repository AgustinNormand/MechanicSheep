@extends('web.layout')

@section('title', 'Calendar')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.css">

    {{--    daygrid --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.4.0/main.min.css">

    {{--    List    --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/list@5.4.0/main.min.css">

    {{--    timegrid    --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.4.0/main.min.css">

    {{--  Custom css  --}}
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

@endsection

@section('content')
    <div class="container">
        <div id='calendar'></div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/locales-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js"></script>

    {{--    Plugin core     --}}
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.4.0/main.global.min.js"></script>

    {{--    Plugin daygrid      --}}
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.4.0/main.global.min.js"></script>

    {{--    List    --}}
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/list@5.4.0/main.global.min.js"></script>

    {{--    timegrid    --}}
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.4.0/main.global.min.js"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                // plugins: ['dayGrid', 'interaction', 'timeGrid', 'list'],

            header:{
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            }

            });
            calendar.setOption('locale', 'Es');
            calendar.render();
        });

    </script>
@endsection
