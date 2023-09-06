<?php
function imprimirEstudiante($nombre,$nota) 
{
    echo "{$nombre} {$nota}<br/>";
}

$listaEstudiantesNota = array("Juan" => 10,"Ahuitz" => 8,"Alberto" => 4);

//cuento todas las claves del array asociativo para usarlo en el for
$claves = array_keys($listaEstudiantesNota);

for ($i=0; $i < count($claves); $i++) { 
    $key = $claves[$i];
    $value = $listaEstudiantesNota[$key];
    imprimirEstudiante($key,$value);
}
?>