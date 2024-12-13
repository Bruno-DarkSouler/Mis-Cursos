<?php
session_start();
require './sistema.php'; // Conexión a la base de datos

// Verificar si la sesión está activa
if (!isset($_SESSION['usuario_id'])) {
    echo "Acceso no autorizado.";
    exit;
}

$idEstudiante = $_SESSION['usuario_id'];

// Verificar que los datos se enviaron correctamente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $rutaBase = '../imagenes/perfiles/';  // Ruta donde se guardan las fotos
    $fotoPerfil = '';  // Inicializar la variable de la foto

    // Manejo del archivo de imagen (opcional)
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
        // Crear la carpeta si no existe
        if (!is_dir($rutaBase)) {
            mkdir($rutaBase, 0777, true);
        }

        // Generar un nombre único para la imagen
        $nombreArchivo = uniqid() . "_" . basename($_FILES['foto_perfil']['name']);
        $rutaArchivo = $rutaBase . $nombreArchivo;

        // Mover la imagen a la carpeta de destino
        if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $rutaArchivo)) {
            $fotoPerfil = $nombreArchivo;
        } else {
            echo "Error al subir la imagen.";
            exit;
        }
    }

    // Actualizar los datos en la base de datos
    if ($fotoPerfil) {
        $query = "UPDATE estudiantes SET nombre = ?, apellido = ?, email = ?, foto_perfil = ? WHERE ID_estudiantes = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("ssssi", $nombre, $apellido, $email, $fotoPerfil, $idEstudiante);
    } else {
        $query = "UPDATE estudiantes SET nombre = ?, apellido = ?, email = ? WHERE ID_estudiantes = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("sssi", $nombre, $apellido, $email, $idEstudiante);
    }

    if ($stmt->execute()) {
        // Actualizar la variable de sesión con la nueva foto de perfil
        if ($fotoPerfil) {
            $_SESSION['foto_perfil'] = $fotoPerfil;  // Actualiza la foto de perfil en la sesión
        }

        echo "Perfil actualizado correctamente.";
        header("Location: ../paginas/miperfil.php"); // Redirigir al perfil
        exit;
    } else {
        echo "Error al actualizar el perfil: " . $conexion->error;
    }

    $stmt->close();
} else {
    echo "Método no permitido.";
    exit;
}
?>
