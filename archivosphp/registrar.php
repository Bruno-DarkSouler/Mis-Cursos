<?php
    $conexion = new mysqli("localhost", "root", "", "mis_cursos");

    $nombre =$_POST["nombre"];
    $apellido =$_POST["apellido"];
    $rol = $_POST["gender"];
    $especialidad = $_POST["especialidad"];
    $Email =$_POST["Email"];
    $tel =$_POST["tel"];
    $contra =$_POST["contra"];
    $contra2 =$_POST["contra2"];
    $fecha = date("Y") . "-" . date("n") . "-" . date("j");
    
    if ($rol == "instructores"){
        $consulta = "INSERT INTO `instructores`(`ID_instructores`, `Nombre`, `Apellido`, `Especialidad`, `Email`, `Telefono`, `contra`) VALUES ('[value-1]','$nombre','$apellido','$especialidad','$Email','$tel','$contra')";
    } else{
        $consulta = "INSERT INTO estudiantes(ID_estudiantes, Nombre, Apellido, Telefono, Fecha_de_inscripcion, contra, Email) VALUES ('','$nombre','$apellido','$tel','$fecha','$contra','$Email')";
    }

    if (mysqli_query($conexion, $consulta)){
        require("./iniciarse.php");
    }
    mysqli_close($conexion);
?>