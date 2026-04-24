<?php
require_once '../Model/cochesadminmodel.php';

$coches = new CocheModel();

$accion = $_GET['accion'] ?? '';

switch ($accion) {
    case 'listar':
        echo json_encode($coches->obtenerCoches());
        break;

    case 'agregar':
        $data = json_decode(file_get_contents("php://input"), true);
        echo json_encode($coches->agregarCoche($data));
        break;

    case 'actualizar':
        $data = json_decode(file_get_contents("php://input"), true);
        echo json_encode($coches->actualizarCoche($data));
        break;

    case 'eliminar':
        $id = $_GET['id'] ?? 0;
        echo json_encode($coches->eliminarCoche($id));
        break;

    default:
        echo json_encode(["error" => "Acción no válida"]);
        break;
}
?>
