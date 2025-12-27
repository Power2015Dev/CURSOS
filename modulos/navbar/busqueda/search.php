<?php
    header('Content-Type: application/json');
    require_once dirname(__DIR__, 3) . '/Conexion.php';
    $filter = '';
    $order = '';
$datos = [];
if (!isset($_GET['search']) || trim($_GET['search']) === '') {
        echo json_encode(["error" => "No se recibio termino de busqueda o no hay nada"]);
        exit(); 
    }

    $search = '%' . $_GET['search'] . '%';
    $query = "SELECT cursos.titulo, cursos.id, cursos.imagen_url, cursos.precio, cursos.rating, cursos.resenas_count, cursos.usuario_id, usuarios.nombre, usuarios.avatar_url FROM cursos INNER JOIN usuarios ON cursos.usuario_id = usuarios.id WHERE titulo LIKE ? OR usuarios.nombre LIKE ? LIMIT 20;";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();

    while($fila = $result->fetch_assoc()){
        $datos[] = $fila;
    }

    echo json_encode($datos);

?>