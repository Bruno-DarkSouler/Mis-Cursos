<?php
    $consulta = "SELECT cursos.Nombre_del_curso, cursos.Categoria, cursos.Descripcion FROM cursos INNER JOIN matriculas ON matriculas.ID_cursos = cursos.ID_cursos INNER JOIN estudiantes ON estudiantes.ID_estudiantes = matriculas.ID_estudiantes WHERE '$_SESSION[id]' = estudiantes.ID_estudiantes";
    $resultado = $conexion->query($consulta);
?>