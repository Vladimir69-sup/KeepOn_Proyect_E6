<?php
    const DBHOST = "localhost";
    const DBUSER = "root";
    const PASSWORD = "";
    const DB = "keep_on_db";

    $conexion = mysqli_connect(DBHOST, DBUSER, PASSWORD, DB);
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
            if(!(isset($_GET['id_formulario']))){
                echo "<h2> no se enontró</h2>";
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
        <form action="#" name="keep_on_db" method="POST">
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
    //HACER LA MISMA CONSULTA
                //$consultaIipoPregunta = "SELECT idTipoPregunta FROM pregunta";
                //$tipoPregunta = mysqli_query($conexion, $consultaIipoPregunta);
                
                $totalPreguntas = mysqli_num_rows($preguntas); //cuenta el total de preguntas que hay para poder recorrer esa cantidad en el for

                //"lista" para que sepa que tipo de input debe ser dependiendo del idTipoPregunta de la base de datos 🍳
                $tipos = [
                    1 => 'radio',
                    2 => 'checkbox',
                    3 => 'textarea'
                ];  

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
                            <textarea name="respuesta_<?php echo $idPregunta;?>"></textarea> 
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
                                <input type="<?php echo $tipoInput;?>" name="respuesta_<?php echo $idPregunta;?>" value="<?php echo$idOpcion;?>">
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
            }
            ?>
        </form>
        </div>
    </div>
</body>
</html>