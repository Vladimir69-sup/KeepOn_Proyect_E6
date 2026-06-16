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

<div class="diseño-pantalla">

    <!-- COLUMNA IZQUIERDA: EL FORMULARIO GIGANTE -->
    <form method="POST" action="" class="mega-formulario">
        
        <section id="seccion_arriba">
            <input type="radio" id="Continuar" hidden>
            <div class="lado-izquierdo">
                <div class="informacion-formulario">
                    <p>Título</p>
                    <!-- PHP vuelve a imprimir lo que el usuario escribió usando echo dentro del textarea -->
                    <textarea class="tex_info_formualio" name="titulo_formulario" id="titulo_formulario" 
                    placeholder="Ingresa el título del formulario..."><?php echo htmlspecialchars($_SESSION['titulo_form']); ?></textarea>
                    
                    <p>Descripción</p>
                    <textarea class="tex_info_formualio" name="descripcion_formulario" id="descripcion_formulario"
                    placeholder="Ingresa una breve descripción"><?php echo htmlspecialchars($_SESSION['desc_form']); ?></textarea>
                </div>

                <label for="Continuar" id="continuar">
                    <p id="continuar">CONTINUAR</p>
                </label>
            </div>

            <div class="contenedor-padre" id="mas_preguntas">  
                <div class="header-preguntas" style="font-size: 20px">
                    <input type="radio" id="AgregarPregunta" name="agregar" hidden>
                    <label id="label_agregar_preguntas" for="AgregarPregunta">+ Agregar Pregunta</label>

                    <input type="radio" class="tipo-pregunta" name="opcionPregunta" id="pregunta-abierta">
                    <label class="preguntaBotones" id="primerLabel" for="pregunta-abierta">
                        <p class="preguntaLetras">Abierta</p>
                    </label>

                    <input type="radio" class="tipo-pregunta" name="opcionPregunta" id="pregunta-opcion-una">
                    <label class="preguntaBotones" id="segundoLabel" for="pregunta-opcion-una">
                        <p class="preguntaLetras">Opción Múltiple<br>(Una Sola Respuesta)</p>
                    </label>

                    <input type="radio" class="tipo-pregunta" name="opcionPregunta" id="pregunta-opcion-varias">        
                    <label class="preguntaBotones" id="tercerLabel" for="pregunta-opcion-varias">
                        <p class="preguntaLetras">Opción Múltiple<br>(Varias Respuestas)</p>
                    </label>
                </div>

                <!-- BLOQUE: ABIERTA -->
                <div class="crear_pregunta" id="abierta">
                    <!-- Agregamos el name obligatorio para PHP -->
                    <textarea name="texto_pregunta_abierta" id="pregunta" rows="10" cols="50" placeholder="Escribe aquí la pregunta ..."></textarea>
                    <div class="puntaje_pregunta">
                        <p>Puntaje de la pregunta (0 al 5):</p>
                        <input type="number" class="puntajePregunta" name="puntaje_abierta" min="0" max="5" value="0" step="1">
                    </div>
                    <div class="botones_pregunta">
                        <input type="submit" name="borrar_abierta" class="boton-borrar" value="Borrar Pregunta">
                        <input type="submit" name="guardar_abierta" class="boton-guardar" value="Guardar Pregunta">
                    </div>
                </div>

                <!-- BLOQUE: RADIO (OPCIÓN ÚNICA) -->
                <div class="crear_pregunta" id="radio">
                    <textarea name="texto_pregunta_radio" id="pregunta" rows="10" cols="50" placeholder="Escribe aquí la pregunta ..."></textarea>
                    <div class="puntaje_pregunta">
                        <p>Puntaje de la pregunta (0 al 5):</p>
                        <input type="number" class="puntajePregunta" name="puntaje_radio" min="0" max="5" value="0" step="1">
                    </div>
                    <div class="opciones">
                        <p class="posibles_respuestas">Escribe las posibles respuestas (Selecciona cual es la correcta ○ ):</p>                      
                        <div class="cuadro_almacena_opciones">
                            <div class="opciones_input">
                                <input class="inputs_text" type="text" name="opciones_radio[]" placeholder="Opción...">
                                <input class="inputs_radio" type="radio" name="opcionRadioImput" class="radio_correcta">
                            </div>
                            <div class="opciones_input">
                                <input class="inputs_text" type="text" name="opciones_radio[]" placeholder="Opción...">
                                <input class="inputs_radio" type="radio" name="opcionRadioImput" class="radio_correcta">
                            </div>
                        </div>
                        <div><input type="submit" name="add_opcion" class="agregar_opcion_pregunta" value="Agregar opción"></div>
                    </div>
                    <div class="botones_pregunta">
                        <input type="submit" name="borrar_radio" class="boton-borrar" value="Borrar Pregunta">
                        <input type="submit" name="guardar_radio" class="boton-guardar" value="Guardar Pregunta">
                    </div>
                </div>

                <!-- BLOQUE: CHECKBOX (VARIAS RESPUESTAS) -->
                <div class="crear_pregunta" id="checkbox">
                    <textarea name="texto_pregunta_checkbox" id="pregunta" rows="10" cols="50" placeholder="Escribe aquí la pregunta ..."></textarea>
                    <div class="puntaje_pregunta">
                        <p>Puntaje de la pregunta (0 al 5):</p>
                        <input type="number" class="puntajePregunta" name="puntaje_checkbox" min="0" max="5" value="0" step="1">
                    </div>
                    <div class="opciones">
                        <p class="posibles_respuestas">Escribe las posibles respuestas (Selecciona las correctas □ ):</p>                      
                        <div class="cuadro_almacena_opciones">
                            <div class="opciones_input">
                                <input class="inputs_text" type="text" name="opciones_checkbox[]" placeholder="Opción...">
                                <input class="inputs_checkbox" type="checkbox" name="opcionCheckboxInput" class="radio_correcta">
                            </div>
                            <div class="opciones_input">
                                <input class="inputs_text" type="text" name="opciones_checkbox[]" placeholder="Opción...">
                                <input class="inputs_checkbox" type="checkbox" name="opcionCheckboxInput" class="radio_correcta">
                            </div>
                        </div>
                        <div><input type="submit" name="add_opcion" class="agregar_opcion_pregunta" value="Agregar opción"></div>
                    </div>
                    <div class="botones_pregunta">
                        <input type="submit" name="borrar_checkbox" class="boton-borrar" value="Borrar Pregunta">
                        <input type="submit" name="guardar_checkbox" class="boton-guardar" value="Guardar Pregunta">
                    </div>                    
                </div>

            </div>
        </section>

    </form>

    <!-- COLUMNA DERECHA: EL CUADRADO DONDE SE VAN IMPRIMIENDO AL LADO -->
    <div class="cuadrado-lateral">

</body>
</html>