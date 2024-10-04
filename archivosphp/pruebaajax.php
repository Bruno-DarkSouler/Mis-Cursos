<?php
    require("./sistema.php");

    $cadena = $_POST["cadena"];
    $fecha = date("Y") . "-" . date("n") . "-" . date("j");
    $nombre = "Amogus";

    $nu_clase = "INSERT INTO `clases`(`id`, `titulo`, `fecha_clase`, `id_curso`) VALUES ('[value-1]','$nombre', '$fecha', 1);";
    if (!mysqli_query($conexion, $nu_clase)){
        die("Chale");
    }

    $co_idclase = "SELECT `id` FROM `clases`;";
    $re_idclase = $conexion->query($co_idclase);

    if($re_idclase->num_rows > 0){
        while($row = $re_idclase->fetch_assoc()){
            $id_clase = $row["id"];
        }
    }

    

    $consulta = "INSERT INTO `material`(`id`, `contenido`, `id_clase`) VALUES ('[value-1]', $cadena,'[value-3]');";

    
    echo $cadena;
?>