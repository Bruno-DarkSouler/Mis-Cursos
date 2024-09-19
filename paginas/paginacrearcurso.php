<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../archivosphp/crearcurso.php" method="post">
        <label for="text">Nombre del curso:</label><br>
        <input type="text" name="nombreC"><br>
        <label for="text">Descripción del curso:</label><br>
        <input type="text" name="desc"><br>
        <label for="text">Tema del curso:</label><br>
        <input type="text" name="tema"><br>
        <label for="date">Fecha de finalización del curso:</label><br>
        <input type="date" name="fechaF"><br>
        <label for="number">Precio del curso:</label><br>
        <input type="number" name="costo"><br>
        <input type="submit">
    </form>
</body>
</html>