<!-- <?php
  //require("./archivosphp/verificarse.php");
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <center><h1>Me encanta el DMC</h1></center>
    <?php
      require("../archivosphp/sistema.php");

      // $id_clase = $_GET["id_clase"];
      $id_clase = 2;
      
      $consulta = "SELECT * FROM clases WHERE clases.id = '$id_clase'";
      $resultado = $conexion->query($consulta);

      if($resultado->num_rows > 0){
        while($filas = $resultado->fetch_assoc()){
          $mulopc = json_decode($filas["mul_opc"], true);
          $tarea = json_decode($filas["tarea"], true);
          $material = json_decode($filas["material"], true);

          for($i = 0; $i<count($material["titulo"]); $i++){
            echo "
            <div class=\"material\">
              <h1>".$material["titulo"][$i]."</h1>
              <p>".$material["texto"][$i]."</p>
            </div>";
          }
          for($i = 0; $i<count($tarea["titulo"]); $i++){
            echo "
            <div class=\"tarea\">
              <h1>".$tarea["titulo"][$i]."</h1>
              <p>".$tarea["texto"][$i]."</p>
              <form action="">
                <input type="file">
              </form>
            </div>";
          }
          for($i = 0; $i<count($mulopc["texto"]); $i++){
            echo "
            <div class=\"multiple_opcion\">
              <p>".$mulopc["texto"][$i]."</p>";
            for($j=0; $j<count($mulopc["opciones"][$i]); $j++){
              echo "
              <div>
                <input type=\"radio\" id=\"mulopc_".$i."-opc_".$j."\" name=\"mulopc".$i."\">
                <label for=\"mulopc_".$i."-opc_".$j."\">".$mulopc["opciones"][$i][$j]."</label>
              </div>";
            }
            echo "
            <button id=\"enviar_respuestas\">Enviar respuestas</button>
            </div>";
          }
        }
      }
    ?>
</body>
</html>