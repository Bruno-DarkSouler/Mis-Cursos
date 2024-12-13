<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ruta del archivo donde se agregará el código
$archivoDestino = "../paginas/paginaprincipal.php";

// Código PHP a agregar
$codigo = '<?php require ("../paginas/mis_cursos.php"); ?>' . PHP_EOL;

// Abrir el archivo en modo de "append" y agregar el código
if (file_put_contents($archivoDestino, $codigo, FILE_APPEND)) {
    echo "Código agregado correctamente.";
} else {
    echo "Error al escribir en el archivo.";
}
?>