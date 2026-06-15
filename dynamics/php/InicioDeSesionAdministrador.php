<?php 
    include 'Conexion.php';
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
                    //Tengo que cambiar solo esta linea para los demas inicios de sesions
                    $identificador = "SELECT * FROM infoAdministrador WHERE numTrabajador = $usuario_limpio"; //regresa todas las columnas de informacion donde el numero de cuenta es igual al que nos paso el usuario
                    $consulta1 = mysqli_query (connect(), $identificador); 
                    if(mysqli_num_rows($consulta1) === 1) //verifica que el objeto iterable solo nos regrese una fila
                        {
                            $res = mysqli_fetch_assoc($consulta1);
                            $idUsuario = $res["idUsuario"];
                            $consulta2 = mysqli_query (connect(), "SELECT (fechaNacimiento) FROM infogeneralusuario WHERE idUsuario = $idUsuario");
                            $res2 = mysqli_fetch_assoc($consulta2);
                            $contrasenadb = $res2["fechaNacimiento"];
                            if($contrasenadb === $contrasena_limpia)
                                {
                                    $_SESSION["idAdministrador"] = $res["idAdministrador"];
                                    $_SESSION["idUsuario"] = $res["idUsuario"];
                                    header ("Location: ./inicio.php");
                                    
                                }
                            else 
                                {
                                    $error ="Contraseña Incorrecta";
                                    

                                }

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
    <meta name="description" content="Inicio de sesion del administrador">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="../../statics/css/InicioDeSesionAdministrador.css">
	</head>
<body>
    <div id="contenedor-inicio-sesion-admin">
        <form action="./InicioDeSesionAdministrador.php" method="POST">
            <h2>Inicio de Sesion</h2>
            <img src="../../statics/media/img/monkey-admin.png" width="150px" class="imagen">
            <label for="usuario"></label><br>
            <input type="text" id="username" name="username" placeholder="Usuario: no. de trabajador" required><br>
            <label for="contraseña"></label><br>
            <input type="password" id="pwd" name="pwd" placeholder="Contraseña: dd/mm/aaaa" required><br>
            <input type="submit" value="Inicia Sesion">
        </form>
    </div>
</body>
</html>