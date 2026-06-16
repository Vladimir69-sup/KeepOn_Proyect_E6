<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Formulario</title>
    <link rel="stylesheet" href="../../statics/css/formularioProfesores.css">

</head>
<header>
    <div class="contenedor-encabezado">
        <a href="FormularioProfesores.php"><img src="../../statics/media/img/imagenRegresar.png" height="80px"></a>
        <img src="../../statics/media/img/imagenUNAM.png" height="80px">
        <img src="../../statics/media/img/imagenENP.png" height="80px">
        <img src="../../statics/media/img/imagenETE.png" height="80px">
        <img src="../../statics/media/img/imagenComputacion.png" height="80px">
        <input class="buscador" type="text" placeholder="Busca algo aquí" >
        <button class="buscador" name="buscador" type="submit"><img style="border-radius: 100px;" src="../../statics/media/img/imagenLupa.png" height="50px"></button>

    </div>
</header>
<body>
    
    <section id="seccion_arriba" >
    <input type="radio" id="Continuar" hidden>
    <div class="lado-izquierdo">
        <div class = "informacion-formulario">
            <p>Título</p>
            <textarea class="tex_info_formualio"name="titulo_formulario" id="titulo_formulario" placeholder="Ingresa el título del formulario..."></textarea>
            <p>Descripción</p>
            <textarea class="tex_info_formualio"name="descripcion_formulario" id="descripcion_formulario" placeholder="Ingresa una breve descripción"></textarea>
        </div>

        <label for="Continuar" id="continuar">
            <p id="continuar">CONTINUAR</p>
        </label>

    </div>
        <div class="contenedor-padre" id="mas_preguntas">  
                <div class="header-preguntas" style="font-size: 20px">
                        <input type="radio" id="AgregarPregunta" name="agregar"hidden >
                        <label id="label_agregar_preguntas" for="AgregarPregunta">  <!--este le debe mandar la señal para hcer un nuevo arreglo-->
                                + Agregar Pregunta
                        </label>
                        <?php
                            $agregarPregunta=false;


                        ?>
                    <input type=radio class="tipo-pregunta" name=opcionPregunta id="pregunta-abierta"></input>
                    <label class="preguntaBotones" id="primerLabel"for="pregunta-abierta">
                        <p class="preguntaLetras">Abierta</p>
                    </label>

                    <input type=radio class="tipo-pregunta" name=opcionPregunta id="pregunta-opcion-una"></input>
                        <label class="preguntaBotones" id="segundoLabel"for="pregunta-opcion-una">
                            <p class="preguntaLetras">Opción Múltiple<br>(Una Sola Respuesta)</p>
                        </label>

                    <input type=radio class="tipo-pregunta"name=opcionPregunta id="pregunta-opcion-varias"></input>        
                        <label class="preguntaBotones" id="tercerLabel" for="pregunta-opcion-varias">
                        <p class="preguntaLetras">Opción Múltiple<br>(Varias Respuestas)</p>
                        </label>
                </div>

                <div  class="crear_pregunta" id="abierta">

                    <form>
                        <textarea id="pregunta" rows="10" cols="50" placeholder="Escribe aquí la pregunta ..."></textarea>
                        <div class="puntaje_pregunta">
                            <p>Puntaje de la pregunta (0 al 5):</p>
                            <input type="number" class="puntajePregunta"name="puntaje" min="0" max="5" value="0" step="1">
                        </div>
                        <div class="botones_pregunta">
                        <input type="submit"   class="boton-borrar" value="Borrar &#10Pregunta"></input>
                        <input type="submit"   class="boton-guardar" value="Guardar &#10Pregunta"></input>
                    </div>
                   </form>
                </div>

                <div  class="crear_pregunta" id="radio">
                    <form>
                        <textarea id="pregunta" rows="10" cols="50" placeholder="Escribe aquí la pregunta ..."></textarea>
                        <div class="puntaje_pregunta">
                            <p>Puntaje de la pregunta (0 al 5):</p>
                            <input type="number" class="puntajePregunta"name="puntaje" min="0" max="5" value="0" step="1">
                        </div>
                        <div class="opciones">
                            <p class="posibles_respuestas">Escribe las posibles respuestas (Selecciona cual es la correcta):</p>                      
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
                            <div><input type="submit" class="agregar_opcion_pregunta" value="Agregar opción"></div>
                        </div>
                        <div class="botones_pregunta">
                        <input type="submit"   class="boton-borrar" value="Borrar &#10Pregunta"></input>
                        <input type="submit"   class="boton-guardar" value="Guardar &#10Pregunta"></input>
                    </div>
                    </form>
                </div>

                <div  class="crear_pregunta" id="checkbox">
                     <form>
                        <textarea id="pregunta" rows="10" cols="50" placeholder="Escribe aquí la pregunta ..."></textarea>
                        <div class="puntaje_pregunta">
                            <p>Puntaje de la pregunta (0 al 5):</p>
                            <input type="number" class="puntajePregunta"name="puntaje" min="0" max="5" value="0" step="1">
                        </div>
                        <div class="opciones">
                            <p class="posibles_respuestas">Escribe las posibles respuestas (Selecciona las correctas):</p>                      
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
                            <div><input type="submit" class="agregar_opcion_pregunta" value="Agregar opción"></div>
                        </div>
                         <div class="botones_pregunta">
                        <input type="submit"   class="boton-borrar" value="Borrar &#10Pregunta"></input>
                        <input type="submit"   class="boton-guardar" value="Guardar &#10Pregunta"></input>
                    </div>   
                    </form>                  
                </div>
                    


        </div>
    </div>
    </section>

    <?php
                    



    ?>
</body>
</html>



<!--recuerda:
nameIdentificar el dato que se envía al servidor.El lenguaje de backend (PHP, Python, Node.js).
idIdentificar un elemento único en la página web.CSS (estilos) y JavaScript (interactividad).-->