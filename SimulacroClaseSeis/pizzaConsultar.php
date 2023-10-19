<?php
    include_once "pizza.php";

    if (isset($_POST["sabor"]) && isset($_POST["tipo"])) {
        $sabor = $_POST["sabor"];
        $tipo = $_POST["tipo"];
    }

    $pizza = new Pizza(178,"margarita",120,"piedra",1);
    //$pizzaDos = new Pizza(150,"margarita",120,"piedra",1);
    $pizza->addPizza($pizza);
    //$pizzaDos->addPizza($pizzaDos);
    Pizza::GuardarListaPizzasJSON();
    Pizza::VerificarPizzaJson($sabor,$tipo);


?>