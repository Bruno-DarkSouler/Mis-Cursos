<?php
    session_start();
    $conexion = new mysqli("localhost", "root", "", "mis-cursos");
    
    function FechaActual(){
        return date("Y") . "-" . date("n") . "-" . date("j");
    }

    function ConsultaSelect($conexion, $consulta){
        $resultado = $conexion->query($consulta);
        $datos = [];
        if($resultado->num_rows > 0){
            while($fila = $resultado->fetch_assoc()){
                array_push($datos, $fila);
            }
            return $datos;
        }else{
            return 1;
        }
    }

    function ConsultaSinRespuesta($conexion, $consulta){
        if($conexion->query($consulta) === TRUE){
            return 0;
        }else{
            return 1;
        }
    }

    // $aaaaa = "hola";
    // ConsultaSelect($conexion, "SELECT '$aaaaa'");
?>