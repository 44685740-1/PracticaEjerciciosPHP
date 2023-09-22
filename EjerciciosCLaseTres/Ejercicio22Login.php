<?php
/*
Clase Tres Ejercicio 22 Login
Caracciolo Ahuitz

Aplicación No 22 ( Login)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado, Retorna
un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario.
*/
class Usuario{

    private $_clave;
    private $_mail;
    public static $listaUsuarios = [];
    
    public function __construct($clave,$mail)
    {
        $this->_clave = $clave;
        $this->_mail = $mail;

        self::$listaUsuarios[] = $this;
    }

    public function ImprimirUsuario($usuario)
    {
        echo "{$usuario->_clave}<br>{$usuario->_mail}<br>";
    }

    public static function VerificarUsuario($clave,$mail)
    {
        foreach (Usuario::$listaUsuarios as $value) {
            if ($value->_mail === $mail && $value->_clave === $clave) {
                return "VERIFICADO";
            } else {
                if ($value->_mail === $mail && $value->_clave !== $clave) {
                    return "ERROR EN LOS DATOS";
                } 
                return "USUARIO NO REGISTRADO";
            }
        }
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["clave"]) && isset($_POST["mail"])) {
        $clave = $_POST["clave"];
        $mail = $_POST["mail"];
    }
}

$respuesta = "Respuesta<br>clave {$clave}<br>mail {$mail}";
echo $respuesta;
echo "<br><br>";
$usuarioUno = new usuario("palmera123","carolingamgi@gmail.com");
$usuarioDos = new usuario("elgaturro","ahuitzcaracciolo@gmail.com");
foreach (Usuario::$listaUsuarios as $key => $value) {
    $value->ImprimirUsuario($value);
}
echo "<br><br>";
$retorno = Usuario::VerificarUsuario($clave,$mail);
echo $retorno;
?>