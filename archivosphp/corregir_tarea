<?php
// Incluir la conexión a la base de datos
include('./sistema.php'); // Asegúrate de que la ruta sea la correcta

// Verificar que la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos enviados en formato JSON
    $data = json_decode(file_get_contents('php://input'), true);

    // Verificar si los datos necesarios están presentes
    if (isset($data['taskId']) && isset($data['grade']) && isset($data['comments'])) {
        // Asignar los valores a variables
        $id_entrega = $data['taskId']; // ID de la entrega
        $numerica = $data['grade']; // La calificación
        $informe = $data['comments']; // Comentarios del profesor

        // Fecha y hora actuales
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        // Consulta SQL para insertar los datos en la tabla 'calificacion'
        $query = "INSERT INTO calificacion (id_entrega, numerica, informe, fecha, hora) 
                  VALUES (?, ?, ?, ?, ?)";

        // Preparar la consulta
        if ($stmt = $conexion->prepare($query)) {
            // Vincular los parámetros
            $stmt->bind_param("iisss", $id_entrega, $numerica, $informe, $fecha, $hora);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Respuesta exitosa
                echo json_encode(['success' => true, 'message' => 'Calificación guardada correctamente.']);
            } else {
                // Respuesta si la ejecución falla
                echo json_encode(['success' => false, 'message' => 'Error al guardar la calificación.']);
            }

            // Cerrar la sentencia
            $stmt->close();
        } else {
            // Respuesta si hay error en la preparación de la consulta
            echo json_encode(['success' => false, 'message' => 'Error en la preparación de la consulta.']);
        }
    } else {
        // Respuesta si faltan datos
        echo json_encode(['success' => false, 'message' => 'Faltan datos requeridos.']);
    }
} else {
    // Respuesta si la solicitud no es POST
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
