<?php
require_once '../config/conexion.php';

class UsuarioModelo {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar(); // Asegúrate de que sea "Conexion" con mayúscula inicial
    }

    public function insertar($username, $correo, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre, correo, contrasenia) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $correo, $password]);
    } 
}
?>