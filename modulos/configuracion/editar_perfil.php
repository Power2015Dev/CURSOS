<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../../dashboard/dashboard.php");
    exit();
}

// Variables para Confirm Box
$mensaje_promise = "¿Deseas guardar los cambios?";
$caja_resuelta = "Confirmar";
$caja_rechazada = "Cancelar";
$color_resuelto = "#27F53C";
$color_rechazado = "#F52727"; 
$icono_resolve_reject = "questionmark.json"; 

// Variables para Check-in Box
$mensaje = "Perfil actualizado con éxito";
$icono = "Check-in.json";

// Variables para Error Box
$errormsg = "Error al actualizar el perfil";
$erroricon = "error.json";
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

    <style>
        .hide_avatar { display: none !important; }
        .show_avatar { display: block !important; }
    </style>
</head>
<body>

    <?php include '../navbar/navbar.php'; ?>

    <div class="page-wrapper">
        <?php include '../sidebar/sidebar.php'; ?>

        <main class="profile-content">
            <div class="form-header">
                <h2>Información Publica</h2>
                <p style="color:#666; font-size:0.9rem;">Gestiona tu foto y datos de contacto.</p>
            </div>

            <form id="form-perfil">
                
                <div class="avatar-section">
                    
                    <div class="avatar-preview-container">
                        <img id="avatar-preview" src="/imagenes/dashboard_img/perfil.png" alt="Foto de perfil" style="background-color: #333;">
                        
                        <label for="avatar-input-unico" class="camera-overlay">
                            <i class="fas fa-camera"></i>
                        </label>
                    </div>
                    
                    <input type="file" id="avatar-input-unico" name="avatar" accept="image/*" hidden>

                    <div class="avatar-info show_avatar" id="avatar-info-initial"> 
                        <h3>Foto de Perfil</h3>
                        <p class="text-muted">Se recomienda imagen PNG o JPG.</p>
                        <label for="avatar-input-unico" class="btn-upload-label">Cambiar Foto</label>
                    </div>

                    <div class="avatar-info hide_avatar" id="avatar-info-selected">
                        <h3 id="file_name"></h3>
                        <p class="text-muted" id="file_info"></p>
                        <label for="avatar-input-unico" class="btn-upload-label" style="background-color: #27F584;">Seleccionar otra foto</label>
                    </div>
                </div>
                <hr style="border: 0; border-top: 1px solid #eee; margin: 30px 0;">

                <div class="form-grid">
                    <div class="input-group">
                        <label for="nombre"><i class="fas fa-user"></i> Nombre de Usuario</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" required>
                    </div>

                    <div class="input-group">
                        <label for="pais"><i class="fas fa-globe"></i> País</label>
                        <select id="pais" name="pais" class="select-css">
                            <option value="" disabled selected>Selecciona tu país</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Mexico">México</option>
                            <option value="Chile">Chile</option>
                            <option value="España">España</option>
                            <option value="Peru">Perú</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label style="color:#888;"><i class="fas fa-envelope"></i> Email (No editable)</label>
                        <input type="email" id="email" disabled style="background-color: #f9f9f9; color: #666; cursor: not-allowed;" value="">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-guardar">Guardar Cambios</button>
                </div>

            </form>
        </main>
    </div>

    <?php 
    include '../componentes/Confirm-box.php';
    include '../componentes/Check-in-box.php';
    include '../componentes/Error.php';
    ?>

    <?php include '../footer/footer.php'; ?>

    <script src="js/perfil_logic.js"></script>

</body>
</html>