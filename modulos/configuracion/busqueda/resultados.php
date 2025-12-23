<?php
    session_start();
    $is_logged_in = isset($_SESSION['usuario_id']);

    if(isset($_SESSION['usuario_nombre'])){
        $nombre_usuario = $_SESSION['usuario_nombre'];
    } else {
        $nombre_usuario = "Invitado";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Busqueda | Kursa</title>
    
    <link rel="stylesheet" href="../../navbar/navbar_style.css">
    <link rel="stylesheet" href="resultados_style.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <link rel="icon" type="image/png" href="../../imagenes/icono2d.png"> 
</head>
<body>

    <header>
        <nav id="navbar">
            <div id="logo_container">
                <a href="../../../dashboard/dashboard.php">
                <img src="../../../imagenes/kursa_logo_claro.png" alt="logo" class="vector_size" id="logo">
                <a href="#" class="no-decorations"><p style="font-weight: 700;color:white;">Modo Vendedor</p></a>
                </a>
            </div>
            <div id="search_bar">
                <input type="text" name="search" placeholder="Buscar cursos o freelancers">
                <img src="../../../imagenes/dashboard_img/lupa.png" alt="lupa" class="vector_size" style="cursor: pointer;">
            </div>

            
            <div id="profile_bar">
            
            
            <?php if ($is_logged_in): ?>

                

                <div id="message_container">
                    <img src="../../../imagenes/dashboard_img/mail_box.png" alt="perfil" class="vector_size">
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
                    <img src="../../../imagenes/dashboard_img/bell.png" alt="campana" class="vector_size">
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
                    <img src="../../../imagenes/dashboard_img/arrow.png" alt="arrow" class="arrow_size">
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

    <main class="results-container">
        
        <div class="results-header">
            <h1>Resultados para: <span>"Producción musical"</span></h1>
            <p>Se encontraron 12 resultados</p>
        </div>

        <section class="results-grid">

            <article class="kursa-card">
                <div class="card-thumbnail">
                    <img src="https://concepto.de/wp-content/uploads/2020/08/Programacion-informatica-scaled-e1724960033513.jpg" alt="Thumbnail del curso">
                </div>
                
                <div class="card-content">
                    <div class="seller-info">
                        <img src="https://i.pravatar.cc/150?img=68" alt="Vendedor" class="seller-avatar">
                        <span class="seller-name">Javier Ast</span>
                    </div>

                    <h3 class="card-title">Llevaré tu música al siguiente nivel mezclando y masterizando.</h3>

                    <div class="rating-container">
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-half">star_half</span>
                    </div>

                    <div class="price-container">
                        <span class="price">50 US$</span>
                    </div>
                </div>
            </article>

            <article class="kursa-card">
                <div class="card-thumbnail">
                    <img src="https://img.freepik.com/vector-gratis/fondo-degradado-ui-ux_23-2149052117.jpg?semt=ais_hybrid&w=740&q=80" alt="Thumbnail del curso">
                </div>
                <div class="card-content">
                    <div class="seller-info">
                        <img src="https://i.pravatar.cc/150?img=12" alt="Vendedor" class="seller-avatar">
                        <span class="seller-name">Egon Beats</span>
                    </div>
                    <h3 class="card-title">Seré tu productor de música urbana, reggaetón, trap y afrobeat.</h3>
                    <div class="rating-container">
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                    </div>
                    <div class="price-container">
                        <span class="price">40 US$</span>
                    </div>
                </div>
            </article>

             <article class="kursa-card">
                <div class="card-thumbnail">
                    <img src="https://images.ctfassets.net/bbpb82zmp9gd/66Tzp5oDZMxJXbncHs9xjV/c1b8232f25aa022c3d9be067750d23a9/patterns-beatmaker.jpg" alt="Thumbnail del curso">
                </div>
                <div class="card-content">
                    <div class="seller-info">
                        <img src="https://i.pravatar.cc/150?img=33" alt="Vendedor" class="seller-avatar">
                        <span class="seller-name">Laura Guitar</span>
                    </div>
                    <h3 class="card-title">Clases de guitarra eléctrica y acústica para principiantes y avanzados.</h3>
                    <div class="rating-container">
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-empty">star</span>
                    </div>
                    <div class="price-container">
                        <span class="price">25 US$</span>
                    </div>
                </div>
            </article>
            
            </section>
    </main>

    <script src="../../../modulos/navbar/dashboard_navbar.js"></script>
    <script type="module" src="dashboard_loader.js"></script>
     <script type="module" src="../../../modulos/navbar/notifications_loading.js"></script>
     <script type="module" src="../../../modulos/navbar/Mail_box_loading.js"></script>
</body>
</html>