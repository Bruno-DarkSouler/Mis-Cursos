<?php
    require("./sistema.php");

    $nombre =$_POST["nombre"];
    $apellido =$_POST["apellido"];
    $rol = $_POST["gender"];
    $especialidad = $_POST["especialidad"];
    $Email =$_POST["Email"];
    $tel =$_POST["tel"];
    $contra =$_POST["contra"];
    $contra2 =$_POST["contra2"];
    $fecha = date("Y") . "-" . date("n") . "-" . date("j");
    
    $resultado = ConsultaSinRespuesta($conexion, "INSERT INTO estudiantes(Nombre, Apellido, Telefono, Fecha_de_inscripcion, contra, Email) VALUES ('$nombre','$apellido','$tel','$fecha','$contra','$Email')");

    if($resultado == 0){
        echo "a";
    }else{
        echo "b";
    }
?>