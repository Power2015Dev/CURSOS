<?php

header('Content-Type: application/json');

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once dirname(__DIR__, 3).'/Conexion.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    echo json_encode(["error" => "No se recibio ID del curso"]);
    exit();
}


$query_side_bar = "SELECT c.id, c.titulo as titulo_curso, c.descripcion as descripcion_curso, c.imagen_url as imagen, l.titulo as titulo_leccion, l.descripcion as descripcion_leccion, l.lecciones, l.seccion, l.material, l.link_externo, l.id as id_leccion FROM cursos c INNER JOIN leccion l ON c.id = l.curso_id where c.id = ?";
$stmt = $conexion->prepare($query_side_bar);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();


    $filtro_curso = [];
while($fila = $result->fetch_assoc()){
    $id = $fila['id'];

    if(!isset($filtro_curso[$id])){
        $filtro_curso[$id] = ["id" => $id, "titulo_curso" => $fila['titulo_curso'], "descripcion_curso" => $fila['descripcion_curso'], "imagen" => $fila['imagen'], "lecciones" => []];
    }

    

    $filtro_curso[$id]["lecciones"][] = [
        "titulo" => $fila['titulo_leccion'],
        "descripcion" => $fila['descripcion_leccion'],
        "lecciones" => $fila['lecciones'],
        "seccion" => $fila['seccion'],
        "material" => $fila['material'],
        "link_externo" => $fila['link_externo'],
        "id_leccion" => $fila['id_leccion']
    ];
}

echo json_encode(array_values($filtro_curso)); // array_values devuelve un array sin los indices y lo vuelve un array asociativo empezando desde 0;

?>