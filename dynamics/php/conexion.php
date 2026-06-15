<?php
    const DBHOST = "127.0.0.1"; // <-- Asegúrate de que no diga localhost
    const DBUSER = "karla";     // <-- Asegúrate de que diga karla y no root
    const PASSWORD = "";
    const DB = "keep_on_db";

    function connect()
    {
        $conexion = mysqli_connect(DBHOST, DBUSER, PASSWORD, DB);
        return $conexion;   
    }
    $conexion = connect();
?>