<?php
include_once "claseUsuario.php";
//valido los parametros de usuarios recibidos por POST, el metodo ya esta validado en el index
if (isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"])) {
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
}

$id = random_int(1,10000);

date_default_timezone_set("America/Argentina/Buenos_Aires");
$fechaRegistro = date('Y-m-d H:i:s');
$usuarioUno = new Usuario($id,$nombre,$clave,$mail,$fechaRegistro);
$usuarioDos = new Usuario(123,"fran","palmeras123","francara@gmial.com",$fechaRegistro);
Usuario::GuardarListaUsuariosJSON();

$carpeta_archivos = 'UsuariosFotos/';

// Datos del arhivo enviado por POST
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tamano_archivo = $_FILES['archivo']['size'];

// Ruta destino, carpeta + nombre del archivo que quiero guardar
$ruta_destino = $carpeta_archivos . $nombre_archivo;

// Realizamos las validaciones del archivo
if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 100000))) {
   	echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
}else{
   	if (move_uploaded_file($_FILES['archivo']['tmp_name'],  $ruta_destino)){
      		echo "El archivo ha sido cargado correctamente.";
   	}else{
      		echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
   	}
}

?>