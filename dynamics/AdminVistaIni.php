<!DOCTYPE html>
<html lang="es">
<head>
    <!--Meta datos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../statics/css/AdminVista1.css">
    <link rel="stylesheet" href="../statics/css/navbar.css"> 
    <link rel="icon" href="../statics/media/img/COMPUTADORA.png" type="image/png">
    <title>Inicio</title>
</head>
<body>

<main>
    <div id="barra_superior">

        <input type="checkbox" id="menu_lateral">

        <label for="menu_lateral">
            <img class="logo"id="menu_imagen"alt ="menu"src="../statics/media/img/menu_hamburguesa.png">
        </label>

        <a href="https://www.unam.mx/"><img class="logo"id="unam"alt ="logo"src="../statics/media/img/logo_unam.svg"></a>
        <a href=""https://enp.unam.mx/"><img class="logo"id="enp"alt ="logo"src="../statics/media/img/logo_enp.svg"></a>          
        <a href="https://www.ete.enp.unam.mx/"><img class="logo"id="etes"alt ="logo"src="../statics/media/img/logo_ete.svg"></a>
        <a href="./alumno.php"><img class="logo"id=keep-on alt="logo"src="../statics/media/img/COMPUTADORA.png"></a>
        <a href="./VistaPerfilAlumnoDBActual.php"><img id="user"src="../statics/media/img/user.png"></a>
        <a href="./logout.php"><img id="user"src="../statics/media/img/logout.png"></a>

        <article id="barra_lateral">
            <section  id="primero_barra_lateral"></section>
            <section id="segundo_barra_lateral"class="bloque_linea">
                <a class="enlace"href="./AdminVistaListado.php">
                    <h3>ALUMNOS Y PROFESORADO</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./AdminVistaAdicion">
                    <h3>LLAVES DE ADMINISTRADOR</h3>
                </a>
            </section>
        </article> 
    </div>


    <div id="caja-principal">
        <div class="cajas" id="c-1">
            <a href="./AdminVistaListado.php">
                <img class="imgs" src="./../statics/media/img/lupa.png" alt="Imagen de una lupa">
            </a>
            <div class="encabezado-op">
            <h2>Alumnos y profesorado</h2>
            </div>
        </div>
        <div class="cajas" id="c-2">
            <a href="./AdminVistaAdicion.php">
                <img class="imgs" src="./../statics/media/img/llaves.png" alt="Imagen de llaves">
            </a>
            <div class="encabezado-op">
                <h2>Llaves administrador</h2>
            </div>
        </div>
    </div>
</main>
</body>
</html>