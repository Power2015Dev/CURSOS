<?php
session_start();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
else{
    echo "No se recibió ID del curso";
    exit();
}
require_once dirname(__DIR__, 2) . '/Conexion.php';

$query = "SELECT * FROM cursos where id = ".$id;
$stmt = $conexion->prepare($query);
$stmt->execute();
$resultado = $stmt->get_result();

if ($fila = $resultado->fetch_assoc()) {
    header('Content-Type: application/json');
    echo json_encode($fila); 
}
else {
    echo json_encode(["error" => "Curso no encontrado"]);
}

?>