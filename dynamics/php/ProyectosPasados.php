<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device_width, initial_scaled=1.0">
    <meta name="author" content="Evelin Guadalupe Martinez Sevilla">
    <meta name="description" content="Proyectos de generaciones pasadas">
    <title>Proyectos</title>
    <link rel="stylesheet" href="../../statics/css/ProyectosPasados.css">
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
                <a class="enlace"href="./actividades.html">
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

    <h1>Un Baile Inolvidable</h1>
    <div class="cont">
        <img src="../../statics/media/img/monkey-rock.png">
        <div class="rectangulo">
            <p id="tit">¡Que onda coyolover!</p>
            <p id="text">Estas pensando en darte de baja de la ete?, si es asi detente un momento,
            aun te falta mas por conocer, no desesperes coyotito pronto haras cosas increibles 
            como las de nuestros compañeros de generaciones anteriores, como puedes ver a continuacion,
            juegos que te volaran la mente y codigos que te haran soñar con c++. 
            Recuerda que eres increible, puedes lograr lo que quieras, no dejes esta experiencia a medias 
            y nunca olvides que si puedes imaginarlo puede programarlo.</p> 
        </div>
    </div>
    <div class="juegos"> 
        <div class="juego1">
            <p id="tit1">Meowstellar</p>
            <img src="../../statics/media/img/meowstellar1.png" class="imagenes">
            <p class="desc">Eres un explorador espacial, tu nave se averió en la luna
                ¿Podrás superar los desafíos? ¿Lograrás encontrar a tu nave 
                y a tu tripulación?</p>
            <button onclick="location.href='../../templates/meowstellar.html'" class="botones1">Mas Informacion</button>
        </div>
        <div class="juego2">
            <p id="tit2">Snoopy</p>
            <img src="../../statics/media/img/snoopy1.png" class="imagenes">
            <p class="desc">Woodstock está perdido,y Snoopy deberá encontrarlo
                ¿Podrás superar los desafíos? </p>
            <button onclick="location.href='../../templates/snoopy.html'" class="botones">Mas Informacion</button>
        </div>
        <div class="juego3">
            <p id="tit3">Juan Garnachas</p>
            <img src="../../statics/media/img/bancarrota1.png" class="imagenes">
            <p class="desc">Eres dueño de un negocio y tienes que triunfar en las garnachas
                ¿Lograras pasar cada nivel sin caer en banca rota?
            </p>
            <button onclick="location.href='../../templates/Juan-garnachas.html'" class="botones">Mas Informacion</button>
        </div>
        <div class="juego4">
            <p id="tit3">Coyotron</p>
            <img src="../../statics/media/img/coyotron1.png" class="imagenes">
            <p class="desc">Eres un estudiante de prepa 6, tendras que aprobar
                las distintas materias comprendidas en los tres grados de bachillerato
                ¿Lograras graduarte?</p>
            <button onclick="location.href='../../templates/coyotron.html'"class="botones1">Mas Informacion</button>
        </div>
        <div class="juego5">
            <p id="tit3">Bebes en peligro</p>
            <img src="../../statics/media/img/bebes1.png" class="imagenes">
            <p class="desc">Eres una cigueña y tendras que llevar a salvo a un bebe con 
                sus nuevos papas ¿Seras capaz de esquivar los obstaculos?
            </p>
            <button onclick="location.href='../../templates/bebes-en-peligro.html'" class="botones">Mas Informacion</button>
        </div>
    </div>
</body>
</html>