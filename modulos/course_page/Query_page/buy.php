<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../../dashboard/dashboard.php");
    exit();
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$usuario_id = $_SESSION['usuario_id'] ?? null;
$curso_id = $data['id_curso'] ?? null;

if($usuario_id == null || $curso_id == null){
    http_response_code(400);
    echo json_encode(["error" => "Faltan campos obligatorios"]);
    exit();
}

require_once dirname(__DIR__, 3) . '/Conexion.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
   $query = "INSERT INTO compras (usuario_id, curso_id) VALUES (?, ?)";
$stmt = $conexion->prepare($query);
$stmt->bind_param("ii", $usuario_id, $curso_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    http_response_code(200);
    echo json_encode(["mensaje" => "Compra realizada con éxito"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Error al realizar la compra"]);
}


} catch (Exception $e) {
    http_response_code(409);
    echo json_encode(["error" => "Posiblemente ya has comprado este curso"]);
    exit();
}





?>