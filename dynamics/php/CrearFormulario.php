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
        <img src="../../statics/media/img/imagenUNAM.png" height="80px">
        <img src="../../statics/media/img/imagenENP.png" height="80px">
        <img src="../../statics/media/img/imagenETE.png" height="80px">
        <img src="../../statics/media/img/imagenComputacion.png" height="80px">
        <input class="buscador" type="text" placeholder="Busca algo aquí" >
        <button class="buscador" name="buscador" type="submit"><img style="border-radius: 100px;" src="../../statics/media/img/imagenLupa.png" height="50px"></button>

    </div>
</header>
<body>
    <div class="contenedor-padre">
        <div class = "informacion-formulario">
            <p>Título</p>
            <input type="text" placeholder="Ingresa el título del formulario...">
            <p>Descripción</p>
            <input type="text" placeholder="Ingresa una breve descripción">
            <p>Total de preguntas: </p>
            <p>0</p>
        </div>

        <div class="contenedor-preguntas">
            <div class="header-preguntas">
                <a href="AgregarPregunta.php" class="nueva-pregunta">+ Agregar Preguntas</a>
                <input type="file" name="imagen-preguntas" id="imagen-preguntas" accept="image/png, image/jpeg">
            </div>
            <div>Aqui Salen las Preguntas</div>
        </div>


    </div>
    
</body>
</html>