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

  </div>

  <a href="../paginas/perfil.html"><div class="perfil">
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
echo "Contenido original de la página principal.";
?>

  </article>
  <footer class="footer"></footer>

</body>
</html> 