<?php
include "Ejercicio17.php";

$autoUno = new Auto("peugeot","azul");
$autoDos = new Auto("peugeot","Rojo");

$autoTres = new Auto("nissan","azul",1000);
$autoCuatro = new Auto("nissan","azul",1200);

$autoCinco = new Auto("Mercedes","Negro",1500,"6/9/2023");

$autoTres->AgregarImpuestos(1500);
$autoCuatro->AgregarImpuestos(1500);
$autoCinco->AgregarImpuestos(1500);

$sumaPrecioAutoUnoDos = Auto::Add($autoUno,$autoDos);
echo "<br/> Suma de precios auto Uno y dos {$sumaPrecioAutoUnoDos} <br/> <br/> <br/>";

$retonoPrimeroSegundo = $autoUno->Equals($autoDos);
$retornoPrimeroQuinto = $autoUno->Equals($autoCinco);

if ($retonoPrimeroSegundo == true) {
    echo "El primer auto y el segundo tienen la misma marca <br/>";
} else {
    echo "El primer auto y el segundo NO tienen la misma marca <br/>";
}

if ($retornoPrimeroQuinto == true) {
    echo "El primer auto y el Quinto tienen la misma marca <br/>";
} else {
    echo "El primer auto y el Quinto NO tienen la misma marca <br/>";
}

echo "<br/>";
echo "<br/>";
Auto::MostrarAuto($autoUno);
echo "<br/>";
echo "<br/>";
Auto::MostrarAuto($autoTres);
echo "<br/>";
echo "<br/>";
Auto::MostrarAuto($autoCinco);

?>