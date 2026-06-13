<?php
    session_start();
    //CONECTAR A LA BASE DE DATOS   
    const DBHOST = "localhost";
    const DBUSER = "root";
    const PASSWORD = "";
    const DB = "keep_on_db_actualizada";

    $conexion = mysqli_connect(DBHOST, DBUSER, PASSWORD, DB);
    $idUsuario = 1; // idprueba

    //consulta alumno
    $consultaAlumno = "SELECT idAlumno FROM infoAlumno WHERE idUsuario = $idUsuario";
    $resultadoAlumno = mysqli_query($conexion, $consultaAlumno);
    $datosAlumno = $resultadoAlumno->fetch_array();
    $idAlumno = $datosAlumno['idAlumno'];
    
    //Se consulta el estado del formulario
    $consultaEstado = "SELECT entregado FROM formularioalumno WHERE idFormulario = 1 AND idAlumno = $idAlumno";
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
    <title>VistaPerfilAlumno</title>
    <link rel="stylesheet" href="../../statics/css/VistaPerfilAlumno.css">
</head>
<body>
    <div class="contenedor-apartados">
        <div class="dos-secciones">
            <div class="respuestas-form">
                <h1>Condiciones de Estudio</h1>
                <?php
                    //si fue enviado se debe mostrar las respuestas y si no que lo diga
                    if($estadoEnviado == 1){
                        $idUsuario = 1; // idprueba    

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
            <div class="inferior-derecho">
                <a href="FormularioCalificacionesDB.php?id_formulario=1"> <!--Modificar la url para que lleve en específico a esa, si no lo enviará a otra página-->
                    <button id="formulario-condiciones">Formulario Condiciones de Estudio</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>