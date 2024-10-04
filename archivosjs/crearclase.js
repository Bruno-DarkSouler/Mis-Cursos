const material = {cuerpo: [], pie: [], nutex:[], tex: []};
const ejercicio = {cuerpo: [], pie: [], nuopc:[],  opc: [], texopc: []};
const tarea = {cuerpo: [], pie: [], nutex:[], tex: []};

function nuevotex(ntid){
    material.tex.push(document.createElement("textarea"));
    material.tex.at(-1).className = "texto";
    // console.log(ntid);
    material.cuerpo[Number(ntid)-1].insertBefore(material.tex.at(-1), material.pie[Number(ntid)-1]);
}

function nuevotar(ntid){
    tarea.tex.push(document.createElement("textarea"));
    // console.log(ntid);
    tarea.cuerpo[Number(ntid)-1].insertBefore(tarea.tex.at(-1), tarea.pie[Number(ntid)-1]);
}

function nuevoejer(ntid){
    ejercicio.opc.push(document.createElement("input"));
    ejercicio.opc.at(-1).className = "opc";
    ejercicio.opc.at(-1).type = "radio";
    ejercicio.opc.at(-1).name = "opc" + ejercicio.opc.length;
    // ejercicio.opc.at(-1).name = "selec";
    ejercicio.texopc.push(document.createElement("label"));
    ejercicio.texopc.at(-1).id = "texopc" + ejercicio.texopc.length;
    ejercicio.texopc.at(-1).innerHTML = "Hola " + ejercicio.texopc.at(-1).id;
    ejercicio.texopc.at(-1).className = "aeifjweofgjweofj";
    ejercicio.texopc.at(-1).htmlFor = "opc1";
    // console.log(ntid);
    ejercicio.cuerpo[Number(ntid)-1].insertBefore(ejercicio.opc.at(-1), ejercicio.pie[Number(ntid)-1]);
    ejercicio.cuerpo[Number(ntid)-1].insertBefore(ejercicio.texopc.at(-1), ejercicio.pie[Number(ntid)-1]);
}

let crear = document.getElementById("crear");
let numat = document.getElementById("numat");
let nuejer = document.getElementById("nuejer");
let nutar = document.getElementById("nutar");

crear.onclick = formatearTexto;
numat.onclick = crearmat;
nuejer.onclick = crearejer;
nutar.onclick = creartar;

function formatearTexto(){
    let contenido = "";
    let ajax = new XMLHttpRequest();
    for(let j=0; j<material.cuerpo.length; j++){
        let aux = document.querySelectorAll("#" + material.cuerpo[j].id + " .texto");
        for(let i=0; i<aux.length; i++){
            contenido += aux[i].value + "[ruptura]";
        }
        contenido += "[ruptura2]";
    }
    console.log(contenido);
    ajax.open("POST", "../archivosphp/pruebaajax.php");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("cadena=" + contenido);
    ajax.onload = function(){
        let x = ajax.responseText;
        console.log(x);
    }
    
    
    // const campos1 = contenido.split("[ruptura2]");
    // campos1.pop();
    // const campos2 = [];
    // for(let i=0; i<campos1.length; i++){
    //     campos2.push(campos1[i].split("[ruptura]"));
    //     campos2[i].pop();
    //     for(let j=0; j<campos2[i].length; j++){
    //         console.log(campos2[i][j]);
    //     }
    //     console.log("[Nuevo Campo");
    // }




    // for(let j=0; j<material.cuerpo.length; j++){
    //     for(let i=0; i<material.tex.length; i++){
    //         contenido += material.tex[i].value + "[ruptura]";
    //         // console.log(material.tex[i].innerHTML);
    //     }
    // }
    // const campos = contenido.split("[ruptura]");
    // console.log(campos);
    // campos.pop();
    // console.log(campos);
    // for(let i=0; i<material.tex.length; i++){
    //     console.log(campos[i]);
    // }
    
}

function crearmat(){
    material.cuerpo.push(document.createElement("div"));
    material.cuerpo.at(-1).className = "material";
    material.cuerpo.at(-1).id = "mat" + material.cuerpo.length;
    material.pie.push(document.createElement("div"));
    material.pie.at(-1).className = "acoplar";
    material.nutex.push(document.createElement("button"));
    material.nutex.at(-1).className = "nutex";
    material.nutex.at(-1).id = "mat" + material.nutex.length;
    material.nutex.at(-1).innerHTML = "nuevo Texto";
    for(let i=0; i<material.nutex.length; i++){
        material.nutex[i].onclick = function(){nuevotex(material.nutex[i].id.substring(3))};
    }

    material.pie.at(-1).appendChild(material.nutex.at(-1));
    material.cuerpo.at(-1).appendChild(material.pie.at(-1));
    material.cuerpo.at(-1).appendChild(material.pie.at(-1));

    const pie_clase = document.getElementById("pie_clase");
    const principal = document.getElementsByTagName("main");
    principal[0].insertBefore(material.cuerpo.at(-1), pie_clase);
}

function crearejer(){
    ejercicio.cuerpo.push(document.createElement("div"));
    ejercicio.cuerpo.at(-1).className = "ejercicio";
    ejercicio.cuerpo.at(-1).id = "ejer" + ejercicio.cuerpo.length;
    ejercicio.pie.push(document.createElement("div"));
    ejercicio.pie.at(-1).className = "acoplar";
    ejercicio.nuopc.push(document.createElement("button"));
    ejercicio.nuopc.at(-1).className = "nuopc";
    ejercicio.nuopc.at(-1).id = "opc" + ejercicio .nuopc.length;
    ejercicio.nuopc.at(-1).innerHTML = "nuevo Texto";
    for(let i=0; i<ejercicio .nuopc.length; i++){
        ejercicio.nuopc[i].onclick = function(){nuevoejer(ejercicio.nuopc[i].id.substring(3))};
    }

    ejercicio.pie.at(-1).appendChild(ejercicio.nuopc.at(-1));
    ejercicio.cuerpo.at(-1).appendChild(ejercicio.pie.at(-1));
    ejercicio.cuerpo.at(-1).appendChild(ejercicio.pie.at(-1));

    const pie_clase = document.getElementById("pie_clase");
    const principal = document.getElementsByTagName("main");
    principal[0].insertBefore(ejercicio.cuerpo.at(-1), pie_clase);
}

function creartar(){
    tarea.cuerpo.push(document.createElement("div"));
    tarea.cuerpo.at(-1).className = "tarea";
    tarea.cuerpo.at(-1).id = "mat" + tarea.cuerpo.length;
    tarea.pie.push(document.createElement("div"));
    tarea.pie.at(-1).className = "acoplar";
    tarea.nutex.push(document.createElement("button"));
    tarea.nutex.at(-1).className = "nutex";
    tarea.nutex.at(-1).id = "tar" + tarea.nutex.length;
    tarea.nutex.at(-1).innerHTML = "nuevo Texto";
    for(let i=0; i<tarea.nutex.length; i++){
        tarea.nutex[i].onclick = function(){nuevotar(tarea.nutex[i].id.substring(3))};
    }

    tarea.pie.at(-1).appendChild(tarea.nutex.at(-1));
    tarea.cuerpo.at(-1).appendChild(tarea.pie.at(-1));
    tarea.cuerpo.at(-1).appendChild(tarea.pie.at(-1));

    const pie_clase = document.getElementById("pie_clase");
    const principal = document.getElementsByTagName("main");
    principal[0].insertBefore(tarea.cuerpo.at(-1), pie_clase);
}