<?php
    require_once "./clases/usuario.php";
    require_once "./clases/usuarioController.php";

    if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["clave"]) && isset($_POST["mail"]) && isset($_POST["localidad"])) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $clave = $_POST["clave"];
        $mail = $_POST["mail"];
        $localidad = $_POST["localidad"];
    }

    $usuarioPost = new usuario();
    $usuarioPost->constructorParametros($nombre,$apellido,$clave,$mail,$localidad);
    $data = $usuarioPost->MostarDatos();
    echo $data;
    echo "<br><br><br><br><br>";

    $usuarioController = new usuarioController();
    $respuesta = $usuarioController->InsertarUsuario($nombre,$apellido,$clave,$mail,$localidad);
    echo json_encode(['resultado' => $respuesta]);
?>