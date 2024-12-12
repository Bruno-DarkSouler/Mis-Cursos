<?php
    require("./sistema.php");

    $nombre =$_POST["nombre"];
    $apellido =$_POST["apellido"];
    $rol = $_POST["gender"];
    $especialidad = $_POST["especialidad"];
    $Email =$_POST["mail"];
    $tel =$_POST["tel"];
    $contra =$_POST["contra"];
    $contra2 =$_POST["contra2"];
    $fecha = date("Y") . "-" . date("n") . "-" . date("j");
    $legajo = $_POST["legajo"];
    
    $id_estudiante = ConsultaSelect($conexion, "SELECT MAX(ID_estudiantes) AS maxid FROM estudiantes")[0]["maxid"] + 1;
    
    $resultado = ConsultaSinRespuesta($conexion, "INSERT INTO estudiantes(ID_estudiantes, Nombre, Apellido, Telefono, Fecha_de_inscripcion, contra, Email) VALUES ('$id_estudiante', '$nombre','$apellido','$tel','$fecha','$contra','$Email')");

    if($rol == "ins"){
        $resultado = ConsultaSinRespuesta($conexion, "INSERT INTO `instructores`(`ID_instructores`, `id_estudiante`) VALUES ('$legajo', '$id_estudiante')");
    }


    if($resultado == 0){
        header("Location:../paginas/iniciosesion.html");
    }else{
        header("Location:../paginas/registrousuario.html");
    }
?>