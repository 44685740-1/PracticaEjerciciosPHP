<?php
// Error Handling
error_reporting(-1);
ini_set('display_errors', 1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;


require_once "./models/usuario.php";
require_once "./controllers/usuarioController.php";



require __DIR__ . '/../vendor/autoload.php';

// Instantiate App
$app = AppFactory::create();

//comando de consola para abrilo en el puerto 8080
//php -S localhost:8080 -t app


// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add parse body
$app->addBodyParsingMiddleware();

// Routes
$app->post('/crearUsuario', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $clave = $data['clave'];
    $mail = $data['mail'];
    $localidad = $data['localidad'];

    $usuario = new usuario();
    $usuario->constructorParametros($nombre,$apellido,$clave,$mail,$localidad);

    $usuarioController = new usuarioController();
    $respuesta = $usuarioController->InsertarUsuario($nombre,$apellido,$clave,$mail,$localidad);
    //retorno el id del usuario Ingresado
    $respuestaJson = json_encode(['resultado' => $respuesta]);
    $payload = json_encode($respuestaJson);
    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json');
});


$app->get('/usuarios', function (Request $request, Response $response) {
    $usuarioController = new usuarioController();
    $listaUsuarios = $usuarioController->listarUsuarios();
    $payload = json_encode($listaUsuarios);
    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json');
});


$app->get('/usuarios/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $usuario = usuario::TraerUnUsuario($id);
    if ($usuario != false) {
        $payload = json_encode($usuario);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    } else {
        $mensajeError = json_encode(array('Error' => 'Usuario No encontrado'));
        $response->getBody()->write($mensajeError);
        return $response->withHeader('Content-Type', 'application/json');
    }
});

$app->post('/modificarUsuario/{id}', function (Request $request, Response $response,array $args) {
    $data = $request->getParsedBody();
    $id = $args['id'];
    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $clave = $data['clave'];
    $mail = $data['mail'];
    $localidad = $data['localidad'];
    
    $usuario = usuario::TraerUnUsuario($id);
    if ($usuario != false) {
        $usuarioController = new usuarioController();
        $resultado = $usuarioController->modificarUsuario($id,$nombre,$apellido,$clave,$mail,$localidad);
        $payload = json_encode(array("Resultado Modificar" => $resultado));
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    } else {
        $mensajeError = json_encode(array('Error' => 'Usuario No encontrado'));
        $response->getBody()->write($mensajeError);
        return $response->withHeader('Content-Type', 'application/json');
    }
});

$app->delete('/usuario/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $usuarioController = new usuarioController();
    $retorno = $usuarioController->borrarUsuario($id);
    $payload = json_encode(array('Respueta Eliminar' => "$retorno"));
    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json');
});


$app->run();
