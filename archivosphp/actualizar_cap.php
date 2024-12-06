<?php
    require("sistema.php");
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    $id_cap = $_POST["id_cap"];

    ConsultaSinRespuesta($conexion, "UPDATE `capitulos` SET `titulo`='[value-3]',`contenido`='[value-4]' WHERE id = '$id_cap'");
?>