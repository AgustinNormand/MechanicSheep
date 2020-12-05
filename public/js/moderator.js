$(document).ready(function (){
    $("#ap-pending").show();
    $("#ap-approved").hide();
    $("#ap-pending-cancel").hide();
    $("#ap-approved-cancel").hide();
    $('#tablaPending').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No existen registros",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de un total de _MAX_ registros)",
            "search": "Buscar"
        }
    });
    $('#tablaApproved').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No existen registros",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de un total de _MAX_ registros)",
            "search": "Buscar"
        }
    });
    $('#tablaPendingCancel').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No existen registros",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de un total de _MAX_ registros)",
            "search": "Buscar"
        }
    });
    $('#tableApprovedCancel').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No existen registros",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de un total de _MAX_ registros)",
            "search": "Buscar"
        }
    });

    $(".dropdown-menu button").click(function(){
        var selText = $(this).attr('data-value');

        if (selText == "ap-pending") {
            $("#ap-pending").show();
            $("#ap-approved").hide();
            $("#ap-pending-cancel").hide();
            $("#ap-approved-cancel").hide();
        } else if (selText == "ap-approved") {
            $("#ap-pending").hide();
            $("#ap-approved").show();
            $("#ap-pending-cancel").hide();
            $("#ap-approved-cancel").hide();
        } else if (selText == "ap-approved-cancel") {
            $("#ap-pending").hide();
            $("#ap-approved").hide();
            $("#ap-pending-cancel").hide();
            $("#ap-approved-cancel").show();
        } else if (selText == "ap-pending-cancel") {
            $("#ap-pending").hide();
            $("#ap-approved").hide();
            $("#ap-pending-cancel").show();
            $("#ap-approved-cancel").hide();
        }

    });
});

