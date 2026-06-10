<?php
    include './conexion.php';
    $maestroActual=1;
    $info_grupo="SELECT nombreGrupo FROM grupo WHERE idMaestro = $maestroActual";
    $query=mysqli_query($conexion, $info_grupo);
    $nombreGrupo=$query_info["nombreGrupo"];

    while($query_info=mysqli_fetch_assoc($query)){
        $nombreGrupo=$query_info["nombreGrupo"];
   }


    function grupo_valido($grupo){
        $grupos_permitidos="";

        if(!$grupos_permitidos==$grupo)
            return false;
    }

    function modulo_valido($modulo){
        $modulos_permitidos = ['1', '2', '3', '4', '5'];

        if(!$modulos_permitidos==$modulo)
            return false;
    }

        $mensaje ="";
        $clase_mensaje="";


        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            $titulo=$_POST["titulo"];
            $descripcion=$_POST["descripcion-actividad"];
            $hora=$_POST["hora_entrega"];
            $fecha=$_POST{"fecha_entrega"};
            $modulo=$_POST{"modulo"};
            $grupo=$_POST("grupo");

            
        }

    ?>