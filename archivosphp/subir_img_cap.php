<?php
    require("sistema.php");

    $id_cap = $_POST["id_cap"];
    // $id_cap = 3;
    $nombreArchivo = SubirArchivo("../imagenes/imagenes_libros/", true);
    $desc = $_POST["desc"];
    $JSON_img = json_decode(ConsultaSelect($conexion, "SELECT `imagenes` FROM `capitulos` WHERE id = '$id_cap'")[0]["imagenes"], true);

    print_r($JSON_img);
    
    array_push($JSON_img["desc"], $desc);
    array_push($JSON_img["img"], $nombreArchivo);

    $JSON_img = json_encode($JSON_img);

    $resultado = ConsultaSinRespuesta($conexion, "UPDATE `capitulos` SET `imagenes`='$JSON_img' WHERE id = '$id_cap'");

    if($resultado == 0){
        header("Location:../paginas/libro.php?id_cap=" . $id_cap);
    }else{
        header("Location:../paginas/libro.php?id_cap=" . $id_cap);
    }
?>