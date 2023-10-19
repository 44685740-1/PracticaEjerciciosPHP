<?php
//require_once 'clases/usuario.php';

//$usuarioController = new usuarioController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'listar':
                include "./acciones/listar.php";
                // $cds = $usuarioController->listarUsuarios();
                // echo json_encode($cds);
                break;
            case 'buscarPorId':
                if (isset($_GET['id'])) {
                    $cd = $usuarioController->buscarUsuarioPorId($_GET['id']);
                    echo json_encode($cd);
                } else {
                    echo json_encode(['error' => 'Falta el parametro id']);
                }
                break;
        }
    } else {
        echo json_encode(['error' => 'Falta el parametro action']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'insertar':
                if (isset($_POST['titulo']) && isset($_POST['cantante']) && isset($_POST['anio'])) {
                    //$resultado = $usuarioController->InsertarUsuario($_POST['titulo'], $_POST['cantante'], $_POST['anio']);
                    echo json_encode(['resultado' => $resultado]);
                } else {
                    echo json_encode(['error' => 'Faltan parámetros']);
                }
                break;
            case 'registro':
                include "./acciones/registro.php";
                break;
            case 'login':
                include "./acciones/login.php";
                break;
            case 'altaProducto':
                include "./acciones/altaProducto.php";
                break;
            case 'modificacionUsuario':
                include "./acciones/modificacionUsuario.php";
                break;
            case 'realizarVenta':
                include "./acciones/realizarVenta.php";
                break;
            default:
                echo json_encode(['error' => 'Accion no valida']);
                break;
        }
    } else {
        echo json_encode(['error' => 'Falta el parametro action']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $putData);

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'modificar':
                if (isset($putData['id']) && isset($putData['titulo']) && isset($putData['cantante']) && isset($putData['anio'])) {
                    //$resultado = $usuarioController->modificarUsuario($putData['id'], $putData['titulo'], $putData['cantante'], $putData['anio']);
                    echo json_encode(['resultado' => $resultado]);
                } else {
                    echo json_encode(['error' => 'Faltan parametros']);
                }
                break;
            default:
                echo json_encode(['error' => 'Accion no valida']);
                break;
        }
    } else {
        echo json_encode(['error' => 'Falta el parametro action']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'borrar':
                if (isset($_GET['id'])) {
                    $resultado = $usuarioController->borrarUsuario($_GET['id']);
                    echo json_encode(['resultado' => $resultado]);
                } else {
                    echo json_encode(['error' => 'Falta el parametro id']);
                }
                break;
            default:
                echo json_encode(['error' => 'Accion no valida']);
                break;
        }
    } else {
        echo json_encode(['error' => 'Falta el parametro action']);
    }
} else {
    echo json_encode(['error' => 'Metodo HTTP no permitido']);
}
?>