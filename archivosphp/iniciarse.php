<?php
    require("./sistema.php");

    $Email = $_POST["mail"];
    $contra = $_POST["contra"];

    $resultado = ConsultaSelect($conexion, "SELECT ID_estudiantes, contra, Email, Nombre FROM estudiantes WHERE '$Email' = estudiantes.Email and '$contra' = estudiantes.contra");
    
    
    if($resultado != 1){
        $id_estudiante = $resultado[0]["ID_estudiantes"];
        $rol = ConsultaSelect($conexion, "SELECT ID_instructores FROM instructores WHERE id_estudiante = '$id_estudiante'");
        session_start();
        $_SESSION["id"] = $resultado[0]["ID_estudiantes"];
        $_SESSION["nombre"] = $resultado[0]["Nombre"];
        $_SESSION["email"] = $resultado[0]["Email"];
        if($rol != 1){
            $_SESSION["rol"] = "ins";
            $_SESSION["legajo"] = $rol[0]["ID_instructores"];
        }else{
            $_SESSION["rol"] = "est";
        }
        $_SESSION["contra"] = $resultado[0]["contra"];
        header("Location: ../paginas/paginaprincipal.php");
        
    } else{
        header("Location: ../paginas/iniciosesion.html");
    }
?>