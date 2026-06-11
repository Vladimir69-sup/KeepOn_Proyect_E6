<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <link rel="stylesheet" href="../../statics/css/style.css">
</head>
<body>
    <h1>ACTIVIDADES</h1>
    <br>
    <h2>Módulo 1 <button class="eliminar-modulo"><img src="../../statics/media/img/imagenBorrar.png" class ="boton-borrar"></button></h2>
    <div class="contenedor-modulo">
        <a href="AgregarActividad.php"><div class="crear-tarea">+<br> Agregar una Nueva Actividad</div></a>

        <?php
            include './conexion.php';

            $idMaestroActual=1;
            $consultaGrupo="SELECT idGrupo FROM grupo WHERE idMaestro=$idMaestroActual";
            $query=mysqli_query($conexion,$consultaGrupo);//esta hace la ncosnulta por nostros 
            $query_info=mysqli_fetch_assoc($query); //obtenemos registro
            $idGrupo=$query_info["idGrupo"];//con esto ya tiene como tal el valor e idGrupo

            $consulta="SELECT * FROM actividad WHERE idGrupo=$idGrupo AND modulo=1";
            $queri=mysqli_query($conexion,$consulta);//esta hace la ncosnulta por nostros 
            
            while( $query_info_actividad=mysqli_fetch_assoc($queri))
            {
               // <p>(datos generales de la actividad ya creada)</p>//descripcion??
                $id = $query_info_actividad["idActividad"];
                $titulo=$query_info_actividad["titulo"];
                $modulo=$query_info_actividad["modulo"];//almacenamos en variables los valores el contenido del arreglo asociativo
                $fecha=$query_info_actividad["fecha"];//para que sea mas facil de entender visualmente
                $hora=$query_info_actividad["hora"];

                echo "<a href='EditarActividad.php?id=$id'><div class='editar-tarea'>";
                echo "<p>$titulo</p>";
                echo "<p>modulo:$modulo</p>";
                echo "<p>Fecha de Entrega:$fecha</p>";
                echo "<p>Hora de Entrega: $hora</p>";
                //<p></p>
                echo "</div></a> ";

            }
                   
        ?>

    </div>

    <h2>Módulo 2 <button class="eliminar-modulo"><img src="../../statics/media/img/imagenBorrar.png" class ="boton-borrar"></button></h2>
    <div class="contenedor-modulo">
        <a href="AgregarActividad.php"><div class="crear-tarea">+<br> Agregar una Nueva Actividad</div></a>

        <?php

            $idMaestroActual=1;
            $consultaGrupo="SELECT idGrupo FROM grupo WHERE idMaestro=$idMaestroActual";
            $query=mysqli_query($conexion,$consultaGrupo);//esta hace la ncosnulta por nostros 
            $query_info=mysqli_fetch_assoc($query); //obtenemos registro
            $idGrupo=$query_info["idGrupo"];//con esto ya tiene como tal el valor e idGrupo

            $consulta="SELECT * FROM actividad WHERE idGrupo=$idGrupo AND modulo=2";
            $queri=mysqli_query($conexion,$consulta);//esta hace la ncosnulta por nostros 
            
            while( $query_info_actividad=mysqli_fetch_assoc($queri))
            {
               // <p>(datos generales de la actividad ya creada)</p>//descripcion??
                $id = $query_info_actividad["idActividad"];
                $titulo=$query_info_actividad["titulo"];
                $modulo=$query_info_actividad["modulo"];//almacenamos en variables los valores el contenido del arreglo asociativo
                $fecha=$query_info_actividad["fecha"];//para que sea mas facil de entender visualmente
                $hora=$query_info_actividad["hora"];

                echo "<a href='EditarActividad.php?id=$id'><div class='editar-tarea'>";
                echo "<p>$titulo</p>";
                echo "<p>modulo:$modulo</p>";
                echo "<p>Fecha de Entrega:$fecha</p>";
                echo "<p>Hora de Entrega: $hora</p>";
                //<p></p>
                echo "</div></a> ";

            }
                   
        ?>

    </div>

    <h2>Módulo 3 <button class="eliminar-modulo"><img src="../../statics/media/img/imagenBorrar.png" class ="boton-borrar"></button></h2>
    <div class="contenedor-modulo">
        <a href="AgregarActividad.php"><div class="crear-tarea">+<br> Agregar una Nueva Actividad</div></a>

        <?php

            $idMaestroActual=1;
            $consultaGrupo="SELECT idGrupo FROM grupo WHERE idMaestro=$idMaestroActual";
            $query=mysqli_query($conexion,$consultaGrupo);//esta hace la ncosnulta por nostros 
            $query_info=mysqli_fetch_assoc($query); //obtenemos registro
            $idGrupo=$query_info["idGrupo"];//con esto ya tiene como tal el valor e idGrupo

            $consulta="SELECT * FROM actividad WHERE idGrupo=$idGrupo AND modulo=3";
            $queri=mysqli_query($conexion,$consulta);//esta hace la ncosnulta por nostros 
            
            while( $query_info_actividad=mysqli_fetch_assoc($queri))
            {
               // <p>(datos generales de la actividad ya creada)</p>//descripcion??
                $id = $query_info_actividad["idActividad"];
                $titulo=$query_info_actividad["titulo"];
                $modulo=$query_info_actividad["modulo"];//almacenamos en variables los valores el contenido del arreglo asociativo
                $fecha=$query_info_actividad["fecha"];//para que sea mas facil de entender visualmente
                $hora=$query_info_actividad["hora"];

                echo "<a href='EditarActividad.php?id=$id'><div class='editar-tarea'>";
                echo "<p>$titulo</p>";
                echo "<p>modulo:$modulo</p>";
                echo "<p>Fecha de Entrega:$fecha</p>";
                echo "<p>Hora de Entrega: $hora</p>";
                //<p></p>
                echo "</div></a> ";

            }
                   
        ?>

    </div>

    <h2>Módulo 4 <button class="eliminar-modulo"><img src="../../statics/media/img/imagenBorrar.png" class ="boton-borrar"></button></h2>
    <div class="contenedor-modulo">
        <a href="AgregarActividad.php"><div class="crear-tarea">+<br> Agregar una Nueva Actividad</div></a>

        <?php

            $idMaestroActual=1;
            $consultaGrupo="SELECT idGrupo FROM grupo WHERE idMaestro=$idMaestroActual";
            $query=mysqli_query($conexion,$consultaGrupo);//esta hace la ncosnulta por nostros 
            $query_info=mysqli_fetch_assoc($query); //obtenemos registro
            $idGrupo=$query_info["idGrupo"];//con esto ya tiene como tal el valor e idGrupo

            $consulta="SELECT * FROM actividad WHERE idGrupo=$idGrupo AND modulo=4";
            $queri=mysqli_query($conexion,$consulta);//esta hace la ncosnulta por nostros 
            
            while( $query_info_actividad=mysqli_fetch_assoc($queri))
            {
               // <p>(datos generales de la actividad ya creada)</p>//descripcion??
                $id = $query_info_actividad["idActividad"];
                $titulo=$query_info_actividad["titulo"];
                $modulo=$query_info_actividad["modulo"];//almacenamos en variables los valores el contenido del arreglo asociativo
                $fecha=$query_info_actividad["fecha"];//para que sea mas facil de entender visualmente
                $hora=$query_info_actividad["hora"];

                echo "<a href='EditarActividad.php?id=$id'><div class='editar-tarea'>";
                echo "<p>$titulo</p>";
                echo "<p>modulo:$modulo</p>";
                echo "<p>Fecha de Entrega:$fecha</p>";
                echo "<p>Hora de Entrega: $hora</p>";
                //<p></p>
                echo "</div></a> ";

            }

        ?>

    </div>

    <h2>Módulo 5 <button class="eliminar-modulo"><img src="../../statics/media/img/imagenBorrar.png" class ="boton-borrar"></button></h2>
    <div class="contenedor-modulo">
        <a href="AgregarActividad.php"><div class="crear-tarea">+<br> Agregar una Nueva Actividad</div></a>

        <?php

            $idMaestroActual=1;
            $consultaGrupo="SELECT idGrupo FROM grupo WHERE idMaestro=$idMaestroActual";
            $query=mysqli_query($conexion,$consultaGrupo);//esta hace la ncosnulta por nostros 
            $query_info=mysqli_fetch_assoc($query); //obtenemos registro
            $idGrupo=$query_info["idGrupo"];//con esto ya tiene como tal el valor e idGrupo

            $consulta="SELECT * FROM actividad WHERE idGrupo=$idGrupo AND modulo=5";
            $queri=mysqli_query($conexion,$consulta);//esta hace la ncosnulta por nostros 
            
            while( $query_info_actividad=mysqli_fetch_assoc($queri))
            {
               // <p>(datos generales de la actividad ya creada)</p>//descripcion??
                $id = $query_info_actividad["idActividad"];
                $titulo=$query_info_actividad["titulo"];
                $modulo=$query_info_actividad["modulo"];//almacenamos en variables los valores el contenido del arreglo asociativo
                $fecha=$query_info_actividad["fecha"];//para que sea mas facil de entender visualmente
                $hora=$query_info_actividad["hora"];

                echo "<a href='EditarActividad.php?id=$id'><div class='editar-tarea'>";
                echo "<p>$titulo</p>";
                echo "<p>modulo:$modulo</p>";
                echo "<p>Fecha de Entrega:$fecha</p>";
                echo "<p>Hora de Entrega: $hora</p>";
                //<p></p>
                echo "</div></a> ";

            }
                   
        ?>

    </div>
    
    

    </body>
</html>