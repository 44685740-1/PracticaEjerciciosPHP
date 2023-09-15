<?php
    include_once "Ejercicio19.php";
    $arrayAutos = [];
    $autoUno = new Auto("Mercedes","Negro",1500,"6/9/2023");
    $autoDos = new Auto("Peugot","Azul",2000,"8/10/2021");
    $autoTres = new Auto("Peugot","Azul",2000,"8/10/2021");
    $stringAutos = "";
    array_push($arrayAutos,$autoUno);
    array_push($arrayAutos,$autoDos);
    array_push($arrayAutos,$autoTres);

    foreach ($arrayAutos as  $value) {
        $autoString = Auto::StringAuto($value);
        $stringAutos .= "<br/>" . $autoString . "<br/>";
    }

    echo $stringAutos;
?>