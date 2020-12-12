document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {

        

        initialView: 'dayGridMonth',

        eventColor: '#FCB705',

        eventDisplay: 'block',

        headerToolbar:{
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        buttonText: {
            today:    'hoy',
            month:    'mes',
            week:     'semana',
            day:      'dia',
        },
        dateClick:function (info){
            cleanForm();

            $('#txtDate').val(info.dateStr);

            $('#btnAdd').prop("disabled", false);
            $('#btnUpt').prop("disabled", true);
            $('#btnDel').prop("disabled", true);

            $('#exampleModal').modal();
        },

        eventClick:function (info){

            $('#btnAdd').prop("disabled", true);
            $('#btnUpt').prop("disabled", false);
            $('#btnDel').prop("disabled", false);

            $('#txtID').val(info.event.id);
            $('#txtTitle').val(info.event.title);

            month = (info.event.start.getMonth()+1);
            day = (info.event.start.getDate());
            year = (info.event.start.getFullYear());

            month = (month < 10) ? "0"+month:month;
            day  = (day < 10) ? "0"+day:day;

            minutes = info.event.start.getMinutes();
            hour = info.event.start.getHours();

            minutes = (minutes < 10) ? "0"+minutes:minutes;
            hour  = (hour < 10) ? "0"+hour:hour;

            schedule = (hour + ":"+ minutes);

            $('#txtDate').val(year + "-" + month + "-" + day);
            $('#txtHour').val(schedule);
            $('#txtColor').val(info.event.backgroundColor);

            $('#txtDesc').val(info.event.extendedProps.description);

            $('#exampleModal').modal();
        },

        eventSources:
        [
            'moderator/appointments/confirmados',
            '/calendar/show',
        ]
        
            //
            
        


    });
    calendar.setOption('locale', 'Es');
    calendar.render();

    $('#btnAdd').click(function () {
        objEvent = getDataGUI("POST");
        sendInfo('', objEvent);
    });

    $('#btnDel').click(function () {
        objEvent = getDataGUI("DELETE");
        sendInfo('/'+$('#txtID').val(), objEvent);
    });

    $('#btnUpt').click(function () {
        objEvent = getDataGUI("PATCH");
        sendInfo('/'+$('#txtID').val(), objEvent);
    });

    function getDataGUI(method) {
        newEvent = {
            id: $('#txtID').val(),
            title: $('#txtTitle').val(),
            description: $('#txtDesc').val(),
            color: $('#txtColor').val(),
            textColor:'#FFFFFF',
            start: $('#txtDate').val() + " " + $('#txtHour').val(),
            end: $('#txtDate').val() + " " + $('#txtHour').val(),
            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method,
        }
        return(newEvent);
    }

    function sendInfo(action, objEvent) {
        $.ajax({
            type:"POST",
            url:"/calendar" + action,
            data: objEvent,
            success:function (msg) {
                $('#exampleModal').modal('toggle');
                calendar.refetchEvents();
            },
            error:function(error) {
                alert("There is an error");
            },

        }
        );
    }

    function cleanForm() {
        $('#txtID').val("");
        $('#txtTitle').val("");
        $('#txtDate').val("");
        $('#txtHour').val("07:00");
        $('#txtColor').val("");
        $('#txtDesc').val("");
    }
});
