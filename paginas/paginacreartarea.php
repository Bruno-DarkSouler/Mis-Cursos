<?php
    require("../archivosphp/sistema.php");
    $id_curso = $_GET["id_curso"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/general.css">
    <link rel="stylesheet" href="../estilos/crear_tarea.css">
    <link rel="icon" href="../imagenes/logo_sin_fondo2.png">
    <title>Nueva tarea</title>
</head>
<body>
    <header>

    </header>
    <main>
        <?php
            echo "
            <a href=\"./contenido_curso.php?id_curso=". $id_curso ."\">
            <div class=\"retroceder\">
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-arrow-bar-left\" viewBox=\"0 0 16 16\">
                    <path fill-rule=\"evenodd\" d=\"M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5\"/>
                </svg>
                <p>Atrás</p>
            </div>
            </a>
            ";
        ?>
        <form action="../archivosphp/creartarea.php" method="post">
            <label for="titulo">Título de la actividad: </label><br>
            <input type="text" id="titulo" name="titulo" required><br>
            <label for="consigna">Consigna: </label><br>
            <textarea name="consigna" id="consigna"></textarea><br>

            <label>Evaluación:</label><br>
            <label for="si" class="opc">Sí</label>
            <input type="radio" value="1" name="eval" id="si" checked><br>
            <label for="no" class="opc">No</label>
            <input type="radio" value="0" name="eval" id="no">

            <?php
                echo "<input type=\"hidden\" name=\"id_curso\" value=\"". $id_curso ."\">";
            ?>

            <div class="contenedor_centrar">
                <input type="submit" class="enviar">
            </div>
        </form>
    </main>
</body>
</html>