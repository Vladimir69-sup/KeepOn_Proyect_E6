<?php
    session_start();
    include 'conexion.php';
    $idProfesor = $_SESSION['idUsuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../statics/css/Estadisticas.css">
        <link rel="stylesheet" href="../../statics/css/navbar.css"> 
    <link rel="icon" href="../../statics/media/img/COMPUTADORA.png" type="image/png">
    <title>Estadísticas</title>
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

    <div class="contenedor">
        <h1>Estadísticas</h1>
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
                
                echo "<details>";
                    echo "<summary>" . $grupo . "</summary>";
                    echo "<table>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>Nombre</th>";
                                echo "<th>Calificación</th>";
                                echo "<th>Puntos</th>";
                                echo "<th>Riesgo de deserción</th>";
                                echo "<th>Ver</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            $consultaAlumnosGrupo = "SELECT idUsuario, nombre, primerApellido, segundoApellido FROM infoGeneralUsuario WHERE idUsuario IN(SELECT idUsuario FROM infoAlumno WHERE idGrupo = $idGrupo)";
                            $paqAlumnosGrupo = mysqli_query($conexion, $consultaAlumnosGrupo);
                            $nombresTotales = mysqli_num_rows($paqAlumnosGrupo);

                            for($cont2 = 0; $cont2 < $nombresTotales; $cont2++){
                                $datosAlumno = $paqAlumnosGrupo->fetch_array();
                                $idAlumno = $datosAlumno['idUsuario'];
                                //NOMBRE
                                $nombreAlumno = $datosAlumno['nombre'] . " " . $datosAlumno['primerApellido'] . " " . $datosAlumno['segundoApellido'];

                                //CALIFICACION
                                $consultaPromedio = "SELECT AVG(calificacion) AS promedio FROM formularioAlumno WHERE idAlumno = (SELECT idAlumno FROM infoAlumno WHERE idUsuario = $idAlumno)";
                                $paqPromedio = mysqli_query($conexion, $consultaPromedio);
                                $resPromedio = $paqPromedio->fetch_array();
                                if ($resPromedio['promedio'] !== null) {
                                        $promedioAlumno = sprintf('%0.2f', $resPromedio['promedio']);
                                } 
                                else {
                                    $promedioAlumno = "Sin calificación";
                                }

                                //PUNTOS
                                //alumno:
                                $consultaPuntosAlumno = "SELECT SUM(rendimiento_alumno) AS obtenidos FROM formularioAlumno WHERE idAlumno = (SELECT idAlumno FROM infoAlumno WHERE idUsuario = $idAlumno)";
                                $paqPuntosAlumno = mysqli_query($conexion, $consultaPuntosAlumno);
                                $resPuntosAlumno = $paqPuntosAlumno->fetch_array();
                                $puntosObtenidosAlumno = $resPuntosAlumno['obtenidos'];
                                //totales:
                                $consultaPuntosTotales = "SELECT SUM(rendimiento_esperado) AS totales FROM formulario WHERE idGrupo = $idGrupo";
                                $paqPuntosTotales = mysqli_query($conexion, $consultaPuntosTotales);
                                $datosPuntosTotales = $paqPuntosTotales->fetch_array();
                                $puntosTotales = $datosPuntosTotales['totales'];
                                if ($puntosTotales == 0) {
                                    $mostrarPuntos = "Aún no hay formularios";
                                } else {
                                    $puntosObtenidosAlumno = $resPuntosAlumno['obtenidos'];
                                    $mostrarPuntos = $puntosObtenidosAlumno . "/" . $puntosTotales;
                                }
                                $cotaInferior = $puntosTotales / 2;
                                $cotaSuperior = (2 * $puntosTotales) / 3;

                                if($puntosObtenidosAlumno == 0 || $mostrarPuntos = "Aún no hay formularios"){
                                    $impRiesgo = "Aún no hay datos del alumno";
                                }
                                else if($puntosObtenidosAlumno <= $cotaInferior){
                                    $riesgo = 100; 
                                    $impRiesgo = $riesgo . "% riesgo de deserción";
                                }
                                else if($puntosObtenidosAlumno >= $cotaSuperior){
                                    $riesgo = 0;
                                    $impRiesgo = $riesgo . "% riesgo de deserción";
                                }
                                else{
                                    $riesgo = 200 * (2 -(3*$puntosObtenidosAlumno/$puntosTotales));
                                    $impRiesgo = $riesgo . "% riesgo de deserción";
                                }
                                
                                echo "<tr>";
                                echo "<th>" . $nombreAlumno . "</th>";
                                echo "<th>" . $promedioAlumno . "</th>";
                                echo "<th>" . $mostrarPuntos . "</th>";
                                echo "<th>" . $impRiesgo . "</th>";
                                echo "<th><a href='VistaVerPerfilDelAlumno.php?idUsuario=" . $idAlumno . "'>👁️</a></th>";
                                echo "</tr>";
                            }
                            
                        echo "</tbody>";
                    echo "</table>";
                echo "</details>";
            }            
        ?>
    </div>
</body>
</html>