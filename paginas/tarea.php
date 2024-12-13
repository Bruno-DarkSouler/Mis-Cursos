<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/tarea.css">
    <title>tarea</title>
</head>

<?php
    require ("../archivosphp/sistema.php")
?>

<body>
    <div class="tarea">
        <div class="titulo">nombre de la tarea, ejemplo: Actividad 1 JavaScript</div>
        <div class="descripcion_tarea">
            <p class="titulo_descripcion">Descripción:</p>
            <div class="descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis nihil ipsam quaerat, eveniet sit provident sint perferendis praesentium. Dolores voluptatem voluptate illum quos velit omnis sint architecto praesentium autem! Provident? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae, amet in ipsum magni obcaecati eum est quaerat laboriosam rerum iste consectetur sint! Officiis repudiandae vero consectetur eius impedit necessitatibus eveniet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt distinctio rem quasi quis eius commodi ad cumque. Autem temporibus modi repellat qui laboriosam necessitatibus, ab, quibusdam voluptatem magni nam nulla.</div>
        </div>
        <div class="estado_entrega">
            <p class="texto_entrega">Estado de la entrega:</p>
            <hr>
            <div><p class="seccion_entrega">Entregado</p></div>
        </div>
        <div class="area_entrega">
            <input type="file" name="" id="" class="custom-file-upload">
        </div>
        <div class="botones_entrega">
            <input type="submit" class="guardar" value="Guardar">
            <div class="cancelar">Cancelar</div>
        </div>
    </div>
</body>
</html>