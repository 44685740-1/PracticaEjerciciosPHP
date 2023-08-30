
<?php
/*
Caracciolo Ahuitz
Ejercicio Uno 

Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.
*/
    $contador = 0;
    $mensajeSinCantidad = "Cantidad de numeros mostrados : ";
    for($i=1; $i + ($i + 1) < 1000; $i++)
    {
        $contador++;
        print $i + 1;
        echo "<br>";
    }

    $mensajeConcantidad = $mensajeSinCantidad . $contador;
    echo $mensajeConcantidad;
?>
