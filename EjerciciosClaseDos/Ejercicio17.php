<?php
/*
Ejercicio 17 - CLase 2
Caracciolo Ahuitz

Realizar una clase llamada “Auto” que posea los siguientes atributos

privados: _color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como

parámetros: i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble
por parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);

En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.

● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)
*/
class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    //igualar los parametros a null hace flexible al constructor y que puede recibir o no dicho parametro
    public function __construct($_marca = null, $_color = null,$_precio = null,$_fecha = null)
    {
        if ($_marca !== null && $_color !== null && $_precio !== null && $_fecha !== null) {
            $this->_marca = $_marca;   
            $this->_color = $_color; 
            $this->_precio = $_precio;
            $this->_fecha = $_fecha;
        } elseif ($_marca !== null && $_color !== null && $_precio !== null) {
            $this->_marca = $_marca;   
            $this->_color = $_color; 
            $this->_precio = $_precio;
        } elseif ($_marca !== null && $_color !== null) {
            $this->_marca = $_marca;   
            $this->_color = $_color; 
        }
    }

    public function AgregarImpuestos($impuestoAgregado)
    {
        $this->_precio += $impuestoAgregado;
    }

    public static function MostrarAuto($auto)
    {
        echo "Color {$auto->_color} <br/>
              Marca {$auto->_marca} <br/>
              Precio {$auto->_precio} <br/>
              Fecha {$auto->_fecha}";
    }

    public function Equals($autoParam)
    {
        if ($this->_marca == $autoParam->_marca) {
            return true;
        }

        return false;
    }

    public static function Add($autoUno, $autoDos) 
    {
        if ($autoUno->_marca == $autoDos->_marca && $autoUno->_color == $autoDos->_color) {
            $sumaPrecios = $autoUno->_precio + $autoDos->_precio;
            return $sumaPrecios;
        } else {
            echo "Los autos no son de la misma marca o color";
            return 0;
        }
    }

}

?>