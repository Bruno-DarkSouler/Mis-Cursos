<?php

    $noRedirect = True;

    require("./sistema.php");

    $Email = $_POST["Email"];
    $contra = $_POST["contra"];

    $resultado = ConsultaSelect($conexion, "SELECT ID_estudiantes, contra, Email, Nombre FROM estudiantes WHERE '$Email' = estudiantes.Email and '$contra' = estudiantes.contra")[0];

    $rol = ConsultaSelect($conexion, "SELECT ID_instructores FROM `instructores` WHERE id_estudiante = $resultado[ID_estudiantes]");

    if($resultado == 0){
        session_start();
        $_SESSION["id"] = $resultado["ID_estudiantes"];
        $_SESSION["nombre"] = $resultado["Nombre"];
        $_SESSION["email"] = $resultado["Email"];
        if($rol = 0){
            $_SESSION["rol"] = "ins";
            $_SESSION["legajo"] = $rol[0]["ID_instructores"];
        }else{
            $_SESSION["rol"] = "est";
        }
        $_SESSION["contra"] = $resultado["contra"];
        header("Location: ../index.php");
        
    } else{
        header("Location: ../paginas/iniciosesion.html");
    }
?>