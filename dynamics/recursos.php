<!-- recursos.php -->

<?php

$conexion = mysqli_connect("localhost","root","","keep_on_db");

$idGrupo = 1;

//-------------hacer q id grupo sea 0 no se para q lo puedan ver todos ???--------------

/* INSERTAR RECURSO */

if(isset($_POST['subir']))
{
    $titulo = $_POST['titulo'];
    $url = $_POST['url'];

    $insertar = "INSERT INTO recursos(titulo,url,idGrupo)
                 VALUES('$titulo','$url','$idGrupo')";

    mysqli_query($conexion,$insertar);

    
    /* REGRESAR A LA VISTA DEL PROFE DE AGREGAR RECURSOS y donde estan los ya agregados */
    header("Location: recursosMesstro.php");
}

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos</title>

    <link rel="stylesheet" href="recursos.css">
</head>
<body>

<div class="contenedor">

    <h1>Añadir recurso</h1>

    <!-- BOTON -->
    <input type="checkbox" id="abrir">

    <label for="abrir" class="boton-abrir">
        + Añadir nuevo recurso
    </label>

    <!-- FORMULARIO para añadir -->
    <form method="POST" class="formulario">

        <h2>Nuevo recurso</h2>
        <input type="text"
            name="titulo"placeholder="Título del recurso"required>

        <input type="url"
            name="url"placeholder="https://ejemplo.com"required>

        <button type="submit"name="subir"class="confirmar">
            Confirmar recurso
        </button>

    </form>

</div>

</body>
</html>