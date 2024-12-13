<?php
    session_start();
    $conexion = new mysqli("localhost", "root", "", "mis-cursos");

    
    
    
    
    function SubirArchivo($ruta, $enviarImagen){

        $direc_destino = $ruta;
        $archivo_destino = $direc_destino . basename($_FILES["archivo"]["name"]);
        $envioAutorizado = true;
        $tipo_archivo = strtolower(pathinfo($archivo_destino, PATHINFO_EXTENSION));

        $nombre_archivo = basename($_FILES["archivo"]["name"]);
        $contador_lineas = "-";
    
        if(isset($_POST["enviar"]) && $enviarImagen){
            $verificacion = getimagesize($_FILES["archivo"]["tmp_name"]);
            if($verificacion !== false){
                $envioAutorizado = true;
            }else{
                $envioAutorizado = false;
            }
        }

        while(file_exists($archivo_destino)){
            $archivo_destino = $direc_destino . basename($_FILES["archivo"]["name"], "." . $tipo_archivo) . $contador_lineas . "." . $tipo_archivo;
            $nombre_archivo = basename($_FILES["archivo"]["name"], "." . $tipo_archivo) . $contador_lineas . "." . $tipo_archivo;
            $contador_lineas = $contador_lineas . "-";
            echo $archivo_destino . "<br>";
        }
    
        if($_FILES["archivo"]["size"] > 3000000){
            $envioAutorizado = false;
            echo "tamaño";
        }
    
        if($tipo_archivo != "jpg" && $tipo_archivo != "png" && $tipo_archivo != "jpeg" && $tipo_archivo != "webp" && $tipo_archivo != "zip"){
            $envioAutorizado = false;
            echo "extensio";
        }
    
        if(!$envioAutorizado){
            return 1;
        }else{
            if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo_destino)){
                return $nombre_archivo;
            }else{
                return 1;
            }
        }
    }
    
    
    
    
    
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





    function VerificarInstructoCurso($conexion, $id_curso){
        $legajo_curso = ConsultaSelect($conexion, "SELECT `Legajo` FROM `cursos` WHERE ID_cursos = '$id_curso'")[0]["Legajo"];
        if($_SESSION["rol"] == "ins"){
            if($_SESSION["legajo"] == $legajo_curso){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    // $aaaaa = "hola";
    // ConsultaSelect($conexion, "SELECT '$aaaaa'");
?>