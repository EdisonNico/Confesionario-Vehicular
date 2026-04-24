<?php
require_once '../model/registromodel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($correo) && !empty($password)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $modelo = new UsuarioModelo();
        $resultado = $modelo->insertar($username, $correo, $password_hash);

        if ($resultado) {
            header("Location: ../public/Login.html");
        } else {
            echo "Error al registrar el usuario.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
?>