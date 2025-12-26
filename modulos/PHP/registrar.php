<?php
require_once dirname(__DIR__, 2) . '/Conexion.php'; 

header('Content-Type: application/json');


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$data = json_decode(file_get_contents("php://input"), true);
$nombre = $data['user'];
$email = $data['email'];
$pass_ingresada = $data['pass'];
$telefono = $data['phone'];

if (empty($nombre) || empty($email) || empty($pass_ingresada)) {
    http_response_code(400);
    echo json_encode(["error" => "Todos los campos son obligatorios"]);
    exit;
}

try {
    $query = "INSERT INTO usuarios (nombre, email, password, telefono) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);


    $password_encriptada = password_hash($pass_ingresada, PASSWORD_DEFAULT);

    $stmt->bind_param("ssss", $nombre, $email, $password_encriptada, $telefono);
    
   
    $stmt->execute();

  
    if ($stmt->affected_rows > 0) {
        http_response_code(200);
        echo json_encode(["success" => "Usuario registrado con éxito"]);
    } else {

        throw new Exception("La base de datos no reportó cambios.");
    }

} catch (mysqli_sql_exception $e) {

    if ($e->getCode() == 1062) { 
        http_response_code(409);
        echo json_encode(["error" => "El correo electrónico ya está registrado"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Error SQL: " . $e->getMessage()]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Error interno: " . $e->getMessage()]);
} finally {
    if (isset($stmt)) $stmt->close();
    $conexion->close();
}
?>