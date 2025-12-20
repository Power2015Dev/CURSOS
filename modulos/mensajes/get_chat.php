<?php
session_start();
require_once dirname(__DIR__, 2).'/Conexion.php';


if (!isset($_SESSION['usuario_id'])) {
    echo json_encode([]);
    exit();
}

$mi_id = $_SESSION['usuario_id'];

// voy a ser honesto, esta consulta es tan compleja que no la entiendo

$query = "
    SELECT 
        u.id, 
        u.nombre, 
        u.avatar_url,
        (SELECT mensaje FROM Mensajes 
         WHERE (emisor_id = u.id AND receptor_id = $mi_id) 
            OR (emisor_id = $mi_id AND receptor_id = u.id)
         ORDER BY fecha_envio DESC LIMIT 1) as ultimo_mensaje,
        (SELECT fecha_envio FROM Mensajes 
         WHERE (emisor_id = u.id AND receptor_id = $mi_id) 
            OR (emisor_id = $mi_id AND receptor_id = u.id)
         ORDER BY fecha_envio DESC LIMIT 1) as fecha_ultimo_mensaje
    FROM usuarios u
    WHERE u.id != ? -- No mostrarme a mí mismo
    ORDER BY fecha_ultimo_mensaje DESC -- Poner los chats más recientes arriba
";

$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $mi_id);
$stmt->execute();
$result = $stmt->get_result();

$contactos = [];

function tiempo_chat($fecha_mysql) {
    if(!$fecha_mysql) return "";
    $timestamp = strtotime($fecha_mysql);
    // Si es hoy, mostrar hora (10:16 p.m.)
    if (date('Y-m-d') == date('Y-m-d', $timestamp)) {
        return date('g:i a', $timestamp);
    } 
    // Si no, mostrar fecha
    return date('d/m/Y', $timestamp);
}

while($row = $result->fetch_assoc()){
    $contactos[] = [
        "id" => $row['id'],
        "nombre" => $row['nombre'],
        "avatar" => $row['avatar_url'],
        "last_message" => $row['ultimo_mensaje'] ?? "¡Saluda a tu nuevo contacto!",
        "time" => tiempo_chat($row['fecha_ultimo_mensaje'])
    ];
}

header('Content-Type: application/json');
echo json_encode($contactos);
?>