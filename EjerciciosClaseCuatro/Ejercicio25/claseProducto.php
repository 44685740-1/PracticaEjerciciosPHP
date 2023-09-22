<?php

use Producto as GlobalProducto;

class Producto{
    public $_id;
    public $_codigoBarras;
    public $_nombre;
    public $_tipo;
    public $_stock;
    public $_precio;
    public static $listaProductos = [];

    public function __construct($id,$codigoBarras,$nombre,$tipo,$stock,$precio)
    {
        $this->_id = $id;
        $this->_codigoBarras = $codigoBarras;
        $this->_nombre = $nombre;
        $this->_tipo = $tipo;
        $this->_stock = $stock;
        $this->_precio = $precio;

        //self::$listaProductos[] = $this;
    }

    public function ImprimirProducto($producto)
    {
        $productoString = "id {$producto->_id}<br>Codigo Barras {$producto->_codigoBarras}<br>nombre {$producto->_nombre}<br>Tipo {$producto->_tipo}<br>Stock {$producto->_stock}<br>Precio {$producto->_precio}<br>";
        echo $productoString;
    }

    public static function ImprimirListaProductos()
    {
        foreach (Producto::$listaProductos as  $value) {
            $value->ImprimirProducto($value);
            echo "<br>";
        }
    }

    public function AddProducto($producto){
        self::$listaProductos[] = $producto;
    }

    public static function VerificarProducto($producto){
        foreach (Producto::$listaProductos as $value) {
            if ($value->_codigoBarras == $producto->_codigoBarras) {
                //sumo el stock porque el producto es el mismo
                $value->_stock += $producto->_stock;
                echo "<br><br>Producto Actualizado<br><br>";
            } else {
                //agrego erl prodcuto a la lista
                $producto->AddProducto($producto);
                echo "<br><br>Producto Ingresado<br><br>";
            }
        }
    }


}
?>