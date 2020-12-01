var buttonsDetalles = document.querySelectorAll('.btnDetalles');
var previousId = null;
buttonsDetalles.forEach(buttonDetalle => {
    buttonDetalle.addEventListener("click", ()=>{
        if(previousId){
            var detallesPrevios = document.getElementById(previousId);
            detallesPrevios.classList.add("d-none");
        }
        var nroTrabajo = buttonDetalle.value;
        var detalles = document.getElementById(nroTrabajo);
        if(previousId == nroTrabajo)
            detalles.classList.add("d-none");    
        else
            detalles.classList.remove("d-none");
        previousId = nroTrabajo;
    });
});

if(buttonsDetalles[0]){
    buttonsDetalles[0].click();
}