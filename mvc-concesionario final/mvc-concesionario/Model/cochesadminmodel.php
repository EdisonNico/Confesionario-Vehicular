<?php
require_once '../config/conexion.php';

class CocheModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar();
    }

    public function obtenerCoches() {
        $stmt = $this->pdo->query("SELECT * FROM coches");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarCoche($datos) {
        $sql = "INSERT INTO coches (marca, modelo, tipo, kilometraje, anio, precio, estatus) 
                VALUES (:marca, :modelo, :tipo, :kilometraje, :anio, :precio, :estatus)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($datos);
    }

    public function actualizarCoche($datos) {
        $sql = "UPDATE coches SET marca=:marca, modelo=:modelo, tipo=:tipo, kilometraje=:kilometraje, anio=:anio, precio=:precio, estatus=:estatus 
                WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($datos);
    }

    public function eliminarCoche($id) {
        $stmt = $this->pdo->prepare("DELETE FROM coches WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
