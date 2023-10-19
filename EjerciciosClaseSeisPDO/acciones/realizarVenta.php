<?php
    require_once "./clases/usuario.php";
    require_once "./clases/producto.php";
    if (isset($_POST["codigoBarras"]) & isset($_POST["usuarioId"]) && isset($_POST["cantidadItems"])) {
        $codigoBarras = $_POST["codigoBarras"];
        $usuarioId = $_POST["usuarioId"];
        $cantidadItems = $_POST["cantidadItems"];
    }

    $respuesta = usuario::verificarUsuarioPorId($usuarioId);
    if ($respuesta == true) {
        $retorno = producto::realizarVenta($codigoBarras,$cantidadItems);
        echo json_encode($retorno);
    } else {
        echo json_encode("NO SE PUDO HACER");
    }

?>