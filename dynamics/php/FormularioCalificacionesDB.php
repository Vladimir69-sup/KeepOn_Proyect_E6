<?php
    //FORMULARIO PARA PODER VOLVER A ENTREGAR MÚLTIPLES VECES

    const DBHOST = "localhost";
    const DBUSER = "root";
    const PASSWORD = "";
    const DB = "keep_on_db_actualizada";

    $conexion = mysqli_connect(DBHOST, DBUSER, PASSWORD, DB);
    
    $guardadoForm = false;
    //"lista" para que sepa que tipo de input debe ser dependiendo del idTipoPregunta de la base de datos 🍳
    //La lista arriba para ya no repetirla cada vez 
    $tipos = [
        1 => 'radio',
        2 => 'checkbox',
        3 => 'textarea'
    ];  
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_formulario = $_GET['id_formulario'];
        $idUsuario = 1; //este no existe es solo para probarlo pero aún no sé cómo está eso de los Usuarios

        //Consulta del idAlumno 
        $consultaAlumno = "SELECT idAlumno FROM infoAlumno WHERE idUsuario =  $idUsuario";
        $resultadoAlumno = mysqli_query($conexion, $consultaAlumno);
        $datosAlumno = $resultadoAlumno->fetch_array();
        $idAlumno = $datosAlumno['idAlumno'];

        //Consulta de si está entregado o no 
        $consultaEstado = "SELECT idFormularioAlumno, entregado FROM formularioAlumno WHERE idFormulario = $id_formulario AND idAlumno = $idAlumno";

        $resultadoEstado = mysqli_query($conexion, $consultaEstado);
        //$datosForm = $resultadoEstado->fetch_array();
        //$estadoEnviado = $datosForm['entregado'];

        $formularioExiste = mysqli_num_rows($resultadoEstado);
        //Si el alumno tiene existente el formulario
        if($formularioExiste > 0){
            $datosForm = $resultadoEstado->fetch_array();
            $idFormularioAlumno = $datosForm['idFormularioAlumno'];
            $estadoEnviado = $datosForm['entregado'];
        }
        else{
            $sqlInsertProgreso = "INSERT INTO formularioAlumno (entregado, calificacion, rendimiento_alumno, idFormulario, idAlumno) VALUES (0, 0, 0, $id_formulario, $idAlumno)";
            mysqli_query($conexion, $sqlInsertProgreso);
            $idFormularioAlumno = mysqli_insert_id($conexion);
            $estadoEnviado = 0;
        }

        //Si ya se envió antes de enviar los datos nueuvos del formulario se borran, así no aparece repetido en la base de datos y ya no se imprimen todas las respuestas guardadas
        if($estadoEnviado == 1){
            $sqlBorrar = "DELETE FROM respuestaUsuario WHERE idUsuario = $idUsuario AND idPregunta IN (SELECT idPregunta FROM pregunta WHERE idFormulario = $id_formulario)";
            mysqli_query($conexion, $sqlBorrar);
        }

        //consultas para las respuestas de lo que se envió por post
        $consultaPreguntas = "SELECT pregunta, idPregunta, idTipoPregunta FROM pregunta WHERE idFormulario=$id_formulario";
        $preguntas = mysqli_query($conexion, $consultaPreguntas);
        $totalPreguntas = mysqli_num_rows($preguntas); //mysqli_num_rows cuenta el total de preguntas (filas) que hay para poder recorrer esa cantidad en el for

        //aquí se usa ciclo for similar que el de abajo, solo que este inserta ya las respuestas a la base de datos
        for($num = 0; $num < $totalPreguntas; $num++){
            $paqPreguntas = $preguntas->fetch_array();
            $idPregunta = $paqPreguntas['idPregunta'];
            $textTipoPregunta = $paqPreguntas['idTipoPregunta']; 
            $tipoInput = $tipos[$textTipoPregunta]; 

            $nombreInput = "respuesta_" . $idPregunta;

            if (isset($_POST[$nombreInput])) {

                if ($tipoInput == 'checkbox') {
                    foreach ($_POST[$nombreInput] as $opcionSelec) {
                        //$sqlInsert = "INSERT INTO respuestaUsuario (textoRespuesta, idUsuario, idPregunta, idOpcionPregunta) VALUES (NULL, $idUsuario, $idPregunta, $opcionSelec)";
                        $sqlInsert = "INSERT INTO respuestaUsuario (textoRespuesta, idUsuario, idPregunta, idOpcionPregunta, calificacion_por_pregunta, puntaje_por_pregunta) VALUES ('', $idUsuario, $idPregunta, $opcionSelec, 0, 0)";
                        mysqli_query($conexion, $sqlInsert);
                    }
                } 
                else if ($tipoInput == 'textarea') {
                    $valorRespuesta = $_POST[$nombreInput];
                    //$sqlInsert = "INSERT INTO respuestaUsuario (textoRespuesta, idUsuario, idPregunta, idOpcionPregunta) VALUES ('$valorRespuesta', $idUsuario, $idPregunta, NULL)";
                    $sqlInsert = "INSERT INTO respuestaUsuario (textoRespuesta, idUsuario, idPregunta, idOpcionPregunta, calificacion_por_pregunta, puntaje_por_pregunta) VALUES ('$valorRespuesta', $idUsuario, $idPregunta, NULL, 0, 0)";
                    mysqli_query($conexion, $sqlInsert);
                } 
                else { 
                    $valorRespuesta = $_POST[$nombreInput];
                    //$sqlInsert = "INSERT INTO respuestaUsuario (textoRespuesta, idUsuario, idPregunta, idOpcionPregunta) VALUES (NULL, $idUsuario, $idPregunta, $valorRespuesta)";
                    $sqlInsert = "INSERT INTO respuestaUsuario (textoRespuesta, idUsuario, idPregunta, idOpcionPregunta, calificacion_por_pregunta, puntaje_por_pregunta) VALUES ('', $idUsuario, $idPregunta, $valorRespuesta, 0, 0)";
                    mysqli_query($conexion, $sqlInsert);
                }
            }
        }

    //aquí yya se mara como enviado el formualrio
    //$estadoEnviado = "UPDATE formularioAlumno SET entregado = 1 WHERE idFormularioAlumno=$id_formulario";
    $estadoEnviado = "UPDATE formularioAlumno SET entregado = 1, rendimiento_alumno = 0 WHERE idFormularioAlumno = $idFormularioAlumno";
    mysqli_query($conexion, $estadoEnviado);
    $guardadoForm = true;
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormularioCondiciones</title>
    <link rel="stylesheet" href="../../statics/css/FormularioCondiciones.css">
</head>
<body>
    <div class="contenedor-principal">
        <div class="contenido">
            <?php
            /*
            $consultaEstado = "SELECT enviado FROM formulario WHERE idFormulario=$id_formulario";
            $resultadoEstado = mysqli_query($conexion, $consultaEstado);
            $paqEstado = $resultadoEstado->fetch_array();
            $textEstado = $paqEstado['enviado'];*/

            if(!(isset($_GET['id_formulario']))){ //añadir si se cumple 
                echo "<h2> no se encontró nada</h2>";
            }
            else {
                $id_formulario = $_GET['id_formulario']; //para que el formulario sí corresponda con el formulario correspondiente
                //Realizar consulta para rescatar el título del formulario
                $consulTitulo = "SELECT titulo FROM formulario WHERE idFormulario=$id_formulario";
                $titulo = mysqli_query($conexion, $consulTitulo);
                $paqTit = $titulo->fetch_array();
                $textTitulo = $paqTit['titulo'];
            ?>
        <h1><?php echo $textTitulo;?></h1>
        <!--Se tiene que usar la tabla pregunta, formulario y tipoPregunta (se van a extraer las cosas de la tabla ya poblada) 🐳-->
        <?php 
            if ($guardadoForm) { 
        ?>
            <p>Formulario Resuelto</p>
            <br>
            <a href="VistaFormularioCalificaciones.php?">
                <button type="button">Volver</button>
            </a>
        <?php   
            }else{
        ?>
        <form action="" name="keep_on_db" method="POST">
            <?php 
                $consultaDesc = "SELECT descripcion FROM formulario WHERE idFormulario=$id_formulario";
                $texto = mysqli_query($conexion, $consultaDesc);
                $paquete = $texto->fetch_array(); //fetch toma la fila de resultados de la base de datos y la convierte en un array 🍮
                $textDescripcion = $paquete['descripcion'];
            ?>
            <p><?php echo $textDescripcion;?></p>
            <?php
                $consultaPreguntas = "SELECT pregunta, idPregunta, idTipoPregunta FROM pregunta WHERE idFormulario=$id_formulario";
                $preguntas = mysqli_query($conexion, $consultaPreguntas);
                $totalPreguntas = mysqli_num_rows($preguntas); //cuenta el total de preguntas que hay para poder recorrer esa cantidad en el for

            //ciclo for para que recorra las preguntas y las despliegue con sus opciones de respuesta 🍂
                for($num = 0; $num<$totalPreguntas; $num++){
                    //
                    $paqPreguntas = $preguntas->fetch_array();
                    $textPreguntas = $paqPreguntas['pregunta'];
                    //$paqTipoPregunta = $preguntas->fetch_array();
                    $textTipoPregunta = $paqPreguntas['idTipoPregunta']; 

                    $idPregunta = $paqPreguntas['idPregunta'];
                    $tipoInput = $tipos[$textTipoPregunta]; //convierte el idTipoPregunta en un texto para poderlo usar en html 
                
            ?>
                    <p><?php echo $textPreguntas;?></p> <!--Imprime la pregunta ✨-->
                    <?php 
                        //si 
                        if ($tipoInput == 'textarea') { 
                    ?>
                            <!--Si el tipo de input ex un 3(textarea) crea un textarea -->
                            <textarea name="respuesta_<?php echo $idPregunta;?>" required></textarea> 
                    <?php 
                        } 
                        else { 
                            //Si es radio o checkbox se deben extraer los contenidos de las opciones 🌸
                            $consultaOpciones = "SELECT idOpcionPregunta, opcion FROM opcionPregunta WHERE idPregunta = $idPregunta";
                            $opciones = mysqli_query($conexion, $consultaOpciones);
                            //Se recorren las opciones de cada pregunta 
                            while ($paqOpciones = $opciones->fetch_array()){
                                $idOpcion = $paqOpciones['idOpcionPregunta'];
                                $textoOpcion = $paqOpciones['opcion'];
                    ?>
                            <label>
                                <?php if ($tipoInput == 'checkbox') { ?><!-- Si es checkbox ponerle [] para que sepa que es más de una opción y no mande solo una selección -->
                                    <input type="<?php echo $tipoInput;?>" name="respuesta_<?php echo $idPregunta; ?>[]" value="<?php echo $idOpcion; ?>">
                                <?php } 
                                else { 
                                ?>
                                <!--radio-->
                                    <input type="<?php echo $tipoInput;?>" name="respuesta_<?php echo $idPregunta; ?>" value="<?php echo $idOpcion; ?>" required>
                                <?php 
                                } 
                                ?>
                                
                                <?php echo $textoOpcion; ?>
                                <br>
                            </label>
                    <?php 
                            } //Fin while
                        } //FIn else
                    ?>
                <br><hr> 
                <?php
                }//Fin for
            ?>
            <button type="submit" name="enviar-form">Enviar</button>
        </form>
        <?php 
            }
        }
        ?>
        </div>
    </div>
</body>
</html>