<?php
require_once '../Model/usuariosadminmodel.php';

$usuario = new UsuarioModel();

$accion = $_GET['accion'] ?? '';

switch ($accion) {
    case 'listar':
        echo json_encode($usuario->obtenerUsuarios());
        break;

    case 'agregar':
        $data = json_decode(file_get_contents("php://input"), true);
        echo json_encode($usuario->agregarUsuario($data));
        break;

    case 'actualizar':
        $data = json_decode(file_get_contents("php://input"), true);
        echo json_encode($usuario->actualizarUsuario($data));
        break;

    case 'eliminar':
        $id = $_GET['id'] ?? 0;
        echo json_encode($usuario->eliminarUsuario($id));
        break;

    default:
        echo json_encode(["error" => "Acción no válida"]);
        break;
}
?>