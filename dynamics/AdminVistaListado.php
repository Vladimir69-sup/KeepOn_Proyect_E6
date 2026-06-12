<?php
    include "conexion.php";

    $lista_grupos = array();

    $sql = "SELECT * FROM grupo";
    $resultao_query = mysqli_query(connect(), $sql);
    while($fila_grupos = mysqli_fetch_assoc($resultao_query)){
        $lista_grupos[] = $fila_grupos;
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--Meta datos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../statics/css/AdminVista1.css">
    <title>Página web KEEP ON</title>
</head>
<body>

<main>
    <div id="caja-principal-2">
        <h1>Alumnos y profesorado</h1>
            <div id="boton-verde">
                <a href=""><h3>Añadir<br>Alumno<br>O<br>Profesor</h3></a>
            </div>

            <?php
            if(count($lista_grupos) > 0){
                foreach($lista_grupos as $grupo){
                    $nombre_grupo = $grupo['nombreGrupo'];
                    $id_maestro = $grupo['idMaestro'];

                    $sql2 = "SELECT idUsuario FROM infomaestro WHERE idMaestro = $id_maestro";
                    $resultao_query2 = mysqli_query(connect(), $sql2);
                    $resultao = mysqli_fetch_assoc($resultao_query2);
                    $id_usuario_maestro = $resultao['idUsuario'];

                    $sql3 = "SELECT nombre, primerApellido, segundoApellido FROM infogeneralusuario WHERE idUsuario = $id_usuario_maestro";
                    $resultao_query3 = mysqli_query(connect(), $sql3);
                    $resultao_nProfesor = mysqli_fetch_assoc($resultao_query3);
                    $nombre_profesor = $resultao_nProfesor['nombre'];
                    $apellido1_profesor = $resultao_nProfesor['primerApellido'];
                    $apellido2_profesor = $resultao_nProfesor['segundoApellido'];

                    echo "<details>";
                        echo "<summary>" . $nombre_grupo . "</summary>";
                        echo "<div class='desplegable'>";
                            echo "<div class='cajita-nombres'>";
                                echo "<div>";
                                    echo "<p>$apellido1_profesor $apellido2_profesor $nombre_profesor</p>";
                                echo "</div>";
                                echo "<div class='opciones-usuarios'>";
                                    echo "<a href=''><img class='imgs-2' src='.\..\statics\media\img\waste-bin.png' alt='Bote de basura'></a>";
                                    echo '<a href=""><img class="imgs-2" src=".\..\statics\media\img\tache.png"></a>';
                                echo "</div>"; 
                            echo "</div>";
                
        
                            echo "<div class='cajita-nombres'>";
                                $id_grupo = $grupo['idGrupo'];
                                $sql6 = "SELECT COUNT(idAlumno) FROM infoAlumno WHERE idGrupo = $id_grupo";
                                $resultao_query6 = mysqli_query(connect(), $sql6);
                                $resultao_count = mysqli_fetch_assoc($resultao_query6);
                                $count = $resultao_count['COUNT(idAlumno)'];

                                    //for($i=0 ; $i<=$count; $i++){
                                        
                                $sql4 = "SELECT idUsuario FROM infoalumno WHERE idGrupo = $id_grupo";
                                $resultao_query4 = mysqli_query(connect(), $sql4);
                                /*$resultao_idUsuario = mysqli_fetch_assoc($resultao_query4);
                                $resultao_idUsuario = mysqli_fetch_assoc($resultao_query4);*/
                                //$id_usuario_alumno = $resultao_idUsuario['idUsuario'];

                                while($resultao_idUsuario = mysqli_fetch_assoc($resultao_query4)){
                                    $id_usuario_alumno = $resultao_idUsuario['idUsuario'];
                                    $sql5 = "SELECT nombre, primerApellido, segundoApellido FROM infogeneralusuario WHERE idUsuario = $id_usuario_alumno";
                                    $resultao_query5 = mysqli_query(connect(), $sql5);
                                    while($resultao_nAlumno = mysqli_fetch_assoc($resultao_query5)){
                                        $nombre_alumno = $resultao_nAlumno['nombre'];
                                        $apellido1_alumno = $resultao_nAlumno['primerApellido'];
                                        $apellido2_alumno = $resultao_nAlumno['segundoApellido'];
                                        echo "<p>$apellido1_alumno $apellido2_alumno $nombre_alumno</p>";
                                        echo '<div class="opciones-usuarios">';
                                        echo '<a href=""><img class="imgs-2" src=".\..\statics\media\img\waste-bin.png" alt="Bote de basura"></a>';
                                        echo '<a href=""><img class="imgs-2" src=".\..\statics\media\img\tache.png"></a>';
                                        echo '</div>';
                                    }
                                }
                            echo "</div>";     
                        //}
                        echo "</div>";
                        echo "</details>";
                }       
            }
        
            ?>
    </div>
</main>
</body>
</html>