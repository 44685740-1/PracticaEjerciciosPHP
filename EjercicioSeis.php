<?php
/*
Ejercicio Seis
Caracciolo Ahuitz

Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
*/
$numUno = rand(1,10);
$numDos = rand(1,10);
$numTres = rand(1,10);
$numCuatro = rand(1,10);
$numCinco = rand(1,10);

$listaNumeros = array($numUno,$numDos,$numTres,$numCuatro,$numCinco);

$acumulador = 0;
$contador = 0;

for($i= 0; $i < 5; $i++) 
{
    echo $listaNumeros[$i];
    echo "<br/>";
    $acumulador += $listaNumeros[$i];
    $contador++;
}
$promedio = $acumulador / $contador;

if ($promedio > 6) {
    echo "<br/>";
    echo "El promedio de los cinco numeros es mayor a 6, promedio {$promedio}";
} else {
    if ($promedio == 6) {
        echo "<br/>";
        echo "El promedio es 6, promedio {$promedio}";
    } else {
        echo "<br/>";
        echo "El promedio es menor a 6, promedio {$promedio}";
    }
}
?>