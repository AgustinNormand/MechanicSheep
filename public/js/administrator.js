$(document).ready(function(){

    $("#upt-button").click(function(){
        $('fieldset').prop("disabled", false);
        $('#upt-button').prop("disabled", true);
    });

    $("#cancel-button").click(function(){
        $('fieldset').prop("disabled", true);
        $('#cancel-button').prop("disabled", false);
        $("form").trigger("reset");
        $('#upt-button').prop("disabled", false);
    });

});
