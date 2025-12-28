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
                <p style="color:#666; font-size:0.9rem;">Gestiona tu contraseña y seguridad.</p>
            </div>

            <form id="form-perfil">
                
                <h3 style="color:#0A1931; margin-bottom:15px; font-size:1.1rem; border-left: 4px solid #B3CFE5; padding-left: 10px;">
                    <i class="fas fa-address-card"></i> Datos de Sesion
                </h3>
                
                <div class="form-grid">
                    <div class="input-group">
                        <label><i class="fas fa-envelope"></i> Correo Electronico</label>
                        <div style="display: flex; gap: 10px;">
                            <input type="email" id="email" value="usuario@ejemplo.com" disabled 
                                   style="background-color: #f9f9f9; color: #666; cursor: not-allowed; flex-grow:1;">
                            
                            <button type="button" class="btn-verificar" style="
                                background-color: white;
                                border: 1px solid #d9534f;
                                color: #d9534f;
                                padding: 0 15px;
                                border-radius: 8px;
                                cursor: pointer;
                                font-weight: 600;
                                white-space: nowrap;">
                                Verificar
                            </button>
                        </div>
                        <small style="color: #d9534f; margin-top:5px; display:block;">
                            <i class="fas fa-exclamation-circle"></i> Tu correo no está verificado.
                        </small>
                    </div>

                    <div class="input-group">
                        <label for="telefono"><i class="fas fa-phone"></i> Número de Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" placeholder="+58 412 123 4567">
                        <small style="color:#888;">Usado para recuperación de cuenta y alertas de seguridad.</small>
                    </div>
                </div>

                <hr style="border: 0; border-top: 1px solid #eee; margin: 30px 0;">

                <h3 style="color:#0A1931; margin-bottom:15px; font-size:1.1rem; border-left: 4px solid #B3CFE5; padding-left: 10px;">
                    <i class="fas fa-key"></i> Cambiar Contraseña
                </h3>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="pass_actual">Contraseña Actual</label>
                        <input type="password" id="pass_actual" name="pass_actual" placeholder="Ingresa tu contraseña actual">
                    </div>

                    <div class="input-group">
                        <label for="pass_nueva">Nueva Contraseña</label>
                        <input type="password" id="pass_nueva" name="pass_nueva" placeholder="Mínimo 8 caracteres">
                    </div>

                    <div class="input-group">
                        <label for="pass_confirm">Confirmar Nueva Contraseña</label>
                        <input type="password" id="pass_confirm" name="pass_confirm" placeholder="Repite la nueva contraseña">
                    </div>
                </div>

                <hr style="border: 0; border-top: 1px solid #eee; margin: 30px 0;">

                <h3 style="color:#0A1931; margin-bottom:15px; font-size:1.1rem; border-left: 4px solid #B3CFE5; padding-left: 10px;">
                    <i class="fas fa-shield-alt"></i> Seguridad Adicional
                </h3>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="pregunta_seguridad">Pregunta de Seguridad</label>
                        <select id="pregunta_seguridad" name="pregunta_seguridad" style="
                            width: 100%;
                            padding: 12px;
                            border: 1px solid #ccc;
                            border-radius: 8px;
                            font-family: 'Poppins', sans-serif;
                            background-color: white;">
                            <option value="" disabled selected>Selecciona una pregunta...</option>
                            <option value="1">¿Cuál es el nombre de tu primera mascota?</option>
                            <option value="2">¿En qué ciudad nacieron tus padres?</option>
                            <option value="3">¿Cuál fue tu primer videojuego favorito?</option>
                            <option value="4">¿Cómo se llamaba tu escuela primaria?</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label for="respuesta_seguridad">Respuesta Secreta</label>
                        <input type="text" id="respuesta_seguridad" name="respuesta_seguridad" placeholder="Escribe tu respuesta">
                        <small style="color:#888;">Esta respuesta se solicitará si detectamos un inicio de sesión inusual.</small>
                    </div>
                </div>

                <div class="form-actions" style="margin-top: 40px;">
                    <button type="submit" class="btn-guardar">Actualizar Seguridad</button>
                </div>

            </form>
        </main>

    </div>

     <?php include '../footer/footer.php'; ?>

    <script src="js/perfil_logic.js"></script>

</body>
</html>