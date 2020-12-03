$(document).ready(function (){
    $("#ap-pending").show();
    $("#ap-approved").hide();
    $("#ap-pending-cancel").hide();
    $("#ap-approved-cancel").hide();

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

