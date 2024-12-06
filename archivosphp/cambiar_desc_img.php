<?php
    require("sistema.php");

    
    $id_cap = $_POST["id_cap"];
    $desc = $_POST["desc"];
    $indice_desc = $_POST["indice_desc"];
    $JSON_img = json_decode(ConsultaSelect($conexion, "SELECT `imagenes` FROM `capitulos` WHERE id = '$id_cap'")[0]["imagenes"], true);

    $JSON_img["desc"][$indice_desc] = $desc;

    $JSON_img = json_encode($JSON_img);

    ConsultaSinRespuesta($conexion, "UPDATE `capitulos` SET `imagenes`='$JSON_img' WHERE id = '$id_cap'");
?>