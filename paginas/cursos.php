<?php
  require("../archivosphp/verificarse.php");
  require("../archivosphp/sistema.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/style.css">
    <title>Document</title>
</head>
  <body>
    <?php
      require("../archivos.php/sistema.php");

      $consulta = "SELECT cursos.Nombre_del_curso, cursos.Categoria FROM cursos JOIN cursos_instructores ON cursos.ID_cursos = cursos_instructores.ID_cursos JOIN instructores ON instructores.ID_instructores = cursos_instructores.ID_instructores WHERE cursos_instructores.ID_instructores =";
      $resultado = $conexion->query($consulta);

      
    ?>
  </body>
</html>