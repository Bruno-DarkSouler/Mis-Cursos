<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <?php
            require("../archivosphp/sistema.php");

            $id_alum = $_GET["id_alum"];

            $consulta = "SELECT * FROM estudiantes WHERE ID_estudiantes = '$id_alum'";
            $resultado = $conexion->query();
            if($resultado->num_rows > 0){
                while($fila = $resultado->fetch_assoc()){
                    echo "
                    <div>
                        <div class=\"foto\">
                            <img src=\"../imagenes/Fotos_de_perfil/Gojo.PNG\" alt=\"No se ha encontrado la foto\">
                        </div>
                        <div class=\"informacion\">
                            <h1></h1>
                            <h2></h2>
                            <div class=\"matriculas\">
                                <div class=\"activas\">
        
                                </div>
                                <div class=\"finalizadas\">
        
                                </div>
                            </div>
                        </div>
                    </div>"
                ;}
            }
            if(isset($_GET["id_curso"])){
                $consulta = "";
            }else{
                $consulta = "";
            }
        ?>
    </main>
</body>
</html>