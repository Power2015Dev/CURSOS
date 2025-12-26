<?php



$nombre_usuario = $_SESSION['usuario_nombre'] ?? "Usuario";
$ruta_avatar = !empty($_SESSION['usuario_img']) ? $_SESSION['usuario_img'] : '../../imagenes/dashboard_img/perfil.png';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil | Kursa</title>
    
    <link rel="stylesheet" href="../navbar/navbar_style.css">
    <link rel="stylesheet" href="../sidebar/sidebar.css">       
    <link rel="stylesheet" href="css/estilo_perfil.css"> 
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include '../navbar/navbar.php'; ?>

    <div class="page-wrapper">
        
        <?php include '../sidebar/sidebar.php'; ?>

        <main class="profile-content">
            <div class="form-header">
                <h2>Información Pública</h2>
                <p style="color:#666; font-size:0.9rem;">Gestiona tu foto y datos de contacto.</p>
            </div>

            <form id="form-perfil">
                
            </form>
        </main>

    </div>

    <script src="js/perfil_logic.js"></script>
    <script src="../navbar/dashboard_navbar.js"></script>
</body>
</html>