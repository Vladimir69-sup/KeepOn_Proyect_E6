<?php

    session_start();
    if (!isset($_SESSION['datos_pregunta'])) 
        $_SESSION['datos_pregunta'] = [];

   //FORMS 

   $tipo_pregunta=$_POST["tipo"];

   
?>