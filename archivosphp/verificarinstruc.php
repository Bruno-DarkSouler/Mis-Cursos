<?php
    session_start();

    if($_SESSION["rol"] != "instructor"){
        require("../paginas/error.php?problema=Usted_no_es_un_instructor");
    }
?>