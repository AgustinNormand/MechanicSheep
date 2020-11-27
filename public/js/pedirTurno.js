var a = 2; 
//console.log("The value of a is " + a);

var el = document.querySelector("#service");
//console.log(el);

//console.log(el.value);

var problema = document.querySelector("#problemaDelAuto");
console.log(problema);

el.addEventListener('change', (event) => {
    if(el.value == "Otro servicio mecánico"){
        problema.classList.remove('d-none');
        valor = document.querySelector("#problem");
        valor.setAttribute("required", "");
        console.log(el.value);
    }else{
        problema.classList.add('d-none');
        valor.removeAttribute("required")}
              
});




