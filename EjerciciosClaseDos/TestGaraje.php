<?php

include "Ejercicio18.php";
//tiraba error con el include solo
include_once "Ejercicio17.php";

$autoUno = new Auto("Nissan","Azul",1000,"7/9/2023");
$autoDos = new Auto("Mercedes","Negro",1500,"8/10/2022");
$autoTres = new Auto("Toyota","Rojo",2000,"11/13/2021");
$autoCuatro = new Auto("Twingo","Rojo",2000,"11/13/2021");

$garaje = new Garage("BBVA",500);

$garaje->Add($autoUno);
$garaje->Add($autoDos);
$garaje->Add($autoTres);

$garaje->MostrarGaraje();
echo "<br> <br>";

$retornoEquals = $garaje->Equals($autoCuatro);
var_dump($retornoEquals);
?>