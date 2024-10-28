const boton_agregar_material = document.getElementById("nu_mat");
boton_agregar_material.onclick = Agregar_material;

const material = {
    contenedor_general: [],
    titulo: [],
    texto: []
}

function Agregar_material(){
    material.contenedor_general.push(document.createElement("div"));
    material.contenedor_general.at(-1).id = "material-" + material.contenedor_general.length;
    material.titulo.push(document.createElement("input"));
    material.texto.push(document.createElement("textarea"));
    body[0].appendChild(material.contenedor_general.at(-1));
    material.contenedor_general.at(-1).appendChild(material.titulo.at(-1));
    material.contenedor_general.at(-1).appendChild(material.texto.at(-1));
}