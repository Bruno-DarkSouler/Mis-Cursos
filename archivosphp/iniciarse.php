<?php

    $noRedirect = True;

    require("./sistema.php");

    $mail =$_POST["mail"];
    $contra =$_POST["contra"];

    $consulta = "SELECT ID_estudiantes, contra, Email, Nombre FROM estudiantes WHERE '$mail' = estudiantes.Email and '$contra' = estudiantes.contra";
    $resultado = $conexion->query($consulta);

    if($resultado->num_rows > 0){
        session_start();
        while($row = $resultado->fetch_assoc()){
            $_SESSION["id"] = $row["ID_estudiantes"];
            $_SESSION["nombre"] = $row["Nombre"];
            $_SESSION["email"] = $row["mail"];
            $_SESSION["contra"] = $row["contra"];
            header("Location: ../index.php");
        }
        
    } else{
        header("Location: ../paginas/iniciosesion.html");
    }

    $conexion->close();
?>