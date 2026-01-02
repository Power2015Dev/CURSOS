<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['usuario_id'])){
header("Location: ../../dashboard/dashboard.php");
exit();
}



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
    <link rel="stylesheet" href="/modulos/footer/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="/imagenes/icono2d.png"> 

</head>
<body>

    <?php include '../navbar/navbar.php'; ?>

    <div class="page-wrapper">
        
        <?php include '../sidebar/sidebar.php'; ?>

        <main class="profile-content">
            <div class="form-header">
                <h2>Informacion Privada</h2>
                <p style="color:#666; font-size:0.9rem;">Gestiona como te llegan notificaciones.</p>
            </div>

            <form id="form-perfil">
                
            </form>
        </main>

    </div>
    <?php include '../footer/footer.php'; ?>
    <script src="js/perfil_logic.js"></script>

</body>
</html>