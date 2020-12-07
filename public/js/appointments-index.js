$(document).ready(function (){
    $('#tableMisTurnos').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        }
    });
});

var tablaTurnos = document.querySelector(".tablaTurnos");

var checkbox = document.createElement("input");
checkbox.setAttribute("type", "checkbox");
checkbox.addEventListener("click", ()=>{
    var turnosCancelados = document.querySelectorAll(".turnoCancelado");
    if(!checkbox.checked)
        turnosCancelados.forEach(turnoCancelado => {
            turnoCancelado.classList.add("d-none");
        });
    else
        turnosCancelados.forEach(turnoCancelado => {
            turnoCancelado.classList.remove("d-none");
        });
});

var label = document.createElement("label");
label.appendChild(document.createTextNode(" Mostrar turnos cancelados"));
label.prepend(checkbox);

tablaTurnos.parentElement.insertBefore(label, tablaTurnos);

