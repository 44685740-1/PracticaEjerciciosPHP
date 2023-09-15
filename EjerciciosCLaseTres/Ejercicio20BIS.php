<?php
/*
Ejercicio 20 BIS
Caracciolo Ahuitz

Aplicación No 20 BIS (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario
*/
class Usuario
{
    private $_nombre;
    private $_clave;
    private $_mail;

    public function __construct($nombre, $clave, $mail)
    {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
    }

    public function ImprimirUsuario($usuario)
    {
        echo "{$usuario->_nombre}<br>{$usuario->_clave}<br>{$usuario->_mail}";
    }

    public static function AddUsuario($usuario, $arrayUsuarios)
    {
        array_push($arrayUsuarios, $usuario);
        return $arrayUsuarios;
    }

    public static function StringUsuario($usuario)
    {
        $stringAuto = "{$usuario->_nombre},{$usuario->_clave},{$usuario->_mail}";
        return $stringAuto;
    }


    public static function GuardarListaUsuariosEnCSV($listaUsuarios)
    {
        $stringUsuarios = "Nombre,Clave,Mail";

        foreach ($listaUsuarios as  $value) {
            $usuarioString = Usuario::StringUsuario($value);
            $stringUsuarios .= "\n" . $usuarioString;
        }

        $archivo = fopen("Usuarios.csv", "w");
        $retonoFwrite = fwrite($archivo, $stringUsuarios);
        fclose($archivo);

        if ($retonoFwrite != false) {
            return true;
        }

        return false;
    }
}

$nombre = $_POST["Nombre"];
$clave = $_POST["Clave"];
$mail = $_POST["Mail"];

$arrayUsuarios = [];
$usuario = new Usuario($nombre, $clave, $mail);
$arrayUsuarios = Usuario::AddUsuario($usuario,$arrayUsuarios);
echo "El Usuario <br>";
$usuario->ImprimirUsuario($usuario);
Usuario::GuardarListaUsuariosEnCSV($arrayUsuarios);
