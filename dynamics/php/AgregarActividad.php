<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Actividad</title>
    <link rel="stylesheet" href="../../statics/css/style.css">
</head>
<body>
    <h1>ACTIVIDAD</h1>
    <form action="GuardarActividades.php" method="POST">

    <div class="informacion-actividad">

        <div class="lado-izquierdo">
            <label>Título:</label>
            <input type="text" name="titulo" placeholder="Escribe el nombre de la actividad..." required>

            <label>Descripción:</label>
            <textarea name="descripcion-actividad" id="descripcion-actividad" placeholder="Escribe una breve descripción de la actividad..." required ></textarea>
            <div class="adjuntar-archivo">+ Adjuntar Archivo<input type="file" name="archivo-actividad" id="ipt-archivo-actividad" hidden></div>
        </div>

        <div class="lado-derecho">
            <label>Fecha Entrega:</label>
            <input name ="fecha_entrega" type="date">
            <label>Hora de Entrega:</label>
            <input name ="hora_entrega" type="time">

            <label for="modulo">Módulo:</label>
            <select class="modulo" name="modulo" id="modulo" required>
                <option value="1">Modulo 1</option>
                <option value="2">Modulo 2</option>
                <option value="3">Modulo 3</option>
                <option value="4">Modulo 4</option>
                <option value="5">Modulo 5</option>
            </select>

            <label for="grupo:">Grupo:</label>
            <?php
                include './conexion.php';

                $maestroActual=1;
                $grupo="SELECT nombreGrupo FROM grupo WHERE idMaestro = $maestroActual";
                $query=mysqli_query($conexion, $grupo);
                $nombreGrupo=$query_info["nombreGrupo"];

                echo "<select class='grupo' name='grupo' id='grupo'required>";

                while($query_info=mysqli_fetch_assoc($query)){
                    $nombreGrupo=$query_info["nombreGrupo"];
                    echo "<option value='$nombreGrupo'>$nombreGrupo</option>";
                }

                echo "</select>"
            ?>
        </div>
    </div>
    <div class="footer-actividades">
        <button class="botones-footer" id="borrar-actividad">Borrar actividad</button>
        <button class="botones-footer" value="Guardar Actividad" id ="publicar-actividad" type="submit">PUBLICAR</button>
    </div>
    </form>

        <a href="Actividades.php"><h3><-- Volver</h3></a>

    
</body>
</html>