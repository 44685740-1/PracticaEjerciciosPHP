<?php
    require_once "./models/usuario.php";

    class usuarioController{

        public function InsertarUsuario($nombre,$apellido,$clave,$mail,$localidad){
            $usuario = new Usuario();
            $usuario->nombre = $nombre;
            $usuario->apellido = $apellido;
            $usuario->clave = $clave;
            $usuario->mail = $mail;
            $usuario->localidad = $localidad;
            return $usuario->insertarUsuarioParametros();
        }

        public function modificarUsuario($id,$nombre,$apellido,$clave,$mail,$localidad){
            $usuario = new Usuario();
            $usuario->id = $id;
            $usuario->nombre = $nombre;
            $usuario->apellido = $apellido;
            $usuario->clave = $clave;
            $usuario->mail = $mail;
            $usuario->localidad = $localidad;
            return $usuario->modificarUsuarioParametros();
        }

        public function borrarUsuario($id){
            $usuario = new Usuario();
            $usuario->id = $id;
            return $usuario->borrarUsuario();
        }

        public function listarUsuarios(){
            return usuario::traerTodosLosUsuarios();
        }

        public function buscarUsuarioPorId($id){
            $retorno = usuario::TraerUnUsuario($id);
            if($retorno === false) { // Validamos que exista y si no mostramos un error
                $retorno =  ['error' => 'No existe ese id'];
            }
            return $retorno;
        }
    }
?>