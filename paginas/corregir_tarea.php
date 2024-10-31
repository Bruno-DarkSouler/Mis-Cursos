<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <div>
            <?php
                require("../archivosphp/sistema.php");

                $consulta = "SELECT estudiantes.Nombre, calificacion.tareas, calificacion.respuestas FROM `calificacion` JOIN clases ON calificacion.id_clase = clases.id JOIN cursos ON cursos.ID_cursos = clases.id_curso JOIN matriculas ON matriculas.ID_cursos = cursos.ID_cursos JOIN estudiantes ON matriculas.ID_estudiantes = estudiantes.ID_estudiantes WHERE clases.id = ";
                $resultado = $conexion->query($resultado);

                if($resultado->num_rows > 0){
                    while($fila = $resultado->fetch_assoc()){
                        echo ""
                    }
                }
            ?>
            
        </div>
    </main>
</body>
</html>