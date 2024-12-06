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
    <title>Nueva tarea</title>
</head>
<body>
    <header>

    </header>
    <main>
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