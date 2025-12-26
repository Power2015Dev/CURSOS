<?php
session_start();
$is_logged_in = isset($_SESSION['usuario_id']);

if(isset($_SESSION['usuario_nombre'])){
        $nombre_usuario = $_SESSION['usuario_nombre'];
    } else {
        $nombre_usuario = "Invitado";
    }

?>



<header>
        <nav id="navbar">
            <div id="logo_container">
                <a href="/dashboard/dashboard.php">
                <img src="/imagenes/kursa_logo_claro.png" alt="logo" class="vector_size" id="logo">
                <a href="#" class="no-decorations"><p style="font-weight: 700;color:white;">Modo Vendedor</p></a>
                </a>
            </div>
            <div id="search_bar">
                <input type="text" name="search" placeholder="Buscar cursos o freelancers">
                <img src="/imagenes/dashboard_img/lupa.png" alt="lupa" class="vector_size" style="cursor: pointer;">
            </div>

            
            <div id="profile_bar">
            
            
            <?php if ($is_logged_in): ?>

                

                <div id="message_container">
                    <img src="/imagenes/dashboard_img/mail_box.png" alt="perfil" class="vector_size">
                    <div id="message_box">
                        <h2>Mensajes</h2>
                        <div class="mail_box">
                            </div>
                    </div>
                    <!--skeleto start-->
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
                    <!--skeleto end-->
                </div>
                

                
                <div id ="bell_container">
                    <img src="/imagenes/dashboard_img/bell.png" alt="campana" class="vector_size">
                    <div id="notifications">
                        <h2>Notificaciones</h2>
                        <div class="messages">
                            </div>
                    </div>
                    <!--skeleto start-->
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
                    <!--skeleto end-->
                </div>
                
                <div id="profile_picture_container">
                    <?php 
                        $ruta_avatar = !empty($_SESSION['usuario_img']) ? $_SESSION['usuario_img'] : '../imagenes/dashboard_img/perfil.png';
                    ?>
                    <img src="<?php echo $ruta_avatar; ?>" alt="profile" id="profile_picture">
                    <img src="/imagenes/dashboard_img/arrow.png" alt="arrow" class="arrow_size">
                    <div id="profile_status">
                            <a href="/modulos/configuracion/editar_perfil.php"><p>Editar perfil</p></a>
                            <a href="/modulos/configuracion/ayuda.html"><p>Ayuda</p></a>
                            <a href="/modulos/configuracion/courses.html"><p>Mis cursos</p></a>
                            <a href="/modulos/PHP/cerrar_sesion.php"><p>Cerrar sesión</p></a>
                      
                    </div>
                </div>
            </div>

            <?php else: ?>
                <a href="/inicio_registro/inicio_sesion.html" id="login_button">Iniciar sesión</a>
                <a href="/inicio_registro/registro.html" id="signup_button">Registrarse</a>
            <?php endif ?>


            <script src="/modulos/navbar/dashboard_navbar.js"></script>
            <script type="module" src="/modulos/navbar/notifications_loading.js"></script>
            <script type="module" src="/modulos/navbar/Mail_box_loading.js"></script>

        </nav>
    </header>