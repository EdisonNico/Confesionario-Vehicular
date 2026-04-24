<?php
require_once '../config/conexion.php';

class cochesModelo {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar(); // Asegúrate de que sea "Conexion" con mayúscula inicial
    }

    public function obtenerCoches(){
        $stmt = $this->pdo->query("SELECT id, marca, modelo, tipo, kilometraje, anio, precio FROM coches");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }   
}
?>