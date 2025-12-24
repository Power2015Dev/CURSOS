<?php
session_start();
header('Content-Type: application/json');

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    echo json_encode(["error" => "No se recibió ID del curso"]);
    exit();
}


require_once dirname(__DIR__, 3) . '/Conexion.php'; 


$query_curso = "SELECT 
            c.*, 
            u.nombre as autor_nombre, 
            u.avatar_url as autor_avatar,
            u.pais as autor_pais,  
            u.fecha_registro
          FROM cursos c 
          INNER JOIN usuarios u ON c.usuario_id = u.id 
          WHERE c.id = ?";

$stmt = $conexion->prepare($query_curso);
$stmt->bind_param("i", $id);
$stmt->execute();
$res_principal = $stmt->get_result();


$datos_curso = $res_principal->fetch_assoc();

if(!$datos_curso){
    echo json_encode(["error" => "Curso no encontrado"]);
    exit();
}


$datos_curso['img_url_arr'] = [];
$datos_curso['video_url_arr'] = [];

$query_galeria = "SELECT ruta_archivo, tipo FROM curso_galeria WHERE curso_id = ?";
$stmt_galeria = $conexion->prepare($query_galeria);
$stmt_galeria->bind_param("i", $id);
$stmt_galeria->execute();
$res_galeria = $stmt_galeria->get_result(); 

while($media = $res_galeria->fetch_assoc()){
    // Aquí llenamos los arrays que creamos arriba
    if($media['tipo'] === 'imagen'){
        $datos_curso['img_url_arr'][] = $media['ruta_archivo'];
    } elseif($media['tipo'] === 'video'){
        $datos_curso['video_url_arr'][] = $media['ruta_archivo'];
    }
}


$datos_curso['FAQs'] = []; // Inicializamos array vacio

$query_faq = "SELECT pregunta, respuesta FROM curso_faqs WHERE curso_id = ? ORDER BY orden ASC";
$stmt_faq = $conexion->prepare($query_faq);
$stmt_faq->bind_param("i", $id);
$stmt_faq->execute();
$res_faq = $stmt_faq->get_result();

while($faq = $res_faq->fetch_assoc()){
    $datos_curso['FAQs'][] = $faq;
}


$datos_curso['other_courses'] = []; // esto es para el carrusel

$query_other = "SELECT c.id, c.titulo, c.resenas_count, c.imagen_url, c.precio, c.rating, u.nombre AS author_name, u.avatar_url AS author_url FROM cursos c INNER JOIN usuarios u ON c.usuario_id = u.id";
$stmt_other = $conexion->prepare($query_other);
$stmt_other->execute();
$res_other = $stmt_other->get_result();

while($other = $res_other->fetch_assoc()){
    $datos_curso['other_courses'][] = $other;
}

// Enviamos el array completo 
echo json_encode($datos_curso);
?>