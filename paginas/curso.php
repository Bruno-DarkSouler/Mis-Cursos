<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/curso.css">
    <title>Curso</title>
</head>
<body>

<?php

require("../archivosphp/inscripción.php");

$sql_count = "SELECT COUNT(ID_cursos) AS total_cursos FROM cursos";
$result_count = $conexion->query($sql_count);
$row_count = $result_count->fetch_assoc();
$contador = $row_count['total_cursos'];

$id_curso = [];

while ($contador > 0) {
    $sql = "SELECT ID_cursos FROM cursos LIMIT " . ($contador - 1) . ", 1";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();

    if ($row) {
        $id_curso[] = $row['ID_cursos'];
    }

    $contador--;
}

foreach ($id_curso as $id) {
    $nombre_curso = ConsultaSelect($conexion, "SELECT Nombre_del_curso FROM cursos WHERE ID_cursos = '$id'")[0]["Nombre_del_curso"];
    $descripcion = ConsultaSelect($conexion, "SELECT Descripcion FROM cursos WHERE ID_cursos = '$id'")[0]["Descripcion"];
    $precio = ConsultaSelect($conexion, "SELECT Costo FROM cursos WHERE ID_cursos = '$id'")[0]["Costo"];

    echo "<div class=\"principal_1\">

<div class=\"imagen\"><img class=\"img\" src=\"../imagenes/isologo_sin_fondo.png\" alt=\"\"></div>
<div class=\"titulo\">
    <div class=\"nombre_curso\"><p>'$nombre_curso</p></div>
    <div class=\"precio_curso\"><p>Precio: $precio</p></div>
</div>
<div>
<p class=\"titulo_descripcion\">Descripción:</p>
<div class=\"descripcion\">$descripcion</div>
</div>
<div class=\"button\">
<!-- Enlace para pasar el ID del curso a inscripcion.php -->
                <a href=\"../archivosphp/inscripción.php?id_curso=$id\">
                    <button>Inscribirse al curso</button>
</div>

</div>";
}
?>

<script src="../archivosjs/inscribirse.js"></script>
    
</body>
</html>