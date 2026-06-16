<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <link rel="stylesheet" href="../../statics/css/style.css">
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
        <a href="./alumno.php"><img class="logo"id=keep-on alt="logo"src="../../statics/media/img/COMPUTADORA.png"></a>
        <a href="./VistaPerfilAlumnoDBActual.php"><img id="user"src="../../statics/media/img/user.png"></a>
        <a href="./logout.php"><img id="user"src="../../statics/media/img/logout.png"></a>

        <article id="barra_lateral">
            <section  id="primero_barra_lateral"></section>
            <section id="segundo_barra_lateral"class="bloque_linea">
                <a class="enlace"href="./ActividadesVistaAlumno.php">
                    <h3>ACTIVIDADES</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./formulario_evaluacion.html">
                    <h3>FORMULARIOS</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./recursos_apoyo.html">
                    <h3>RECURSOS DE APOYO</h3>
                </a>
            </section>
            <section class="bloque_linea">
                <a class="enlace"href="./ProyectosPasados.php">
                   <h3>PROYECTOS ANTERIORES</h3>
                </a>
            </section>
        </article> 
    </div>

    <h1>ACTIVIDADES</h1>
    <br>
    <h2>Módulo 1 </h2>
    <div class="contenedor-modulo">

        <?php
            include './conexion.php';

            session_start();

            $idAlumno=$_SESSION['idAlumno'];
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