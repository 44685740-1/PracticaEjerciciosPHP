<?php
/*
Ejercicio Cinco
Caracciolo Ahuitz 

Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/

$number = 1234;
$locale = 'en_US'; // Specify the desired locale

$fmt = new NumberFormatter($locale, NumberFormatter::SPELLOUT);
$words = $fmt->format($number);

echo "Number $number in words: $words";
?>