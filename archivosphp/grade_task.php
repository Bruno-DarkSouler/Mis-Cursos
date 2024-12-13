<?php
// Obtener los datos del formulario
$id_entrega = $_POST['id_entrega'];
$numerica = $_POST['numerica'];
$informe = $_POST['informe'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

// Validar los datos (por ejemplo, asegurarse de que los campos no estén vacíos)
if (empty($id_entrega) || empty($numerica) || empty($informe) || empty($fecha) || empty($hora)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Por favor, complete todos los campos del formulario.']);
    exit;
}

// Procesar los datos (por ejemplo, formatearlos, limpiarlos, etc.)
$id_entrega = intval($id_entrega);
$numerica = floatval($numerica);
$fecha = date('Y-m-d', strtotime($fecha));
$hora = date('H:i:s', strtotime($hora));

// Preparar la consulta SQL
$sql = "INSERT INTO calificacion (id_entrega, numerica, informe, fecha, hora)
        VALUES (:id_entrega, :numerica, :informe, :fecha, :hora)
        ON DUPLICATE KEY UPDATE numerica = :numerica, informe = :informe, fecha = :fecha, hora = :hora";

try {
    // Preparar la consulta
    $stmt = $conexion->prepare($sql);

    // Vincular los parámetros
    $stmt->bindParam(':id_entrega', $id_entrega);
    $stmt->bindParam(':numerica', $numerica);
    $stmt->bindParam(':informe', $informe);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':hora', $hora);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Datos guardados correctamente.']);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Error al guardar los datos: ' . $stmt->errorInfo()[2]]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error al conectar a la base de datos: ' . $e->getMessage()]);
}
?>