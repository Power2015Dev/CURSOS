<?php



if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../../../../dashboard/dashboard.php");
    exit();
}

//y yo que pensaba que el backend me encantaba, pero esto es el infierno en persona

header('Content-Type: application/json');

include_once dirname(__DIR__, 4).'/Conexion.php';

$conexion->begin_transaction();

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$miniatura = $_FILES['miniatura']; // esto es un file
$id = $_SESSION['usuario_id'];
$checkbox_violencia = isset($_POST['violencia']) ? 1 : 0;
$checkbox_principiante = isset($_POST['principiante']) ? 1 : 0;
$checkbox_certificado = isset($_POST['certificado']) ? 1 : 0;
$checkbox_pratico = isset($_POST['pratico']) ? 1 : 0;
$galeria_media = $_FILES['galeria']; // esto es un array de files
$FAQ['pregunta'][] = $_POST['FAQ1'] ?? null;
$FAQ['respuesta'][] = $_POST['FAQ1_R'] ?? null;
$FAQ['pregunta'][] = $_POST['FAQ2'] ?? null;
$FAQ['respuesta'][] = $_POST['FAQ2_R'] ?? null;
$FAQ['pregunta'][] = $_POST['FAQ3'] ?? null;
$FAQ['respuesta'][] = $_POST['FAQ3_R'] ?? null;
$FAQ['pregunta'][] = $_POST['FAQ4'] ?? null;
$FAQ['respuesta'][] = $_POST['FAQ4_R'] ?? null;
$FAQ['pregunta'][] = $_POST['FAQ5'] ?? null;
$FAQ['respuesta'][] = $_POST['FAQ5_R'] ?? null;
$seccion = $_POST['nombre_modulo'];
$titulo_leccion = $_POST['titulo_leccion'];
$desc_leccion = $_POST['desc_leccion'];
$leccion_video = $_FILES['video_source']; // tambien un file
$material_source = $_FILES['material_source'] ?? null; // me olvidaba de que esto es un array file
$link_externo = $_POST['link_externo'] ?? null;
$categoria = $_POST['categoria'] ?? null;
$mensaje_bienvenida = $_POST['mensaje_bienvenida'] ?? null;
$precio = $_POST['precio'];
$dificultad = $_POST['dificultad'] ?? null;
$redes = $_POST['redes'] ?? null;


if(empty($miniatura) || empty($leccion_video)){
    http_response_code(400);
    echo json_encode(["error" => "Faltan campos obligatorios (los videos y la miniatura)"]);
    exit();
}




try{
    
    //cursos
    $query_cursos = "INSERT INTO cursos(titulo, descripcion, imagen_url, precio, usuario_id, mensaje_bienvenida) VALUES (?, ?, NULL, ?, ?, ?)"; 
    $stmt_curso = $conexion->prepare($query_cursos);
    $stmt_curso->bind_param("ssdis", $titulo, $descripcion, $precio, $id, $mensaje_bienvenida);


    if (!$stmt_curso->execute()) {
        throw new Exception("Error SQL al crear curso: " . $stmt_curso->error);
    }

    
    $curso_id = $conexion->insert_id;
    $ruta_media = upload_media($curso_id);

    // actualizar la miniatura
    $query_update = "UPDATE cursos SET imagen_url = ? WHERE id = ?";
    $stmt_update = $conexion->prepare($query_update);
    $stmt_update->bind_param("si", $ruta_media['ruta_miniatura'], $curso_id);
    
    if (!$stmt_update->execute()) {
        throw new Exception("Error al actualizar la miniatura del curso.");
    }

    //checkbox

    $query_checkbox = "INSERT INTO filtros_generales_cursos(cursos_id, violencia, conocimiento, certificado, proyectos_practicos) VALUES (?, ?, ?, ?, ?)";
    $stmt_checkbox = $conexion->prepare($query_checkbox);
    $stmt_checkbox->bind_param("iiiii", $curso_id, $checkbox_violencia, $checkbox_principiante, $checkbox_certificado, $checkbox_pratico);
    
    if (!$stmt_checkbox->execute()) {
        throw new Exception("Error al crear el checkbox: " . $stmt_checkbox->error);
    }



    $type = "";
    //curso_galeria
    for($i = 0; $i < count($ruta_media['galeria']); $i++){
        if(isset($ruta_media['galeria'][$i])){
            
        
            if(pathinfo($_FILES['galeria']['name'][$i], PATHINFO_EXTENSION) == "mp4"){
                $type = "video";
            }
            else{
                $type = "imagen";
            }
            $orden_galeria = $i + 1;
            $query = "INSERT INTO curso_galeria (curso_id, ruta_archivo, tipo, orden) VALUES (?, ?, ?, ?)";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("issi", $curso_id, $ruta_media['galeria'][$i], $type, $orden_galeria);
     

            if (!$stmt->execute()) {
                throw new Exception("Error al crear la galeria: " . $stmt->error);
            }
        }
    }

    //curso_faqs
    
        for($i = 0; $i < count($FAQ['pregunta']); $i++){
            $pregunta_actual = trim($FAQ['pregunta'][$i] ?? '');
            $respuesta_actual = trim($FAQ['respuesta'][$i] ?? '');

            if(empty($pregunta_actual) || empty($respuesta_actual)){
                continue;
            }
    
                $orden_faq = $i + 1;
                $query = "INSERT INTO curso_faqs (curso_id, pregunta, respuesta, orden, usuario_id) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conexion->prepare($query);
                $stmt->bind_param("issii", $curso_id, $pregunta_actual, $respuesta_actual, $orden_faq, $id);
    

                if (!$stmt->execute()) {
                    throw new Exception("Error al crear la FAQ: " . $stmt->error);
                }
            
        }
    
    //leccion
    for($i = 0; $i < count($ruta_media['ruta_video']); $i++){
        
        $query = "INSERT INTO leccion (curso_id, titulo, descripcion, lecciones, orden, seccion, material, link_externo, categoria, dificultad_aprendizaje) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("isssisssss", $curso_id, $titulo_leccion[$i], $desc_leccion[$i], $ruta_media['ruta_video'][$i], $ruta_media['orden'][$i], $seccion[$i], $ruta_media['material'][$i], $link_externo[$i], $categoria, $dificultad);
    

        if (!$stmt->execute()) {
            throw new Exception("Error al crear la leccion: " . $stmt->error);
        }

    }
    


    $conexion->commit();

    echo json_encode(["success" => true, "mensaje" => "Curso publicado correctamente"]);

}catch(Exception $e){

    $conexion->rollback();

    // Borramos los archivos que se hayan subido
    // gracias a que indicamos el id del curso, podemos borrar la carpeta sin que me de migraña xdd
    $carpeta_curso = dirname(__DIR__, 4) . "/Course_media/Courses/Curso_" . ($curso_id ?? 'temp');
    
    // Funcion recursiva simple para borrar carpeta con contenido
    if (isset($curso_id) && is_dir($carpeta_curso)) {
        $archivos = glob($carpeta_curso . '/*');
        foreach($archivos as $archivo){
            if(is_file($archivo)) unlink($archivo);
        }
        rmdir($carpeta_curso);
    }

 
    http_response_code(500); // Error de servidor
    echo json_encode(["error" => $e->getMessage()]);


}









function upload_media($id){
    if(isset($_FILES)){ 
        $directorio_destino_videos = dirname(__DIR__, 4) . "/Course_media/Courses/"; // Ruta fisica
        $directorio_destino_miniatura = dirname(__DIR__, 4) . "/Course_media/thumbnails/";
        $directorio_destino_galeria = dirname(__DIR__, 4) . "/Course_media/Presentation/";

        if(!file_exists($directorio_destino_videos)){
        mkdir($directorio_destino_videos, 0777, true); // Crea el directorio de destino si no existe la crea con permisos 0777 (escritura y lectura total)
        }
        if(!file_exists($directorio_destino_miniatura)){
        mkdir($directorio_destino_miniatura, 0777, true); 
        }
        if(!file_exists($directorio_destino_galeria)){
        mkdir($directorio_destino_galeria, 0777, true);
        }

        
        

        $ruta_web = [
            'ruta_video' => [],
            'material' => [], 
            'orden' => [],
            'galeria' => []
        ];
        //el uso de uniqid es unicamente por el cache del navegador
        // y no remplazar la imagen cuando cargen una nueva 
        //sino todo esto se simplificaria

        $id_subida = uniqid();// aqui creo un solo uniqid 

        if(!file_exists($directorio_destino_videos . "Course_"  . $id)){
            mkdir($directorio_destino_videos . "Course_"  . $id, 0777, true);
        }

        $extension_miniatura = pathinfo($_FILES['miniatura']['name'], PATHINFO_EXTENSION); 
        $nombre_miniatura = "user_" . $id . "_" . $id_subida . "_" . $id . "." . $extension_miniatura; 
        $ruta_miniatura = $directorio_destino_miniatura . $nombre_miniatura;

        if(move_uploaded_file($_FILES['miniatura']['tmp_name'], $ruta_miniatura)){ // tmp_name es la ruta temporal del archivo
            // IMPORTANTE la ruta es totalmente relativa a la web no sirve como una ruta fisica    
            $ruta_web['ruta_miniatura'] = "/Course_media/thumbnails/" . $nombre_miniatura;
        }
        else{
            throw new Exception("Error al subir la imagen");
        }
    
        if(isset($_FILES['video_source'])){
            
            

            for($i = 0; $i < count($_FILES['video_source']['name']); $i++){
                
               
                if($_FILES['video_source']['error'][$i] === UPLOAD_ERR_OK){ 

                    $nombre_base = pathinfo($_FILES['video_source']['name'][$i], PATHINFO_FILENAME);
                    $extension_video = pathinfo($_FILES['video_source']['name'][$i], PATHINFO_EXTENSION);
                    $nombre_video = "lesson_" . $id . preg_replace("/[^a-zA-Z0-9_-]/", "_", $nombre_base) . "_" . $id_subida . "_" . $id . "." . $extension_video;

               
                    $ruta_video = $directorio_destino_videos . "Course_"  . $id . "/" . $nombre_video;

                    if(move_uploaded_file($_FILES['video_source']['tmp_name'][$i], $ruta_video)){
                        $ruta_web['ruta_video'][] = "/Course_media/Courses/" . "Course_" . $id . "/" . $nombre_video;
                        $ruta_web['orden'][] = $i + 1; // Orden empieza en 1
                    } else {
                        throw new Exception("Error al subir el video " . ($i+1));
                    }
                }

              
                $ruta_web['material'][$i] = null; 


                if(isset($_FILES['material_source']['name'][$i]) && $_FILES['material_source']['error'][$i] === UPLOAD_ERR_OK){
                    
                    $ext_mat = pathinfo($_FILES['material_source']['name'][$i], PATHINFO_EXTENSION);
                    $nombre_base_mat = pathinfo($_FILES['material_source']['name'][$i], PATHINFO_FILENAME);
                    $nombre_mat = "mat_" . $id . "_" . preg_replace("/[^a-zA-Z0-9_-]/", "_", $nombre_base_mat) . "_" . $id_subida . "_" . $id . "." . $ext_mat;
                    $destino_mat = $directorio_destino_videos . "Course_" . $id . "/" . $nombre_mat;

                    if(move_uploaded_file($_FILES['material_source']['tmp_name'][$i], $destino_mat)){
                        // Asignamos explícitamente a la posición $i
                        $ruta_web['material'][$i] = "/Course_media/Courses/" . "Course_" . $id . "/" . $nombre_mat;
                    }
                }
            }
        }

        

     

        if(isset($_FILES['galeria'])){
            if(is_array($_FILES['galeria']['name'])){
                
            

                for($i = 0; $i < count($_FILES['galeria']['name']); $i++){
                    if($_FILES['galeria']['error'][$i] === UPLOAD_ERR_OK){ // UPLOAD_ERR_OK = 0

                        //$extension_galeria = pathinfo($_FILES['galeria']['name'][$i], PATHINFO_EXTENSION);
                       // $nombre_galeria = "user_" . $id . uniqid() . "_" . $i . "." . $extension_galeria;

                        $ext = pathinfo($_FILES['galeria']['name'][$i], PATHINFO_EXTENSION); 
                        $nombre_secuencial = "user_" . $id . "_" . $id_subida . "_" . $i . "." . $ext; 
                        $destino = $directorio_destino_galeria . $nombre_secuencial;

                        if (move_uploaded_file($_FILES['galeria']['tmp_name'][$i], $destino)) {

                        $ruta_web['galeria'][] = "/Course_media/Presentation/" . $nombre_secuencial;
                        }
                        else{
                
                            throw new Exception("Error al subir la galeria");
                        }
                    }
                }
            }

        }



        

        

       return $ruta_web;

    }
}
?>