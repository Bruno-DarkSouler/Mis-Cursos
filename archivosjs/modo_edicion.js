let contenedor_editar = document.getElementById("editar");
let contenedor_visualizar = document.getElementById("visualizar");

let cambiar_modo = document.getElementById("cambiar_modo");

cambiar_modo.onchange = function () {
    if(cambiar_modo.checked == true){
        contenedor_editar.style.display = "block";
        contenedor_visualizar.style.display = "none";
    }else{
        contenedor_editar.style.display = "none";
        contenedor_visualizar.style.display = "block";
    }
}