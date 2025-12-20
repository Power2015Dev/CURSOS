<?php
session_start();
require_once dirname(__DIR__, 2).'/Conexion.php'; 

// 1. Validar sesión y parámetro ID
if (!isset($_SESSION['usuario_id']) || !isset($_GET['id'])) {
    echo json_encode([]);
    exit();
}

$mi_id = $_SESSION['usuario_id'];
$otro_id = $_GET['id'];

// 2. Query: Traeme los mensajes donde (YO soy emisor y ÉL receptor) O (ÉL es emisor y YO receptor)
$query = "SELECT emisor_id, mensaje, fecha_envio, leido 
          FROM Mensajes 
          WHERE (emisor_id = ? AND receptor_id = ?) 
             OR (emisor_id = ? AND receptor_id = ?)
          ORDER BY fecha_envio ASC"; // ASC: cronológico (lo viejo arriba)

$stmt = $conexion->prepare($query);
$stmt->bind_param("iiii", $mi_id, $otro_id, $otro_id, $mi_id);
$stmt->execute();
$result = $stmt->get_result();

$mensajes = [];

while($row = $result->fetch_assoc()){
    // Determinamos si el mensaje es "sent" (enviado por mi) o "received" (recibido)
    $tipo = ($row['emisor_id'] == $mi_id) ? 'sent' : 'received';
    
    // Formatear hora (ej: 10:15 p.m.)
    $hora = date('g:i a', strtotime($row['fecha_envio']));

    $mensajes[] = [
        "text" => $row['mensaje'],
        "type" => $tipo,
        "time" => $hora,
        "read" => $row['leido']
    ];
}

header('Content-Type: application/json');
echo json_encode($mensajes);
?>