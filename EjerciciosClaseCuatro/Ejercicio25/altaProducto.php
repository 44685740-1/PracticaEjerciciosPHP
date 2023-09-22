<?php
    include_once "claseProducto.php";
    if (isset($_POST["codigoBarras"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"])) {
        $codigoBarras = $_POST["codigoBarras"];
        $nombre = $_POST["nombre"];
        $tipo = $_POST["tipo"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
    }

    $id = random_int(1,10000);

    $productoPOST = new Producto($id,$codigoBarras,$nombre,$tipo,$stock,$precio);
    //$productoPOST->AddProducto($productoPOST);
    $productoUno = new Producto(123,123456,"pepsi","gaseosa",2,130);
    $productoUno->AddProducto($productoUno);
    Producto::VerificarProducto($productoPOST);
    Producto::ImprimirListaProductos();
?>