<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');    
    session_start(); 
    include "conexion.php";

    if (!isset($_SESSION['borrador_formulario'])) 
    {
        $_SESSION['borrador_formulario'] = 
        [
            'titulo' => '',
            'descripcion' => '',
            'grupo'=> '',
            'preguntas' => []
        ];
    }

    if (!isset($_SESSION['num_opciones_actual'])) 
    {
        $_SESSION['num_opciones_actual'] = 2; //contador de opciones
    }

    $borrador = &$_SESSION['borrador_formulario'];
    $rendimiento=0;


        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $tipo_pregunta=$_GET['tipo'] ?? '';
            $borrador['titulo'] = $_POST['titulo_formulario'] ?? $borrador['titulo'];
            $borrador['descripcion'] = $_POST['descripcion_formulario'] ?? $borrador['descripcion'];
            $borrador['grupo'] = $_POST['grupo'] ?? $borrador['grupo'];
            $_SESSION['pregunta_fantasma']= $_POST['pregunta']?? ''; //por si agrega opciones a lo wey
            $_SESSION['puntaje']=$_POST['puntaje'] ?? 1;
            $_SESSION['opciones_fantasma']=$_POST['opciones']?? [];
            

            if(isset($_POST['btn_agrega_opcion']))  // acaa lo de si pucho el boton de agregar opcionnn 
            {
                $_SESSION['num_opciones_actual']++; //va sin espacio entre el ++ y los []
                $_SESSION['pregunta_fantasma']= $_POST['pregunta']?? ''; //por si agrega opciones a lo wey
                $_SESSION['puntaje']=$_POST['puntaje'] ?? 1;
                $_SESSION['opciones_fantasma']=$_POST['opciones']?? [];
                header('location:./nuevo_renovado.php?estado=selecciona&tipo=' . $tipo_pregunta);
            }

            if(isset($_POST['guardar_pregunta']))
            {
                $texto_pregunta=$_POST['pregunta'];
                $puntaje=$_POST['puntaje'];
              //  $rendimiento+=$puntaje;
                if(!($texto_pregunta === ""))
                {
                    $pregunta_nueva=
                    [
                        'pregunta'=>$texto_pregunta,
                        'tipo'=>$tipo_pregunta,
                        'puntaje'=>$puntaje,
                        'opciones'=>[]
                    ];

                    if(($tipo_pregunta==='radio'|| $tipo_pregunta==='checkbox')&& isset($_POST['opciones']))
                    {
                        $variable_cont=0;
                        foreach($_POST['opciones'] as $texto_opcion)
                        {                            
                            $contador_en_cadena = (string) $variable_cont;
                            if(!($texto_opcion===""))
                            {
                                $correcta=0;
                                if($tipo_pregunta=='radio' && isset($_POST['opcionRadioCorrecta'])&& $_POST['opcionRadioCorrecta']===$contador_en_cadena)
                                {
                                    $correcta=1;
                                }
                                elseif($tipo_pregunta=='checkbox' && isset($_POST['opcionCheckboxCorrecta'])&& in_array($contador_en_cadena,$_POST['opcionCheckboxCorrecta']))  // 
                                {
                                    $correcta=1;
                                }

                                $pregunta_nueva['opciones'][]= 
                                [ 
                                    "opcion"=>$texto_opcion,
                                    "correcta"=>$correcta,
                                ];
                            }
                            $variable_cont++;
                        }
                    }
                    
            }
            $borrador['preguntas'][]= $pregunta_nueva;

            $_SESSION['num_opciones_actual']=2;//PARA REINCIARLO EN 2
            $_SESSION['pregunta_fantasma']= ''; //por si agrega opciones a lo wey
            $_SESSION['puntaje']=1;
            $_SESSION['opciones_fantasma']=[];
            header('location:./nuevo_renovado.php');
        }
            
            if(isset($_POST['publicar']))
            {
                 if(!(empty($borrador['titulo']) || empty($borrador['descripcion']) || empty($borrador['grupo']) || empty($borrador['preguntas'])))
                {
                    $titulo=$borrador['titulo']; 
                    $descripcion=$borrador['descripcion'];
                    $grupo= (int) $borrador['grupo'];

                    $rendimiento_total = 0;   //-------------lo del rendimiento----------
                    foreach($borrador['preguntas'] as $pregunta_puntaje) 
                    {
                        $rendimiento_total += (int)$pregunta_puntaje['puntaje'];
                    }

                    //------------------meter info a base de datos-----------------------------
                    $insercion1="INSERT INTO formulario (idGrupo, titulo, descripcion, rendimiento_esperado) VALUES ($grupo,'$titulo','$descripcion',$rendimiento_total)";
                    mysqli_query($conexion,$insercion1); // se insertan esos datos sin id pero luego pedimos el id abajo q ya tendra pq insertamos algo 

                    //obtenemos el id del formulario que acabamos de agregar  arriba
                    $idFormularioAgregado = mysqli_insert_id($conexion);//aqui ya nos regresa $conexion con esa funcion q id genero con la anterior insercion 
                                    
                    foreach($borrador['preguntas'] as $pregunta) //vamos a recorrer las preguntas que guardamos en nuestro borrador
                    {
                        //declaramos el tipo de pregunta para nuestra tabla tipo_pregunta en base de datos
                        $idTipoPregunta = 3; //Abierta por defecto
                        if($pregunta['tipo'] === 'radio')
                            $idTipoPregunta = 1; //Si el tipo es radio entonces le asignamos 1 para que tenga congruencia con lo de Aby
                        if($pregunta['tipo'] === 'checkbox')
                            $idTipoPregunta = 2; //Si el tipo es radio entonces le asignamos 2 para que tenga congruencia con lo de Aby
                        
                        $texto_pregunta = $pregunta['pregunta']; //obtenemos el texto de la pregunta actual 
                        $puntaje_pregunta = $pregunta['puntaje']; //obtenemos el puntaje de la pregunta actual

                        $insercionPregunta = "INSERT INTO pregunta (pregunta, idFormulario, idTipoPregunta, puntaje_rendimiento) VALUES ('$texto_pregunta', $idFormularioAgregado, $idTipoPregunta, $puntaje_pregunta)"; //escribimos la sentencia sql de insercion
                        
                        mysqli_query($conexion , $insercionPregunta); //hacemos la insercion
                        $idPreguntaAgregada =  mysqli_insert_id($conexion); //obtenemos el ultimo id agregado a la base de datos que en este caso sería el de la pregunta

                        //recorremos todas las opciones de respuesta de la pregunta, si es abierta no hay opciones entonces no entra
                        foreach($pregunta['opciones'] as $opcion)
                        {
                            $texto_opcion = $opcion['opcion']; //texto de cada opcion
                            $correcta = $opcion['correcta']; //obtenemos si es correcta o no esta opcion

                            $insercionOpcion= "INSERT INTO opcionPregunta (opcion, idPregunta, correcta) VALUES ('$texto_opcion',$idPreguntaAgregada , $correcta)"; //sentencia sql de insercion
                            mysqli_query($conexion, $insercionOpcion); //hacemos la insercion                       
                        }
                    }
                    //se reincian los valores 
                    $_SESSION['borrador_formulario'] = [];
                    $_SESSION['num_opciones_actual'] = 2;
                    header("Location: ./FormularioProfesores.php"); //regrese a la pagina de formualrio(la lista) con boton de nuevo form    
                }else{
                    echo "<p>No puedes publicar un formulario sin preguntas.</p>";
                }
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Formulario</title>
   <!-- <link rel="stylesheet" href="../../statics/css/style.css">-->

</head>
<header>
    <div class="contenedor-encabezado">
        <a href="FormularioProfesores.php"><img src="../../statics/media/img/imagenRegresar.png" height="80px"></a>
    </div>
</header>
<body>
    
    <form action="" method="POST">   <!--aqui empieza el forms ------------------------------->
        <section id="seccion_arriba">
        <div class="lado-izquierdo">
            <div class = "informacion-formulario">
            <?php 
                $tituloF = $borrador['titulo'] ?? '';
                $descripcionF = $borrador['descripcion'] ?? '';
                echo "<p>Título</p>";
                echo "<textarea class='tex_info_formualio' name='titulo_formulario' id='titulo_formulario' placeholder='Ingresa el título del formulario...'>" . $tituloF . "</textarea>";                        
                
                echo "<p>Descripción</p>";
                echo "<textarea class='tex_info_formualio' name='descripcion_formulario' id='descripcion_formulario' placeholder='Ingresa una breve descripción'>" . $descripcionF . "</textarea>";
            ?>

            <?php
                $maestroActual=1;  //cambiar al hacer merge por el id amestro d ela sesion actual 
                $grupo="SELECT nombreGrupo, idGrupo FROM grupo WHERE idMaestro = $maestroActual";
                $query=mysqli_query($conexion, $grupo);
                
                echo "<select class='grupo' name='grupo' id='grupo'required>";

                while($query_info=mysqli_fetch_assoc($query)){
                    $nombreGrupo=$query_info["nombreGrupo"];
                $idGrupo=$query_info["idGrupo"];
                    echo "<option value='$idGrupo'>$nombreGrupo</option>";

                

                }

                echo "</select>";
            ?>

            </div>

            <?php

                
                if((($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['continuar']))) || (isset($_GET['estado']) &&  $_GET['estado'] === "selecciona")){
                    echo "<div class='header-preguntas' style='font-size: 20p'>";
                    echo "<a id='AgregarPregunta' href='nuevo_renovado.php?estado=selecciona' >+ Agregar Pregunta</a> "  ;               
                    echo "</div>";
                } else {
                    echo "<input type='submit' name='continuar' id='boton_publicar' value='CONTINUAR'></input>";
                }
            ?>  

            
            <?php

           
            if(isset($_GET['estado']))
            {
                echo "<a class='tipo-pregunta' id='pregunta-abierta' href='nuevo_renovado.php?estado=selecciona&tipo=abierta'> Abierta</a>";   //eestado='selecciona'----> para que vuelva a entrara en el if del get    & manda todos los cositos que le mandas en una cajita en la url
                echo  "<a class='tipo-pregunta'  id='pregunta-opcion-una'  href='nuevo_renovado.php?estado=selecciona&tipo=radio'>Opción Múltiple<br>(Una Sola Respuesta)</a>";
                echo "<a class='tipo-pregunta' id='pregunta-opcion-varias' href='nuevo_renovado.php?estado=selecciona&tipo=checkbox'>Opción Múltiple<br>(Varias Respuestas)</a> " ;  
            
                if(isset($_GET['tipo']))
                {
                    switch ($_GET['tipo'])
                    {
                        case 'abierta': 
                            echo "<div  class='crear_pregunta' id='abierta'>";
                            echo "                        <textarea name='pregunta'id='pregunta' rows='10' cols='50' placeholder='Escribe aquí la pregunta ...'>" . $_SESSION['pregunta_fantasma'] . "</textarea>";
                            echo "                            <div class='puntaje_pregunta'>";
                            echo "                                <p>Puntaje de la pregunta (1 al 5):</p>";
                            echo "                            <input type='number' class='puntajePregunta' name='puntaje' min='1' max='5' value='" . $_SESSION['puntaje'] . "'" . " step='1'>";
                            echo "                            </div>";
                            echo "                            <div class='botones_pregunta'>";
                            echo "                            <input type='submit' name='guardar_pregunta' class='boton-guardar' value='Guardar &#10Pregunta'></input>";
                            echo "                            </div>";
                            echo "                    </div>";
                            break;
                        case 'radio': 
                            echo "<div  class='crear_pregunta' id='radio'>";
                            echo "                        <textarea name='pregunta'id='pregunta' rows='10' cols='50' placeholder='Escribe aquí la pregunta ...'>" . $_SESSION['pregunta_fantasma'] . "</textarea>";
                            echo "                        <div class='puntaje_pregunta'>";
                            echo "                            <p>Puntaje de la pregunta (1 al 5):</p>";
                            echo "                            <input type='number' class='puntajePregunta' name='puntaje' min='1' max='5' value='" . $_SESSION['puntaje'] . "'" . " step='1'>";
                            echo "                        </div>";
                            echo "                        <div class='opciones'>";
                            echo "                            <p class='posibles_respuestas'>Escribe las posibles respuestas (Selecciona cual es la correcta):</p>                      ";
                            echo "                            <div class='cuadro_almacena_opciones'>";

                                                            for ($i = 0; $i <= $_SESSION['num_opciones_actual']; $i++) 
                                                            {
                                                                $texto_opcion = $_SESSION['opciones_fantasma'][$i] ?? '';
                                                                echo "    <div class='opciones_input'>";
                                                                echo "       <input name='opciones[]' class='inputs_text' type='text' placeholder='Opción $i...' value='" . $texto_opcion . "'>";
                                                                    // El value se vuelve dinámico gracias a $i (1, 2, 3...)
                                                                echo "        <input class='inputs_radio' type='radio' name='opcionRadioCorrecta' value='$i' class='radio_correcta'>";
                                                                echo "    </div>";
                                                            }

                            echo "                            </div>";
                            echo "                            <div><input type='submit' class='agregar_opcion_pregunta' name='btn_agrega_opcion' value='Agregar opción'></div>";
                            echo "                        </div>";
                            echo "                        <div class='botones_pregunta'>";
                            echo "                        <input type='submit'  name='guardar_pregunta' class='boton-guardar' value='Guardar &#10Pregunta'></input>";
                            echo "                    </div>";
                            echo "                </div>";
                            break;

                        case 'checkbox':
                            echo "<div  class='crear_pregunta' id='checkbox'>";
                            echo "                        <textarea name='pregunta'id='pregunta' rows='10' cols='50' placeholder='Escribe aquí la pregunta ...'>" . $_SESSION['pregunta_fantasma'] . "</textarea>";
                            echo "                        <div class='puntaje_pregunta'>";
                            echo "                            <p>Puntaje de la pregunta (1 al 5):</p>";
                            echo "                            <input type='number' class='puntajePregunta' name='puntaje' min='1' max='5' value='" . $_SESSION['puntaje'] . "'" . " step='1'>";
                            echo "                        </div>";
                            echo "                        <div class='opciones'>";
                            echo "                            <p class='posibles_respuestas'>Escribe las posibles respuestas (Selecciona las correctas):</p>                      ";
                            echo "                            <div class='cuadro_almacena_opciones'>";

                                                            for ($i = 0; $i < $_SESSION['num_opciones_actual']; $i++) 
                                                            {
                                                                $texto_opcion = $_SESSION['opciones_fantasma'][$i] ?? '';
                                                                echo "    <div class='opciones_input'>";
                                                                 echo "       <input name='opciones[]' class='inputs_text' type='text' placeholder='Opción $i...' value='" . $texto_opcion . "'>";
                                                                // CORRECCIÓN CLAVE: El name lleva [] para que PHP reciba un arreglo con todas las casillas marcadas
                                                                echo "        <input class='inputs_checkbox' type='checkbox' name='opcionCheckboxCorrecta[]' value='$i' class='radio_correcta'>";
                                                                echo "    </div>";
                                                            }

                            echo "                            </div>";
                            echo "                            <div><input type='submit' class='agregar_opcion_pregunta' name='btn_agrega_opcion' value='Agregar opción'></div>";
                            echo "                        </div>";
                            echo "                         <div class='botones_pregunta'>";
                            echo "                        <input type='submit' name='guardar_pregunta' class='boton-guardar' value='Guardar &#10Pregunta'></input>";
                            echo "                    </div>   ";
                            echo "                </div>";
                            break;
                    }
                }
            }
    ?>

        </div>

            <div class="contenedor-padre" id="mas_preguntas" >  

                <div class="lista_temporal">
                    <?php
                    //  preguntas guardadas del borrador
                    if(!empty($borrador['preguntas']))
                    {
                        echo "<ol>"; //de lsita ordenada 
                            foreach($borrador['preguntas'] as $p_lista)
                            {

                                echo "<li style='margin-bottom: 10px;'>";
                                echo "<strong>" . $p_lista['pregunta'] . "</strong> (" . $p_lista['puntaje'] . " pts)";
                                
                                // sus opciones (radio o checkbox), se recorre paar poder imprimiralas 
                                if(!empty($p_lista['opciones']))
                                {
                                        echo "<ul style='list-style-type: circle;'>";
                                        foreach($p_lista['opciones'] as $o_lista)
                                        {
                                            $correcta = "";
                                            if($o_lista['correcta'] == 1)
                                                $correcta = "✅";
                                            echo "<li>";
                                            echo $o_lista['opcion'];
                                            echo $correcta;
                                            echo "</li>";
                                        }
                                    echo "</ul>";
                                }
                                
                                echo "</li>";
                            }
                        echo "</ol>";
                    }
                    else
                    {
                        echo "<p>Aún no hay preguntas añadidas.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
        </section>
        <input type="submit" name='publicar' id="boton_publicar" value='PUBLICAR'></input>;
</form>

</body>
</html>

