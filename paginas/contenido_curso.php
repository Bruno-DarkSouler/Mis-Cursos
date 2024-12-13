<?php
    require("../archivosphp/sistema.php");
    $id_curso = $_GET["id_curso"];
    $libro = ConsultaSelect($conexion, "SELECT libro.id, libro.titulo FROM libro JOIN cursos ON cursos.ID_cursos = libro.id_curso WHERE cursos.ID_cursos = '$id_curso'")[0];
    $tareas = ConsultaSelect($conexion, "SELECT tarea.id AS id_tarea, tarea.id_curso, tarea.titulo, EXISTS(SELECT entregas.id FROM entregas WHERE entregas.id_estudiante = '$_SESSION[id]' AND tarea.id = entregas.id_tarea) AS entregado FROM tarea WHERE id_curso = '$id_curso'");
    $primeros_cap = ConsultaSelect($conexion, "SELECT id, titulo FROM `capitulos` WHERE id_libro = '$libro[id]' LIMIT 3");
    $instructor_curso = VerificarInstructoCurso($conexion, $id_curso);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/general.css">
    <link rel="stylesheet" href="../estilos/contenido_curso.css">
    <link rel="icon" href="../imagenes/logo_sin_fondo2.png">
    <title>Curso de C++</title>
</head>
<body>
    <header><h1>Encabezado</h1></header>
    <main>
        <div id="tareas">
            <?php
                if($tareas != 1){
                    for($i = 0; $i < count($tareas); $i++){
                        if($instructor_curso){
                            echo "
                            <a href=\"Lo de mateo\">
                            <div class=\"tarea\">
                                <h1>Actividad N°". $i + 1 .": ". $tareas[$i]["titulo"] ."</h1>
                            </div></a>
                            ";
                        }else{
                            if($tareas[$i]["entregado"] == 1){
                                echo "<a href=\"Lo de mateo\">
                                    <div class=\"tarea entregado\">
                                        <h1>Actividad N°". $i + 1 .": ". $tareas[$i]["titulo"] ."</h1>
                                        <p>Estado: Entregado</p>
                                    </div></a>
                                ";
                            }else{
                                echo "<a href=\"Lo de mateo\">
                                    <div class=\"tarea no_entregado\">
                                        <h1>Actividad N°". $i + 1 .": ". $tareas[$i]["titulo"] ."</h1>
                                        <p>Estado: No entregado</p>
                                    </div></a>
                                ";
                            }
                        }
                    }
                } else {
                    echo "
                        <h1>No hay contenido actualmente en este curso</h1>
                    ";
                }
                if($instructor_curso == true){
                    echo "
                    <a href=\"./paginacreartarea.php?id_curso=". $id_curso ."\">
                        <div id=\"agregar_tarea\">
                            <h1>+ Agregar nueva tarea</h1>
                        </div>
                    </a>";
                }
            ?>
        </div>
        <?php
            echo "<a href=\"./indice_libro.php?id_libro=". $libro["id"] ."\">";
        ?>
            <div id="libro">
                <?php
                    echo "
                    <h1>
                        Consulta el libro: ". $libro["titulo"] ."
                    </h1>
                    <div>
                        <h2>Este libro contiene:</h2>
                        <ol>";
                    for($i = 0; $i < count($primeros_cap); $i++){
                        echo "
                        <a href=\"./libro.php?id_cap=". $primeros_cap[$i]["id"] ."\">
                        <li class=\"cap\">". $primeros_cap[$i]["titulo"] ."</li>
                        </a>
                        ";
                    }
                        "</ol>
                    </div>";
                ?>
            </div>
        </a>
    </main>
</body>
</html>