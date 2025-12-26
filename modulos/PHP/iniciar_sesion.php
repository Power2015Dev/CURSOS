<?php
session_start();

require_once dirname(__DIR__, 2) . '/Conexion.php'; 


$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$pass_ingresada = $data['pass'];


$query = "SELECT id, nombre, avatar_url, password FROM usuarios WHERE email = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $email); // para prevenir una injeccion SQL
$stmt->execute();
$resultado = $stmt->get_result();

if ($fila = $resultado->fetch_assoc()) {
    
    if (password_verify($pass_ingresada, $fila['password'])) {
        session_regenerate_id(true);
       
        $_SESSION['usuario_id'] = $fila['id'];
        $_SESSION['usuario_nombre'] = $fila['nombre'];
        $_SESSION['usuario_img'] = $fila['avatar_url'];
        
        http_response_code(200);
        echo json_encode(["mensaje" => "Bienvenido", "pass" => $fila['password']]);
        
    } else {
        
        http_response_code(401);
        echo json_encode(["error" => "Contraseña incorrecta"]);
    }
} else {
    
    http_response_code(401);
    echo json_encode(["error" => "El correo no está registrado"]);
}
?>