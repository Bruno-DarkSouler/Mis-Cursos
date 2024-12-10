<?php
    require("../archivosphp/sistema.php");
    $id_libro = $_GET["id_libro"];
    $titulo_libro = ConsultaSelect($conexion, "SELECT `titulo` FROM `libro` WHERE id = '$id_libro'")[0]["titulo"];
    $id_curso = ConsultaSelect($conexion, "SELECT `id_curso` FROM `libro` WHERE id = '$id_libro'")[0]["id_curso"];
    $libro = ConsultaSelect($conexion, "SELECT `id`, `id_libro`, `titulo`, `contenido` FROM `capitulos` WHERE id_libro = '$id_libro'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/general.css">
    <link rel="stylesheet" href="../estilos/libro.css">
    <link rel="icon" href="../imagenes/logo_sin_fondo2.png">
    <?php
        echo "
        <title>". $titulo_libro ."</title>
        ";
    ?>
</head>
<body>
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
        <?php
            echo "<h1 class=\"titulo\">". $titulo_libro ."</h1>";
            echo "<ol>";
            for($i = 0; $i < count($libro); $i++){
                echo "<a href=\"./libro.php?id_cap=". $libro[$i]["id"] ."\"><li class=\"opc\">". $libro[$i]["titulo"] ."</li></a>";
                
            }
            echo "
            <a href=\"./agregar_cap.php?id_libro=". $id_libro ."\"><p id=\"nuevo_cap\">+ Nuevo Capítulo</p></a>
            </ol>";
        ?>
    </main>
</body>
</html>