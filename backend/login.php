<?php
    session_start();
    require_once 'conexion.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        
        $stmt = $conexion->prepare("SELECT id, usuario FROM usuarios WHERE usuario = ? AND clave = ?");
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado->num_rows > 0){
            $fila = $resultado->fetch_assoc();
            $_SESSION['usuario_id'] = $fila['id'];
            $_SESSION['usuario_nombre'] = $fila['nombre'];
            header("Location: ../frontend/dashboard.html");
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos";
            header("Location: ../frontend/login.html?error=" . urlencode($error));
            exit();
        }
?>