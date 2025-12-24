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
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet" />
  <title>Cursos | Kursa</title>
  <link rel="stylesheet" href="../navbar/navbar_style.css" />
  <link rel="icon" type="image/png" href="/imagenes/imagen_sin_fondo.png" />
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <nav id="navbar">
            <div id="logo_container">
                <a href="../../dashboard/dashboard.php">
                <img src="../../imagenes/kursa_logo_claro.png" alt="logo" class="vector_size" id="logo">
                <a href="#" class="no-decorations"><p style="font-weight: 700;color:white;">Modo Vendedor</p></a>
                </a>
            </div>
            <div id="search_bar">
                <input type="text" name="search" placeholder="Buscar cursos o freelancers">
                <img src="../../imagenes/dashboard_img/lupa.png" alt="lupa" class="vector_size" style="cursor: pointer;">
            </div>

            
            <div id="profile_bar">
            
            
            <?php if ($is_logged_in): ?>

                

                <div id="message_container">
                    <img src="../../imagenes/dashboard_img/mail_box.png" alt="perfil" class="vector_size">
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
                    <img src="../../imagenes/dashboard_img/bell.png" alt="campana" class="vector_size">
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

  <main class="pagina-principal">
    
    <section class="columna-izquierda">
      
            <h1 class="titulo-principal"></h1>
      <div id="contenedor-autor" class="tarjeta-simple">
        <img src="" alt="profile" id="foto-autor">
        <div id="estado-autor">
          <p id="nombre-autor"></p>
          <p id="desc-autor">descripcion</p>
        </div>
      </div>

      <div id="contenedor-media" class="grid-media">
        <!-- media items van a ser controlado dinamicamente por aqui con js -->
        
      </div>

      <section class="seccion-resenas">
        <div class="encabezado-resenas">
            <h3 class="titulo-resenas">Lo que a la gente le gustó de este freelancer</h3>
            <div class="acciones-derecha">
                <a href="#" class="enlace-ver-todas">Ver todas las reseñas</a>
                <div class="contenedor-flechas">
                    <button class="boton-flecha prev">❮</button>
                    <button class="boton-flecha next">❯</button>
                </div>
            </div>
        </div>

        <div class="tarjeta-resena">
            <div class="encabezado-usuario">
                <img src="" alt="User Avatar" class="avatar-usuario" id="avatar_user">
                <div class="meta-usuario">
                    <span class="nombre-usuario" id="rating_user"></span>
                    <span class="bloque-pais">
                        <span style="font-size: 16px;" id="disminutivo_pais"></span id="pais"></span>
                    <span class="separador">|</span>
                    <div class="rating-estrellas">
                        ★★★★★ <span class="numero-rating" id="rating_number_int"></span>
                    </div>
                </div>
            </div>
            <p class="texto-comentario">
                Mudasar es un profesional altamente cualificado en Java con un profundo conocimiento de POO. Es cooperativo, detallista y siempre entrega código limpio y optimizado.
            </p>
            <div class="fecha-resena">hace 1 mes</div>
        </div>
      </section>

      <h2 class="titulo-seccion">Las personas que vieron este servicio también vieron</h2>
      
      <div class="contenedor-carrusel">
          <div class="pista-carrusel" id="contenedor-carrusel-id">

              
                <!-- Los elementos del carrusel se cargaran dinámicamente aqui con js -->
              

          </div>
      </div>

      <section class="contenedor-faq" id="contenedor_faq_id">
        <h2 class="titulo-faq">Preguntas Frecuentes (FAQ)</h2>
        
        
      </section>


    </section>

    <aside id="caja-compra" class="tarjeta-compra">
     

      <div class="contenido-compra">
          <div class="cabecera-compra">
             <!-- <h3 class="titulo-plan">Script o Solución de Errores en Java</h3> -->
              <span class="precio-plan"></span>
          </div>
          <p class="descripcion-plan"></p>
          
          <ul class="lista-beneficios">
              <li><span class="check">✔</span> Código Fuente</li>
              <li><span class="check">✔</span> Uso Comercial</li>
              <li><span class="check">✔</span> Comentarios detallados</li>
          </ul>
          <button class="btn-primario">
              Continuar <span style="font-size:16px">→</span>
          </button>
          <button class="btn-secundario">
              Contactar al vendedor
          </button>
      </div>
    </aside>
  </main>

  <section class="enlaces-extra">
      <div class="contenido-enlaces">
          <div class="columna-enlaces">
              <h4>Tecnologías</h4>
              <ul>
                  <li><a href="#">Java & Spring Boot</a></li>
                  <li><a href="#">Python & Django</a></li>
                  <li><a href="#">JavaScript & React</a></li>
                  <li><a href="#">Aplicaciones Móviles</a></li>
                  <li><a href="#">Bases de Datos SQL</a></li>
              </ul>
          </div>
          <div class="columna-enlaces">
              <h4>Para Clientes</h4>
              <ul>
                  <li><a href="#">Cómo contratar</a></li>
                  <li><a href="#">Talento verificado</a></li>
                  <li><a href="#">Garantía de calidad</a></li>
                  <li><a href="#">Métodos de pago</a></li>
                  <li><a href="#">Historias de éxito</a></li>
              </ul>
          </div>
          <div class="columna-enlaces">
              <h4>Para Desarrolladores</h4>
              <ul>
                  <li><a href="#">Únete como freelancer</a></li>
                  <li><a href="#">Recursos para devs</a></li>
                  <li><a href="#">Comunidad Kursa</a></li>
                  <li><a href="#">Blog de Tecnología</a></li>
                  <li><a href="#">Eventos y Hackathons</a></li>
              </ul>
          </div>
          <div class="columna-enlaces">
              <h4>Soluciones</h4>
              <ul>
                  <li><a href="#">Kursa Pro</a></li>
                  <li><a href="#">Gestión de equipos</a></li>
                  <li><a href="#">Consultoría técnica</a></li>
                  <li><a href="#">Seguridad informática</a></li>
                  <li><a href="#">Soporte 24/7</a></li>
              </ul>
          </div>
      </div>
  </section>

  <footer class="pie-pagina">
    <div class="contenido-pie">
        <div class="columna-pie logo-col">
            <img src="/imagenes/kursa_logo.png" alt="Kursa Logo" class="logo-pie">
            <div class="caja-copyright">
                <p>&copy; 2025 Kursa Inc.</p>
                <p>Todos los derechos reservados.</p>
            </div>
        </div>
        <div class="columna-pie">
            <h3>SOPORTE</h3>
            <a href="#">Centro de Ayuda</a>
            <a href="#">Contacto</a>
            <a href="#">Términos y Condiciones</a>
            <a href="#">Política de Privacidad</a>
        </div>
        <div class="columna-pie">
            <h3>SÍGUENOS</h3>
            <div class="iconos-sociales">
              
  <a href="#" target="_blank">
    <img src="https://img.icons8.com/ios-filled/50/000000/twitterx--v1.png" alt="X">
  </a>

  <a href="#" target="_blank">
    <img src="https://img.icons8.com/ios-filled/50/000000/facebook-new.png" alt="Facebook">
  </a>

  <a href="#" target="_blank">
    <img src="https://img.icons8.com/ios-filled/50/000000/instagram-new.png" alt="Instagram">
  </a>

  <a href="#" target="_blank">
    <img src="https://img.icons8.com/ios-filled/50/000000/tiktok.png" alt="TikTok">
  </a>

  <a href="#" target="_blank">
    <img src="https://img.icons8.com/ios-filled/50/000000/linkedin.png" alt="LinkedIn">
  </a>

            </div>
        </div>
    </div>
  </footer>

    <script src="../navbar/dashboard_navbar.js"></script>
    <script type="module" src="../navbar/notifications_loading.js"></script>
    <script type="module" src="../navbar/Mail_box_loading.js"></script>
    <script type="module" src="page.js"></script>
</body>
</html>