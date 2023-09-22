<?php

use Usuario as GlobalUsuario;

class Usuario{
    public $_id;
    public $_nombre;
    public $_clave;
    public $_mail;
    public $_fechaDeRegistro;
    public static $listaDeUsuarios = [];

    public function __construct($id,$nombre,$clave,$mail,$fechaDeRegistro)
    {
        $this->_id = $id;
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
        $this->_fechaDeRegistro = $fechaDeRegistro;

        self::$listaDeUsuarios[] = $this;
    }

    public function ImprimirUsuario($usuario)
    {
        $usuarioString = "id {$usuario->_id}<br>nombre {$usuario->_nombre}<br>clave {$usuario->_clave}<br>mail {$usuario->_mail}<br>fecha de Registro {$usuario->_fechaDeRegistro}<br>";
        echo $usuarioString;
    }

    public static function ImprimirListaUsuarios()
    {
        foreach (Usuario::$listaDeUsuarios as  $value) {
            $value->ImprimirUsuario($value);
            echo "<br>";
        }
    }

    public static function GuardarListaUsuariosJSON(){
        $jsonUsuarios = json_encode(Usuario::$listaDeUsuarios);
        $archivo = fopen("usuarios.json","w");
        fwrite($archivo,$jsonUsuarios);
        fclose($archivo);
        echo $jsonUsuarios; 
    }
}
?>