<?php

class Pizza {
    public $_id;
    public $_sabor;
    public $_precio;
    public $_tipo;
    public $_cantidad;
    public static $listaPizzas = [];

    public function __construct($id,$sabor,$precio,$tipo,$cantidad)
    {
        $this->_id = $id;
        $this->_sabor = $sabor;
        $this->_precio = $precio;
        $this->_tipo = $tipo;
        $this->_cantidad = $cantidad;
    }

    public function addPizza ($pizza) {
        self::$listaPizzas[] = $pizza;
    }

    public function ImprimirPizza ($pizza) {
        $pizzaString = "id {$pizza->_id}<br>sabor {$pizza->_sabor}<br>Precio {$pizza->_precio}<br>Tipo {$pizza->_tipo}<br>Cantidad {$pizza->_cantidad}";
        echo $pizzaString;
    }

    public static function ImprimirListaPizzas()
    {
        foreach (Pizza::$listaPizzas as  $value) {
            $value->ImprimirPizza($value);
            echo "<br>";
        }
    }

    public static function GuardarListaPizzasJSON() {
        $jsonPizzas = json_encode(Pizza::$listaPizzas);
        $archivo = fopen("Pizza.json","w");
        fwrite($archivo,$jsonPizzas);
        fclose($archivo);
        //echo $jsonPizzas;
    }

    public static function VerificarPiza($pizza){
        foreach (Pizza::$listaPizzas as  $value) {
            if ($value->_tipo === $pizza->_tipo && $value->_sabor === $pizza->_sabor) {
                $value->_cantidad += $pizza->_cantidad;
                echo "<br><br>Pizza Actualizado<br><br>";
            } else {
                $pizza->addPizza($pizza);
                echo "<br><br>Pizza Ingresado<br><br>";
            }
        }
    }
    

    public static function VerificarPizzaJson($sabor,$tipo){
        $arrayPizzas = json_decode("Pizza.json",true);
        var_dump($arrayPizzas);
        // foreach ($arrayPizzas as  $value) {
        //     if ($value->_sabor === $sabor && $value->_tipo === "tipo") {
        //         echo "si hay";
        //     } else {
        //         echo "No hay";
        //     }
        //     echo "holaaa";
        // }

    }
    
}
?>