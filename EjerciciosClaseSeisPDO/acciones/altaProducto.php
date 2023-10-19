<?php
    require_once "./clases/producto.php";
    require_once "./clases/productoController.php";

    if (isset($_POST["codigoBarras"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"])) {
        $codigoBarras = $_POST["codigoBarras"];
        $nombre = $_POST["nombre"];
        $tipo = $_POST["tipo"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
    }

    $producto = new producto();
    $producto->constructorParametros($codigoBarras,$nombre,$tipo,$stock,$precio);

    $respuesta = $producto->verificarProducto($producto);

    echo json_encode($respuesta);
?>