<?php

$conexion = mysqli_connect("localhost","root","","keep_on_db");


/* TODOS LOS RECURSOS   QUE YA ESTAN EN BASE DE DATOS*/

$consulta = "SELECT titulo, url FROM recursos";

$resultado = mysqli_query($conexion,$consulta);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos</title>

    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="contenedor">

    <h1>RECURSOS</h1>

    <div class="tabla">

        <div class="encabezado">

            <div>Título</div>
            <div>Enlace</div>

        </div>



        <?php

        while($fila = mysqli_fetch_assoc($resultado))
        {
            echo "<div class='fila'>";

                echo "<div>$fila[titulo]</div>";

                echo "<div>";

                    echo "<a href='$fila[url]' target='_blank'>
                            $fila[url]
                          </a>";

                echo "</div>";

            echo "</div>";
        }

        ?>

    </div>

</div>

</body>
</html>