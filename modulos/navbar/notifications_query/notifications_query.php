<?php
    require_once dirname(__DIR__, 3).'/Conexion.php'; 

    $query = "SELECT id, titulo, tipo, fecha_creacion FROM Notificaciones ORDER BY fecha_creacion DESC";
    
    if ($conexion) {
        $result = $conexion->query($query);
    } else {
        echo json_encode(["error" => "Error de conexión"]);
        exit();
    }

    $notificaciones = [];

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
            return "hace " . $dias . " días";
        } else {
            return date("d/m/Y", $fecha_tiempo); 
        }
    }

    if ($result) {
        while($fila = $result->fetch_assoc()){
            $texto_fecha = tiempo_transcurrido($fila['fecha_creacion']);
    
            $notificaciones[] = [
                "id" => $fila['id'],
                "Titulo" => $fila['titulo'],
                "Tipo" => $fila['tipo'],
                "fecha_formateada" => $texto_fecha 
            ];
        }
    }

    ob_clean(); 
    
    header('Content-Type: application/json');
    echo json_encode($notificaciones); 
?>