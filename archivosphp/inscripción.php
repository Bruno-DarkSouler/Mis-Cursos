<?php
$conexion = new mysqli("localhost", "root", "", "mis-cursos");

// Verificar si 'id_curso' está presente en la URL
if (isset($_GET['id_curso'])) {
    // Obtener el ID del curso
    $id_curso = $_GET['id_curso'];
    
    // Ahora puedes usar el $id_curso en cualquier parte del código
    echo "Has seleccionado el curso con ID: " . $id_curso;
    
    // Aquí puedes realizar consultas para obtener más detalles del curso
    $consulta = "SELECT * FROM cursos WHERE ID_cursos = '$id_curso'";
    $resultado = $conexion->query($consulta);
    $curso = $resultado->fetch_assoc();
    
    // Mostrar los detalles del curso
    echo "Nombre del curso: " . $curso['Nombre_del_curso'];
    echo "Descripción: " . $curso['Descripcion'];
    echo "Precio: " . $curso['Costo'];
} else {
    echo "No se ha seleccionado ningún curso.";
}
?>