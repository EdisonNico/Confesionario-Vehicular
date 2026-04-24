<?php
class Conexion {
    public static function conectar() {
        $servidor = "localhost";
        $usuario = "root";
        $clave = "";
        $basededatos = "ae"; // nombre correcto en minúscula (verifica si es "ae" o "AE")

       try {
            $pdo = new PDO("mysql:host=$servidor;port=3307 ; dbname=$basededatos;charset=utf8", $usuario, $clave);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión PDO: " . $e->getMessage());
        }
    }
}
?>