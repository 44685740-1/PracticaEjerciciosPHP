<?php
/*
Ejercicio 19 clase Tres
Caracciolo Ahuitz

Aplicación No 19 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos

privados: _color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como

parámetros: i. La marca y el color.

ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto” por
parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo devolverá
TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son de la
misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con la suma de los
precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un archivo
autos.csv.
Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo
autos.csv
Se deben cargar los datos en un array de autos.
En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio. ● Crear
un objeto “Auto” utilizando la sobrecarga restante.
● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al
atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)
*/

class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($_marca = null, $_color = null, $_precio = null, $_fecha = null)
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

    public static function AddAuto($auto, $arrayAutos)
    {
        array_push($arrayAutos, $auto);
        return $arrayAutos;
    }

    public static function StringAuto($auto)
    {
        $stringAuto = "{$auto->_color},{$auto->_marca},{$auto->_precio},{$auto->_fecha}";

        return $stringAuto;
    }


    public static function GuardarListaAutosEnCSV($listaAutos)
    {
        $stringAutos = "Color,Marca,Precio,Fecha";

        foreach ($listaAutos as  $value) {
            $autoString = Auto::StringAuto($value);
            $stringAutos .= "\n" . $autoString;
        }

        $archivo = fopen("Autos.csv", "w");
        $retonoFwrite = fwrite($archivo, $stringAutos);
        fclose($archivo);

        if ($retonoFwrite != false) {
            return true;
        }

        return false;
    }

    public static function leerArchivoAutosCSV()
    {
        $nombreArchivo = 'Autos.csv';

        $autos = [];

        if (($archivo = fopen($nombreArchivo, 'r')) !== false) {
            $encabezadoFantasma = false;
            while (($data = fgetcsv($archivo)) !== false) {
                if (!$encabezadoFantasma) {
                    $encabezadoFantasma = true;
                    //continue se salta la iteracion cuando estamos en un bucle, es decir que se salta la iteracion que lee el header
                    continue;
                }

                if (count($data) === 4) { 
                    $auto = [
                        'color' => $data[0],
                        'marca' => $data[1],
                        'precio' => $data[2],
                        'fecha' => $data[3]
                    ];
                    $autos[] = $auto;
                } else {
                    echo "Esquivando fila Invalida: " . implode(', ', $data) . "\n";
                }
            }
            fclose($archivo);
        } else {
            echo("Error abriendo el archivo");
        }
        return $autos;
    }
}
