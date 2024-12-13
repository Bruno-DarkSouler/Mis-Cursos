<?php
// Establecer conexión con la base de datos
require './sistema.php';

header('Content-Type: application/json');

// Obtener los datos enviados desde el cliente
$inputData = json_decode(file_get_contents('php://input'), true);

// Verifica los datos recibidos
var_dump($inputData); // Esto imprimirá los datos recibidos

// Validar los datos recibidos
if (!isset($inputData['taskId'], $inputData['calificacion']) || empty($inputData['calificacion'])) {
    echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
    exit;
}

// Sanitizar datos
$taskId = intval($inputData['taskId']);
$calificacion = $inputData['calificacion'];
$comentario = $inputData['comentario'] ?? '';

// Actualizar la calificación y el comentario en la tabla 'entregas'
$query = "UPDATE entregas SET calificacion = ?, comentario = ? WHERE id = ?";
$stmt = $conn->prepare($query);
if ($stmt) {
    $stmt->bind_param('ssi', $calificacion, $comentario, $taskId);
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Calificación actualizada exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar la calificación']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Error al preparar la consulta']);
}

$conn->close();