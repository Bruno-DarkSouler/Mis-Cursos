<?php
    session_start();
    
    if(!isset($_SESSION["nombre"])){
        header("Location: ../paginas/iniciosesion.html");
    }
?>