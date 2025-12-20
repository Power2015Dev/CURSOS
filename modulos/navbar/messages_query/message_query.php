<?php
    session_start(); 

    require_once dirname(__DIR__, 3).'/Conexion.php'; 

    if (!isset($_SESSION['usuario_id'])) {
        echo json_encode([]); 
        exit();
    }

    $mi_id = $_SESSION['usuario_id'];

    // --- CORRECCIÓN CLAVE ---
    // Usamos una SUB-CONSULTA (Lo que está entre paréntesis)
    // 1. Buscamos el ID máximo (MAX(id)) agrupado por cada emisor.
    // 2. Le decimos a la tabla principal: "Solo tráeme los mensajes que coincidan con esos IDs".
    
    $query = "SELECT 
                m.id, 
                m.mensaje, 
                m.fecha_envio, 
                u.nombre, 
                u.avatar_url 
              FROM Mensajes m
              INNER JOIN usuarios u ON m.emisor_id = u.id
              WHERE m.id IN (
                  SELECT MAX(id) 
                  FROM Mensajes 
                  WHERE receptor_id = ? 
                  GROUP BY emisor_id
              )
              ORDER BY m.fecha_envio DESC";

    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $mi_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $mensajes = [];

    function tiempo_transcurrido($fecha_mysql) {
        $ahora = time();
        $fecha_tiempo = strtotime($fecha_mysql);
        $diferencia = $ahora - $fecha_tiempo;
    
        if ($diferencia < 60) {
            return "hace unos seg";
        } elseif ($diferencia < 3600) {
            $minutos = round($diferencia / 60);
            return "hace " . $minutos . " min";
        } elseif ($diferencia < 86400) {
            $horas = round($diferencia / 3600);
            return "hace " . $horas . " h";
        } elseif ($diferencia < 172800) { 
            return "hace 1 día";
        } elseif ($diferencia < 604800) {
            $dias = round($diferencia / 86400);
            return "hace " . $dias . " dias";
        } else {
            return date("d/m/Y", $fecha_tiempo); 
        }
    }

    while($fila = $result->fetch_assoc()){
        $texto_fecha = tiempo_transcurrido($fila['fecha_envio']);

        $mensajes[] = [
            "id" => $fila['id'],
            "nombre" => $fila['nombre'],         
            "mensaje" => $fila['mensaje'],
            "perfil" => $fila['avatar_url'],     
            "fecha_formateada" => $texto_fecha 
        ];
    }
    
    ob_clean();
    header('Content-Type: application/json');
    echo json_encode($mensajes); 
?>