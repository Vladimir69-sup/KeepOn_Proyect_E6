<?php
    session_start();
    $rutaFoto = "../../statics/media/img/";
    $nombreFoto = "FotoUsuario.png";
    $fotoAlumno = $rutaFoto . $nombreFoto;

    if(isset($_POST['guardar-foto'])){
        move_uploaded_file($_FILES['foto-perfil-alumno']['tmp_name'], $fotoAlumno);
    }
    if (!file_exists($fotoAlumno)) {
    $fotoAlumno = $rutaFoto . "FotoPerfil.png";
    }

    //CONECTAR A LA BASE DE DATOS   
    const DBHOST = "localhost";
    const DBUSER = "root";
    const PASSWORD = "";
    const DB = "keep_on_db";

    $conexion = mysqli_connect(DBHOST, DBUSER, PASSWORD, DB);
    
    //Se consulta el estado del formulario
    $consultaEstado = "SELECT enviado FROM formulario WHERE idFormulario = 1";
    $resultadoEstado = mysqli_query($conexion, $consultaEstado);
    $datosForm = $resultadoEstado->fetch_array();
    $estadoEnviado = $datosForm['enviado'];
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
        <div class="datos-alumno">
            <img class="foto-perfil" src="<?php echo $fotoAlumno;?>" alt="Foto de Perfil">
            <div>
                <p>Nombre del Alumno (Tú)</p>
                <p>Número de Cuenta</p>
                <p>Fecha de Nacimiento</p>
                <p>Grupo al que pertenece</p> 
            </div>
            
            <form class="mostrar-abajo" method="POST" enctype="multipart/form-data">
                <input type="file" name="foto-perfil-alumno" id="inpt-ftalumno" accept="image/png, image/jpeg" style="display: none;" required>
                <label for="inpt-ftalumno" class="editar-perfil">Editar foto de Perfil</label>
                <button type="submit" name="guardar-foto" class="guardar-foto"> Guardar</button>
            </form>

        </div>
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
                                while ($dataOpcion = $respuestaAlumno->fetch_array()) {
                                    $idOpcionElegida = $dataOpcion['idOpcionPregunta'];
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
                <a href="FormularioCondiciones.php?id_formulario=1"> <!--Modificar la url para que lleve en específico a esa, si no lo enviará a otra página-->
                    <button id="formulario-condiciones">Formulario Condiciones de Estudio</button>
                </a>
                <p>Notas de tu profesor: </p>
                <div class="notas-profesor">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fu</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>