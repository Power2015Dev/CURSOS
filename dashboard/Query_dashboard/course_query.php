<?php
    header('Content-Type: application/json');
    require_once dirname(__DIR__, 2).'/conexion.php';

    $query = "SELECT c.id, c.titulo, c.descripcion, c.imagen_url, c.precio, c.rating, c.resenas_count, u.nombre AS author_name FROM cursos c INNER JOIN usuarios u ON c.usuario_id = u.id";
    $result = $conexion->query($query);

    $cursos = [];

    while($fila = $result->fetch_assoc()){
        $cursos[] = $fila;
    }
    
    
    echo json_encode($cursos); 
    //esto ya regresa un json con toda la informacion de la tabla


?>