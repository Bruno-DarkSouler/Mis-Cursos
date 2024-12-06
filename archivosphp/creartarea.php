<?php
    require("./sistema.php");

    $titulo = $_POST["titulo"];
    $consigna = $_POST["consigna"];
    $id_curso = $_POST["id_curso"];
    $evaluacion = $_POST["eval"];
    
    $resultado = ConsultaSinRespuesta($conexion, "INSERT INTO `tarea`(`id_curso`, `titulo`, `contenido`, evaluacion) VALUES ('$id_curso','$titulo','$consigna', '$evaluacion')");

    if($resultado == 0){
        header("../paginas/contenido-curso.php?id_curso=" . $id_curso);
    }else{
        header("../paginas/paginacreartarea.php?error=" . "1&id_curso=" . $id_curso);
    }
?>