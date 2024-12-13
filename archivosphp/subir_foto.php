<?php
session_start();
if (!isset($_SESSION['ID_estudiantes'])) {
    header("Location: ../paginas/iniciosesion.html");
    exit;
}

$conexion = new mysqli("localhost", "root", "", "sistema");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$idEstudiante = $_SESSION['ID_estudiantes'];
$rutaBase = '../imagenes/perfiles/';

if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
    $nombreArchivo = $idEstudiante . '_' . basename($_FILES['foto_perfil']['name']);
    $rutaDestino = $rutaBase . $nombreArchivo;

    // Mover el archivo cargado
    if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $rutaDestino)) {
        // Actualizar la base de datos
        $stmt = $conexion->prepare("UPDATE estudiantes SET foto_perfil = ? WHERE ID_estudiantes = ?");
        $stmt->bind_param("si", $nombreArchivo, $idEstudiante);
        $stmt->execute();

        header("Location: ../paginas/miperfil.php");
    } else {
        echo "Error al subir la foto.";
    }
} else {
    echo "No se recibió ningún archivo o hubo un error al cargarlo.";
}
?>
