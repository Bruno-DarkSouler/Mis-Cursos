<?php
    // require("./verificarinstruc.php");
    require("./sistema.php");

    $nombreC = $_POST["nombreC"];
    $desc = $_POST["desc"];
    $tema = $_POST["tema"];
    $fecha = $_POST["fechaF"];
    $costo = $_POST["costo"];

    $consulta = "INSERT INTO `cursos`(`ID_cursos`, `Nombre_del_curso`, `Descripcion`, `Duracion`, `Costo`, `Categoria`) VALUES ('[value-1]','$nombreC','$desc','$fecha','$costo','$tema')";
    
    if(mysqli_query($conexion, $consulta)){
        echo "Bien hecho";
        // header("Location: ../paginas/cursos.php");
    }
?>