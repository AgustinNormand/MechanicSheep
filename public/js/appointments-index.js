var tablaTurnos = document.querySelector(".tablaTurnos");

var checkbox = document.createElement("input");
checkbox.setAttribute("type", "checkbox");
checkbox.addEventListener("click", ()=>{
    var turnosCancelados = document.querySelectorAll(".turnoCancelado");
    if(!checkbox.checked)
        turnosCancelados.forEach(turnoCancelado => {
            turnoCancelado.classList.add("d-none");
        });
    else
        turnosCancelados.forEach(turnoCancelado => {
            turnoCancelado.classList.remove("d-none");
        });
});

var label = document.createElement("label");
label.appendChild(document.createTextNode(" Mostrar turnos cancelados"));
label.prepend(checkbox);

tablaTurnos.parentElement.insertBefore(label, tablaTurnos);

