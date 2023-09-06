<?php
/*
Ejercicio Siete
Caracciolo Ahuitz

Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números
utilizando las estructuras while y foreach.
*/

$contador = 0;
$arrayImpares = [];
for($i = 0; $i < 100; $i++)
{
    if ($i % 2 != 0) {
        array_push($arrayImpares, $i);
        $contador++;
        if ($contador == 10) {
            break;
        }
    }
}

foreach ($arrayImpares as $value) {
    echo "{$value} <br/>";
}
?>