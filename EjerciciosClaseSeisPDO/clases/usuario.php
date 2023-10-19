<?php
    include_once ".\db\accesoDatos.php";
class usuario{
    public $id;
    public $nombre;
    public $apellido;
    public $clave;
    public $mail;
    public $localidad;
    public $fechaDeRegistro;

    public function __construct()
    {
        
    }

    public function constructorParametros($nombre,$apellido,$clave,$mail,$localidad)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->localidad = $localidad;
    }

    public function constructorClaveMail($mail,$clave){
        $this->clave = $clave;
        $this->mail = $mail;
    }

    public function MostarDatos(){
        return "id {$this->id}<br>Nombre {$this->nombre}<br>Apellido {$this->apellido}<br>Clave {$this->clave}<br>Mail {$this->mail}<br>Localidad {$this->localidad}<br>Fecha de Regsitro {$this->fechaDeRegistro}";
    }

    public function InsertarUsuario(){
        $objetoAccsesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccsesoDatos->RetornarConsulta("INSERT INTO `usuarios`(`nombre`, `apellido`, `clave`, `mail`, `localidad`) 
        VALUES ('$this->nombre','$this->apellido','$this->clave','$this->mail','$this->localidad')");
        $consulta->execute();
        return $objetoAccsesoDatos->RetornarUltimoIdInsertado();
    }

    public function insertarUsuarioParametros(){
        $objetoAccsesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccsesoDatos->RetornarConsulta("INSERT INTO `usuarios`(`nombre`, `apellido`, `clave`, `mail`, `localidad`) 
        VALUES (:nombre,:apellido,:clave,:mail,:localidad)");
        $consulta->bindValue(':nombre',$this->nombre,PDO::PARAM_STR);
        $consulta->bindValue(':apellido',$this->apellido,PDO::PARAM_STR);
        $consulta->bindValue(':clave',$this->clave,PDO::PARAM_STR);
        $consulta->bindValue(':mail',$this->mail,PDO::PARAM_STR);
        $consulta->bindValue(':localidad',$this->localidad,PDO::PARAM_STR);
        $consulta->execute();
        return $objetoAccsesoDatos->RetornarUltimoIdInsertado();
    }

    public static function traerTodosLosUsuarios(){
        $objetoAccsesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccsesoDatos->RetornarConsulta("SELECT * FROM `usuarios`");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"usuario");
    }

    public static function TraerUnUsuario($id){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM `usuarios` WHERE id = $id");
        $consulta->execute();
        $usuarioBuscado = $consulta->fetchObject("usuario");
        return $usuarioBuscado;
    }

    public function modificarUsuario(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE `usuarios` 
        SET `nombre`='$this->nombre',`apellido`='$this->apellido',`clave`='$this->clave',`mail`='$this->mail',`localidad`='$this->localidad' 
        WHERE id = '$this->id'");
        return $consulta->execute();
    }

    public function modificarUsuarioParametros(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE `usuarios` 
        SET `nombre`= :nombre,`apellido`= :apellido,`clave`= :clave,`mail`= :mail,`localidad`= :localidad 
        WHERE id = :id");

        $consulta->bindValue(':id',$this->id,PDO::PARAM_INT);
        $consulta->bindValue(':clave',$this->clave,PDO::PARAM_STR);
        $consulta->bindValue(':nombre',$this->nombre,PDO::PARAM_STR);
        $consulta->bindValue(':apellido',$this->apellido,PDO::PARAM_STR);  
        $consulta->bindValue(':mail',$this->mail,PDO::PARAM_STR);
        $consulta->bindValue(':localidad',$this->localidad,PDO::PARAM_STR);
        return $consulta->execute();
    }

    public function borrarUsuario(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM `usuarios` 
        WHERE id = :id");

        $consulta->bindValue(':id',$this->id,PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->rowCount();
    }

    public function verificarUsuario($usuario){
        $usuarios = usuario::traerTodosLosUsuarios();

        foreach ($usuarios as  $value) {
            if ($usuario->mail === $value->mail && $usuario->clave === $value->clave) {
                return "VERIFICADO";
            } else {
                if ($usuario->clave != $value->clave) {
                    return "ERROR EN LOS DATOS";
                } else {
                    return "USUARIO NO REGISTRADO";
                }
            }
        }
    }

    public static function verificarUsuarioPorId($id){
        $usuarios = usuario::traerTodosLosUsuarios();
        $retorno = false;
        foreach ($usuarios as $value) {
            if ($value->id == $id) {
                $retorno = true;
            }
        }

        return $retorno;
    }


    public function retornarUsuarioEncontrado($usuario){
        $usuarios = usuario::traerTodosLosUsuarios();
        $flagEncontrado = false;
        foreach ($usuarios as  $value) {
            if ($usuario->mail === $value->mail && $usuario->clave === $value->clave) {
                $flagEncontrado = true;
                return $value;
            } 
        }

        if ($flagEncontrado == false) {
            return null;
        }
    }   
}
?>