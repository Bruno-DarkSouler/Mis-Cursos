const boton_agregar_tarea = document.getElementById("nu_tar");
boton_agregar_tarea.onclick = Agregar_tarea;

const tarea = {
    contenedor_general: [],
    titulo: [],
    texto: []
}

function Agregar_tarea(){
    tarea.contenedor_general.push(document.createElement("div"));
    tarea.contenedor_general.at(-1).id = "tarea-" + tarea.contenedor_general.length;
    tarea.contenedor_general.at(-1).className = "tarea";
    tarea.titulo.push(document.createElement("input"));
    tarea.texto.push(document.createElement("textarea"));
    body[0].appendChild(tarea.contenedor_general.at(-1));
    tarea.contenedor_general.at(-1).appendChild(tarea.titulo.at(-1));
    tarea.contenedor_general.at(-1).appendChild(tarea.texto.at(-1));
}