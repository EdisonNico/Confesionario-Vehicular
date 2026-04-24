<?php
session_start();
require_once '../config/conexion.php'; // Asegúrate que esta ruta sea correcta

$conexion = Conexion::conectar();

$correo = trim($_POST['correo'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($correo && $password) {
    try {
        // Incluye también el rol en la consulta
        $stmt = $conexion->prepare("SELECT id, nombre, correo, contrasenia, rol FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if (password_verify($password, $usuario['contrasenia'])) {
                // Guardar datos en sesión
                $_SESSION['usuario'] = $usuario['nombre'];
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['rol'] = $usuario['rol'];

                // Redirigir según el rol
                if ($usuario['rol'] === 'admin') {
                    header("Location: ../Public/admin.html");
                    exit();
                } elseif ($usuario['rol'] === 'Cliente') {
                    header("Location: ../Public/_Principal.html");
                    exit();
                } else {
                    echo "⚠️ Rol no reconocido.";
                }
            } else {
                echo "⚠️ Contraseña incorrecta.";
            }
        } else {
            echo "⚠️ Correo no registrado.";
        }

    } catch (PDOException $e) {
        echo "❌ Error en la base de datos: " . $e->getMessage();
    }
} else {
    echo "⚠️ Por favor, completa todos los campos.";
}
?>
