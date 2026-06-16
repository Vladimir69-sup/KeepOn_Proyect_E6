<?php
    session_start();
    include 'conexion.php';
    $idProfesor = $_SESSION['idUsuario'];

    $rutaFoto = "../../statics/media/img/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../statics/css/AlumnosVistaProfesor.css">
    <link rel="stylesheet" href="../../statics/css/navbar.css"> 
    <link rel="icon" href="../../statics/media/img/COMPUTADORA.png" type="image/png">
    <title>Mis Alumnos</title>
</head>
<body>
    <div id="barra_superior">

        <input type="checkbox" id="menu_lateral">

        <label for="menu_lateral">
            <img class="logo"id="menu_imagen"alt ="menu"src="../../statics/media/img/menu_hamburguesa.png">
        </label>

        <a href="https://www.unam.mx/"><img class="logo"id="unam"alt ="logo"src="../../statics/media/img/logo_unam.svg"></a>
        <a href=""https://enp.unam.mx/"><img class="logo"id="enp"alt ="logo"src="../../statics/media/img/logo_enp.svg"></a>          
        <a href="https://www.ete.enp.unam.mx/"><img class="logo"id="etes"alt ="logo"src="../../statics/media/img/logo_ete.svg"></a>
       <!-- <img class="logo"id="compu"alt ="logo"src="./img/logo_compu.png">-->
        <a href="./VistaPrincipalProfesor.php"><img class="logo"id=keep-on alt="logo"src="../../statics/media/img/COMPUTADORA.png"></a>
        <a href="./VistaPerfilProfesorDBActual.php"><img id="user"src="../../statics/media/img/user.png"></a>
        <a href="./logout.php"><img id="user"src="../../statics/media/img/logout.png"></a>

        <article id="barra_lateral">
            <section  id="primero_barra_lateral"></section>
            <section id="segundo_barra_lateral"class="bloque_linea">
                <a class="enlace"href="./actividades.html">
                    <h3>ALUMNOS</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./formulario_evaluacion.html">
                    <h3>ACTIVIDADES</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./recursos_apoyo.html">
                    <h3>FORMULARIOS</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./proAnteriores.html">
                   <h3>RECURSOS DE APOYO</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./proAnteriores.html">
                   <h3>ESTADÍSTICAS</h3>
                </a>
            </section>
        </article> 
    </div>

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

            $consultaAlumnosGrupo = "SELECT idUsuario, nombre, primerApellido, segundoApellido FROM infoGeneralUsuario WHERE idUsuario IN(SELECT idUsuario FROM infoAlumno WHERE idGrupo = $idGrupo)";
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