<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../../statics/css/alumno.css"> 
    <link rel="stylesheet" href="../../statics/css/navbar.css"> 
    <link rel="icon" href="../../statics/media/img/COMPUTADORA.png" type="image/png">
    
</head>
<body>
    
    <div id="barra_superior">

        <input type="checkbox" id="menu_lateral">

        <label for="menu_lateral">
            <img class="logo"id="menu_imagen"alt ="menu"src="../../statics/media/img/menu_hamburguesa.png">
        </label>

        <a href="https://www.unam.mx/"><img class="logo"id="unam"alt ="logo"src="../../statics/media/img/logo_unam.svg"></a>
        <a href=""https://enp.unam.mx/"><img class="logo"id="enp"alt ="logo"src="../../statics/media/img/logo_enp.svg"></a>          
        <a href="https://www.ete.enp.unam.mx/"><img class="logo"id="etes"alt ="logo"src="../../statics/media/img/logo_ete.svg"></a>
       <!-- <img class="logo"id="compu"alt ="logo"src="./img/logo_compu.png">-->
        <a href="./alumno.php"><img class="logo"id=keep-on alt="logo"src="../../statics/media/img/COMPUTADORA.png"></a>
        <a href="./VistaPerfilAlumnoDBActual.php"><img id="user"src="../../statics/media/img/user.png"></a>
        <a href="./logout.php"><img id="user"src="../../statics/media/img/logout.png"></a>

        <article id="barra_lateral">
            <section  id="primero_barra_lateral"></section>
            <section id="segundo_barra_lateral"class="bloque_linea">
                <a class="enlace"href="./ActividadesVistaAlumno.php">
                    <h3>ACTIVIDADES</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./formulario_evaluacion.html">
                    <h3>FORMULARIOS</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./recursos_apoyo.html">
                    <h3>RECURSOS DE APOYO</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./ProyectosPasados.php">
                   <h3>PROYECTOS ANTERIORES</h3>
                </a>
            </section>
        </article> 
    </div>

    <div id="contenedor">
        <seccion id="primero">
            <a class="botones" id="recursos" href="./recursos_apoyo.html">
                <div>
                <h2>RECURSOS</h2>
                <img id="form"src="../../statics/media/img/IconoRecursos.png">
                </div>
            </a>
        </seccion>
        <seccion id="segundo">
            <a class="botones"id="actividades"href="./ActividadesVistaAlumno.php">
                    <h2>ACTIVIDADES</h2>
                    <img id="form"src="../../statics/media/img/IconoActividades.png">
            </a>
            <a class="botones" id="formulario" href="./formulario_evaluacion.html">
                    <h2>FORMULARIO<br>MENSUAL</h2> 
                    <img id="form"src="../../statics/media/img/iconoFormularios.png">
            </a>
        </seccion>
        <seccion id="tercero">
            <a class="botones"id="masEte"href="./ProyectosPasados.php">
                    <h2>CONOCE MÁS SOBRE<br>LA ETE</h2>
                    <img  id="ete"alt="logo" src="../../statics/media/img/logo_ete.svg">
            </a>
        </seccion>
    </div>
</body> 