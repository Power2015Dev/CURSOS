<?php
session_start();

$is_logged_in = isset($_SESSION['usuario_id']);
$nombre_usuario = isset($_SESSION['usuario_nombre']) ? $_SESSION['usuario_nombre'] : "Invitado";

$chat_id = isset($_GET['id']) ? $_GET['id'] : null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes | Kursa</title>
    
    <link rel="stylesheet" href="../navbar/navbar_style.css">
    <link rel="stylesheet" href="style.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="icon" type="image/png" href="../../imagenes/icono2d.png"> 
</head>
<body>

    <?php include "../navbar/navbar.php"; ?>

    <div class="chat-layout">
        
        <aside class="chat-sidebar">
            <div class="sidebar-header">
                <h2>Mis Chats</h2>
                <div class="sidebar-search">
                    <span class="material-symbols-outlined">search</span>
                    <input type="text" placeholder="Buscar conversación...">
                </div>
            </div>

            <div id="contacts-list" class="contacts-scroll">
                </div>
        </aside>


        <main class="chat-window">
            
            <?php if($chat_id): ?>
                <div class="chat-header">
                    <div class="chat-user-info">
                        <span class="material-symbols-outlined back-btn" id="back-to-contacts">arrow_back</span>
                        <img src="../../imagenes/dashboard_img/perfil.png" alt="Current User" id="current-chat-img">
                        <div class="user-details">
                            <h3 id="current-chat-name">Cargando...</h3>
                            
                        </div>
                        
                    </div>
                    <div class="chat-actions">
                        <span class="material-symbols-outlined">more_vert</span>
                    </div>
                </div>

                <div id="messages-feed" class="messages-feed">
                    </div>

                <div class="chat-input-area">
                    <button class="attach-btn">
                        <span class="material-symbols-outlined">add_circle</span>
                    </button>
                    <input type="text" id="message-input" placeholder="Escribe un mensaje aquí...">
                    <button class="send-btn" id="send-btn">
                        <span class="material-symbols-outlined">send</span>
                    </button>
                </div>

            <?php else: ?>
                <div class="no-chat-selected">
                    <img src="../../imagenes/kursa_logo_claro.png" alt="Kursa Logo" style="width: 150px; opacity: 0.5;">
                    <h3>Tus mensajes</h3>
                    <p>Selecciona una conversación para comenzar a chatear.</p>
                </div>
            <?php endif; ?>

        </main>
    </div>

    <script src="../../modulos/navbar/dashboard_navbar.js"></script>
    <script type="module" src="../../modulos/navbar/notifications_loading.js"></script>
    <script type="module" src="../../modulos/navbar/Mail_box_loading.js"></script>
    
    <script type="module" src="message.js"></script> 

</body>
</html>