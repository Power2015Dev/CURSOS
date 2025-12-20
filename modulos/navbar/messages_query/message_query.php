<?php

    require_once dirname(__DIR__, 3).'/conexion.php';

    $query = "SELECT id, Nombre, Perfil_URL, Mensaje, fecha_envio FROM mensajes";
    $result = $conexion->query($query);

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
        // Si paso mas de una semana, mostramos la fecha normal
        return date("d/m/Y", $fecha_tiempo); 
    }
}

    while($fila = $result->fetch_assoc()){

        $texto_fecha = tiempo_transcurrido($fila['fecha_envio']);

        $mensajes[] = [
        "id" => $fila['id'],
        "nombre" => $fila['Nombre'],
        "mensaje" => $fila['Mensaje'],
        "perfil" => $fila['Perfil_URL'],
        "fecha_formateada" => $texto_fecha 
        ];
    }
    
    header('Content-Type: application/json');
    echo json_encode($mensajes); 
    //esto ya regresa un json con toda la informacion de la tabla


?>