<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Formulario</title>
    <link rel="stylesheet" href="../../statics/css/style.css">

</head>
<header>
    <div class="contenedor-encabezado">
        <a href="FormularioProfesores.php"><img src="../../statics/media/img/imagenRegresar.png" height="80px"></a>
    </div>
</header>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['lista_de_preguntas'])) 
        {
            $_SESSION['lista_de_preguntas'] = [];    //dentro de [] los name de los input
        }

        
    ?>

    <form method="POST" action="" id="megaForms">
        <section id="seccion_arriba" >
        <input type="radio" id="Continuar" hidden>
        <div class="lado-izquierdo">
            <div class = "informacion-formulario">
                <p>Título</p>
                <textarea class="tex_info_formualio"name="titulo_formulario" id="titulo_formulario" placeholder="Ingresa el título del formulario..."></textarea>
                <p>Descripción</p>
                <textarea class="tex_info_formualio"name="descripcion_formulario" id="descripcion_formulario" placeholder="Ingresa una breve descripción"></textarea>
            </div>
            <label for="Continuar">
                <p id="continuar">CONTINUAR</p>
            </label>
            <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                    
                }             
            ?>

        </div>

          <!--------------------- LADO DONDE SE CREAN LAS PREGUNTAS-------------------------------------------------->
            <div class="contenedor-padre" id="mas_preguntas">  
                    <div class="header-preguntas" style="font-size: 20px">
                            <input type="radio" id="AgregarPregunta" name="AGREGAR"hidden >
                            <label id="label_agregar_preguntas" for="AgregarPregunta">  <!--este le debe mandar la señal para hcer un nuevo arreglo-->
                                    + Agregar Pregunta
                            </label>
                            
                        <input type=radio class="tipo-pregunta" name="opcionPregunta"value="abierta" id="pregunta-abierta"></input>
                        <label class="preguntaBotones" id="primerLabel"for="pregunta-abierta">
                            <p class="preguntaLetras">Abierta</p>
                        </label>

                        <input type=radio class="tipo-pregunta" name="opcionPregunta" value="radio" id="pregunta-opcion-una"></input>
                            <label class="preguntaBotones" id="segundoLabel"for="pregunta-opcion-una">
                                <p class="preguntaLetras">Opción Múltiple<br>(Una Sola Respuesta)</p>
                            </label>

                        <input type=radio class="tipo-pregunta"name="opcionPregunta" value="checkbox"id="pregunta-opcion-varias"></input>        
                            <label class="preguntaBotones" id="tercerLabel" for="pregunta-opcion-varias">
                            <p class="preguntaLetras">Opción Múltiple<br>(Varias Respuestas)</p>
                            </label>
    

      <!-------------------------------------------- BLOQUE: ABIERTA --------------------------------------------------->

                    <div  class="crear_pregunta" id="abierta">
                            <textarea name="texto_pregunta_abierta" id="pregunta" rows="10" cols="50" placeholder="Escribe aquí la pregunta ..."></textarea>
                            <div class="botones_pregunta">
                                <input type="radio" name="guardar_borrar" class="boton-guardar" value="guardar &#10Pregunta"></input>
                            </div>
                    </div>
      <!-------------------------------------------- BLOQUE: RADIO --------------------------------------------------->
                    <div  class="crear_pregunta" id="radio">
                            <textarea name="texto_pregunta_radio"id="pregunta" rows="10" cols="50" placeholder="Escribe aquí la pregunta ..."></textarea>
                            <div class="puntaje_pregunta">
                                <p>Puntaje de la pregunta (0 al 5):</p>
                                <input type="number" class="puntajePregunta"name="puntaje_radio" min="0" max="5" value="0" step="1">
                            </div>
                            <div class="opciones">
                                <p class="posibles_respuestas">Escribe las posibles respuestas (Selecciona cual es la correcta  ○ ):</p>                      
                                <div class="cuadro_almacena_opciones">
                                    <div class="opciones_input">
                                        <input class="inputs_text"type="text" placeholder="Opción...">
                                        <input class="inputs_radio"type="radio" name="opcionRadioImput" class="radio_correcta">
                                    </div>
                                    <div class="opciones_input">
                                        <input class="inputs_text"type="text" placeholder="Opción...">
                                        <input class="inputs_radio"type="radio" name="opcionRadioImput" class="radio_correcta">
                                    </div>
                                </div>
                                <div><input type="radio" class="agregar_opcion_pregunta" value="Agregar opción"></div>
                            </div>
                            <div class="botones_pregunta">
                                <input type="radio" name="guardar_borrar"  class="boton-guardar" value="guardar &#10Pregunta"></input>
                        </div>
                    </div>

     <!-------------------------------------------- BLOQUE: CHECKBOX --------------------------------------------------->
                    <div  class="crear_pregunta" id="checkbox" >
                            <textarea name="texto_pregunta_checkbox"id="pregunta" rows="10" cols="50" placeholder="Escribe aquí la pregunta ..."></textarea>
                            <div class="puntaje_pregunta">
                                <p>Puntaje de la pregunta (0 al 5):</p>
                                <input type="number" class="puntajePregunta"name="puntaje_checkbox" min="0" max="5" value="0" step="1">
                            </div>
                            <div class="opciones">
                                <p class="posibles_respuestas">Escribe las posibles respuestas (Selecciona las correctas  □ ):</p>                      
                                <div class="cuadro_almacena_opciones">
                                    <div class="opciones_input">
                                        <input class="inputs_text"type="text" placeholder="Opción...">
                                        <input class="inputs_checkbox"type="checkbox" name="opcionRadioImput" class="radio_correcta">
                                    </div>
                                    <div class="opciones_input">
                                        <input class="inputs_text"type="text" placeholder="Opción...">
                                        <input class="inputs_checkbox"type="checkbox" name="opcionRadioImput" class="radio_correcta">
                                    </div>
                                </div>
                                <div><input type="radio" class="agregar_opcion_pregunta" value="Agregar opción"></div>
                            </div>
                            <div class="botones_pregunta">
                            <input type="radio" name="guardar_borrar"  class="boton-guardar" value="guardar &#10Pregunta"></input>
                        </div>                    
                    </div>
            </div>
        </div>
        </section>

        <?php
            //-----------------COMPRUEBA CUALBOTON PUCHO (abierta, radio o checkbox)-------------------------
            $contador_preguntas=0;
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {

                if (isset($_POST['AGREGAR']) && $_POST['AGREGAR'] == true) //  si el radio "AGREGAR" fue puchado =true
                {
                    $tipo_pregunta = '';
                    if (isset($_POST['opcionPregunta'])) // seguarda la elección (abierta, radio o checkbox)
                    {
                        $tipo_pregunta = $_POST['opcionPregunta']; //[name]de los input radio detras de los label 
                    }

                 //---------IF PREGUNTA ABIERTA------------------------------------
                    if ($tipo_pregunta == 'abierta') 
                    {
                        $texto = 'Sin texto';  
                        if (isset($_POST['texto_pregunta_abierta'])) // lee lo que manda el input con name texto_pregunta_abierta
                        {
                            $texto = $_POST['texto_pregunta_abierta'];
                        }
                       /* $puntos = 0;   //preguntar si se van a dejar lospunto
                        if (isset($_POST['puntaje_abierta'])) {
                            $puntos = $_POST['puntaje_abierta'];
                        }*/
                        if(isset($_POST["guardar_borrar"]) && $_POST["guardar_borrar"]=='guardar') //verificar el guardar input
                        {
                            $_SESSION['lista_de_preguntas'][] = 
                            [
                                "tipo"     => 3,  //CAMBIAR POR UN NUMERO PARA TENER CONGRUENCIA CON BD Y CODIGO ABY 
                                "pregunta" => $texto,
                            ];
                            $contador_preguntas++;
                        }

                    }

                 // ------------------(RADIO)--------------- ---
                    if ($tipo_pregunta == 'radio') 
                    {
                        
                        $texto = 'Sin texto';
                        if (isset($_POST['texto_pregunta_radio'])) 
                        {
                            $texto = $_POST['texto_pregunta_radio'];
                        }
                        $puntos = 0;
                        if (isset($_POST['puntaje_radio'])) 
                        {
                            $puntos = $_POST['puntaje_radio'];
                        }
                        if(isset($_POST["guardar_borrar"]) && $_POST["guardar_borrar"]=='guardar')
                        {
                            $_SESSION['lista_de_preguntas'][] = 
                            [
                                "tipo"     => 1,
                                "pregunta" => $texto,
                                "puntaje"  => $puntos
                            ];
                            $contador_preguntas++;
                        }
                    }
                    

                    // -------------CHECKBOX ----------
                    if ($tipo_pregunta == 'checkbox') 
                    {    
                        $texto = 'Sin texto';
                        if (isset($_POST['texto_pregunta_checkbox'])) 
                        {
                            $texto = $_POST['texto_pregunta_checkbox'];
                        }
                        $puntos = 0;
                        if (isset($_POST['puntaje_checkbox'])) 
                        {
                            $puntos = $_POST['puntaje_checkbox'];
                        }
            
                        if(isset($_POST["guardar_borrar"]) && $_POST["guardar_borrar"]=='guardar')
                        {
                            $_SESSION['lista_de_preguntas'][] = 
                            [
                                "tipo"     => 2,
                                "pregunta" => $texto,
                                "puntaje"  => $puntos
                            ];
                            $contador_preguntas++;
                        }
                    }                              
                }
            }





            //funcion de agregar pregunta  como hacer 
        ?>
    </form>
</body>
</html>



<!--recuerda:
nameIdentificar el dato que se envía al servidor.El lenguaje de backend (PHP, Python, Node.js).
idIdentificar un elemento único en la página web.CSS (estilos) y JavaScript (interactividad).-->