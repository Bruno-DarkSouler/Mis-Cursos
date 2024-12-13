<?php

require '../archivosphp/sistema.php'; // Conexión a la base de datos

$idEstudiante = $_SESSION['usuario_id'];

// Obtener los datos del estudiante
$query = "SELECT nombre, apellido, email, telefono, foto_perfil FROM estudiantes WHERE ID_estudiantes = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $idEstudiante);
$stmt->execute();
$resultado = $stmt->get_result();
$estudiante = $resultado->fetch_assoc();

if (!$estudiante) {
    echo "No se encontró información del estudiante.";
    exit;
}

// Ruta base para fotos de perfil
$rutaBase = '../imagenes/perfiles/';
$fotoPerfil = !empty($estudiante['foto_perfil']) ? $estudiante['foto_perfil'] : 'default.jpg';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="../estilos/perfil.css">
</head>
<style>
    .perfil {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    text-align: center;
}

.foto-perfil img {
    border-radius: 50%;
    width: 300px;
    height: 300px;
    object-fit: cover;
}

.datos h2 {
    font-size: 24px;
    font-weight: bold;
    margin: 10px 0;
}

.datos p {
    font-size: 16px;
    color: #555;
}

</style>
<body>
    <main>
        <section class="perfil">
            <div class="informacion-usuario">
                <!-- Foto de perfil -->
                <div class="foto-perfil">
                    <img src="<?= htmlspecialchars($rutaBase . $fotoPerfil); ?>" alt="Foto de perfil">
                </div>
                <!-- Información del usuario -->
                <div class="datos">
                    <h2><?= htmlspecialchars($estudiante['nombre'] . ' ' . $estudiante['apellido']); ?></h2>
                    <p><strong>Correo electrónico:</strong> <?= htmlspecialchars($estudiante['email']); ?></p>
                    <p><strong>Teléfono:</strong> <?= htmlspecialchars($estudiante['telefono']); ?></p>
                </div>
            </div>
            <!-- Botones de acción -->
            <div class="opciones">
                <a href="./miperfil.php">
                    <button id="editar-perfil">Editar perfil</button>
                </a>
                <button id="cerrar-sesion" onclick="cerrarSesion()">Cerrar sesión</button>
            </div>
        </section>
    </main>

    <script>
        // Función para cerrar sesión
        function cerrarSesion() {
            window.location.href = "../archivosphp/cerrar_sesion.php";
        }
    </script>
</body>
</html>