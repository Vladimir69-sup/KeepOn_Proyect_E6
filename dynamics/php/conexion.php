<?php
    const DBHOST = "127.0.0.1"; 
    const DBUSER = "root";     
    const PASSWORD = "";
    const DB = "keep_on_db";

    function connect()
    {
        $conexion = mysqli_connect(DBHOST, DBUSER, PASSWORD, DB);
        return $conexion;   
    }
    $conexion = connect();
?>