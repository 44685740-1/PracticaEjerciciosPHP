<?php
    require_once "./clases/usuario.php";
    if (isset($_POST["mail"]) && isset($_POST["clave"])) {
        $mail = $_POST["mail"];
        $clave = $_POST["clave"];
    }

    $usuario = new usuario();

    $usuario->constructorClaveMail($mail,$clave);
    $verificacion = $usuario->verificarUsuario($usuario);

    echo json_encode($verificacion);
?>