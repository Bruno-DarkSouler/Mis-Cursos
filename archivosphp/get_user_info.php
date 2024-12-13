<?php

$host = 'localhost';
$dbname = 'mis-cursos';
$username = 'root';
$password = '';

try {
    // Conexión a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener los datos del usuario
    $stmt = $pdo->prepare("SELECT nombre, correo, fecha_registro, telefono FROM usuarios WHERE id = :id");
    $stmt->execute(['id' => 20001]); // Cambia '1' por el ID dinámico si es necesario
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        echo json_encode($usuario);
    } else {
        echo json_encode(['error' => 'Usuario no encontrado']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error de conexión: ' . $e->getMessage()]);
}
?>