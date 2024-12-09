<?php
    require("sistema.php");
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    $id_cap = $_POST["id_cap"];

    $respuesta = ConsultaSinRespuesta($conexion, "UPDATE `capitulos` SET `titulo`='$titulo',`contenido`='$contenido' WHERE id = '$id_cap'");

    if($respuesta == 1){
        header("Location:../paginas/libro.php?id_cap=" . $id_cap);
    }else{
        header("Location:../paginas/libro.php?id_cap=" . $id_cap);
    }
?>