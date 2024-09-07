<?php
    $conexion = new mysqli("localhost", "root", "", "mis_cursos");

    $nombre =$_POST["nombre"];
    $apellido =$_POST["apellido"];
    $rol = $_POST["gender"];
    $especialidad = $_POST["especialidad"];
    $mail =$_POST["mail"];
    $tel =$_POST["tel"];
    $contra =$_POST["contra"];
    $contra2 =$_POST["contra2"];
    $fecha = date("Y") . "-" . date("n") . "-" . date("j");
    
    if ($rol == "Instructores"){
        $consulta = "INSERT INTO `instructores`(`ID_instructores`, `Nombre`, `Apellido`, `Especialidad`, `Email`, `Telefono`, `contra`) VALUES ('[value-1]','$nombre','$apellido','$especialidad','$mail','$tel','$contra')";
    } else{
        $consulta = "INSERT INTO estudiantes(ID_estudiantes, Nombre, Apellido, Telefono, Fecha_de_inscripcion, contra, mail) VALUES ('','$nombre','$apellido','$tel','$fecha','$contra','$mail')";
    }

    if (mysqli_query($conexion, $consulta)){
        session_start();
        $_SESSION["nombre"] = $nombre;
        $_SESSION["email"] = $mail;
        $_SESSION["contra"] = $contra;
        header("Location: ../index.php");
    }
    mysqli_close($conexion);
?>