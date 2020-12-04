var buttonsDetalles = document.querySelectorAll('.btnDetalles');
var previousId = null;
buttonsDetalles.forEach(buttonDetalle => {
    buttonDetalle.addEventListener("click", ()=>{
        var nroTrabajo = buttonDetalle.value;
        var detalles = document.getElementById(nroTrabajo);
        if(previousId == nroTrabajo)
            if(detalles.classList.contains("d-none") == true)
                detalles.classList.remove("d-none");    
            else
                detalles.classList.add("d-none");
        else
        {
            if(previousId){
                var detallesPrevios = document.getElementById(previousId);
                detallesPrevios.classList.add("d-none");
            }
            detalles.classList.remove("d-none");
        }    
        previousId = nroTrabajo;
    });
});

if(buttonsDetalles[0]){
    buttonsDetalles[0].click();
}