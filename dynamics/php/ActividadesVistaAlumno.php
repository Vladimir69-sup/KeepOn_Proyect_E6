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
    <h2>Módulo 1 </h2>
    <div class="contenedor-modulo">

        <?php
            include './conexion.php';

            $idAlumno=1;
            $consulta="SELECT * FROM actividad WHERE idGrupo=$idAlumno AND modulo=1";
            $queri=mysqli_query($conexion,$consulta);//esta hace la ncosnulta por nostros 
            
            while( $query_info_actividad=mysqli_fetch_assoc($queri))
            {
               // <p>(datos generales de la actividad ya creada)</p>//descripcion??
                $id = $query_info_actividad["idActividad"];
                $titulo=$query_info_actividad["titulo"];
                $modulo=$query_info_actividad["modulo"];//almacenamos en variables los valores el contenido del arreglo asociativo
                $fecha=$query_info_actividad["fecha"];//para que sea mas facil de entender visualmente
                $hora=$query_info_actividad["hora"];
                $descripcion=$query_info_actividad["descripcion"];

                echo "<input type='checkbox' id='act$id' hidden>";

                echo "<label for='act$id' class = 'editar-tarea'>";

                echo "<p>$titulo</p>";
                echo "<p>Fecha de Entrega: $fecha</p>";
                echo "<p>Hora de Entrega: $hora</p>";

                echo "<div class='descripcion' >";
                echo "<p>$descripcion</p>";
                echo "</div>";
                
                echo "</label>";
            }
        ?>
    </div>

    <h2>Módulo 2 </h2>
    <div class="contenedor-modulo">

        <?php

            $idAlumno=1;
            $consulta="SELECT * FROM actividad WHERE idGrupo=$idAlumno AND modulo=2";
            $queri=mysqli_query($conexion,$consulta);//esta hace la ncosnulta por nostros 
            
            while( $query_info_actividad=mysqli_fetch_assoc($queri))
            {
               // <p>(datos generales de la actividad ya creada)</p>//descripcion??
                $id = $query_info_actividad["idActividad"];
                $titulo=$query_info_actividad["titulo"];
                $modulo=$query_info_actividad["modulo"];//almacenamos en variables los valores el contenido del arreglo asociativo
                $fecha=$query_info_actividad["fecha"];//para que sea mas facil de entender visualmente
                $hora=$query_info_actividad["hora"];
                $descripcion=$query_info_actividad["descripcion"];

                echo "<input type='checkbox' id='act$id' hidden>";

                echo "<label for='act$id' class = 'editar-tarea'>";

                echo "<p>$titulo</p>";
                echo "<p>Fecha de Entrega: $fecha</p>";
                echo "<p>Hora de Entrega: $hora</p>";

                echo "<div class='descripcion' >";
                echo "<p>$descripcion</p>";
                echo "</div>";
                
                echo "</label>";
            }
        ?>
    </div>

    <h2>Módulo 3 </h2>
    <div class="contenedor-modulo">

        <?php

            $idAlumno=1;
            $consulta="SELECT * FROM actividad WHERE idGrupo=$idAlumno AND modulo=3";
            $queri=mysqli_query($conexion,$consulta);//esta hace la ncosnulta por nostros 
            
            while( $query_info_actividad=mysqli_fetch_assoc($queri))
            {
               // <p>(datos generales de la actividad ya creada)</p>//descripcion??
                $id = $query_info_actividad["idActividad"];
                $titulo=$query_info_actividad["titulo"];
                $modulo=$query_info_actividad["modulo"];//almacenamos en variables los valores el contenido del arreglo asociativo
                $fecha=$query_info_actividad["fecha"];//para que sea mas facil de entender visualmente
                $hora=$query_info_actividad["hora"];
                $descripcion=$query_info_actividad["descripcion"];

                echo "<input type='checkbox' id='act$id' hidden>";

                echo "<label for='act$id' class = 'editar-tarea'>";

                echo "<p>$titulo</p>";
                echo "<p>Fecha de Entrega: $fecha</p>";
                echo "<p>Hora de Entrega: $hora</p>";

                echo "<div class='descripcion' >";
                echo "<p>$descripcion</p>";
                echo "</div>";
                
                echo "</label>";
            }
        ?>
    </div>


    <h2>Módulo 4 </h2>
    <div class="contenedor-modulo">

        <?php

            $idAlumno=1;
            $consulta="SELECT * FROM actividad WHERE idGrupo=$idAlumno AND modulo=4";
            $queri=mysqli_query($conexion,$consulta);//esta hace la ncosnulta por nostros 
            
            while( $query_info_actividad=mysqli_fetch_assoc($queri))
            {
               // <p>(datos generales de la actividad ya creada)</p>//descripcion??
                $id = $query_info_actividad["idActividad"];
                $titulo=$query_info_actividad["titulo"];
                $modulo=$query_info_actividad["modulo"];//almacenamos en variables los valores el contenido del arreglo asociativo
                $fecha=$query_info_actividad["fecha"];//para que sea mas facil de entender visualmente
                $hora=$query_info_actividad["hora"];
                $descripcion=$query_info_actividad["descripcion"];

                echo "<input type='checkbox' id='act$id' hidden>";

                echo "<label for='act$id' class = 'editar-tarea'>";

                echo "<p>$titulo</p>";
                echo "<p>Fecha de Entrega: $fecha</p>";
                echo "<p>Hora de Entrega: $hora</p>";

                echo "<div class='descripcion' >";
                echo "<p>$descripcion</p>";
                echo "</div>";
                
                echo "</label>";
            }
        ?>
    </div>
    
    <h2>Módulo 5 </h2>
    <div class="contenedor-modulo">

        <?php

            $idAlumno=1;
            $consulta="SELECT * FROM actividad WHERE idGrupo=$idAlumno AND modulo=5";
            $queri=mysqli_query($conexion,$consulta);//esta hace la ncosnulta por nostros 
            
            while( $query_info_actividad=mysqli_fetch_assoc($queri))
            {
               // <p>(datos generales de la actividad ya creada)</p>//descripcion??
                $id = $query_info_actividad["idActividad"];
                $titulo=$query_info_actividad["titulo"];
                $modulo=$query_info_actividad["modulo"];//almacenamos en variables los valores el contenido del arreglo asociativo
                $fecha=$query_info_actividad["fecha"];//para que sea mas facil de entender visualmente
                $hora=$query_info_actividad["hora"];
                $descripcion=$query_info_actividad["descripcion"];

                echo "<input type='checkbox' id='act$id' hidden>";

                echo "<label for='act$id' class = 'editar-tarea'>";

                echo "<p>$titulo</p>";
                echo "<p>Fecha de Entrega: $fecha</p>";
                echo "<p>Hora de Entrega: $hora</p>";

                echo "<div class='descripcion' >";
                echo "<p>$descripcion</p>";
                echo "</div>";
                
                echo "</label>";
            }
        ?>
    </div>
    


</body>
</html>