<?php
    require_once "./clases/usuario.php";
    require_once "./clases/usuarioController.php";

    if (isset($_POST["nombre"]) && isset($_POST["claveNueva"]) && isset($_POST["claveVieja"]) && isset($_POST["mail"])) {
        $nombre = $_POST["nombre"];
        $claveNueva = $_POST["claveNueva"];
        $claveVieja = $_POST["claveVieja"];
        $mail = $_POST["mail"];
    }

    $usuario = new usuario();
    $usuario->constructorClaveMail($mail,$claveVieja);

    $retorno = $usuario->retornarUsuarioEncontrado($usuario);
    if ($retorno != null) {  
        $usuarioController = new usuarioController();
        $resultado = $usuarioController->modificarUsuario($retorno->id,$nombre,"caracciolo",$claveNueva,$mail,"belgrano");
        echo json_encode(['resultado' => $resultado]);  
    } else {
        echo "No se encontro el usuario";
    }
?>