<?php
/*
Ejercicio Ocho
Caracciolo Ahuitz

Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:
$v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';
*/

$miArray = array($v[1]=90, $v[30]=7, $v['e']=99, $v['hola']= 'mundo');

foreach ($miArray as $value) {
    echo "{$value}";
    echo "<br/>";
}
?>