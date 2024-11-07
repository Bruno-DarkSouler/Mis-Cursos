<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos de Programación</title>
    <link rel="stylesheet" href="./estilos/categoria.css">
</head>
<body>

    <header>
        <!-- Encabezado del sitio -->
        <h1>Cursos de Programación</h1>
    </header>

    <!-- Barra de búsqueda -->
    <div class="contenedor-buscador">
        <input 
            type="text" 
            id="buscador" 
            class="campo-busqueda" 
            placeholder="Buscar cursos..."
        >
    </div>

    <!-- Sección principal -->
    <section class="seccion-principal">
        <h2>Explora los mejores precios y lenguajes de todo el mundo</h2>
        <p>Siempre al mejor precio</p>
    </section>

    <!-- Contenedor de Cursos -->
    <div class="contenedor-cursos" id="contenedor-cursos"></div>

    <!-- Modal de información del curso -->
    <div class="modal" id="modal">
        <div class="modal-content">
            <span class="close" id="close-modal">&times;</span>
            <h2 id="modal-title"></h2>
            <p id="modal-description"></p>
        </div>
    </div>

    <!-- Script de JavaScript -->
    <script src="./archivosjs/categoria.js"></script>
</body>
</html>
