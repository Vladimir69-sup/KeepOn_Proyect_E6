<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    include 'conexion.php'; 

   session_start();
   
    $idUsuario = $_SESSION["idUsuario"];

    $rutaFoto = "../../statics/media/img/";
    $nombreFoto = "FotoUsuario" . $idUsuario . ".png"; //foto ususario 
    $fotoMaestro = $rutaFoto . $nombreFoto;
    
    //mover abajo para que también se pueda actualizar en la db
    if(isset($_POST['guardar-foto'])){
        if(move_uploaded_file($_FILES['foto-perfil-maestro']['tmp_name'], $fotoMaestro)){
            $sqlGuardarFoto = "UPDATE infoGeneralUsuario SET foto_perfil = '$nombreFoto' WHERE idUsuario = $idUsuario";
            mysqli_query($conexion, $sqlGuardarFoto);
        }
    }
    if (!file_exists($fotoMaestro)) {
        $fotoMaestro = $rutaFoto . "FotoPerfil.png";
    }

    //consulta maestro
    $consultaMaestro = "SELECT idMaestro FROM infoMaestro WHERE idUsuario = $idUsuario";
    $resultadoMaestro = mysqli_query($conexion, $consultaMaestro);
    $datosMaestro = $resultadoMaestro->fetch_array();
    $idMaestro = $datosMaestro['idMaestro'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="../../statics/css/VistaPerfilAlumno.css">
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
        <a href="./VistaPrincipalProfesor.php"><img class="logo"id=keep-on alt="logo"src="../../statics/media/img/COMPUTADORA.png"></a>
        <a href="./VistaPerfilProfesorDBActual.php"><img id="user"src="../../statics/media/img/user.png"></a>
        <a href="./logout.php"><img id="user"src="../../statics/media/img/logout.png"></a>

    </div>

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

    <div class="contenedor-apartados">
        <div class="datos-alumno">
            <img class="foto-perfil" src="<?php echo $fotoMaestro; ?>" alt="Foto de Perfil">
            <?php 
                $consultaDatos = "SELECT nombre, fechaNacimiento, primerApellido, segundoApellido FROM infoGeneralUsuario WHERE idUsuario = $idUsuario";
                $paqDatos = mysqli_query($conexion, $consultaDatos);
                $datosMostrar = $paqDatos->fetch_array();
                $nombre = $datosMostrar['nombre'];
                $primerApellido = $datosMostrar['primerApellido'];
                $segundoApellido = $datosMostrar['segundoApellido'];
                $fechaNacimiento = $datosMostrar['fechaNacimiento'];
                $consultaDatosEspecificos = "SELECT numTrabajador FROM infoMaestro WHERE idUsuario = $idUsuario";
                $paqDatosEsp = mysqli_query($conexion, $consultaDatosEspecificos);
                $datosEsp = $paqDatosEsp->fetch_array();
                $numTrabajador = $datosEsp['numTrabajador'];

                $listaGrupos = [];
                $consultaGrupo = "SELECT nombreGrupo FROM grupo WHERE idMaestro = $idMaestro";
                $paqNombreGrupos = mysqli_query($conexion, $consultaGrupo);
                while ($filaGrupo = mysqli_fetch_assoc($paqNombreGrupos)) {
                    $listaGrupos[] = $filaGrupo['nombreGrupo']; 
                }
            ?>
            <div>
                <p><?php echo $nombre . " " . $primerApellido . " " . $segundoApellido ?> (Tú)</p>
                <p><?php echo $numTrabajador?></p>
                <p><?php echo $fechaNacimiento?></p>
                <p>Grupo:  
                    <?php 
                        foreach($listaGrupos as $grupo){ 
                            echo $grupo; 
                            echo ", ";
                        }   

                    ?>
                </p> 
            </div>
            
            <form class="mostrar-abajo" method="POST" enctype="multipart/form-data">
                <input type="file" name="foto-perfil-maestro" id="inpt-ftalumno" accept="image/png, image/jpeg" style="display: none;" required>
                <label for="inpt-ftalumno" class="editar-perfil">Editar foto de Perfil</label>
                <button type="submit" name="guardar-foto" class="guardar-foto"> Guardar</button>
            </form>

        </div>
    </div>
</body>
</html>