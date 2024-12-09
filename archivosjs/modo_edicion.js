let contenedor_editar = document.getElementById("editar");
let contenedor_visualizar = document.getElementById("visualizar");
let modo_editar = document.querySelectorAll(".modo_editar");
let desc_img = document.getElementsByClassName("desc_img");

let cambiar_modo = document.getElementById("cambiar_modo");

cambiar_modo.onchange = function () {
    if(cambiar_modo.checked == true){
        contenedor_editar.style.display = "block";
        contenedor_visualizar.style.display = "none";
        for(let i = 0; i < modo_editar.length; i++){
            modo_editar[i].style.display = "block";
        }
        for(let i = 0; i < desc_img.length; i++){
            desc_img[i].style.display = "none";
        }
    }else{
        contenedor_editar.style.display = "none";
        contenedor_visualizar.style.display = "block";
        for(let i = 0; i < modo_editar.length; i++){
            modo_editar[i].style.display = "none";
        }
        for(let i = 0; i < desc_img.length; i++){
            desc_img[i].style.display = "block";
        }
    }
}