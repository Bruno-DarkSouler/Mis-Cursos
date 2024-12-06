const id_curso = document.querySelectorAll("input");

const boton_agregar_mulopc = document.getElementById("nu_mulopc");
boton_agregar_mulopc.onclick = Agregar_mulopc;

const botons_crear_clase = document.getElementById("crear");
botons_crear_clase.onclick = Enviar_JSONs;

const body = document.getElementsByTagName("main");

const mulopc = {
    contenedor_general: [],
    texto: [],
    boton_agregar_opc: [],
    contenedor_opcion: [],
    opciones: []
}

function Agregar_mulopc(){
    mulopc.contenedor_general.push(document.createElement("div"));
    mulopc.contenedor_general.at(-1).id = "mulopc-" + mulopc.contenedor_general.length;
    mulopc.contenedor_general.at(-1).className = "mulopc";
    mulopc.texto.push(document.createElement("textarea"));
    mulopc.boton_agregar_opc.push(document.createElement("button"));
    mulopc.boton_agregar_opc.at(-1).innerHTML = "Nueva opción";
    mulopc.boton_agregar_opc.at(-1).id = "agregaropc-" + mulopc.boton_agregar_opc.length;
    mulopc.boton_agregar_opc.at(-1).onclick = function(){Agregar_opc(this.id.split("-")[1])};
    body[0].appendChild(mulopc.contenedor_general.at(-1));
    mulopc.contenedor_general.at(-1).appendChild(mulopc.texto.at(-1));
    mulopc.contenedor_general.at(-1).appendChild(mulopc.boton_agregar_opc.at(-1));
}

function Agregar_opc(num_mulopc){
    console.log(Number(num_mulopc));
    mulopc.contenedor_opcion.push(document.createElement("div"));
    mulopc.contenedor_opcion.at(-1).id = "contenedoropc-" + mulopc.contenedor_opcion.length;
    mulopc.contenedor_opcion.at(-1).className = "opc";
    mulopc.opciones.push(document.createElement("input"));
    mulopc.opciones.type = "text";
    mulopc.opciones.className = "textoOpc";
    mulopc.opciones.id = "textoopc-" + mulopc.opciones.length;
    let opc = document.createElement("input");
    opc.type = "radio";
    opc.name = "grupo_opc-" + num_mulopc;
    opc.id = "opc-" + mulopc.opciones.length;
    opc.value = "1";
    mulopc.contenedor_general[Number(num_mulopc)-1].appendChild(mulopc.contenedor_opcion.at(-1));
    mulopc.contenedor_opcion.at(-1).appendChild(opc);
    mulopc.contenedor_opcion.at(-1).appendChild(mulopc.opciones.at(-1));
}

function Enviar_JSONs(){
    const mulopc_JSON = {texto: [], opciones: [], respuesta: []};
    for(let i=0; i<mulopc.contenedor_general.length; i++){
        mulopc_JSON.texto.push(mulopc.texto[i].value);
        mulopc_JSON.opciones.push([]);
        for(let j=0; j<mulopc.opciones.length; j++){
            mulopc_JSON.opciones.at(-1).push(mulopc.opciones[j].value);
            if(mulopc.opciones[j].value = "1"){
                mulopc_JSON.respuesta.push(j);
            }
        }
    }
    console.log(material);
    const material_JSON = {titulo: [], texto: []};
    for(let i=0; i<material.contenedor_general.length; i++){
        material_JSON.titulo.push(material.titulo[i].value);
        material_JSON.texto.push(material.texto[i].value);
    }

    const tarea_JSON = {titulo: [], texto: []};
    for(let i=0; i<tarea.contenedor_general.length; i++){
        tarea_JSON.titulo.push(tarea.titulo[i].value);
        tarea_JSON.texto.push(tarea.texto[i].value);
    }

    const ajax = new XMLHttpRequest;
    console.log(material_JSON);
    ajax.open("POST", "../archivosphp/crearclase.php");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("mulopc_JSON=" + JSON.stringify(mulopc_JSON) + "&tarea_JSON=" + JSON.stringify(tarea_JSON) + "&material_JSON=" + JSON.stringify(material_JSON) + "&id_curso=" + id_curso[0].id + "&nombre=" + id_curso[0].value);
    ajax.onload = function(){
        let x = ajax.responseText;
        console.log(x);
    }
}