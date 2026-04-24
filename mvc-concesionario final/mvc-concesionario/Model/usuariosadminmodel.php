<?php
require_once '../config/conexion.php';

class UsuarioModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar();
    }

    public function obtenerUsuarios() {
        $stmt = $this->pdo->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarUsuario($datos) {
        $datos['contrasenia'] = password_hash($datos['contrasenia'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nombre, correo, contrasenia, rol) 
                VALUES (:nombre, :correo, :contrasenia, :rol)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($datos);
    }

    public function actualizarUsuario($datos) {
        $sql = "UPDATE usuarios SET nombre=:nombre, correo=:correo, contrasenia=:contrasenia, rol=:rol 
                WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($datos);
    }

    public function eliminarUsuario($id) {
        $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
