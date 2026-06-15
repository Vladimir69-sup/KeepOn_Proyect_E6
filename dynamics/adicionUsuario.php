
<?php
    include "./conexion.php";

    $usuario = $_POST['tipo_usuario'];
    $mensaje = "";
    $clase_mensaje = "";

    if($usuario = 'profesor'){
        $nombre = $_POST['nombre_prof'];
        $apellido_paterno = $_POST['apellido1'];
        $apellido_materno = $_POST['apellido2'];
        $fecha_nacimiento = $_POST['fecha_naci'];
        $id = $_POST['matricula'];
        $grupo = $_POST['grupo'];
        $email = $_POST['correo'];

        $sql = "INSERT INTO infogeneralusuario (fechaNacimiento, correo, nombre, primerApellido, segundoApellido)
                VALUES ('$fecha_nacimiento', '$email', '$nombre', '$apellido_paterno', '$apellido_materno')";
        $query = mysqli_query(connect(), $sql);
        if($query){
            $mensaje = "FUE UN EXITO";
            $clase_mensaje = "mensaje-exito";
        } else {
            $mensaje = "OCURRIO UN ERROR";
            $clase_mensaje = "mensaje-error";
        }
        echo $mensaje;
        echo $clase_mensaje;
        $sql2 = "INSERT INTO infomaestro (numTrabajador)
                VALUES ('$id')";
        $query2 = mysqli_query(connect(), $sql2);
    } elseif($usuario = 'alumno'){
        $nombre = $_POST['nombre_alumno'];
        $apellido_paterno = $_POST['apellido1'];
        $apellido_materno = $_POST['apellido2'];
        $fecha_nacimiento = $_POST['fecha_naci'];
        $id = $_POST['n_cuenta'];
        $grupo = $_POST['grupo'];
        $email = $_POST['correo'];

        $sql = "INSERT INTO infogeneralusuario (fechaNacimiento, correo, nombre, primerApellido, segundoApellido)
                VALUES ('$fecha_nacimiento', '$email', '$nombre', '$apellido_paterno', '$apellido_materno')";
        $query = mysqli_query(connect(), $sql);
        if($query){
            $mensaje = "FUE UN EXITO";
            $clase_mensaje = "mensaje-exito";
        } else {
            $mensaje = "OCURRIO UN ERROR";
            $clase_mensaje = "mensaje-error";
        }
        echo $mensaje;
        echo $clase_mensaje;
        $sql2 = "INSERT INTO infoalumno (numeroCuenta)
                VALUES ('$id')";
        $query2 = mysqli_query(connect(), $sql2);
    } elseif($usuario = 'admin'){
        $nombre = $_POST['nombre_admin'];
        $apellido_paterno = $_POST['apellido1'];
        $apellido_materno = $_POST['apellido2'];
        $fecha_nacimiento = $_POST['fecha_naci'];
        $id = $_POST['matricula'];
        $email = $_POST['correo'];

        $sql = "INSERT INTO infogeneralusuario (fechaNacimiento, correo, nombre, primerApellido, segundoApellido)
                VALUES ('$fecha_nacimiento', '$email', '$nombre', '$apellido_paterno', '$apellido_materno')";
        $query = mysqli_query(connect(), $sql);
        if($query){
            $mensaje = "FUE UN EXITO";
            $clase_mensaje = "mensaje-exito";
        } else {
            $mensaje = "OCURRIO UN ERROR";
            $clase_mensaje = "mensaje-error";
        }
        echo $mensaje;
        echo $clase_mensaje;
        $sql2 = "INSERT INTO infoadministrador (numTrabajador)
                VALUES ('$id')";
        $query2 = mysqli_query(connect(), $sql2);
    }
?>