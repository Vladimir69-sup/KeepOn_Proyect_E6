<?php
    include "conexion.php";

    $lista_alumnos = array();

    $sql = "SELECT nombre, primer_apellido, segundo_apellido FROM infogeneralusuario";
    $resultao_query = mysqli_query(connect(), $sql);
    while($fila = mysqli_fetch_assoc($resultao_query)){
        $lista_alumnos[] = $fila;
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
        <details>
            <summary>Grupo 1</summary>
            <div class="desplegable">
                <div class="cajita-nombres">
                    <div>
                        <p>.......</p>
                    </div>
                    <div class="opciones-usuarios">
                        <a href=""><img class="imgs-2" src=".\..\statics\media\img\waste-bin.png" alt="Bote de basura"></a>
                        <a href=""><img class="imgs-2" src=".\..\statics\media\img\tache.png"></a>
                    </div> 
                </div>
                <div class="cajita-nombres">
                    <?php
                        if (count($lista_alumnos) > 0){
                            foreach ($lista_alumnos as $alumno) {
                                echo '<p>'
                                    . $alumno['nombre'] . ' ' 
                                    . $alumno['primer_apellido'] . ' '
                                    . $alumno['segundo_apellido']
                                    . "</p>";
                                
                                echo '<div class="opciones-usuarios">';
                                echo '<a href=""><img class="imgs-2" src=".\..\statics\media\img\waste-bin.png" alt="Bote de basura"></a>';
                                echo '<a href=""><img class="imgs-2" src=".\..\statics\media\img\tache.png"></a>';
                                echo '</div>';
                            }
                        }
                    ?>
                </div>
                <div class="cajita-nombres">
                    <p>Alumno 2</p>
                    <div class="opciones-usuarios">
                    <a href=""><img class="imgs-2" src=".\..\statics\media\img\waste-bin.png" alt="Bote de basura"></a>
                    <a href=""><img class="imgs-2" src=".\..\statics\media\img\tache.png"></a>
                    </div> 
                </div>
                <div class="cajita-nombres">
                    <p>Alumno 3</p>
                    <div class="opciones-usuarios">
                    <a href=""><img class="imgs-2" src=".\..\statics\media\img\waste-bin.png" alt="Bote de basura"></a>
                    <a href=""><img class="imgs-2" src=".\..\statics\media\img\tache.png"></a>
                    </div> 
                </div>
                <div class="cajita-nombres">
                    <p>Alumno 4</p>
                    <div class="opciones-usuarios">
                    <a href=""><img class="imgs-2" src=".\..\statics\media\img\waste-bin.png" alt="Bote de basura"></a>
                    <a href=""><img class="imgs-2" src=".\..\statics\media\img\tache.png"></a>
                    </div> 
                </div>
                <div class="cajita-nombres">
                    <p>Alumno 5</p>
                    <div class="opciones-usuarios">
                    <a href=""><img class="imgs-2" src=".\..\statics\media\img\waste-bin.png" alt="Bote de basura"></a>
                    <a href=""><img class="imgs-2" src=".\..\statics\media\img\tache.png"></a>
                    </div> 
                </div>
            </div>
        </details>
        <details class="desplegable">
            <summary>Grupo 2</summary>
                <p>Alumno 1<br>Alumno 2<br>Alumno 3<br>Alumno 4<br>Alumno 5</p>
        </details>
        <details class="desplegable">
            <summary>Grupo 3</summary>
                <p>Alumno 1<br>Alumno 2<br>Alumno 3<br>Alumno 4<br>Alumno 5</p>
        </details>
        <details class="desplegable">
            <summary>Grupo 4</summary>
                <p>Alumno 1<br>Alumno 2<br>Alumno 3<br>Alumno 4<br>Alumno 5</p>
        </details>
        <details class="desplegable">
            <summary>Grupo 5</summary>
                <p>Alumno 1<br>Alumno 2<br>Alumno 3<br>Alumno 4<br>Alumno 5</p>
        </details>
        <details class="desplegable">
            <summary>Grupo 6</summary>
                <p>Alumno 1<br>Alumno 2<br>Alumno 3<br>Alumno 4<br>Alumno 5</p>
        </details>
        <details class="desplegable">
            <summary>Grupo 7</summary>
                <p>Alumno 1<br>Alumno 2<br>Alumno 3<br>Alumno 4<br>Alumno 5</p>
        </details>
    </div>
</main>
</body>
</html>