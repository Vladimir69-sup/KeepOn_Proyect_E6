<?php
    session_start();
    const DBHOST = "localhost";
    const DBUSER = "root";
    const PASSWORD = "";
    const DB = "keep_on_db";

    $conexion = mysqli_connect(DBHOST, DBUSER, PASSWORD, DB);
    $idProfesor = 1; // idprueba -- $_SESSION['idUsuario'];

    $rutaFoto = "../../statics/media/img/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../statics/css/AlumnosVistaProfesor.css">
    <title>AlumnosVistaProfesor</title>
</head>
<body>
    <div class="contenedor-caja">
    <?php
        $consultaProfesor = "SELECT * FROM  infoMaestro";
        $resulProfesor = mysqli_query($conexion, $consultaProfesor);
        $paqProfesor = $resulProfesor->fetch_array();
        $idProfesor = $paqProfesor['idMaestro'];

        $consultaGrupos = "SELECT * FROM grupo WHERE idMaestro = $idProfesor";
        $paqNombreGrupos = mysqli_query($conexion, $consultaGrupos);

        $totalGrupos = mysqli_num_rows($paqNombreGrupos);
        for($cont = 0; $cont < $totalGrupos; $cont++){
            $datosGrupos = $paqNombreGrupos->fetch_array();
            $grupo = $datosGrupos['nombreGrupo'];
            $idGrupo = $datosGrupos['idGrupo'];
            
            echo "<p>" . $grupo . "</p>";

            $consultaAlumnosGrupo = "SELECT idUsuario, nombre, primerApellido, segundoApellido FROM infoGeneralUsuario WHERE idUsuario IN(SELECT idUsuario FROM infoalumno WHERE idGrupo = $idGrupo)";
            $paqAlumnosGrupo = mysqli_query($conexion, $consultaAlumnosGrupo);
            $nombresTotales = mysqli_num_rows($paqAlumnosGrupo);

            echo '<div class="alumnos">';

            for($cont2 = 0; $cont2 < $nombresTotales; $cont2++){
                $datosAlumno = $paqAlumnosGrupo->fetch_array();
                $idAlumno = $datosAlumno['idUsuario'];
                //NOMBRE
                $nombreAlumno = $datosAlumno['nombre'] . " " . $datosAlumno['primerApellido'] . " " . $datosAlumno['segundoApellido'];
                $fotoAlumno = $rutaFoto . "FotoUsuario" . $idAlumno . ".png";
                if (!file_exists($fotoAlumno)) {
                    $fotoAlumno = $rutaFoto . "FotoPerfil.png";
                }
                echo '<a href="VistaVerPerfilDelAlumno.php?idUsuario=' . $idAlumno . '" class="tarjeta-alumno">';
                    echo "<img class='foto-alumno' src='" . $fotoAlumno . "' alt='Foto de " . $datosAlumno['nombre'] . "'>";
                    echo "<p>" . $nombreAlumno . "</p>";
                echo "</a>";
            }
            echo "</div>";
        }
    ?>
    </div>
</body>
</html>