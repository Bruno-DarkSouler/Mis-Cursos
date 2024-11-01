const boton_enviar = document.getElementById("enviar_respuestas");

const respuestas = document.querySelectorAll("input[value=1");

boton_enviar.onclick = Enviar_Respuestas;

function Enviar_Respuestas(){
    let ajax = new XMLHttpRequest;

    ajax.open("GET", "../archivosphp/?respuestas_JSON=" + JSON.stringify(respuestas));
    ajax.send();
}