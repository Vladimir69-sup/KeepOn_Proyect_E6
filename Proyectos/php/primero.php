<?php
    const gravedad = 32;
    $tablaTDV=[10][3];

    function calcDistancia ($tiempo, $veli)
    {
        $dist=0.5*gravedad*($tiempo**2);
        return $dist;
    }

    function calcVelocidad ($tiempo, $veli)
    {
        $velf=$veli+gravedad*$tiempo;       
        return $velf;
    }

    function generaTabla()
    {
        $tiempo=0;
        for ($t = 1; $t<=10; $t++)
        {
            $tiempo=$tiempo+1.0;
            $tablaTDV[$t-1][0]=$tiempo;
            $tablaTDV[$t-1][1]=calcDistancia($tablaTDV[$t-1][0],0);
            $tablaTDV[$t-1][2]=calcDistancia($tablaTDV[$t-1][0],0);
        }
        return;
    }
  /*  function void()
    {*/
        $t=0;
        generaTabla();
        echo "_________________________________________________________\n";
        echo "|Tiempo (seg)\t|Posicion final\t|Velocidad final (ft/s)\t|\n";
        echo "_________________________________________________________\n";
        while ($t<10)
        {
            for ($col=0; $col<3; $col++)
            {
                if ($col==2)
                {
                    if($tablaTDV[$t][2]>250)
                        echo "|\t Exceso";
                    else
                        echo "|\t %2.01f\t",$tablaTDV[$t][2];
                }
                else
                    echo "|\t %2.01f\t",$tablaTDV[$t][$col];
            }
            echo "\t|\n";
            $t++;
        }
        echo "_________________________________________________________\n";
        return 0;
 /* }


?>

// no poner tipo de varible 
// la ventaja de usar constantes esq para llamarla dentro de funciones no se usa global 
//ni $ y al declararlas tampoco
//el valor de las constantes NO puede cambiar a lo largo del programa 