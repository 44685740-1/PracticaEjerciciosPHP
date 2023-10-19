<?php
include_once ".\db\accesoDatos.php";
require_once "productoController.php";

class producto
{
    public $id;
    public $codigoBarras;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;
    public $fechaDeCreacion;

    public function __construct()
    {
        
    }

    public function constructorParametros($codigoBarras, $nombre, $tipo, $stock, $precio)
    {
        $this->codigoBarras = $codigoBarras;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->stock = $stock;
        $this->precio = $precio;
    }

    public function MostrarDatos()
    {
        return "id {$this->id}<br>Codigo Barras {$this->codigoBarras}<br>Nombre {$this->nombre}<br>Tipo {$this->tipo}<br>Stock {$this->stock}<br>Precio {$this->precio}<br>Fecha de Creacion {$this->fechaDeCreacion}";
    }

    public function InsertarProducto()
    {
        $objetoAccsesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccsesoDatos->RetornarConsulta("INSERT INTO `productos`(`codigo_de_barra`, `nombre`, `tipo`, `stock`, `precio`) 
            VALUES ('$this->codigoBarras','$this->nombre','$this->tipo','$this->stock','$this->precio')");
        $consulta->execute();
        return $objetoAccsesoDatos->RetornarUltimoIdInsertado();
    }

    public function insertarProductoParametros()
    {
        $objetoAccsesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccsesoDatos->RetornarConsulta("INSERT INTO `productos`(`codigo_de_barra`, `nombre`, `tipo`, `stock`, `precio`) 
            VALUES (:codigoBarra,:nombre,:tipo,:stock,:precio)");

        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':codigoBarra', $this->codigoBarras, PDO::PARAM_INT);
        $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
        $consulta->bindValue(':stock', $this->stock, PDO::PARAM_INT);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);

        $consulta->execute();
        return $objetoAccsesoDatos->RetornarUltimoIdInsertado();
    }

    public static function TraerTodosLosProductos()
    {
        $objetoAccsesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccsesoDatos->RetornarConsulta("SELECT id,codigo_de_barra AS codigoBarras,nombre,tipo,stock,precio,fecha_de_creacion AS fechaDeCreacion FROM `productos`");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS, "producto");
    }

    public static function TraerUnProducto($id)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT id,codigo_de_barra AS codigoBarras,nombre,tipo,stock,precio,fecha_de_creacion AS fechaDeCreacion FROM `productos` 
        WHERE id = $id");
        $consulta->execute();
        $productoBuscado = $consulta->fetchObject("producto");
        return $productoBuscado;
    }

    public function modificarProducto()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE `productos` 
            SET `nombre`='$this->nombre',`tipo`='$this->tipo',`stock`='$this->stock',`precio`='$this->precio'
            WHERE codigo_de_barra = '$this->codigoBarras'");

        return $consulta->execute();
    }

    public function modificarProductoParametros()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

        $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE `productos` 
            SET `nombre`= :nombre,`tipo`= :tipo,`stock`= :stock,`precio`= :precio
            WHERE codigo_de_barra = :codigoBarras");

        $consulta->bindValue(':codigoBarras', $this->codigoBarras, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
        $consulta->bindValue(':stock', $this->stock, PDO::PARAM_INT);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
        return $consulta->execute();
    }

    public function borrarProducto()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM `productos` 
            WHERE id = :id");

        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->rowCount();
    }

    public function verificarProducto($producto){
        $productos = producto::TraerTodosLosProductos();
        $productoController = new productoController();
        $respuesta = "NO ESTA";//nunca retorna NO ESTA al final, una de las otras tres respuestas
        foreach ($productos as $value) {
            if ($producto->codigoBarras == $value->codigoBarras) {
                
                $nuevoStock = $producto->stock + $value->stock;
                $productoController->modificarProducto($producto->codigoBarras,$producto->nombre,$producto->tipo,$nuevoStock,$producto->precio);
                $respuesta =  "ACTUALIZADO";
            } 
        }

        if ($respuesta === "NO ESTA") {
            $retorno = $productoController->InsertarProducto($producto->codigoBarras,$producto->nombre,$producto->tipo,$producto->stock,$producto->precio);
            if ($retorno > 0) {
                $respuesta = "INGRESADO";
            } else {
                $respuesta = "NO SE PUDO INGRESAR";
            }
        }
        
        return $respuesta;
    }

    public static function realizarVenta($codigoBarras,$cantidadItems){
        $productos = producto::TraerTodosLosProductos();
        $productoController = new productoController();
        $respuesta = "NO SE PUDO HACER";
        foreach ($productos as $value) {
            if ($value->codigoBarras == $codigoBarras && $value->stock >= $cantidadItems) {
                $nuevoStock =  $value->stock - $cantidadItems;
                $productoController->modificarProducto($codigoBarras,$value->nombre,$value->tipo,$nuevoStock,$value->precio);
                $respuesta = "VENTA REALIZADA";
            }
        }

        return $respuesta;
    }
}
