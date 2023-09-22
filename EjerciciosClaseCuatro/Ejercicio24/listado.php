<?php
include_once "claseUsuario.php";
    if (isset($_GET["usuariosJSON"])) {
        $json = $_GET["usuariosJSON"];
    }

    $listaUsuarios = [];
    $listaDeUsuarios = json_decode($json);
    Usuario::$listaDeUsuarios = $listaDeUsuarios;

    var_dump(Usuario::$listaDeUsuarios);

?>