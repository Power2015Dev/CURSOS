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
</head>
<body>

  <?php 
        include __DIR__ . '/../../navbar/navbar.php';
    ?>

    <div class="contenedor">
        
        <main class="izq">
            
            <div class="video-box">
                <video controls poster="">
                    <source src="" type="video/mp4">
                    Tu navegador no soporta el video.
                </video>
                <div class="titulo-video">
                    <h2></h2>
                </div>
            </div>

            <div class="pestanas">
                <button class="boton activo" onclick="abrir('desc')">Descripción</button>
                <button class="boton" onclick="abrir('anun')">Anuncios</button>
                
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

</body>
</html>