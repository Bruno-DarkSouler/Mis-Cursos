<?php
    require("sistema.php");

    
    $id_cap = $_POST["id_cap"];
    $desc = $_POST["desc"];
    $indice_img = $_POST["indice_img"];
    $JSON_img = json_decode(ConsultaSelect($conexion, "SELECT `imagenes` FROM `capitulos` WHERE id = '$id_cap'")[0]["imagenes"], true);

    array_splice($JSON_img["desc"], $indice_img, $indice_img);
    array_splice($JSON_img["img"], $indice_img, $indice_img);

    $JSON_img = json_encode($JSON_img);

    ConsultaSinRespuesta($conexion, "UPDATE `capitulos` SET `imagenes`='$JSON_img' WHERE id = '$id_cap'");
?>