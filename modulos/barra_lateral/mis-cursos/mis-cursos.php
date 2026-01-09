<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reproductor de Curso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/modulos/navbar/navbar_style.css">
    <link rel="icon" type="image/png" href="/imagenes/icono2d.png">
    <link rel="stylesheet" href="mis-cursos.css">
</head>
<body>

  <?php 
        include __DIR__ . '/../../navbar/navbar.php';
    ?>

    <div class="contenedor">
        
        <main class="izq">
            
            <div class="video-box">
                <video controls poster="https://img.freepik.com/foto-gratis/fondo-programacion-collage_23-2149901770.jpg">
                    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                    Tu navegador no soporta el video.
                </video>
                <div class="titulo-video">
                    <h2>1. Introducción: Configuración del entorno</h2>
                </div>
            </div>

            <div class="pestanas">
                <button class="boton activo" onclick="abrir('desc')">Descripción</button>
                <button class="boton" onclick="abrir('anun')">Anuncios</button>
                <button class="boton" onclick="abrir('res')">Reseñas</button>
            </div>

            <div class="contenido-pestanas">
                
                <div id="desc" class="caja info">
                    <h3>Detalles de la clase</h3>
                    <p>En esta lección aprenderemos a instalar las herramientas necesarias (VS Code, Git) y escribiremos nuestra primera estructura HTML.</p>
                    
                    <h4>Recursos descargables:</h4>
                    <ul class="lista-recursos">
                        <li><i class="fa-solid fa-file-pdf"></i> Guía_Instalación.pdf</li>
                        <li><i class="fa-solid fa-code"></i> Ejercicio_Inicial.zip</li>
                    </ul>
                </div>

                <div id="anun" class="caja info" style="display: none;">
                    <div class="tarjeta-anuncio">
                        <div class="profe">
                            <img src="https://i.pravatar.cc/150?img=68" alt="Profe">
                            <div>
                                <b>Carlos Dev</b>
                                <span>Instructor</span>
                            </div>
                        </div>
                        <p>¡Chicos! He actualizado el video para mejorar el audio. Revisen el minuto 4:20.</p>
                        <small class="fecha">Hace 2 horas</small>
                    </div>
                </div>

                <div id="res" class="caja info" style="display: none;">
                    <div class="puntos">
                        <span class="grande">4.9</span>
                        <div class="estrellas">★★★★★</div>
                        <span>Valoración</span>
                    </div>
                    <hr>
                    <div class="comentario">
                        <div class="inicial">A</div>
                        <div>
                            <b>Ana Torres</b>
                            <div class="estrellas-chicas">★★★★★</div>
                            <p>Explicación muy clara y directa.</p>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <aside class="der">
            <div class="cabecera">
                <h3>Mis Cursos Comprados</h3>
            </div>
            
            <div class="lista-cursos">
                
                <a href="#" class="item">
                    <img src="https://img.freepik.com/foto-gratis/codigo-html-css-desarrollador-web_23-2150038859.jpg">
                    <div class="datos">
                        <h4>Desarrollo Web Completo</h4>
                        <div class="barra-fondo">
                            <div class="relleno" style="width: 80%;"></div>
                        </div>
                        <small>80% completado</small>
                    </div>
                </a>

                <a href="#" class="item">
                    <img src="https://img.freepik.com/foto-gratis/programacion-fondo-collage_23-2149901770.jpg">
                    <div class="datos">
                        <h4>JavaScript Moderno</h4>
                        <div class="barra-fondo">
                            <div class="relleno" style="width: 25%;"></div>
                        </div>
                        <small>25% completado</small>
                    </div>
                </a>

            </div>
        </aside>

    </div>

    <script>
        function abrir(id) {
            var infos = document.getElementsByClassName('info');
            for(var i=0; i < infos.length; i++) { infos[i].style.display = 'none'; }

            var botones = document.getElementsByClassName('boton');
            for(var i=0; i < botones.length; i++) { botones[i].classList.remove('activo'); }

            document.getElementById(id).style.display = 'block';
            event.currentTarget.classList.add('activo');
        }
    </script>

</body>
</html>