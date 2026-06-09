<?php
    session_start();
    $rutaFoto = "../../statics/media/img/";
    $nombreFoto = "FotoUsuario.png";
    $fotoAlumno = $rutaFoto . $nombreFoto;

    if(isset($_POST['guardar-foto'])){
        move_uploaded_file($_FILES['foto-perfil-alumno']['tmp_name'], $fotoAlumno);
    }
    if (!file_exists($fotoAlumno)) {
    $fotoAlumno = $rutaFoto . "FotoPerfil.png";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VistaPerfilAlumno</title>
    <link rel="stylesheet" href="../../statics/css/VistaPerfilAlumno.css">
</head>
<body>
    <div class="contenedor-apartados">
        <div class="datos-alumno">
            <img class="foto-perfil" src="<?php echo $fotoAlumno;?>" alt="Foto de Perfil">
            <div>
                <p>Nombre del Alumno (Tú)</p>
                <p>Número de Cuenta</p>
                <p>Fecha de Nacimiento</p>
                <p>Grupo al que pertenece</p> 
            </div>
            
            <form class="mostrar-abajo" method="POST" enctype="multipart/form-data">
                <input type="file" name="foto-perfil-alumno" id="inpt-ftalumno" accept="image/png, image/jpeg" style="display: none;" required>
                <label for="inpt-ftalumno" class="editar-perfil">Editar foto de Perfil</label>
                <button type="submit" name="guardar-foto" class="guardar-foto"> Guardar</button>
            </form>

        </div>
        <div class="dos-secciones">
            <div class="respuestas-form">
                <h1>Condiciones de Estudio</h1>
                <p>El cuestionario aún no ha sido resuelto</p>
            </div>
            <div class="inferior-derecho">
                <button id="formulario-condiciones">Formulario Condiciones de Estudio</button>
                <p>Notas de tu profesor: </p>
                <div class="notas-profesor">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fu</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>