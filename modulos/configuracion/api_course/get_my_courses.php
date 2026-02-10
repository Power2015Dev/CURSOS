<?php
header('Content-Type: application/json');

if(session_status() === PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION['usuario_id'])){
    header("Location: ../../../dashboard/dashboard.php");
    exit();
}

if(isset($_GET['id'])){
    $id_usuario = $_GET['id'];
}
else{
    echo json_encode(['error' => 'Faltan parametros']);
    exit();
}

require_once dirname(__DIR__, 3).'/Conexion.php';
$courseData = null;


$query = 'SELECT c.*, e.usuario_id AS id_user_buy, e.curso_id AS course_id_buy, (SELECT MIN(id) FROM leccion WHERE curso_id = c.id) AS first_lesson_id FROM cursos c INNER JOIN compras e ON c.id = e.curso_id WHERE e.usuario_id = ?';
$stmt = $conexion->prepare($query);
$stmt->bind_param('i', $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

while($fila = $result->fetch_assoc()){
    $course[] = $fila;
  
}
echo json_encode($course);



// $query = "SELECT MIN(l.id) AS leccion_id, c.id, c.titulo, c.imagen_url FROM cursos c INNER JOIN leccion l ON l.curso_id = c.id WHERE c.id = ? GROUP BY c.id, c.titulo, c.imagen_url";
// $stmt = $conexion->prepare($query);
// $stmt->bind_param("i", $id_curso);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows > 0) {
//     $course[] = $result->fetch_assoc();

// } else {
//     echo json_encode(['error' => 'Curso no encontrado']);
// }

// echo json_encode($course);


?>