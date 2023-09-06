<?php
/*
Ejercicio 12 - CLase Dos
Caracciolo Ahuitz 

Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

function ImprimirArray($array) 
{
    foreach ($array as  $value) {
        echo $value;
    }
}

function InvertirArrayCaracteres($palabra) {
    $palabraInvertida = array_reverse($palabra);
    ImprimirArray($palabraInvertida);
}

$palabra = array('h','o','l','a');

InvertirArrayCaracteres($palabra);
?>