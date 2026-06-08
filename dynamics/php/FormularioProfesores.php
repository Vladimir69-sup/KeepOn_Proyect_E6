<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Profesores</title>
    <link rel="stylesheet" href="../../statics/css/style.css">
</head>
<header>
    <div class="contenedor-encabezado">
        <img src="../../statics/media/img/imagenUNAM.png" height="80px">
        <img src="../../statics/media/img/imagenENP.png" height="80px">
        <img src="../../statics/media/img/imagenETE.png" height="80px">
        <img src="../../statics/media/img/imagenComputacion.png" height="80px">
        <input class="buscador" type="text" placeholder="Busca algo aquí" >
        <button class="buscador" name="buscador" type="submit"><img style="border-radius: 100px;" src="../../statics/media/img/imagenLupa.png" height="50px"></button>

    </div>
</header>
<body>
    <div class="contenedor-cuestionarios">
        <div class="header-cuestionario">Cuestionarios<a class="nuevo-formulario" href="CrearFormulario.php" class="btn-editar">+Nuevo</a></div>
        <div class="cuestionarios">
            <table>
                <thead class ="thead-formulario">
                    <th>ID</th>
                    <th>Fecha de Creación</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th></th>
                </thead>
                <tbody>
                    <!--Aqui va el arrey que agrega cada formulario y su informacion  -->
                    <tr class="tabla-formulario">
                        <td>1</td>
                        <td>03/06/2026</td>
                        <td>Formulario Modulo 1</td>
                        <td class="formulario-publicado">Publicado</td>
                        <td><button class="nuevo-formulario" name="editar-formulario-1" type="submit">Editar</button></td>
                    </tr>
                    <tr class="tabla-formulario">
                        <td>2</td>
                        <td>06/01/2027</td>
                        <td>Formulario Modulo 2</td>
                        <td class="formulario-no-publicado">No Publicado</td>
                        <td><button class="nuevo-formulario" name="editar-formulario-2" type="submit">Editar</button></td>
                    </tr>
                </tbody>
            </table>
        <div>
    </div>
    
</body>
</html>

<?php

?>