<?php
require ("../archivosphp/sistema.php")
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title></title>
  <link href="../estilos/paginaprincipal.css" rel="stylesheet" type="text/css" />
</head>

<body class="principal">

  <header class="header">

  <a href="../paginas/paginaprincipal.php"><div class="img-texto">
    <img class="logo" src="../imagenes/logo_sin_fondo2.png" alt="">
    <p class="titulo">Mis - Cursos</p>
  </div></a>

  <div class="opciones">

  <?php

  if ($_SESSION["rol"] == "ins"){
    echo "<div class=\"crear_curso\"><a href=\"../paginas/paginacrearcurso.php\">Crear curso</a></div>
  <div class=\"ayuda\"><a href=\"../paginas/paginacursos.php\">Cursos</a></div>
  <div class=\"fundadores\"><a href=\"\">Ayuda</a></div>";
  }
  if ($_SESSION["rol"] == "est"){
    echo "<div class=\"crear_curso\"><a href=\"../paginas/paginacursos.php\">Incribirse</a></div>
  <div class=\"ayuda\"><a href=\"../paginas/fundadores.php\">Fundadores</a></div>
  <div class=\"fundadores\"><a href=\"../ayuda.php\">Ayuda</a></div>";
  }


  ?>

  </div>

  <a href="../paginas/perfil.php"><div class="perfil">
    <img class="logo_perfil" src="../imagenes/logo_perfil_sin_fondo.png" alt="">
  </div></a>

  </header>

  <aside class="sidevar">
    <a href=""><div class="opcion">
      <p>Mis Cursos</p>
    </div></a>
    <a href=""><div class="opcion">
      <p>Rendimiento</p>
    </div></a>
  </aside>

  <article class="main">
    <h1 class="Bienvenida">¡Hola! <<nombre_usuario>>, estos son los cursos a los que estas inscripto.</h1>
    
  <?php

  require("../archivosphp/inscripción.php");

if (isset($_GET['id_curso'])) {
    $id_curso = $_GET['id_curso'];

    echo "El ID del curso seleccionado es: " . $id_curso;

    $consulta = "SELECT  FROM cursos WHERE ID_cursos = '$id_curso'";
    $resultado = $conexion->query($consulta);
    $curso = $resultado->fetch_assoc();

    echo "Nombre del curso: " . $curso['Nombre_del_curso'];
    echo "Descripción: " . $curso['Descripcion'];
    echo "Precio: " . $curso['Costo'];
} else {
    echo "No se ha seleccionado un curso.";
}
?>

  </article>
  <footer class="footer"></footer>

<script src="../archivosjs/inscribirse.js"></script>

</body>
</html> 