<?php
    //CONECTAR A LA BASE DE DATOS 
    session_start();

    include 'conexion.php';
    
    $idUsuario = $_GET['idUsuario'];
    
    $rutaFoto = "../../statics/media/img/";
    $nombreFoto = "FotoUsuario" . $idUsuario . ".png"; 
    $fotoAlumno = $rutaFoto . "FotoUsuario" . $idUsuario . ".png";
    if (!file_exists($fotoAlumno)) {
        $fotoAlumno = $rutaFoto . "FotoPerfil.png";
    }
    //consulta alumno
    $consultaAlumno = "SELECT idAlumno FROM infoAlumno WHERE idUsuario = $idUsuario";
    $resultadoAlumno = mysqli_query($conexion, $consultaAlumno);
    $datosAlumno = $resultadoAlumno->fetch_array();
    $idAlumno = $datosAlumno['idAlumno'];
    
    //Se consulta el estado del formulario
    $consultaEstado = "SELECT entregado FROM formularioAlumno WHERE idFormulario = 1 AND idAlumno = $idAlumno";
    $resultadoEstado = mysqli_query($conexion, $consultaEstado);

    $formularioExiste = mysqli_num_rows($resultadoEstado);
    if ($formularioExiste > 0) {
        $datosForm = $resultadoEstado->fetch_array();
        $estadoEnviado = $datosForm['entregado'];
    } else {
        $estadoEnviado = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Alumno</title>
    <link rel="stylesheet" href="../../statics/css/VistaVerPerfilDelAlumno.css">
    <link rel="stylesheet" href="../../statics/css/navbar.css"> 
    <link rel="icon" href="../../statics/media/img/COMPUTADORA.png" type="image/png">
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
                <a class="enlace"href="./AlumnosVistaProfesor.php">
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
                <a class="enlace"href="./Estadisticas.php">
                   <h3>ESTADÍSTICAS</h3>
                </a>
            </section>
        </article> 
    </div>

    <div class="contenedor-apartados">
        <div class="datos-alumno">
            <img class="foto-perfil" src="<?php echo $fotoAlumno;?>" alt="Foto de Perfil">
            <?php 
                $consultaDatos = "SELECT nombre, fechaNacimiento, primerApellido, segundoApellido FROM infoGeneralUsuario WHERE idUsuario = $idUsuario";
                $paqDatos = mysqli_query($conexion, $consultaDatos);
                $datosMostrar = $paqDatos->fetch_array();
                $nombre = $datosMostrar['nombre'];
                $primerApellido = $datosMostrar['primerApellido'];
                $segundoApellido = $datosMostrar['segundoApellido'];
                $fechaNacimiento = $datosMostrar['fechaNacimiento'];
                $consultaDatosEspecificos = "SELECT numeroCuenta, idGrupo FROM infoAlumno WHERE idUsuario = $idUsuario";
                $paqDatosEsp = mysqli_query($conexion, $consultaDatosEspecificos);
                $datosEsp = $paqDatosEsp->fetch_array();
                $numeroCuenta = $datosEsp['numeroCuenta'];
                $idGrupoAl = $datosEsp['idGrupo'];

                $consultaGrupo= "SELECT nombreGrupo FROM grupo WHERE idGrupo = $idGrupoAl";
                $paqNombreGrupo = mysqli_query($conexion, $consultaGrupo);
                $datosGrupo = $paqNombreGrupo->fetch_array();
                $grupo = $datosGrupo['nombreGrupo'];
            ?>
            <div>
                <p><?php echo $nombre . " " . $primerApellido . " " . $segundoApellido ?></p>
                <p><?php echo $numeroCuenta?></p>
                <p><?php echo $fechaNacimiento?></p>
                <p>Grupo: <?php echo $grupo?></p> 
            </div>

        </div>
        <div class="dos-secciones">
            <div class="respuestas-form">
                <h1>Condiciones de Estudio</h1>
                <?php
                    //si fue enviado se debe mostrar las respuestas y si no que lo diga
                    if($estadoEnviado == 1){  

                        $consultaPreguntas =  "SELECT idPregunta, pregunta, idTipoPregunta FROM pregunta WHERE idFormulario = 1";
                        $resulPreguntas = mysqli_query($conexion, $consultaPreguntas);
                        $totalPreguntas = mysqli_num_rows($resulPreguntas); //total de filas (preguntas)

                        for($cont = 0; $cont<$totalPreguntas; $cont++){
                            $infoPreguntas = $resulPreguntas->fetch_array();
                            $idPregunta = $infoPreguntas['idPregunta'];
                            $textoPregunta = $infoPreguntas['pregunta'];
                            $tipoPregunta = $infoPreguntas['idTipoPregunta'];

                            echo "<p>" . $textoPregunta . "</p>"; //Imprime la pregunta

                            $consultaResp = "SELECT textoRespuesta, idOpcionPregunta FROM respuestaUsuario WHERE idUsuario = $idUsuario AND idPregunta = $idPregunta";
                            $respuestaAlumno = mysqli_query($conexion, $consultaResp);

                            if($tipoPregunta == 3){ //si es textarea
                                $resTextarea = $respuestaAlumno->fetch_array();
                                echo "<p>". $resTextarea['textoRespuesta'] ."</p>";
                            }
                            else{ //si es radio o checkbox
                                while ($datoOpcion = $respuestaAlumno->fetch_array()) {
                                    $idOpcionElegida = $datoOpcion['idOpcionPregunta'];
                                    //Se consultan las opciones en texto
                                    $consultaTextoOpcion = "SELECT opcion FROM opcionPregunta WHERE idOpcionPregunta = $idOpcionElegida";
                                    $resTextoOpcion = mysqli_query($conexion, $consultaTextoOpcion);
                                    $opcionFinal = $resTextoOpcion->fetch_array();
                                    
                                    echo "<p> " . $opcionFinal['opcion'] . "</p>";
                                }
                            }
                            echo "<hr>";
                        }
                    }
                    else{
                        echo "<p>El formulario aún no ha sido resuelto</p>";
                    }
                ?>
            </div>
            <div class="mostrar-abajo">
                <h2>Estadísticas</h2>
                <?php
                    //calificaión
                    $consultaPromedio = "SELECT AVG(calificacion) AS promedio FROM formularioAlumno WHERE idAlumno = (SELECT idAlumno FROM infoAlumno WHERE idUsuario = $idAlumno)";
                    $paqPromedio = mysqli_query($conexion, $consultaPromedio);
                    $resPromedio = $paqPromedio->fetch_array();
                    if ($resPromedio['promedio'] !== null) {
                            $promedioAlumno = sprintf('%0.2f', $resPromedio['promedio']);
                        } else {
                            $promedioAlumno = "Sin calificación";
                        }
                    //puntos
                    //alumno:
                    $consultaPuntosAlumno = "SELECT SUM(rendimiento_alumno) AS obtenidos FROM formularioAlumno WHERE idAlumno = $idAlumno";
                    $paqPuntosAlumno = mysqli_query($conexion, $consultaPuntosAlumno);
                    $resPuntosAlumno = $paqPuntosAlumno->fetch_array();
                    $puntosObtenidosAlumno = $resPuntosAlumno['obtenidos'];
                    //totales:
                    $consultaPuntosTotales = "SELECT SUM(rendimiento_esperado) AS totales FROM formulario WHERE idGrupo = $idGrupoAl";
                    $paqPuntosTotales = mysqli_query($conexion, $consultaPuntosTotales);
                    $datosPuntosTotales = $paqPuntosTotales->fetch_array();
                    $puntosTotales = $datosPuntosTotales['totales'];
                    if ($puntosTotales == 0) {
                        $mostrarPuntos = "Aún no hay formularios";
                    } else {
                        $puntosObtenidosAlumno = $resPuntosAlumno['obtenidos'];
                        $mostrarPuntos = $puntosObtenidosAlumno . "/" . $puntosTotales;
                    }
                    //TotalFormularios
                    $conEntregados = "SELECT COUNT(*) AS total FROM formularioAlumno WHERE idAlumno = $idAlumno AND entregado = 1";
                    $paqEntregados = mysqli_query($conexion, $conEntregados);
                    $resEntregados = $paqEntregados->fetch_array();
                    $entregadosText = $resEntregados['total'];
                ?>
                <p>Calificación General: <?php echo $promedioAlumno; ?></p>
                <p>Puntos Totales: <?php echo $mostrarPuntos; ?></p>
                <p>Formularios Entregados: <?php echo $entregadosText; ?></p>
            </div>
        </div>
    </div>
</body>
</html>