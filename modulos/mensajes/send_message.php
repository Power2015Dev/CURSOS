<?php
session_start();
require_once dirname(__DIR__, 2).'/Conexion.php';

// 1. Validar sesión
if (!isset($_SESSION['usuario_id'])) {
    http_response_code(401);
    echo json_encode(["error" => "No autorizado"]);
    exit();
}

// 2. Leer el JSON que envía Javascript
$input = json_decode(file_get_contents('php://input'), true);

$emisor_id = $_SESSION['usuario_id'];
$receptor_id = $input['receptor_id'];
$mensaje = $input['mensaje'];

if (empty($mensaje) || empty($receptor_id)) {
    echo json_encode(["error" => "Datos vacíos"]);
    exit();
}

// 3. Insertar en la BD
$query = "INSERT INTO Mensajes (emisor_id, receptor_id, mensaje, fecha_envio) VALUES (?, ?, ?, NOW())";
$stmt = $conexion->prepare($query);
$stmt->bind_param("iis", $emisor_id, $receptor_id, $mensaje);

if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["error" => "Error al guardar"]);
}
?>