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

    <header>
        <nav id="navbar">
            <div id="logo_container">
                <a href="dashboard.php">
                <img src="../../imagenes/kursa_logo_claro.png" alt="logo" class="vector_size" id="logo">
                </a>
            </div>
            <div id="search_bar">
                <input type="text" name="search" placeholder="Buscar cursos o freelancers">
                <img src="../../imagenes/dashboard_img/lupa.png" alt="lupa" class="vector_size" style="cursor: pointer;">
            </div>

            <div id="profile_bar">
            
            <?php if ($is_logged_in): ?>

                <a href="../modulos/configuracion/configuracion.html" class="no-decorations">
                <img src="../../imagenes/dashboard_img/seller.png" alt="perfil" class="vector_size">
                </a>

                <div id="message_container">
                    <img src="../../imagenes/dashboard_img/mail_box.png" alt="perfil" class="vector_size">
                    <div id="message_box">
                        <h2>Mensajes</h2>
                        <div class="mail_box"></div>
                    </div>
                    <template id="messages_skeleton">
                        <div class="message_card"> 
                            <div class="row_message">
                                <div class="skeleton_img"></div>
                                <div class="skeleton_osc" style="width: 40%; margin-left: 10px;"></div>
                            </div>
                            <div class="skeleton_osc" style="width: 90%;"></div>
                            <div class="skeleton_osc" style="width: 30%;"></div>
                        </div>
                    </template>
                    </div>
                
                <div id ="bell_container">
                    <img src="../../imagenes/dashboard_img/bell.png" alt="campana" class="vector_size">
                    <div id="notifications">
                        <h2>Notificaciones</h2>
                        <div class="messages"></div>
                    </div>
                    <template id="notifications_skeleton">
                        <div class="notification_card"> 
                            <div class="row_message">
                                <div class="skeleton_img"></div>
                                <div class="skeleton_osc" style="width: 40%; margin-left: 10px;"></div>
                            </div>
                            <div class="skeleton_osc" style="width: 90%;"></div>
                            <div class="skeleton_osc" style="width: 30%;"></div>
                        </div>
                    </template>
                    </div>
                
                <div id="profile_picture_container">
                    <img src="../../imagenes/dashboard_img/perfil.png" alt="profile" id="profile_picture">
                    <img src="../../imagenes/dashboard_img/arrow.png" alt="arrow" class="arrow_size">
                    <div id="profile_status">
                            <a href="../../modulos/configuracion/perfil.html"><p>Editar perfil</p></a>
                            <a href="../../modulos/configuracion/ayuda.html"><p>Ayuda</p></a>
                            <a href="../../modulos/configuracion/courses.html"><p>Mis cursos</p></a>
                            <a href="../../modulos/PHP/cerrar_sesion.php"><p>Cerrar sesión</p></a>
                    </div>
                </div>
            </div>

            <?php else: ?>
                <a href="../../inicio_registro/inicio_sesion.html" id="login_button">Iniciar sesión</a>
                <a href="../../inicio_registro/registro.html" id="signup_button">Registrarse</a>
            <?php endif ?>

        </nav>
    </header>

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