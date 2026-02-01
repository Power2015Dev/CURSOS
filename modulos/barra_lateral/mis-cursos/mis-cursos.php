<?php

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../../../dashboard/dashboard.php");
    exit();
}

//RECORDATORIO la clase "visto" es para colorear el icono de color verde
// "activo" es la seleccion de la barra lateral
?>

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
    <link rel="stylesheet" href="/libraries/videojs/video-js.min.css" />
    <link rel="stylesheet" href="/video_stylesheet/video-js_kursa.css" />
</head>
<body>

  <?php 
        include __DIR__ . '/../../navbar/navbar.php';
    ?>

    <div class="contenedor">
        
        <main class="izq">
            
            <div class="video-box">
                <video controls id="video-player" class="video-js vjs-fluid vjs-modern" preload="auto" width="720" height="540">
                    <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
                <div class="titulo-video">
                    <h2 id="titulo-h2"></h2>
                </div>
            </div>

            <div class="pestanas">
                <button class="boton activo" onclick="abrir('desc')">Descripción</button>
                <button class="boton" onclick="abrir('anun')">Anuncios</button>
                
            </div>

            <div class="contenido-pestanas">
                
                <div id="desc" class="caja info" style="display: flex;flex-direction: column; gap: 20px;">
                    <h3>Detalles de la clase</h3>
                    <p id="descripcion-detalles"></p>
                    
                    <h4>Recursos descargables:</h4>
                    <ul class="lista-recursos" style="display: flex;flex-direction: column; gap: 40px;">
                        <li><i class="fa-solid fa-file-pdf"></i><a href="" class="material_link"></a></li>
                        
                        <li><i class="fa-solid fa-code"></i><a href="" class="material_link"></a></li>
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

                

            </div>
        </main>

      <aside class="lateral">
    
    <div class="titulo-seccion">
        <h3>Contenido del Curso</h3>
        <small>Progreso: 15%</small>
    </div>
    
    <div class="lista" id="list"> <!-- AQUI COMIENZA LA LISTA -->
    
      

    

    
        

    </div> <!-- AQUI TERMINA LA LISTA -->

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
    
    <script type="module" src="get_url.js"></script>
    <script src="https://vjs.zencdn.net/8.23.4/video.min.js"></script>
</body>
</html>