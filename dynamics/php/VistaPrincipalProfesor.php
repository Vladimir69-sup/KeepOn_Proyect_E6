<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../../statics/css/VistaInicialProfesores.css">
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
        <a href="./VistaPerfilProfesorDBActual.php"><img id="user"src="../../statics/media/img/user.png"></a>
        <a href="./logout.php"><img id="user"src="../../statics/media/img/logout.png"></a>

        <article id="barra_lateral">
            <section  id="primero_barra_lateral"></section>
            <section id="segundo_barra_lateral"class="bloque_linea">
                <a class="enlace"href="./actividades.html">
                    <h3>ALUMNOS</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./formulario_evaluacion.html">
                    <h3>ACTIVIDADES</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./recursos_apoyo.html">
                    <h3>FORMULARIOS</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./proAnteriores.html">
                   <h3>RECURSOS DE APOYO</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./proAnteriores.html">
                   <h3>ESTADÍSTICAS</h3>
                </a>
            </section>
        </article> 
    </div>

    <div class="contenedor-principal">
        <div class="contenedor-izquierdo">
            <div class="contenedor-apartados">
                <a href="AlumnosVistaProfesor.php" class="formato-cuadrado" id="btn-alumnos">ALUMNOS
                    <img class="icono" src="../../statics/media/img/IconoAlumnos.png" alt="Ícono de alumno 🙋">
                </a>
                <a href="https://www.google.com" class="formato-cuadrado" id="btn-forms">FORMULARIOS
                    <img class="icono" src="../../statics/media/img/IconoFormularios.png" alt="Ícono de formulario 🍀">
                </a>
                <a href="https://www.youtube.com/" class="formato-cuadrado" id="btn-actividades">ACTIVIDADES
                    <img class="icono" src="../../statics/media/img/IconoActividades.png" alt="Ícono de actividades ☕">
                </a>
                <a href="https://www.google.com/maps" class="formato-cuadrado" id="btn-recursos">RECURSOS
                    <img class="icono" src="../../statics/media/img/IconoRecursos.png" alt="Ícono de recursos 🥞">
                </a>
            </div>
        </div>
        <div class="contenedor-derecho">
            
            <a href="Estadisticas.php" class="estadisticas-globales">
                Estadísticas    
                <img class="icono" id="estadisticas" src="../../statics/media/img/IconoEstadisticas.png" alt="Ícono de Estadísticas">
            </a>
        </div>
    </div>
</body>
</html>