<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/precios.css">
</head>
<body>

    <header>
        <?php
        require "../archivosphp/encabezado.php"
        ?>
    </header>

    <div class="contenedor-buscador">
        <input 
            type="text" 
            id="buscador" 
            class="campo-busqueda" 
            placeholder="Buscar cursos..."
        >
    </div>

    <section class="seccion-principal">
        <h2>Explora los mejores precios y lenguajes de todo el mundo</h2>
        <p>Siempre al mejor precio</p>
</section>

    <div class="contenedor-cursos" id="contenedor-cursos">
    </div>
    <script src="../archivosjs/precios.js"></script>
</body>
</html>