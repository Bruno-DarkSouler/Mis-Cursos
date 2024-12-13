<?php

require '../archivosphp/sistema.php'; // Conexión a la base de datos

$idEstudiante = $_SESSION['usuario_id'];

// Obtener los datos del estudiante
$query = "SELECT nombre, apellido, email, foto_perfil FROM estudiantes WHERE ID_estudiantes = ?";
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
    <title>Editar Perfil</title>
    
    <style>
        @font-face {
            font-family: montserrat;
            src: url(../Montserrat-Italic-VariableFont_wght.ttf);
        }
        html, body {
            height: 100%;
            
        }
        .opciones a{
            color: #000;
            font-weight: bold;
          
        }

        * {
            margin: 0;
            padding: 0;
            font-family: montserrat;
            line-height: 1.5;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(white, #DE9102);
            margin: 0;
            padding: 0;
            
        }
        nav {
    display: flex;
    justify-content: space-between; 
    align-items: center; 
    background-color: #DE9102;
    height: 5rem;
    padding: 0 2rem; 
        }
        nav a{
            text-decoration: none;
        }
        
        .logo-titulo {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .logo {
            width: 3.75rem;
            height: 3.75rem;
            margin-left: 13px;
        }
        .titulo h3 {
            color: white;
            margin-left: 10px;
        }
        .opciones a {
            text-decoration: none;
            color: black;
            margin: 0 15px;
        }
        .opciones{
            font-size: 19px;
            margin-right: 8rem;
            display: flex;
        }
        .logeo .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            min-width: 160px;
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropbtn {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }
        .profile-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }
        input[type="text"], input[type="email"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .cancel-button {
            background-color: #f44336;
            margin-top: 10px;
        }
        .cancel-button:hover {
            background-color: #d32f2f;
        }
        .foto-perfil {
            text-align: center;
            margin-bottom: 15px;
        }
        .foto-perfil img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 2px solid #ccc;
            object-fit: cover;
        }
        .titulo h3{
            color: #000;
            text-decoration: none; 
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="../index.php">
                <div class="logo-titulo">
                    <img class="logo" src="../imagenes/logo_sin_fondo2.png" alt="Logo de Mis Cursos">
                    <div class="titulo">
                        <h3>Mis Cursos</h3>
                    </div>
                </div>
            </a>
            <div class="opciones">
                <a href="./paginas/precios.php">Explorar cursos</a>
                <a href="./paginas/ayuda.php">Ayuda</a>
                <a href="./paginas/fundadores.php">Fundadores</a>
            </div>
            <div class="logeo">
                <?php if (isset($_SESSION['usuario'])): ?>
                    <div class="dropdown">
                        <button class="dropbtn">
                            <img src="<?= htmlspecialchars($rutaBase . $fotoPerfil); ?>" alt="Foto de perfil" class="profile-image">
                        </button>
                        <div class="dropdown-content">
                            <a href="./paginas/miperfil.php">Mi Perfil</a>
                            <a href="./archivosphp/cerrarsesion.php">Cerrar sesión</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="./paginas/iniciosesion.html">Iniciar sesión</a>
                    <a href="./paginas/registrousuario.html">Crear cuenta</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1>Editar Perfil</h1>
        <div class="foto-perfil">
            <img src="<?= htmlspecialchars($rutaBase . $fotoPerfil); ?>" alt="Foto de perfil">
        </div>
        <form action="../archivosphp/actualizar_perfil.php" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario()">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($estudiante['nombre']); ?>" 
        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" 
        title="El nombre solo debe contener letras y espacios" 
        required>
        
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($estudiante['apellido']); ?>" 
        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" 
        title="El apellido solo debe contener letras y espacios" 
        required>
        
    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($estudiante['email']); ?>" 
        required>
        
    <label for="foto_perfil">Foto de Perfil:</label>
    <input type="file" id="foto_perfil" name="foto_perfil" accept="image/*">
    
    <button type="submit">Guardar Cambios</button>
    <a href="miperfil.php"><button type="button" class="cancel-button">Cancelar</button></a>
</form>

    </div>
</body>
</html>