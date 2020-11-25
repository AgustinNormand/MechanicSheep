$(document).ready(function(){

    $("#boton-modificar").click(function(){
        $('fieldset').prop("disabled", false);
        $('#boton-modificar').prop("disabled", true);
    });

    $("#boton-cancelar").click(function(){
        $('fieldset').prop("disabled", true);
        $('#boton-modificar').prop("disabled", false);
        $("form").trigger("reset");
    });


});
