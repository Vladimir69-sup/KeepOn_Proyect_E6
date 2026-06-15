<?php
    include "./conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--Meta datos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../statics/css/AdminVistaAd.css">
    <title>Página web KEEP ON</title>
</head>
<body>

<main>
    <div class = "rectangulo">
<?php
    if(isset($_POST['tipo_usuario']) && $_POST['tipo_usuario'] == 'profesor'){
        echo '<form action="AdminVistaAdicion.php" method="POST">';
            echo '<input type="submit" value="Regresar">';
        echo '</form>';
        echo '<form action="adicionUsuario.php" method="POST">';
            echo "<input type = 'hidden' name = 'tipo_usuario' value=' . profesor . '>";
            echo '<input type="text" name="nombre_prof">';
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
            echo '<input type="text" name="matricula">';
                echo '<label>
                        Matricula
                    </label>';
            echo '<input type="select" name="grupo">';
                echo '<label>
                        Grupo x
                    </label>';
            echo '<input type="email" name="correo">';
                echo '<label>
                        Correo
                    </label>';
            echo '<input type="submit" value="Registrar">';
        echo '</form>';
    } elseif(isset($_POST['tipo_usuario']) && $_POST['tipo_usuario'] == 'alumno'){
        echo '<form action="AdminVistaAdicion.php" method="POST">';
            echo '<input type="submit" value="Regresar">';
        echo '</form>';
        echo '<form action="adicionUsuario.php" method="POST">';
            echo "<input type = 'hidden' name = 'tipo_usuario' value=' . alumno . '>";
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
            echo '<input type="submit" value="Registrar">';
        echo '</form>';
    } elseif(isset($_POST['tipo_usuario']) && $_POST['tipo_usuario'] == 'admin'){
        echo '<form action="AdminVistaAdicion.php" method="POST">';
            echo '<input type="submit" value="Regresar">';
        echo '</form>';
        echo '<form action="adicionUsuario.php" method="POST">';
            echo "<input type = 'hidden' name = 'tipo_usuario' value=' . admin . '>";
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
            echo '<input type="text" name="matricula">';
                echo '<label>
                        Matricula
                    </label>';
            echo '<input type="email" name="correo">';
                echo '<label>
                        Correo
                    </label>';
            echo '<input type="submit" value="Registrar">';
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
        </div>
        <div class = "foto">
            <img src= "..\statics\media\img\user.png" alt = "foto de usuario">
        </div>';
    }

    ?>
    </div>
</main>

</body>
</html>