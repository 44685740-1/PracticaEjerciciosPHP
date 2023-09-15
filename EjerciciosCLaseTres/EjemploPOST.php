<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombreUsuarioUno = $_POST["NombreUno"];
    $mailUsuarioUno = $_POST["MailUno"];
    $nombreUsuarioDos = $_POST["NombreDos"];
    $mailUsuarioDos = $_POST["MailDos"];

    $respuesta = "Usuario Uno<br>{$nombreUsuarioUno}<br>{$mailUsuarioUno}<br>Usuario Dos<br>{$nombreUsuarioDos}<br>{$mailUsuarioDos}";
    echo $respuesta;
}

?>
