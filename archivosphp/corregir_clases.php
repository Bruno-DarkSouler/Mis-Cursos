<?php
    require("./sistema.php");

    $respuestas = json_decode($_GET["respuestas_JSON"], true);

    $consulta = "SELECT calificacion.id, clases.mul_opc FROM calificacion JOIN clases ON calificacion.id_clase = clases.id JOIN cursos ON cursos.ID_cursos = clases.id_curso JOIN matriculas ON matriculas.ID_cursos = cursos.ID_cursos JOIN estudiantes ON matriculas.ID_estudiantes = estudiantes.ID_estudiantes WHERE clases.id = AND estudiantes.ID_estudiantes =";
    $resultado = $conexion->query($consulta);
    $respuestas_correctas_JSON = $resultado->fetch_assoc();
    $respuestas_correctas = json_decode($respuestas_correctas_JSON["mul_opc"], true);
    $id_calificacion = $respuestas_correctas_JSON["id"];

    $nota = 0;

    for($i=0; $i<count($respuestas); $i++){
        if($respuestas[$i] == $respuestas_correctas["respuesta"][$i]){
            $nota += 10;
        }
    }

    $nota = $nota/10;

    $consulta = "UPDATE `calificacion` SET `numerica`='$nota'`respuestas`='$respuestas' WHERE calificacion.id = '$id_calificacion'";
    mysqli_query($conexion, $consulta);
?>