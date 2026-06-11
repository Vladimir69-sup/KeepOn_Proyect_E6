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

    //$id_formulario = $_GET['id_formulario']; 
    $id_formulario = isset($_REQUEST['id_formulario']) ? $_REQUEST['id_formulario'] : 1;
    //este es solo de prueba
    $idUsuario = 1;

    //Coonsulta el estado del formulario
    $consultaEstado = "SELECT enviado FROM formulario WHERE idFormulario=$id_formulario";
    $resultadoEstado = mysqli_query($conexion, $consultaEstado);
    $paqEstado = $resultadoEstado->fetch_array();
    $formResuelto = $paqEstado['enviado'];
    //Consultas de nuevo
    $consultaPreguntas = "SELECT pregunta, idPregunta, idTipoPregunta FROM pregunta WHERE idFormulario=$id_formulario";
    $preguntas = mysqli_query($conexion, $consultaPreguntas);
    $totalPreguntas = mysqli_num_rows($preguntas); //cuenta el total de preguntas que hay para poder recorrer esa cantidad en el for

    $tipos = [
        1 => 'radio',
        2 => 'checkbox',
        3 => 'textarea'
    ]; 
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
            
            <form class="mostrar-abajo" action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="foto-perfil-alumno" id="inpt-ftalumno" accept="image/png, image/jpeg" style="display: none;" required>
                <label for="inpt-ftalumno" class="editar-perfil">Editar foto de Perfil</label>
                <button type="submit" name="guardar-foto" class="guardar-foto"> Guardar</button>
            </form>

        </div>
        <div class="dos-secciones">
            <div class="respuestas-form">
                <h1>Condiciones de Estudio</h1>
                <?php
                if($formResuelto == true){
                    for($num = 0; $num<$totalPreguntas; $num++){
                    //
                        $paqPreguntas = $preguntas->fetch_array();
                        $textPreguntas = $paqPreguntas['pregunta'];
                        $textTipoPregunta = $paqPreguntas['idTipoPregunta']; 
                        $idPregunta = $paqPreguntas['idPregunta'];
                        $tipoInput = $tipos[$textTipoPregunta];

                        $nombreInput = "respuesta_" . $idPregunta; //para saber el name="" de cada input
                        //Si se acaba de enviar el formulario
                        if(isset($POST['enviar-form'])){//el botón deñ otro formulario, es su name
                            if(isset($_POST[$nombreInput])){
                                if($tipoInput == 'checkbox'){
                                    $seleccionesAlumno = "";
                                    foreach($_POST[$nombreInput] as $opcionSelec){
                                        $seleccionesAlumno = $seleccionesAlumno . $opcionSelec; //Se pone para que las guarde y no solamente deje la última

                                        $sqlInsert="INSERT INTO respuestaUsuario (textoRespuesta, idUsuario, idPregunta, idOpcionPregunta) VALUES (NULL, $idUsuario, $idPregunta, $opcionSelec)";
                                        mysqli_query($conexion, $sqlInsert);
                                    }
                                    $valorRespuesta = $seleccionesAlumno;
                                } // if
                                else{
                                    $valorRespuesta = $_POST[$nombreInput];
                                    if($tipoInput == 'textarea'){
                                        // INSERT para textarea 
                                        $sqlInsert = "INSERT INTO respuestaUsuario (textoRespuesta, idUsuario, idPregunta, idOpcionPregunta) VALUES ('$valorRespuesta', $idUsuario, $idPregunta, NULL)";
                                    } else {
                                        // INSERT para radio
                                        $sqlInsert = "INSERT INTO respuestaUsuario (textoRespuesta, idUsuario, idPregunta, idOpcionPregunta) VALUES (NULL, $idUsuarioLogueado, $idPregunta, $valorRespuesta)";
                                    }
                                    mysqli_query($conexion, $sqlInsert);
                                }//else
                            }
                            else{
                                $consultaRes = "SELECT textoRespuesta, idOpcionPregunta FROM respuestaUsuario WHERE idPregunta = $idPregunta AND idUsuario = $idUsuario";
                                //$valorRespuesta ="";
                                $respues= mysqli_query($conexion, $consultaRes);
                            }
                        }else{
                            //Solo se consulta de la base de datos
                        }
                        echo "<p>$textPreguntas: $valorRespuesta</p>";
                    }//for
                if(isset($_POST['enviar-form'])){
                        $updateEstado = "UPDATE formulario SET enviado = 1 WHERE idFormulario=$id_formulario";
                        mysqli_query($conexion, $updateEstado);
                    }
                }
                else{
                    echo "<p>El formulario no ha sido contestado<p>";
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