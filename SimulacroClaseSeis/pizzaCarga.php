<?php
include_once "pizza.php";
    if (isset($_GET["sabor"]) && isset($_GET["precio"]) && isset($_GET["tipo"]) && isset($_GET["cantidad"])) {
        $sabor = $_GET["sabor"];
        $precio = $_GET["precio"];
        $tipo = $_GET["tipo"];
        $cantidad = $_GET["cantidad"];
        $id = random_int(1,10000);
    }

    $pizza = new Pizza($id,$sabor,$precio,$tipo,$cantidad);
    $pizzaDos = new Pizza(178,"margarita",120,"piedra",1);

    //$pizzaDos->addPizza($pizzaDos);
    $pizza->addPizza($pizza);

    Pizza::VerificarPiza($pizzaDos);
    Pizza::ImprimirListaPizzas();
    Pizza::GuardarListaPizzasJSON();
?>