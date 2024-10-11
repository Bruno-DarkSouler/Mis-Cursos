<?php
    require("./sistema.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $consulta = "SELECT clases.material FROM clases WHERE clases.id = 1;";
        $resultado = $conexion->query($consulta);

        if($resultado->num_rows > 0){
            while($filas = $resultado->fetch_assoc()){
                $texto = $filas["material"];
            }
        }

        $campos1 = explode("[ruptura2]", $texto);
        array_pop($campos1);
        $campos2 = [];
        for($i = 0; $i<sizeof($campos1); i++){
            array_push($campos1, explode());
        }
    ?>
</body>
</html>