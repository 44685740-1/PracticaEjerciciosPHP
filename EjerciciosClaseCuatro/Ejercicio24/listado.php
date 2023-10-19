<?php
include_once "claseUsuario.php";
    if (isset($_GET["usuariosJSON"])) {
        $json = $_GET["usuariosJSON"];
    }

    $usuariosData = json_decode($json);
    
    $listaUsuarios = [];

    foreach ($usuariosData as  $value) {
        $usuario = new Usuario($value->_id,$value->_nombre,$value->_clave,$value->_mail,$value->_fechaDeRegistro);
        array_push($listaUsuarios,$usuario);
    }

    //Usuario::$listaDeUsuarios = $listaDeUsuarios;
    // TODO: Preguntar como asignar la lista a la lista Statica la nueva lista creada a partir del JSON leido
    print_r($listaUsuarios);
?>