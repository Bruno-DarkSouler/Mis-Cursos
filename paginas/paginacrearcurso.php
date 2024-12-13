<?php
    require("../archivosphp/sistema.php");

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/general.css">
    <link rel="stylesheet" href="../estilos/crear_curso.css">
    <link rel="icon" href="../imagenes/logo_sin_fondo2.png">
    <title>Nuevo curso</title>
</head>
<body>
    <?php
            echo "
            <a href=\"../paginas/paginaprincipal.php\">
            <div class=\"retroceder\">
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-arrow-bar-left\" viewBox=\"0 0 16 16\">
                    <path fill-rule=\"evenodd\" d=\"M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5\"/>
                </svg>
                <p>Atrás</p>
            </div>
            </a>
            ";
        ?>
    <form action="../archivosphp/crearcurso.php" method="post">
        <label for="nombreC">Nombre del curso:</label><br>
        <input type="text" name="nombreC" id="nombreC" required><br>
        
        <label for="desc">Descripción del curso:</label><br>
        <textarea name="desc" id="desc" required></textarea><br>

        <label for="tema">Tema del curso:</label><br>
        <input type="text" name="tema" class="entrada" required>

        <label for="costo">Precio del curso:</label><br>
        <input type="number" name="costo" class="entrada" required><br>

        <label for="nombre_libro">¿Qué nombre le darás al libro de tu curso?</label>
        <input type="text" name="nombre_libro" class="entrada" id="nombre_libro" required>
        
        <div class="contenedor_centrar">
            <input type="submit" class="enviar">
        </div>
    </form>
</body>
</html>