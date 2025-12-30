<?php

require_once dirname(__DIR__, 3).'/Conexion.php';

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../../../dashboard/dashboard.php");
    exit();
}

$id = $_SESSION['usuario_id']; // id de la sesion actual activa

$data = $_POST;

$foto_perfil = $_FILES['avatar'] ?? null;
$usuario_nombre = $data['nombre'] ?? null;
$pais = $data['pais'] ?? null;

$atributos = [];
$param_bind = "";
$parametros_disponibles = [];

if(!empty($_FILES['avatar']['name'])){
    //esta funcion se encarga de subir la imagen al servidor
    $parametros_disponibles[] = upload_image($id, $conexion);// y devuelve la ruta de la nueva imagen

    $atributos[] = "avatar_url = ?"; 
    $param_bind .= "s"; 
    
}

if(!empty($usuario_nombre)){
    $atributos[] = "nombre = ?"; // dinamico en la query
    $param_bind .= "s"; // esto se concatena con los demas dependiendo de cuantos campos se insertaron
    $parametros_disponibles[] = $_POST['nombre'];// lo mismo pero esto se usa como parametro para el param_bind
}

if(!empty($pais)){
    $atributos[] = "pais = ?";
    $param_bind .= "s";
    $parametros_disponibles[] = $_POST['pais'];
}

if(empty($atributos)){
    http_response_code(400);
    echo json_encode(["error" => "No se proporcionaron datos para actualizar"]);
    exit();
}

$parametros_disponibles[] = $id;

$query = "UPDATE usuarios SET " . implode(", ", $atributos) . " WHERE id = ?"; // implode convierte un array en un string y los separa con ,
$stmt = $conexion->prepare($query);
$stmt->bind_param($param_bind . "i", ...$parametros_disponibles); // tambien funciona hacer $parametros_disponibles[0],[1]...
if ($stmt->execute()) {
    
    if ($stmt->affected_rows > 0) {// esto es para ver la cantidad de filas afectadas si hay mas de 0 es que todo funciono
        
        // estoy actualizando la sesion para que los cambios se reflejen
        if (!empty($_POST['nombre'])) {
            $_SESSION['usuario_nombre'] = $_POST['nombre'];
        }
        
        // Buscamos la ruta de la imagen en nuestro array de parametros para la sesión
        // el indice 0 porque siempre puse que el avatar estara en la primera posicion
        if (!empty($_FILES['avatar']['name'])) {
            $_SESSION['usuario_img'] = $parametros_disponibles[0];
        }

        http_response_code(200);
        echo json_encode(["success" => "Perfil actualizado correctamente"]);
    } 
    

} else {
    // Si execute() devuelve false, hubo un error real de SQL
    http_response_code(500);
    echo json_encode(["error" => "Error crítico al guardar en la base de datos"]);
}



function upload_image($id, $conexion){
    if(isset($_FILES) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK){ // UPLOAD_ERR_OK = 0
        $directorio_destino = dirname(__DIR__, 3) . "/Course_media/profile_images/"; // Ruta fisica
        if(!file_exists($directorio_destino)){
        mkdir($directorio_destino, 0777, true); // Crea el directorio de destino si no existe la crea con permisos 0777 (escritura y lectura total)
        }

        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION); 
        //el uso de uniqid es unicamente por el cache del navegador
        // y no remplazar la imagen cuando cargen una nueva 
        //sino todo esto se simplificaria
        $nombre_archivo = "user_" . $id . uniqid() . "." . $extension; // uniqid() genera un identificador unico 
        $ruta_archivo = $directorio_destino . $nombre_archivo;

        if(move_uploaded_file($_FILES['avatar']['tmp_name'], $ruta_archivo)){ // tmp_name es la ruta temporal del archivo
            // IMPORTANTE la ruta es totalmente relativa a la web no sirve como una ruta fisica    
            $ruta_web[] = "/Course_media/profile_images/" . $nombre_archivo;
        }
        else{
            echo json_encode(["error" => "Error al subir la imagen"]);
            exit();
        }

        $query = "SELECT avatar_url FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($fila = $result->fetch_assoc()){
            $avatar = $fila['avatar_url'];
            if($avatar && $avatar !== '/imagenes/dashboard_img/perfil.png'){ // esto es para no borrar el avatar por defecto
                $locacion = dirname(__DIR__, 3) . $avatar; // aqui si busco la ruta fisica
                if(file_exists($locacion)){
                unlink($locacion);
                }
            }
        }

       return $ruta_web[0];

    }
}


?>