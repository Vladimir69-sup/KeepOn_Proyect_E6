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
    <div class="informacion-actividad">

        <div class="lado-izquierdo">
            <label>Título:</label>
            <input type="text" placeholder="Escribe el nombre de la actividad..." required>

            <label>Descripción:</label>
            <textarea name="descripcion-actividad" id="descripcion-actividad" placeholder="Escribe una breve descripción de la actividad..." ></textarea>
            <div class="adjuntar-archivo">+ Adjuntar Archivo<input type="file" name="archivo-actividad" id="ipt-archivo-actividad" hidden></div>
        </div>

        <div class="lado-derecho">
            <label>Fecha Entrega:</label>
            <input type="date">

            <label>Puntos:</label>
            <input type="numbre" value="0">

            <a class="revisar-actividad" href="RevisarEntregas.php">REVISAR LAS ENTREGAS</a>
        </div>
    </div>
    <div class="footer-actividades">
        <button class="botones-footer" id="borrar-actividad">Borrar actividad</button>
        <button class="botones-footer" id ="publicar-actividad">PUBLICAR</button>
        <button class="botones-footer" id="guardar-actividad">GUARDAR</button>
    </div>

        <a href="Actividades.php"><h3><-- Volver</h3></a>

    
</body>
</html>