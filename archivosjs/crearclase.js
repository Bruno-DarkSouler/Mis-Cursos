var pie_clase = document.getElementById("pie_clase");

var tex = [];
// var material2 = Array(material);
// var pie2 = Array(pie);

var material2 = [];
var pie2 = [];

var nutex = [];
// let nutex = document.getElementsByClassName("nutex");
let nuimg = document.getElementsByClassName("nuimg");
let numat = document.getElementById("numat");

numat.onclick = crearmat;

// nutex.at(-1).onclick = creartex;

// nutex.forEach(asignaraccion);

function creartex(ntid){
    tex.push(Array(document.createElement("textarea")));
    console.log(Number(ntid));
    material2[Number(ntid)-1].insertBefore(tex.at(-1).at(-1), pie2[Number(ntid)-1]);
}



function crearmat(){
    material2.push(document.createElement("div"));
    material2.at(-1).class = "material";
    material2.at(-1).id = "mat" + material2.length;
    pie2.push(document.createElement("div"));
    pie2.at(-1).class = "acoplar";
    nutex.push(document.createElement("button"));
    nutex.at(-1).class = "nutex";
    nutex.at(-1).id = "nt" + nutex.length;
    nutex.at(-1).innerHTML = "nuevo Texto";
    for(let i=0; i<nutex.length; i++){
        nutex[i].onclick = function(){creartex(nutex[i].id.at(-1))};
    }
    // console.log(nutex.at(-1).id.at(-1));

    pie2.at(-1).appendChild(nutex.at(-1));
    material2.at(-1).appendChild(pie2.at(-1));

    material2.at(-1).appendChild(pie2.at(-1));

    let principal = document.getElementsByTagName("main");
    principal[0].insertBefore(material2.at(-1), pie_clase);
}