<?php
    // require("./verificarinstruc.php");
    require("./sistema.php");

    $nombreC = $_POST["nombreC"];
    $desc = $_POST["desc"];
    $tema = $_POST["tema"];
    $fecha = FechaActual();
    $nombre_libro = $_POST["nombre_libro"];
    $id_aux = ConsultaSelect($conexion, "SELECT MAX(ID_cursos) AS idM FROM cursos");
    $id_curso = $id_aux[0]["idM"] + 1;
    $legajo = $_SESSION["legajo"];


    ConsultaSinRespuesta($conexion, "INSERT INTO `cursos`(`ID_cursos`, Nombre_del_curso`, `Descripcion`, `Categoria`, `Legajo`) VALUES ('$id_curso','$nombreC','$desc','$tema','$legajo')");
    ConsultaSinRespuesta($conexion, "INSERT INTO `libro`(`id_curso`, `titulo`) VALUES ('$id_curso','$nombre_libro')");

    if($resultado == 0){
        header("Location:../paginas/paginaprincipal.php");
    }else{
        header("Location:../paginas/paginacrearcurso");
    }
?>