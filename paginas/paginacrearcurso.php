<?php
    require("../archivosphp/sistema.php");

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imagenes/logo_sin_fondo2.png">
    <title>Document</title>
</head>
<body>
    <form action="../archivosphp/crearcurso.php" method="post">
        <label for="nombreC">Nombre del curso:</label><br>
        <input type="text" name="nombreC"><br>
        
        <label for="desc">Descripción del curso:</label><br>
        <input type="text" name="desc"><br>

        <label for="tema">Tema del curso:</label><br>
        <input type="text" name="tema">

        <label for="costo">Precio del curso:</label><br>
        <input type="number" name="costo"><br>

        <label for="nombre_libro">¿Qué nombre le darás al libro de tu curso?</label>
        <input type="text" name="nombre_libro">

        <input type="submit">
    </form>
</body>
</html>