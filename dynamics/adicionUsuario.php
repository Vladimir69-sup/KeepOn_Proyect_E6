
<?php
    include "./conexion.php";

    $usuario = $_POST['tipo_usuario'];
    $mensaje = "";
    $clase_mensaje = "";

    if($usuario = 'profesor'){
        $nombre_prof = $_POST['nombre_prof'];
        $apellido_paterno = $_POST['apellido1'];
        $apellido_materno = $_POST['apellido2'];
        $fecha_nacimiento = $_POST['fecha_naci'];
        $id = $_POST['matricula'];
        $grupo = $_POST['grupo'];
        $email = $_POST['correo'];

        $sql = "INSERT INTO infogeneralusuario (fechaNacimiento, correo, nombre, primerApellido, segundoApellido)
                VALUES ('$fecha_nacimiento', '$email', '$nombre_prof', '$apellido_paterno', '$apellido_materno')";
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
        $sql1 = "SELECT idUsuario FROM infogeneralusuario WHERE nombre = '$nombre_prof'";
        $query1 = mysqli_query(connect(), $sql1);
        $id_general = mysqli_fetch_assoc($query1);
        $id_general_real = $id_general['idUsuario'];
        $sql2 = "INSERT INTO infomaestro (numTrabajador, idUsuario)
                VALUES ('$id', '$id_general_real')";
        $query2 = mysqli_query(connect(), $sql2);

        $sql3 = "SELECT idmaestro FROM infomaestro WHERE numTrabajador = '$id'";
        $query3 = mysqli_query(connect(), $sql3);
        $id_maestro = mysqli_fetch_assoc($query3);
        $id_maestro_real = $id_maestro['idmaestro'];
        
        $sql4 = "INSERT INTO grupo (nombreGrupo, idMaestro)
                VALUES ('$grupo','$id_maestro_real')";
        $query4 = mysqli_query(connect(), $sql4);

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