<?php
/*
Ejercicio Nueve
Caracciolo Ahuitz 

Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.
*/

$lapiceras = array(
    array("Color" => "Azul", "Marca" => "Bic", "trazo" => "Cursiva", "Precio" => "280"),
    array("Color" => "Negro", "Marca" => "Bic", "trazo" => "Imprenta", "Precio" => "250"),
    array("Color" => "Verde", "Marca" => "EX", "trazo" => "Cursiva", "Precio" => "100")
);

foreach ($lapiceras as $lapicera) {
    echo "Color " . $lapicera["Color"] . "<br/>";
    echo "Marca " .$lapicera["Marca"] . "<br/>";
    echo "Trazo " .$lapicera["trazo"] . "<br/>";
    echo "Precio " .$lapicera["Precio"] . "<br/>";
    echo "<br/>";
}
?>