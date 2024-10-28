<?php
    require("./sistema.php");

    $mulopc_JSON = $_POST["mulopc_JSON"];
    $tarea_JSON = $_POST["tarea_JSON"];
    $material_JSON = $_POST["material_JSON"];
    $fecha = date("Y") . "-" . date("n") . "-" . date("j");
    $nombre = "Amogus";

    

    $nu_clase = "INSERT INTO `clases`(`titulo`, `fecha_clase`, `id_curso`, `calificacion`, `evaluacion`, `material`, `tarea`, `mul_opc`) VALUES ('$nombre', '$fecha', '1', '10', '1', '$material_JSON', '$tarea_JSON', '$mulopc_JSON');";
    if (!mysqli_query($conexion, $nu_clase)){
        die("Chale");
    }

    // $co_idclase = "SELECT `id` FROM `clases`;";
    // $re_idclase = $conexion->query($co_idclase);

    // if($re_idclase->num_rows > 0){
    //     while($row = $re_idclase->fetch_assoc()){
    //         $id_clase = $row["id"];
    //     }
    // }

    

    // $consulta = "INSERT INTO `material`(`id`, `contenido`, `id_clase`) VALUES ('[value-1]', $cadena,'[value-3]');";

    
    // echo $cadena;
?>