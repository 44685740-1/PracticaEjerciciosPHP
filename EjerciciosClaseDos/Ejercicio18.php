<?php
/*
Ejercicio 18 - Clase 2
Caracciolo Ahuitz

Aplicación No 18 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:

_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como

parámetros: i. La razón social.
ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
$miGarage->Remove($autoUno);
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
los métodos.
*/

include "Ejercicio17.php";

class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    //los arrays si hay que inicializarlos por el tipado
    private $_autos = [];

    public function __construct($_razonSocial = null, $_precioPorHora = null)
    {
        if ($_razonSocial !== null && $_precioPorHora !== null) {
            $this->_razonSocial = $_razonSocial;
            $this->_precioPorHora = $_precioPorHora;
        }  else {
            $this->_razonSocial = $_razonSocial;
        }
    }

    public function MostrarGaraje() 
    {
        echo "<br/>Razon Social {$this->_razonSocial} <br/>
              Precio Por Hora {$this->_precioPorHora} <br/>
              Autos En el Garaje
              <br/> <br/>
              ";

              foreach ($this->_autos as  $value) {
                Auto::MostrarAuto($value);
                echo "<br> <br>";
            }
    }


    public function Equals($auto)
    {
        $indiceAutoEncontrado = array_search($auto,$this->_autos);

        if ($indiceAutoEncontrado !== false) {
            return true;
        } 

        return false;
    }

    public function Add($auto) 
    {
        $indiceAutoEncontrado = array_search($auto,$this->_autos);

        if ($indiceAutoEncontrado !== false) {
            echo "El auto ya se encuentra en le Garage<br>";
        } else {
            array_push($this->_autos,$auto);    
        }
    }

    public function Remove($auto) 
    {
        $indiceRemover = array_search($auto,$this->_autos);

        if ($indiceRemover !== false) {
            unset($this->_autos[$indiceRemover]);
        } else {
            echo "El auto no esta en el Garage<br>";
        }
    }
}
?>