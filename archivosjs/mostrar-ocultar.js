let filtro = document.getElementById("filtro_negro");
let tarjeta_deslizadora = document.getElementById("tarjeta_deslizadora");
let seccion_imagen = document.getElementById("contenedor_lateral_imagen");

let estado = false;

tarjeta_deslizadora.onclick = function () {
    estado = !estado;
    if(estado == true){
        seccion_imagen.style.right = "0rem";
        filtro.style.display = "block";
    }else{
        seccion_imagen.style.right = "-40rem";
        filtro.style.display = "none";
    }
}
