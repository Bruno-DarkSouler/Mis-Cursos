<?php
    require("sistema.php");

    $id_libro = $_POST["id_libro"];
    $titulo = $_POST["titulo"];
    $contenido = $_POST["conte"];

    $resultado = ConsultaSinRespuesta($conexion, "INSERT INTO `capitulos`(`id_libro`, `titulo`, `contenido`) VALUES ('$id_libro','$titulo','$contenido')");

    if($resultado == 0){
        header("../paginas/indice_libro.php?id_libro=" . $id_libro);
    }else{
        header("../paginas/agregar_cap.php?error=" . "1&id_libro=" . $id_libro);
    }
?>