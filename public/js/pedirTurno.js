var el = document.querySelector("#service");

var problema = document.querySelector("#problemaDelAuto");

var textArea = document.querySelector("#problem");

el.addEventListener('change', () => {
    if(el.value == 13){
        problema.classList.remove('d-none');
        textArea.setAttribute("required", "");
    }else
    {
        problema.classList.add('d-none');
        textArea.removeAttribute("required")
    }            
});




