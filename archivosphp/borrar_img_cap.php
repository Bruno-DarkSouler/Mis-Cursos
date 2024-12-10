<?php
    require("sistema.php");

    
    $id_cap = $_POST["id_cap"];
    $indice_img = $_POST["indice_img"];
    $JSON_img = json_decode(ConsultaSelect($conexion, "SELECT `imagenes` FROM `capitulos` WHERE id = '$id_cap'")[0]["imagenes"], true);

    if(count($JSON_img["desc"]) > 1){
        array_splice($JSON_img["desc"], $indice_img, $indice_img);
        array_splice($JSON_img["img"], $indice_img, $indice_img);
    }else{
        array_splice($JSON_img["desc"], $indice_img, $indice_img + 1);
        array_splice($JSON_img["img"], $indice_img, $indice_img + 1);
    }

    $JSON_img = json_encode($JSON_img);

    $respuesta = ConsultaSinRespuesta($conexion, "UPDATE `capitulos` SET `imagenes`='$JSON_img' WHERE id = '$id_cap'");

    if($respuesta == 1){
        header("Location:../paginas/libro.php?id_cap=" . $id_cap);
    }else{
        header("Location:../paginas/libro.php?id_cap=" . $id_cap);
    }
?>