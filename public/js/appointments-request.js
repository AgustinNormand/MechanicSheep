/* Show text area and make it required when select "Otro servicio mecanico" */
var el = document.querySelector("#service");

var problema = document.querySelector("#problemaDelAuto");

var textArea = document.querySelector("#problem");

el.addEventListener('change', () => {
    if(el.value == 13){
        problema.classList.remove('d-none');
        textArea.setAttribute("required", "");
        textArea.removeAttribute("disabled");
    }else
    {
        problema.classList.add('d-none');
        textArea.removeAttribute("required")
        textArea.setAttribute("disabled", "");
    }            
});

/* Check all checkboxes with the button "Any" */
var buttonAny = document.querySelector("#buttonAny");

buttonAny.addEventListener("click", ()=>{
    var checkboxes = document.querySelectorAll("input[name=\"days_of_preference[]\"]");
    checkboxes.forEach(checkbox => {
        checkbox.checked = true;
    });
});




