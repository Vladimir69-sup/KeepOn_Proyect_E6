<?php 

    include 'conexion.php'; //Trae archivo que conecta todo a base de datos 
    include 'Validaciones.php'; //Trae archivo que Valida y Limpia los datos
    session_start(); //indica al servidor la peticion que estoy haciendo  y que este guarde los datos

    if($_SERVER['REQUEST_METHOD'] === 'POST') // Revisamos que el usuario haya enviado el formulario por metodo POST
        {
            if(isset($_POST["username"])&&isset($_POST["pwd"])) //esta linea es para asegurarnos de que no nos lleguen vacios el nombre de usuario y la contraseña 
                {
                    $usuario = $_POST["username"]; //la variable esta recibiendo el valor que nos llego por POST (lo guarda)
                    $contrasena = $_POST["pwd"]; //la variable esta recibiendo el valor que nos llego por POST (lo guarda)
                    $usuario_limpio = sanitizarEntrada(connect(), $usuario); // esta sanitizando, evita que entren caracteres incorrectos en el usuario
                    $contrasena_limpia = sanitizarEntrada(connect(), $contrasena); // esta sanitizando, evita que entren caracteres incorrectos en la contraseña
                    if($usuario_limpio == '' || $contrasena_limpia == '') // esta revisando que no queden campos vacios despues de sanitizar
                        {
                            $error = "Verifica que tu usuario y/o contraseña sean correctos"; // marca la variable error que resulta en ese mensaje
                            
                        }
                    elseif(!filter_var($usuario_limpio, FILTER_VALIDATE_INT)) // este es como un filtro que valida que dentro del usuario no se escriban letras si no solamente numeros 
                        {
                            $error = "El usuario debe ser numérico"; //marca variable error que resulta en el mensaje 
                            
                        }
                    else{                    
                        //Tengo que cambiar solo esta linea para los demas inicios de sesions
                        $identificador = "SELECT * FROM infoAlumno WHERE numeroCuenta = $usuario_limpio"; //regresa todas las columnas de informacion donde el numero de cuenta es igual al que nos paso el usuario
                        $consulta1 = mysqli_query (connect(), $identificador); //ejecuta la consulta que esta en el renglon de arriba 
                        if($consulta1 && mysqli_num_rows($consulta1) === 1) //verifica que el objeto iterable solo nos regrese una fila
                            {
                                $res = mysqli_fetch_assoc($consulta1); // transforma la fila en un arreglo asociativo
                                $idUsuario = $res["idUsuario"]; //guarda el unico id del usuario
                                $consulta2 = mysqli_query (connect(), "SELECT (fechaNacimiento) FROM infoGeneralUsuario WHERE idUsuario = $idUsuario"); //
                                $res2 = mysqli_fetch_assoc($consulta2); //transforma la fila en un arreglo asociativo
                                $contrasenadb = $res2["fechaNacimiento"]; //guarda la fecha de nacimiento del usuario
                                if($contrasenadb === $contrasena_limpia) // compara si la contraseña que escribio el usuario es igual a la que esta en base de datos
                                    {
                                        $_SESSION["idAlumno"] = $res["idAlumno"]; //Guarda el ID
                                        $_SESSION["idGrupo"] = $res["idGrupo"]; //Guarda el ID
                                        $_SESSION["idUsuario"] = $res["idUsuario"]; //Guarda el ID
                                        header ("Location: ./alumno.php"); 
                                        exit();  
                                        
                                    }
                                else // da otra opcion por si lo de arriba no llegara a pasar
                                    {
                                        $error ="Contraseña Incorrecta"; // marca la variable error con el mensaje que se escribio
                                        

                                    }

                            }
                            else{
                                $error="El usuario no está registrado.";
                            }      
                    }   
                }
                else // da otra opcion por si lo de arriba no llegara a pasar
                    {
                        $error = "El usuario y la contraseña no pueden estar vacios"; // marca la variable error seguida del mensaje escrito
                        
                    }
            
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device_width, initial_scaled=1.0">
    <meta name="author" content="Evelin Guadalupe Martinez Sevilla">
    <meta name="description" content="Inicio de sesion del alumno">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="../../statics/css/InicioDeSesionAlumno.css">
    <link rel="stylesheet" href="../../statics/css/barra_superior.css">
    <link rel="icon" href="../../statics/media/img/COMPUTADORA.png" type="image/png">
	</head>
<body>
     <!--Seccion de barra superior-->
    <div id="barra_superior">
        <img class="logo"id="unam"alt ="logo"src="../../statics/media/img/logo_unam.svg">   
        <img class="logo"id="enp"alt ="logo"src="../../statics/media/img/logo_enp.svg">           
        <img class="logo"id="etes"alt ="logo"src="../../statics/media/img/logo_ete.svg">
        <img class="logo"id=keep-on alt="logo"src="../../statics/media/img/COMPUTADORA.png">
    </div>

    <div id="contenedor-inicio-sesion-alum">
        <form action="./InicioDeSesionAlumno.php" method="POST">
            <h2>Inicio de Sesion</h2>
            <img src="../../statics/media/img/monkey-alumno.png" width="150px" class="imagen">
            <label for="usuario"></label><br>
            <input type="text" id="username" name="username" placeholder="Usuario: no. de cuenta" required><br>
            <label for="contraseña"></label><br>
            <input type="password" id="pwd" name="pwd" placeholder="Contraseña: dd/mm/aaaa" required><br>
            
            <?php
                if (isset($error)) 
                    echo '<p style="color: #ef4444; font-weight: bold; margin-bottom: 15px;">' . $error . '</p>'
                
            ?>
            <input type="submit" value="Inicia Sesion">
        </form>  
    </div>
</body>
</html>
