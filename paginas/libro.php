<?php
    require("../archivosphp/sistema.php");
    $id_cap = $_GET["id_cap"];
    $capitulo = ConsultaSelect($conexion, "SELECT `id`, `id_libro`, `titulo`, `contenido`, imagenes FROM `capitulos` WHERE id = '$id_cap'")[0];
    $id_curso = ConsultaSelect($conexion, "SELECT `id_curso` FROM `libro` WHERE id = '$capitulo[id_libro]'")[0]["id_curso"];
    $instructor_curso = VerificarInstructoCurso($conexion, $id_curso);
    $JSON_imagenes = json_decode($capitulo["imagenes"], true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/general.css">
    <link rel="stylesheet" href="../estilos/capitulo.css">
    <link rel="icon" href="../imagenes/logo_sin_fondo2.png">
    <?php
        echo "
        <title>". $capitulo["titulo"] ."</title>
        ";
    ?>
</head>
<body>
    <div id="filtro_negro"></div>
    <main>
        <?php
            echo "
            <a href=\"./indice_libro.php?id_libro=". $capitulo["id_libro"] ."\">
            <div class=\"retroceder\">
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-arrow-bar-left\" viewBox=\"0 0 16 16\">
                    <path fill-rule=\"evenodd\" d=\"M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5\"/>
                </svg>
                <p class=\"texto_atras\">Atrás</p>
            </div>
            </a>
            ";
        ?>
        <div id="libro">
            <?php
                if($instructor_curso){
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
                    ";
                    }
                    echo "
                    <div id=\"visualizar\">
                        <h1 class=\"titulo\">". $capitulo["titulo"] ."</h1>
                        <p class=\"parrafo\">". $capitulo["contenido"] ."</p>
                    </div>
                    ";
                if($instructor_curso){
                    echo "
                    <div class=\"contenedor_modo\">
                        <label for=\"cambiar_modo\">Modo edición</label>
                        <input type=\"checkbox\" value=\"1\" id=\"cambiar_modo\">
                    </div>
                    ";
                }
            ?>
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
                        <h1 class="titulo">Imágenes</h1>
                        <?php
                            for($i = 0; $i < count($JSON_imagenes["img"]); $i++){
                                echo "
                                <img src=\"../imagenes/imagenes_libros/". $JSON_imagenes["img"][$i] ."\" alt=\"Hubo un problema al cargar esta imagen\" class=\"imagen_libro\">
                                <div class=\"modo_editar cambiar_desc\">
                                    <form action=\"../archivosphp/cambiar_desc_img.php\" method=\"post\">
                                        <textarea type=\"text\" class=\"cambiar_contenido\" name=\"desc\">". $JSON_imagenes["desc"][$i] ."</textarea><br>
                                        <input type=\"hidden\" name=\"indice_desc\" value=\"". $i ."\">
                                        <input type=\"hidden\" name=\"id_cap\" value=\"". $id_cap ."\">
                                        <input type=\"submit\" class=\"enviar_cambios\" value=\"Cambiar\">
                                    </form>
                                </div>
                                <div class=\"modo_editar eliminar_desc\">
                                    <form action=\"../archivosphp/borrar_img_cap.php\" method=\"post\">
                                        <input type=\"hidden\" name=\"indice_img\" value=\"". $i ."\">
                                        <input type=\"hidden\" name=\"id_cap\" value=\"". $id_cap ."\">
                                        <input type=\"submit\" class=\"eliminar_imagen\" value=\"Eliminar\">
                                    </form>
                                </div>
                                <p class=\"desc_img\">". $JSON_imagenes["desc"][$i] ."</p>
                                ";
                            }
                            if($instructor_curso){
                                echo "
                                <form action=\"../archivosphp/subir_img_cap.php\" method=\"post\" enctype=\"multipart/form-data\" id=\"formulario_nueva_imagen\">
                                    <label for=\"archivo\">Ingrese una imagen para enviar subir</label><br>
                                    <input type=\"file\" name=\"archivo\" id=\"archivo\" required><br>
                                    <label for=\"desc\">Ingrese una descripción para la imagen</label><br>
                                    <textarea name=\"desc\" id=\"desc\" required></textarea><br>
        
                                    <input type=\"hidden\" name=\"id_cap\" value=\"". $id_cap ."\">
        
                                    <input type=\"submit\" name=\"enviar\">
                                </form>
                                ";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../archivosjs/modo_edicion.js"></script>
<script src="../archivosjs/mostrar-ocultar.js"></script>
</html>