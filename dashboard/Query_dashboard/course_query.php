<?php

    require_once dirname(__DIR__,2).'/conexion.php';

    $query = "SELECT id, titulo, autor, resenas_count, imagen_url, precio, rating FROM cursos";
    $result = $conexion->query($query);

    $cursos = [];

    while($fila = $result->fetch_assoc()){
        $cursos[] = $fila;
    }
    
    header('Content-Type: application/json');
    echo json_encode($cursos); 
    //esto ya regresa un json con toda la informacion de la tabla


?>