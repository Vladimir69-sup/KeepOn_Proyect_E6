<?php
    session_start();
    if (isset($_SESSION["idAlumno"])){
        session_destroy();
    }
    header("Location: ../../index.html");
?>