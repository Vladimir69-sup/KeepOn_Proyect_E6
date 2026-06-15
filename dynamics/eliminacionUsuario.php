<?php
    include "./conexion.php";

    echo $_POST['envio_idAlumno'];
    $mensaje = "";
    $clase_mensaje = "";
    var_dump($_POST);

    if(isset($_POST['envio_idAlumno'])){
        $id_alumno = $_POST['envio_idAlumno'];

        $sql = "DELETE FROM infoalumno WHERE idUsuario = '$id_alumno'";
        $query = mysqli_query(connect(), $sql);
        if($query){
            $mensaje = "La eliminación fue correcta";
            $clase_mensaje = "mensaje-exito";
        } else {
            $mensaje = "La eliminación NO fue correcta";
            $clase_mensaje = "mensaje-error";
        }
        echo $mensaje;
        echo $clase_mensaje;
    }
?>