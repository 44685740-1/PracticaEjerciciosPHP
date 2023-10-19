<?php
    require_once "./clases/usuario.php";
    require_once "./clases/usuarioController.php";
    require_once "./clases/producto.php";
    require_once "./clases/productoController.php";

    $usuarioController = new usuarioController();
    $productoController = new productoController();

    if (isset($_GET["opcionListar"])) {
        $opcionListar = $_GET["opcionListar"];
    }

    switch ($opcionListar) {
        case 'usuarios':
            $usuarios = $usuarioController->listarUsuarios();
            echo json_encode($usuarios);
            break;
        case 'productos':
            $productos = $productoController->listarProductos();
            echo json_encode($productos);
            break;
        case '':
            #code...
            break;
    }
?>