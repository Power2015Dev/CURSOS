<?php

header('Content-Type: application/json');

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../../../dashboard/dashboard.php");
    exit();
}

require_once dirname(__DIR__, 3).'/Conexion.php';

$id = $_SESSION['usuario_id']; // id de la sesion actual activa

$query = "SELECT nombre, avatar_url, pais, email FROM usuarios WHERE id = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

while($fila = $result->fetch_assoc()){
    if($fila['pais']) $fila['pais'] = ucfirst($fila['pais']);
    $datos = $fila;
}

echo json_encode($datos);

?>