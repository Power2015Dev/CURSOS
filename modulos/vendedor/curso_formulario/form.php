<?php

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usuario_id'])){
    header("Location: ../../../dashboard/dashboard.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURSO | FORMULARIO</title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="/imagenes/icono2d.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    
    <section class="bg">

    <form class="form" id="formulario" action="#" method="POST">
    

        <div class="form_container">
            <nav aria-label="Breadcrumb" class="glass-breadcrumbs">
            <ol>
                <li class="step active">
                    <a href="#">Informacion General</a>
                </li>
                
                <li class="step font-weight-normal">
                    <a href="#">Contenido de Galeria</a>
                </li>
                
                <li class="step font-weight-normal" aria-current="step">
                    Contenido del curso
                </li>
                
                <li class="step font-weight-normal">
                    Pasos Finales
                </li>
            </ol>
        </nav>

        <!-- Informacion General -->

        <article class="breadcrumb">
          

            <aside class="section_wrap">
            
                <fieldset class="input_form">
                <legend class="legend-top"><label for="titulo">Titulo</label></legend>
                <input type="text" class="input_text" id="titulo" name="titulo" placeholder="Titulo del Curso" required>
                </fieldset>

                

            </aside>

    


            <aside class="section_wrap">

            <fieldset class="input_form">
                <legend class="legend-top"><label for="desc">Descripcion</label></legend>
                <input type="text" class="input_text" id="desc" name="descripcion" placeholder="Descripcion del Curso" required>
                </fieldset>



            <fieldset class="input_form">
                <legend class="legend-top">Miniatura</legend>
                
                <button class="input_text" type="button" onclick="document.getElementById('img').click()">
                    <i class="fa-solid fa-upload" style="color: white;"></i> 
                    <span class="file_text"></span>
                    <span style="margin: 0;">Subir Miniatura</span>
                </button>
                
                <input type="file" id="img" name="miniatura" hidden accept=".jpg, .jpeg, .png" required>
            </fieldset>
           
            </aside>

            



            <div style="display: flex; gap: 20px;">
            <button type="button" class="anterior_miga">Atras</button>
            
            <button type="button" class="siguiente_miga">Siguiente Paso</button>
            </div>
            
            
        
    </article>

    <!-- CONTENIDO DE GALERIA -->

    <article class="breadcrumb">
          

            <aside class="section_wrap">
            
                <fieldset class="input_form">
                
                <input type="checkbox" id="descargable" name="descargable">
                <label for="descargable" name="descargable" style="color: white;">¿compartes material descargable?</label>
                
                </fieldset>

                
            
            </aside>

            <aside class="section_wrap">

            <fieldset class="input_form">

                <input type="checkbox" id="principiante" name="principiante">
                <label for="principiante" name="principiante" style="color: white;">¿Es apto para principiantes?</label>

            </fieldset>

            </aside>

            <aside class="section_wrap">

            <fieldset class="input_form">

                <input type="checkbox" id="certificado" name="certificado">
                <label for="certificado" name="certificado" style="color: white;">¿Incluye certificado de finalización?</label>

            </fieldset>

            </aside>

            <aside class="section_wrap">

            <fieldset class="input_form">

                <input type="checkbox" id="pratico" name="pratico">
                <label for="pratico" name="pratico" style="color: white;">¿Incluye proyectos prácticos?</label>

            </fieldset>

            </aside>

            <aside class="section_wrap">

            
            <fieldset class="input_form">
                <legend class="legend-top">Imagen u/o Video De Presentacion (MAX 8 archivos)</legend>
                
                <button class="input_text" type="button" onclick="document.getElementById('media').click()">
                    <i class="fa-solid fa-upload" style="color: white;"></i> 
                    <span class="file_text"></span>
                    <span style="margin: 0;">Subir Galeria</span>
                </button>
                
                <input type="file" id="media" name="galeria" class="file_text" hidden accept="image/*,video/*" multiple required>
            </fieldset>
            
            </aside>
            
            <p style="border: 2px solid white;border-radius: 15px;padding: 10px;color: white;backdrop-filter: blur(10px);">Puedes subir un video o una imagen para que los estudiantes puedan ver tu curso antes de comprarlo</p>
            

            <aside class="section_wrap">
            
                <fieldset class="input_form">
                <legend class="legend-top"><label for="FAQ1">FAQ #1</label></legend>
                <input type="text" class="input_text" name="FAQ1" id="FAQ1" placeholder="Preguntas Frecuentes (Opcional)">
                </fieldset>

                <fieldset class="input_form">
                <legend class="legend-top"><label for="FAQ1_R">FAQ #1 Respuesta</label></legend>
                <input type="text" class="input_text" name="FAQ1_R" id="FAQ1_R" placeholder="Respuesta" disabled>
                </fieldset>

            </aside>

            <aside class="section_wrap">
            
                <fieldset class="input_form">
                <legend class="legend-top"><label for="FAQ2">FAQ #2</label></legend>
                <input type="text" class="input_text" name="FAQ2" id="FAQ2" placeholder="Preguntas Frecuentes (Opcional)">
                </fieldset>

                <fieldset class="input_form">
                <legend class="legend-top"><label for="FAQ2_R">FAQ #2 Respuesta</label></legend>
                <input type="text" class="input_text" name="FAQ2_R" id="FAQ2_R" placeholder="Respuesta" disabled>
                </fieldset>

            </aside>

            <aside class="section_wrap">
            
                <fieldset class="input_form">
                <legend class="legend-top"><label for="FAQ3">FAQ #3</label></legend>
                <input type="text" class="input_text" name="FAQ3" id="FAQ3" placeholder="Preguntas Frecuentes (Opcional)">
                </fieldset>

                <fieldset class="input_form">
                <legend class="legend-top"><label for="FAQ3_R">FAQ #3 Respuesta</label></legend>
                <input type="text" class="input_text" name="FAQ3_R" id="FAQ3_R" placeholder="Respuesta" disabled>
                </fieldset>

            </aside>

            <aside class="section_wrap">
            
                <fieldset class="input_form">
                <legend class="legend-top"><label for="FAQ4">FAQ #4</label></legend>
                <input type="text" class="input_text" name="FAQ4" id="FAQ4" placeholder="Preguntas Frecuentes (Opcional)">
                </fieldset>

                <fieldset class="input_form">
                <legend class="legend-top"><label for="FAQ4_R">FAQ #4 Respuesta</label></legend>
                <input type="text" class="input_text" name="FAQ4_R" id="FAQ4_R" placeholder="Respuesta" disabled>
                </fieldset>

            </aside>

            <aside class="section_wrap">
            
                <fieldset class="input_form">
                <legend class="legend-top"><label for="FAQ5">FAQ #5</label></legend>
                <input type="text" class="input_text" name="FAQ5" id="FAQ5" placeholder="Preguntas Frecuentes (Opcional)">
                </fieldset>

                <fieldset class="input_form">
                <legend class="legend-top"><label for="FAQ5_R">FAQ #5 Respuesta</label></legend>
                <input type="text" class="input_text" name="FAQ5_R" id="FAQ5_R" placeholder="Respuesta" disabled>
                </fieldset>

            </aside>

            
            
            <div style="display: flex; gap: 20px;">
            <button type="button" class="anterior_miga">Atras</button>
            
            <button type="button" class="siguiente_miga">Siguiente Paso</button>
            </div>
            
            
        
    </article>

    <!-- CONTENIDO DEL CURSO -->

    <article class="breadcrumb">

        <aside class="section_wrap">
            
            <fieldset class="input_form">
                <legend class="legend-top"><label for="nombre_modulo">Modulo / Seccion</label></legend>
                <input type="text" class="input_text" name="nombre_modulo" id="nombre_modulo" placeholder="Ej: Introducción a las Salsas" required>
            </fieldset>

            <fieldset class="input_form">
                <legend class="legend-top"><label for="titulo_leccion">Titulo de la Leccion</label></legend>
                <input type="text" class="input_text" name="titulo_leccion" id="titulo_leccion" placeholder="Ej: Preparando el entorno" required>
            </fieldset>

            <fieldset class="input_form">
                <legend class="legend-top"><label for="desc_leccion">Descripcion de la Leccion</label></legend>
                <input type="text" class="input_text" name="desc_leccion" id="desc_leccion" placeholder="Ej: Aqui te voy a ensenar como preparar el entorno... (Opcional)" >
            </fieldset>

        </aside>

        <aside class="section_wrap">

                <fieldset class="input_form">
                    <legend class="legend-top">Video de la Clase</legend>
                    
                    <button class="input_text" type="button" onclick="document.getElementById('video_source').click()">
                        <i class="fa-solid fa-play-circle" style="color: white;"></i> 
                        <span class="file_text"></span>
                        <span style="margin: 0;">Seleccionar Video (MP4)</span>
                    </button>
                    
                    <input type="file" name="video_source" id="video_source" hidden accept="video/*" required>
                </fieldset>

                <fieldset class="input_form">
                    <legend class="legend-top">Recursos (Opcional)</legend>
                    
                    <button class="input_text" type="button" onclick="document.getElementById('material_source').click()">
                        <i class="fa-solid fa-folder-open" style="color: white;"></i> 
                        <span style="margin: 0;">Adjuntar Material (PDF, ZIP)</span>
                    </button>
                    
                    <input type="file" name="material_source" id="material_source" hidden accept=".pdf,.zip,.rar,.doc,.docx,.png,.jpg">
                </fieldset>

            </aside>

            <aside class="section_wrap" style="margin-top: 0;">
                <fieldset class="input_form">
                    <legend class="legend-top"><label for="link_externo">Enlace Externo (Opcional)</label></legend>
                    <div style="display: flex; align-items: center;">
                        <i class="fa-solid fa-link" style="color: white; margin-left: 15px; opacity: 1; transform: none;"></i>
                        <input type="url" name="link_externo" class="input_text" id="link_externo" placeholder="Ej: https://github.com/mi-proyecto">
                    </div>
                </fieldset>
            </aside>

            <button type="button" class="input_text" id="agregar_leccion" style="justify-content: center;cursor: default;"><i class="fa-solid fa-plus" style="opacity: 1; transform: none;cursor: pointer;" onclick="new_lesson()"></i></button>
            

            <div style="display: flex; gap: 20px;">
                <button type="button" class="anterior_miga">Atras</button>
                
                <button type="button" class="siguiente_miga">Siguiente Paso</button>
            </div>

        </article>

        <!-- Pasos finales -->

                <article class="breadcrumb">

                

               

               


                <div style="width: 100%; text-align: center; margin-bottom: 20px;">
                    <h3 style="color: white; font-family: 'Montserrat', sans-serif; font-weight: 500;">Detalles de Publicación</h3>
                </div>

                <aside class="section_wrap">

                    <fieldset class="input_form">
                        <legend class="legend-top"><label for="categoria">Categoria del Curso</label></legend>
                        <select class="input_text" name="categoria" id="categoria" style="appearance: none;"> <option value="" disabled selected>Selecciona una...</option>
                            <option value="dev">Desarrollo & Programacion</option>
                            <option value="design">Diseño Grafico</option>
                            <option value="marketing">Marketing Digital</option>
                            <option value="business">Negocios</option>
                            <option value="lifestyle">Estilo de Vida</option>
                            <option value="other">Otro</option>
                        </select>
                        </fieldset>

                    <fieldset class="input_form">
                        <legend class="legend-top"><label for="nivel">Nivel de Dificultad</label></legend>
                        <select class="input_text" name="dificultad" id="nivel">
                            <option value="" disabled selected>Selecciona una...</option>
                            <option value="principiante">Principiante (Desde cero)</option>
                            <option value="intermedio">Intermedio (Conocimientos previos)</option>
                            <option value="avanzado">Avanzado (Expertos)</option>
                            <option value="todos">Para todos los niveles</option>
                        </select>
                    </fieldset>

                </aside>

                <aside class="section_wrap">
                    <fieldset class="input_form" style="flex: 1 1 100%;"> <legend class="legend-top"><label for="mensaje_bienvenida">Mensaje Automático de Bienvenida</label></legend>
                        <div style="display: flex; align-items: flex-start;">
                            <i class="fa-solid fa-envelope-open-text" style="color: white; margin: 15px 0 0 15px; opacity: 1; transform: none;"></i>
                            <textarea class="input_text" name="mensaje_bienvenida" id="mensaje_bienvenida" rows="3" placeholder="Ej: ¡Gracias por unirte! Te recomiendo empezar instalando el software..." style="resize: none;"></textarea>
                        </div>
                    </fieldset>
                </aside>

                <aside class="section_wrap">
            
                <fieldset class="input_form">
                <legend class="legend-top"><label for="precio">Precio del Curso</label></legend>
                <div style="display: flex; align-items: center;">
                    <input type="number" class="input_text" id="precio" name="precio" required>
                    <i class="fa-solid fa-dollar-sign" id="icono_precio" style="margin-left: 15px; opacity: 1; transform: none;"></i>
                </div>    
                </fieldset>

                <fieldset class="input_form">
                <legend class="legend-top"><label for="redes">Redes Sociales (Opcional)</label></legend>
                    <input type="text" class="input_text" id="redes" name="redes">
              
                </fieldset>

                

                </aside>


                <aside class="section_wrap">
                    <fieldset class="input_form">
                        <legend class="legend-top"><label for="red_social">Enlace a Portafolio / LinkedIn</label></legend>
                        <div style="display: flex; align-items: center;">
                            <i class="fa-brands fa-linkedin" style="color: white; margin-left: 15px; opacity: 1; transform: none;"></i>
                            <input type="url" class="input_text" id="red_social" placeholder="https://linkedin.com/in/tu-perfil">
                        </div>
                    </fieldset>
                </aside>

                <div style="margin: 20px 0; display: flex; align-items: center; gap: 10px;">
                    <fieldset class="input_form" style="border: none; background: transparent; padding: 0;">
                        <input type="checkbox" id="terminos_finales" required style="width: 18px; height: 18px; accent-color: #A0E7E5; cursor: pointer;">
                        <label for="terminos_finales" style="color: white; font-size: 0.9rem; cursor: pointer;">
                            Certifico que este contenido es original y acepto las <a href="#" style="color: #A0E7E5;">políticas de autor</a>.
                        </label>
                    </fieldset>
                </div>

                 <p style="color: rgba(255,255,255,0.6); font-size: 0.8rem; margin-top: -10px; margin-bottom: 30px; text-align: center; max-width: 80%;">
                    <i class="fa-solid fa-circle-info"></i> La plataforma retiene una <strong>tarifa de servicio del 20%</strong> por cada venta para cubrir costos de marketing y alojamiento.
                </p>

                <div style="width: 100%; text-align: center; margin-bottom: 20px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;"></div>

                <div style="display: flex; gap: 20px; margin-top: 10px;">
                    <button type="button" class="anterior_miga">Atras</button>
                    
                    <button type="submit" id="btn_finalizar">Publicar Curso</button>
                </div>

    </article>

 
    </form>

    </section>
        <script src="api_form/fetch.js"></script>
        <script src="form.js"></script>
</body>
</html>