document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',

        eventColor: '#FCB705',

        eventDisplay: 'block',

        headerToolbar:{
            left: 'prev,next today customButton1',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        customButtons: {
            customButton1: {
                text: 'custom 1',
                click: function () {
                    alert('clicked custom button 1!');
                    $('#exampleModal').modal();
                }
            },
        },

        dateClick:function (info){
            $('#exampleModal').modal();
            calendar.addEvent({
                title:"Evento x",
                date:info.dateStr,
            });
        },

        eventClick:function (info){
            console.log(info);
            console.log(info.event.title);
            console.log(info.event.start);

            console.log(info.event.end);
            console.log(info.event.textColor);
            console.log(info.event.backgroundColor);

            console.log(info.event.extendedProps.description);
        },

        events:[
            {
                title:"Mi evento 1",
                start:"2020-11-13 12:30:00",
                textColor:"#000000",
                description:"Descripción del evento 1",
            }, {
                title:"Mi evento 2",
                start:"2020-11-14 12:30:00",
                end:"2020-11-20 12:30:00",
                color:"#FFCCAA",
                textColor:"#000000",
                description:"Descripción del evento 2",
            }
        ]

    });
    calendar.setOption('locale', 'Es');
    calendar.render();
});
