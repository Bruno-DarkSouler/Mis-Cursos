<?php
    require("../archivosphp/sistema.php");
    $id_libro = $_GET["id_libro"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/general.css">
    <link rel="stylesheet" href="../estilos/agregar_cap.css">
    <link rel="icon" href="../imagenes/logo_sin_fondo2.png">
    <title>Agregar capítulo</title>
</head>
<body>
    <main>
        <form action="../archivosphp/nuevo_cap.php" method="post">
            <label for="titulo">Título del capítulo: </label><br>
            <input type="text" id="titulo" name="titulo" required><br>
            <label for="consigna">Contenido textual: </label><br>
            <textarea name="conte" id="consigna"></textarea><br>

            <?php
                echo "<input type=\"hidden\" name=\"id_libro\" value=\"". $id_libro ."\">";
            ?>

            <div class="contenedor_centrar">
                <input type="submit" class="enviar" value="Agregar">
            </div>
        </form>
    </main>
</body>
</html>