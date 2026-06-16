<?php
    include "./php/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--Meta datos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../statics/css/AdminVistaAd.css">
    <link rel="stylesheet" href="../statics/css/navbar.css"> 
    <link rel="icon" href="../statics/media/img/COMPUTADORA.png" type="image/png">
    <title>Añadir usuario</title>
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
        <a href="./php/logout.php"><img id="user"src="../statics/media/img/logout.png"></a>

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

    <div class = "rectangulo">
<?php
    if(isset($_POST['tipo_usuario']) && $_POST['tipo_usuario'] == 'profesor'){
        echo '<form action="AdminVistaAdicion.php" method="POST">';
            echo '<input class="botones1" type="submit" value="Regresar">';
        echo '</form>';
        echo '<form class="form" action="adicionUsuario.php" method="POST">';
            echo "<input type = 'hidden' name = 'tipo_usuario' value=' . profesor . '>";
            echo '<div class="pt_izq">';
            echo '<input class="inputs" type="text" name="nombre_prof">';
                echo '<label>
                        Nombre(s)
                    </label>';
            echo '<input class="inputs" type="text" name="apellido1">';
                echo '<label>
                        Apellido Paterno
                    </label>';
            echo '<input class="inputs" type="text" name="apellido2">';
                echo '<label>
                        Apellido Materno
                    </label>';
            echo '<input class="inputs" type="date" name="fecha_naci">';
                echo '<label>
                        Fecha de nacimiento
                    </label>';
            echo '</div>';
            echo '<div class="pt_drch">';            
            echo '<input class="inputs" type="text" name="matricula">';
                echo '<label>
                        Matricula
                    </label>';
            echo '<input class="inputs" type="select" name="grupo">';
                echo '<label>
                        Grupo x
                    </label>';
            echo '<input class="inputs" type="email" name="correo">';
                echo '<label>
                        Correo
                    </label>';
            echo '</div>';
            echo '<input class="botones2" type="submit" value="Registrar">';
        echo '</form>';
    } elseif(isset($_POST['tipo_usuario']) && $_POST['tipo_usuario'] == 'alumno'){
        echo '<form action="AdminVistaAdicion.php" method="POST">';
            echo '<input class="botones1" type="submit" value="Regresar">';
        echo '</form>';
        echo '<form class="form" action="adicionUsuario.php" method="POST">';
            echo "<input type = 'hidden' name = 'tipo_usuario' value=' . alumno . '>";
            echo '<div class="pt_izq">';
            echo '<input type="text" name="nombre_alumno">';
                echo '<label>
                        Nombre(s)
                    </label>';
            echo '<input type="text" name="apellido1">';
                echo '<label>
                        Apellido Paterno
                    </label>';
            echo '<input type="text" name="apellido2">';
                echo '<label>
                        Apellido Materno
                    </label>';
            echo '<input type="date" name="fecha_naci">';
                echo '<label>
                        Fecha de nacimiento
                    </label>';
            echo '</div>';
            echo '<div class="pt_drch">';  
            echo '<input type="text" name="n_cuenta">';
                echo '<label>
                        N. Cuenta
                    </label>';
            echo '<input type="select" name="grupo">';
                echo '<label>
                        Grupo x
                    </label>';
            echo '<input type="email" name="correo">';
                echo '<label>
                        Correo
                    </label>';
            echo '</div>';
            echo '<input class="botones2" type="submit" value="Registrar">';
        echo '</form>';
    } elseif(isset($_POST['tipo_usuario']) && $_POST['tipo_usuario'] == 'admin'){
        echo '<form action="AdminVistaAdicion.php" method="POST">';
            echo '<input class="botones1" type="submit" value="Regresar">';
        echo '</form>';
        echo '<form class="form" action="adicionUsuario.php" method="POST">';
            echo "<input type = 'hidden' name = 'tipo_usuario' value=' . admin . '>";
            echo '<div class="pt_izq">';
            echo '<input type="text" name="nombre_admin">';
                echo '<label>
                        Nombre(s)
                    </label>';
            echo '<input type="text" name="apellido1">';
                echo '<label>
                        Apellido Paterno
                    </label>';
            echo '<input type="text" name="apellido2">';
                echo '<label>
                        Apellido Materno
                    </label>';
            echo '<input type="date" name="fecha_naci">';
                echo '<label>
                        Fecha de nacimiento
                    </label>';
            echo '</div>';
            echo '<div class="pt_drch">';  
            echo '<input type="text" name="matricula">';
                echo '<label>
                        Matricula
                    </label>';
            echo '<input type="email" name="correo">';
                echo '<label>
                        Correo
                    </label>';
            echo '</div>';
            echo '<input class="botones2" type="submit" value="Registrar">';
        echo '</form>';
    } else{
        echo '<div id = "titulo" >
            <h1>Agregar usuario</h1>
        </div>
        <div class = "preguntas">
            <form action="AdminVistaAdicion.php" method="POST">
                <input type="radio" value="alumno" name="tipo_usuario">
                <label>
                    Alumno
                </label>
                <input type="radio" value="profesor" name="tipo_usuario">
                <label>
                    Profesor
                </label>
                <input type="radio" value="admin" name="tipo_usuario">
                <label>
                    Administrador
                </label>
                <input type="submit" value="seleccionar">
            </form>
        </div>';
    }

    ?>
    </div>
</main>

</body>
</html>