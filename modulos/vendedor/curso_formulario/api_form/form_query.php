<?php



if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../../../../dashboard/dashboard.php");
    exit();
}

include_once dirname(__DIR__, 3).'/Conexion.php';

$json = json_decode(file_get_contents("php://input"), true);

$titulo = $json['titulo'];
$descripcion = $json['descripcion'];
$miniatura = $json['miniatura']; // esto es un file
$usuario_id = $_SESSION['usuario_id'];
$checkbox_descargable = $json['descargable'] ?? null;
$checkbox_principiante = $json['principiante'] ?? null;
$checkbox_certificado = $json['certificado'] ?? null;
$checkbox_pratico = $json['pratico'] ?? null;
$galeria_media = $json['galeria'];
$FAQ_1 = $json['FAQ1'] ?? null;
$FAQ_1_Respuesta = $json['FAQ1_R'] ?? null;
$FAQ_2 = $json['FAQ2'] ?? null;
$FAQ_2_Respuesta = $json['FAQ2_R'] ?? null;
$FAQ_3 = $json['FAQ3'] ?? null;
$FAQ_3_Respuesta = $json['FAQ3_R'] ?? null;
$FAQ_4 = $json['FAQ4'] ?? null;
$FAQ_4_Respuesta = $json['FAQ4_R'] ?? null;
$FAQ_5 = $json['FAQ5'] ?? null;
$FAQ_5_Respuesta = $json['FAQ5_R'] ?? null;
$seccion = $json['nombre_modulo'];
$titulo_leccion = $json['titulo_leccion'];
$desc_leccion = $json['desc_leccion'];
$leccion_video = $json['video_source']; // tambien un file
$material_source = $json['material_source'] ?? null;
$link_externo = $json['link_externo'] ?? null;
$categoria = $json['categoria'] ?? null;
$mensaje_bienvenida = $json['mensaje_bienvenida'] ?? null;
$precio = $json['precio'];
$dificultad = $json['dificultad'] ?? null;
$redes = $json['redes'] ?? null;


?>