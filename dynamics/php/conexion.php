<?php
    const DBHOST = "localhost"; 
    const DBUSER = "karla"; //
    const PASSWORD = "000"; // 
    const DB = "keep_on_db"; 

    function connect()
    {
        $conexion = mysqli_connect(DBHOST, DBUSER, PASSWORD, DB);
        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }
        return $conexion;   
    }
    $conexion = connect();
?>