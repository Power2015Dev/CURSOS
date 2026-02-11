<?php

// Variables para Confirm Box
$mensaje_promise = "¿Deseas confirmar la compra?";
$caja_resuelta = "Confirmar";
$caja_rechazada = "Cancelar";
$color_resuelto = "#27F53C";
$color_rechazado = "#F52727"; 
$icono_resolve_reject = "questionmark.json"; 

// Variables para Check-in Box
$mensaje = "Compra exitosa!";
$icono = "Check-in.json";

// Variables para Error Box
$errormsg = "Error al completar la compra. Por favor, intentalo de nuevo.";
$erroricon = "error.json";

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
  <link rel="stylesheet" href="/libraries/videojs/video-js.min.css" />
  <link rel="stylesheet" href="/video_stylesheet/video-js_kursa.css" />
</head>
<body>

  <?php 
        include __DIR__ . '/../../modulos/navbar/navbar.php';
    ?>

  <main class="pagina-principal">
    
    <section class="columna-izquierda">
      
      <h1 class="titulo-principal">
          <span class="skeleton_osc" style="width: 60%; height: 30px; display: block;"></span>
      </h1>

      <div id="contenedor-autor" class="tarjeta-simple">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="loading" id="foto-autor" class="skeleton_img" style="width: 65px; height: 65px;">
        
        <div id="estado-autor" style="width: 100%;">
          <p id="nombre-autor">
              <span class="skeleton_osc" style="width: 150px; display: inline-block;"></span>
          </p>
          <p id="desc-autor">
               <span class="skeleton_osc" style="width: 100px; display: inline-block;"></span>
          </p>
        </div>
      </div>

      <div id="contenedor-media" class="grid-media">
        <div class="curso_img_skeleton" style="width: 100%; aspect-ratio: 16/9; border-radius: 12px; background-color: hsl(200, 20%, 85%);"></div>
        <div class="curso_img_skeleton" style="width: 220px; height: 115px; border-radius: 8px; background-color: hsl(200, 20%, 85%);"></div>
        <div class="curso_img_skeleton" style="width: 220px; height: 115px; border-radius: 8px; background-color: hsl(200, 20%, 85%);"></div>
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
                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="User Avatar" class="avatar-usuario skeleton_img">
                
                <div class="meta-usuario">
                    <span class="nombre-usuario">
                        <span class="skeleton_osc" style="width: 120px; display: inline-block;"></span>
                    </span>

                    <span class="bloque-pais">
                        <span style="font-size: 16px;" id="disminutivo_pais"></span>
                        <span id="pais" style="display:none;"></span>
                    </span>

                    <span class="separador">|</span>
                    
                    <div class="rating-estrellas">
                        ★★★★★ 
                        <span class="numero-rating">
                             <span class="skeleton_osc" style="width: 20px; display: inline-block;"></span>
                        </span>
                    </div>
                </div>
            </div>

            <p class="texto-comentario">
                <span class="skeleton_osc" style="width: 100%; display: block;"></span>
                <span class="skeleton_osc" style="width: 90%; display: block;"></span>
                <span class="skeleton_osc" style="width: 40%; display: block;"></span>
            </p>

            <div class="fecha-resena">
                <span class="skeleton_osc" style="width: 80px; display: inline-block;"></span>
            </div>
        </div>
      </section>

      <h2 class="titulo-seccion">Las personas que vieron este servicio también vieron</h2>
      
      <div class="contenedor-carrusel">
          <div class="pista-carrusel" id="contenedor-carrusel-id">
              
              <?php for($i=0; $i<3; $i++): ?>
              <div class="tarjeta-producto" style="pointer-events: none;">
                  <div class="media-producto skeleton" style="background-color: hsl(200, 20%, 85%);"></div>
                  <div class="detalles-producto">
                      <div class="fila-autor">
                          <div class="autor-izq" style="width: 100%;">
                               <div class="skeleton_img" style="width: 24px; height: 24px;"></div>
                               <div class="skeleton_osc" style="width: 80px; margin-left: 8px;"></div>
                          </div>
                      </div>
                      <div class="skeleton_osc" style="width: 90%; margin-top: 10px;"></div>
                      <div class="skeleton_osc" style="width: 60%;"></div>
                  </div>
              </div>
              <?php endfor; ?>

          </div>
      </div>

      <section class="contenedor-faq" id="contenedor_faq_id">
        <h2 class="titulo-faq">Preguntas Frecuentes (FAQ)</h2>
        
        <?php for($i=0; $i<2; $i++): ?>
        <div class="item-faq" style="pointer-events: none;">
            <div style="padding: 15px 20px; display: flex; align-items: center; gap: 15px;">
                <div class="skeleton_img" style="width: 40px; height: 40px;"></div>
                <div style="flex: 1;">
                    <div class="skeleton_osc" style="width: 80px;"></div>
                    <div class="skeleton_osc" style="width: 200px;"></div>
                </div>
            </div>
        </div>
        <?php endfor; ?>
        
      </section>

    </section>

    <aside id="caja-compra" class="tarjeta-compra">
      <div class="contenido-compra">
          <div class="cabecera-compra">
              <span class="precio-plan" style="width: 100px; display: block;">
                  <span class="skeleton_osc" style="height: 28px; display: block;"></span>
              </span>
          </div>
          
          <p class="descripcion-plan">
              <span class="skeleton_osc" style="width: 100%; display: block;"></span>
              <span class="skeleton_osc" style="width: 100%; display: block;"></span>
              <span class="skeleton_osc" style="width: 60%; display: block;"></span>
          </p>
          
          <ul class="lista-beneficios">
              <li><span class="check">✔</span> Código Fuente</li>
              <li><span class="check">✔</span> Uso Comercial</li>
              <li><span class="check">✔</span> Comentarios detallados</li>
          </ul>
          
          <button class="btn-primario" id="compra">
              Comprar <span style="font-size:16px">→</span>
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
              <h4>Tecnologias</h4>
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
                <a href="#" target="_blank"><img src="https://img.icons8.com/ios-filled/50/000000/twitterx--v1.png" alt="X"></a>
                <a href="#" target="_blank"><img src="https://img.icons8.com/ios-filled/50/000000/facebook-new.png" alt="Facebook"></a>
                <a href="#" target="_blank"><img src="https://img.icons8.com/ios-filled/50/000000/instagram-new.png" alt="Instagram"></a>
                <a href="#" target="_blank"><img src="https://img.icons8.com/ios-filled/50/000000/tiktok.png" alt="TikTok"></a>
                <a href="#" target="_blank"><img src="https://img.icons8.com/ios-filled/50/000000/linkedin.png" alt="LinkedIn"></a>
            </div>
        </div>
    </div>
  </footer>

  <?php 
    include '../componentes/Confirm-box.php';
    include '../componentes/Check-in-box.php';
    include '../componentes/Error.php';
    ?>

    <script type="module" src="page.js"></script>
    <script src="https://vjs.zencdn.net/8.23.4/video.min.js"></script>
</body>
</html>