var inputPatente = document.querySelector("input[name=PATENTE]");
inputPatente.addEventListener("input", ()=>{
    var patente = inputPatente.value;
    if(patente.length > 0)
        ajax(patente);
})

function ajax(patente){
    const http = new XMLHttpRequest();
    const url = '/cars/locate/'+patente;
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            tagsHiddenAreVisible(!this.responseText.length > 0);
        }
    };

    http.open("GET", url);
    http.send();
}

function tagsHiddenAreVisible(areVisible){
    var inputsHidden = document.querySelectorAll(".datosVehiculo");
    if(areVisible)
    {
        inputsHidden.forEach(inputHidden => {
            inputHidden.classList.remove("d-none");
        });
        document.querySelector(".formVehiculo").action = "/cars";
    }
    else
    {
        inputsHidden.forEach(inputHidden => {
            inputHidden.classList.add("d-none");
        });
        document.querySelector(".formVehiculo").action = "/cars/locate";
    }
}