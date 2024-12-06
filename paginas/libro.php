<?php
    require("../archivosphp/sistema.php");
    $id_cap = $_GET["id_cap"];
    $capitulo = ConsultaSelect($conexion, "SELECT `id`, `id_libro`, `titulo`, `contenido` FROM `capitulos` WHERE id = '$id_cap'")[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/general.css">
    <link rel="stylesheet" href="../estilos/capitulo.css">
    <title>Título del libro</title>
</head>
<body>
    <div id="filtro_negro"></div>
    <main>
        <div id="libro">
            <?php
                if($_SESSION["rol"] == "ins"){
                    echo "
                    <div id=\"editar\">
                        <form action=\"../archivosphp/actualizar_cap.php\" method=\"post\">
                            <input type=\"text\" name=\"titulo\" value=\"". $capitulo["titulo"] ."\" class=\"cambiar_titulo\"><br>
                            <textarea name=\"contenido\" id=\"contenido\" class=\"cambiar_contenido\">". $capitulo["contenido"] ."</textarea>
                            <input type=\"hidden\" name=\"id_cap\" value=\"". $id_cap ."\">
                            <div class=\"centrar\">
                                <input type=\"submit\" class=\"enviar_cambios\" value=\"Cambiar\">
                            </div>
                        </form>
                    </div>
                    <div id=\"visualizar\">
                        <h1 class=\"titulo\">". $capitulo["titulo"] ."</h1>
                        <p class=\"parrafo\">". $capitulo["contenido"] ."</p>
                    </div>
                    ";
                }
            ?>
            <div class="contenedor_modo">
                <label for="cambiar_modo">Modo edición</label>
                <input type="checkbox" value="1" id="cambiar_modo">
            </div>
        </div>
        <div id="contenedor_lateral_imagen">
            <div class="contenedor">
                <div id="tarjeta_deslizadora">
                    <p>Imágenes</p>
                </div>
            </div>
            <div class="contenedor">
                <div id="seccion_imagen">
                    <div class="imagen_info">
                        <img src="../imagenes/imagenes_libros/Firefly 8.jpg" alt="" class="imagen_libro">
                        <form action="">
                            <textarea type="text" class="cambiar_contenido"></textarea><br>
                            <input type="hidden" name="indice_img">
                            <input type="hidden" name="id_cap">
                            <input type="submit" class="enviar_cambios" value="Cambiar">
                        </form>
                        <form action="">
                            <input type="hidden" name="indice_img">
                            <input type="hidden" name="id_cap">
                            <input type="submit" class="eliminar_imagen" value="Eliminar">
                        </form>
                        <p class="desc_img">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil voluptates alias exercitationem quis, eveniet eius! Natus officiis id iste dolorum molestiae sint praesentium enim libero reiciendis neque, deserunt itaque obcaecati!</p>
                    </div>
                    <div class="imagen_info">
                        <img src="../imagenes/imagenes_libros/Firefly 8.jpg" alt="" class="imagen_libro">
                        <form action="">
                            <input type="hidden" name="indice_img">
                            <input type="submit" class="eliminar_imagen" value="Eliminar">
                        </form>
                        <form action="">
                            <textarea type="text" class="cambiar_contenido"></textarea><br>
                            <input type="hidden" name="indice_img">
                            <input type="submit" class="enviar_cambios" value="Cambiar">
                        </form>
                        <p class="desc_img">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil voluptates alias exercitationem quis, eveniet eius! Natus officiis id iste dolorum molestiae sint praesentium enim libero reiciendis neque, deserunt itaque obcaecati!</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../archivosjs/modo_edicion.js"></script>
<script src="../archivosjs/mostrar-ocultar.js"></script>
</html>