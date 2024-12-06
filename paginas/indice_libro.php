<?php
    require("../archivosphp/sistema.php");
    $id_libro = $_GET["id_libro"];
    $titulo_libro = ConsultaSelect($conexion, "SELECT `titulo` FROM `libro` WHERE id = '$id_libro'")[0]["titulo"];
    $libro = ConsultaSelect($conexion, "SELECT `id`, `id_libro`, `titulo`, `contenido` FROM `capitulos` WHERE id_libro = '$id_libro'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/general.css">
    <link rel="stylesheet" href="../estilos/libro.css">
    <title>Índice</title>
</head>
<body>
    <main>
        <?php
            echo "<h1 class=\"titulo\">". $titulo_libro ."</h1>";
            echo "<ol>";
            for($i = 0; $i < count($libro); $i++){
                echo "<a href=\"./libro.php?id_cap=". $libro[$i]["id"] ."\"><li class=\"opc\">". $libro[$i]["titulo"] ."</li></a>";
                
            }
            echo "</ol>";
        ?>
    </main>
</body>
</html>