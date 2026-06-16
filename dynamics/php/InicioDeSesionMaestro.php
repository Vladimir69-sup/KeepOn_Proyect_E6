<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    include 'conexion.php';
    include 'Validaciones.php';
    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if(isset($_POST["username"])&&isset($_POST["pwd"])) //esta linea es para asegurarnos de que no nos lleguen vacios el nombre de usuario y la contraseña 
                {
                    $usuario = $_POST["username"]; //la variable esta recibiendo el valor que nos llego por POST
                    $contrasena = $_POST["pwd"];
                    $usuario_limpio = sanitizarEntrada(connect(), $usuario);
                    $contrasena_limpia = sanitizarEntrada(connect(), $contrasena);
                    if($usuario_limpio == '' || $contrasena_limpia == '')
                        {
                            $error = "Verifica que tu usuario y/o contraseña sean correctos";
                            
                        }
                    if(!filter_var($usuario_limpio, FILTER_VALIDATE_INT))
                        {
                            $error = "El usuario debe ser numérico";
                            
                        }
                    
                    $identificador = "SELECT * FROM infoMaestro WHERE numTrabajador = $usuario_limpio"; //regresa todas las columnas de informacion donde el numero de cuenta es igual al que nos paso el usuario
                    $consulta1 = mysqli_query (connect(), $identificador); 
                    if(mysqli_num_rows($consulta1) === 1) //verifica que el objeto iterable solo nos regrese una fila
                        {
                            $res = mysqli_fetch_assoc($consulta1);
                            $idUsuario = $res["idUsuario"];
                            $consulta2 = mysqli_query (connect(), "SELECT (fechaNacimiento) FROM infoGeneralUsuario WHERE idUsuario = $idUsuario");
                            $res2 = mysqli_fetch_assoc($consulta2);
                            $contrasenadb = $res2["fechaNacimiento"];
                            if($contrasenadb === $contrasena_limpia)
                                {
                                    $_SESSION["idMaestro"] = $res["idMaestro"];
                                    $_SESSION["idUsuario"] = $res["idUsuario"];
                                    header ("Location: ./VistaPrincipalProfesor.php");
                                    
                                }
                            else 
                                {
                                    $error ="Contraseña Incorrecta";
                                    

                                }

                        } 
                        else{
                            $error="El usuario no está registrado.";
                        }          
                }
                else
                    {
                        $error = "El usuario y la contraseña no pueden estar vacios";
                        
                    }
            
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device_width, initial_scaled=1.0">
    <meta name="author" content="Evelin Guadalupe Martinez Sevilla">
    <meta name="description" content="Inicio de sesion del maestro">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="../../statics/css/InicioDeSesionMaestro.css">
    <link rel="stylesheet" href="../../statics/css/barra_superior.css">
    <link rel="icon" href="../../statics/media/img/COMPUTADORA.png" type="image/png">
	</head>
<body>
     <!--Seccion de barra superior-->
    <div id="barra_superior">
       <a href="https://www.unam.mx/"><img class="logo"id="unam"alt ="logo"src="../../statics/media/img/logo_unam.svg"></a>
        <a href=""https://enp.unam.mx/"><img class="logo"id="enp"alt ="logo"src="../../statics/media/img/logo_enp.svg"></a>          
        <a href="https://www.ete.enp.unam.mx/"><img class="logo"id="etes"alt ="logo"src="../../statics/media/img/logo_ete.svg"></a>
        <a href="../../index.html"><img class="logo"id=keep-on alt="logo"src="../../statics/media/img/COMPUTADORA.png"></a>
    </div>

    <div id="contenedor-inicio-sesion-prof">
        <form action="./InicioDeSesionMaestro.php" method="POST">
            <h2>Inicio de Sesion</h2>
            <img src="../../statics/media/img/monkey-profe.png" width="150px" class="imagen">
            <label for="usuario"></label><br>
            <input type="text" id="username" name="username" placeholder="Usuario: no. de trabajador" required><br>
            <label for="contraseña"></label><br>
            <input type="password" id="pwd" name="pwd" placeholder="Contraseña: dd/mm/aaaa" required><br>
            <input type="submit" value="Inicia Sesion">
        </form>
    </div>
</body>
</html>