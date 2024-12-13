<?php
require_once './sistema.php';


$query = "
SELECT 
    entregas.fecha AS Fecha_de_Entrega,
    entregas.hora AS Hora_de_Entrega,
    estudiantes.Nombre AS Nombre_Estudiante,
    estudiantes.Apellido AS Apellido_Estudiante,
    entregas.archivo AS Archivo_Entregado,
    tareas.titulo AS Titulo_Tarea,
    cursos.Nombre_del_curso AS Nombre_Curso,
    entregas.calificacion AS Calificacion,  -- Nuevo campo calificacion
    entregas.comentario AS Comentario      -- Nuevo campo comentario
FROM 
    entregas
INNER JOIN 
    estudiantes ON entregas.id_estudiante = estudiantes.ID_estudiantes
INNER JOIN 
    tareas ON entregas.id_tarea = tareas.id
INNER JOIN 
    cursos ON tareas.id_clase= cursos.ID_cursos;
";

$result = mysqli_query($conexion, $query);

if (!$result) {
    die(json_encode([
        'success' => false, 
        'message' => 'Error en la consulta: ' . mysqli_error($conexion)
    ]));
}

$entregas = [];
while ($row = mysqli_fetch_assoc($result)) {
    $entregas[] = $row;
}

header('Content-Type: application/json');
echo json_encode($entregas);
?>
