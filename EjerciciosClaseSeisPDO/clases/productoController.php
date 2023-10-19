<?php
    require_once "producto.php";

    class productoController{
        
        public function InsertarProducto($codigoBarras, $nombre, $tipo, $stock, $precio){
            $producto = new producto();
            $producto->codigoBarras = $codigoBarras;
            $producto->nombre = $nombre;
            $producto->tipo = $tipo;
            $producto->stock = $stock;
            $producto->precio = $precio;
            return $producto->insertarProductoParametros();
        }

        public function modificarProducto($codigoBarras,$nombre, $tipo, $stock, $precio){
            $producto = new producto();
            $producto->codigoBarras = $codigoBarras;
            $producto->nombre = $nombre;
            $producto->tipo = $tipo;
            $producto->stock = $stock;
            $producto->precio = $precio;
            return $producto->modificarProductoParametros();
        }

        public function borrarProducto($id){
            $producto = new producto();
            $producto->id = $id;
            return $producto->borrarProducto();
        }

        public function listarProductos(){
            return producto::TraerTodosLosProductos();
        }

        public function buscarProductoPorId($id){
            $retorno = producto::TraerUnProducto($id);
            if($retorno === false) { // Validamos que exista y si no mostramos un error
                $retorno =  ['error' => 'No existe ese id'];
            }
            return $retorno;
        }
    }
    
?>