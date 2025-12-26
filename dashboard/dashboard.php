<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../modulos/navbar/navbar_style.css">
    <link rel="stylesheet" href="dashboard_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="icon" type="image/png" href="../imagenes/icono2d.png"> 
</head>
<body>
    <?php 
        include __DIR__ . '/../modulos/navbar/navbar.php';
    ?>

    <div id="grid_layout"> 

        <div class="grid_item grid_1">
            <h2 style="color: #77b8e9;">Recomendados para ti</h2>
            <div id="functions_container">
                <span class="arrow left material-symbols-outlined">navigate_next</span>
                <div class="cuatro_cajas"> 
                    <div class="slider-track">
                        <!--controlado por js-->

                        <!--inicio de tarjetas de esqueletos-->

                        <div class="course_card">
                    <div class="card_header">
                        <div class="skeleton_osc" style="width: 100%; height: 100%;"></div>
                    </div>
                    <div class="card_body">
                        <div class="skeleton_osc" style="width: 80%; height: 15px; margin-bottom: 10px;"></div>
                        <div class="skeleton_osc" style="width: 40%; height: 10px; margin-bottom: 20px;"></div>
                        <div class="card_meta">
                             <div class="skeleton_osc" style="width: 30%; height: 10px;"></div>
                             <div class="skeleton_osc" style="width: 20%; height: 10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="course_card">
                    <div class="card_header">
                        <div class="skeleton_osc" style="width: 100%; height: 100%;"></div>
                    </div>
                    <div class="card_body">
                        <div class="skeleton_osc" style="width: 80%; height: 15px; margin-bottom: 10px;"></div>
                        <div class="skeleton_osc" style="width: 40%; height: 10px; margin-bottom: 20px;"></div>
                        <div class="card_meta">
                             <div class="skeleton_osc" style="width: 30%; height: 10px;"></div>
                             <div class="skeleton_osc" style="width: 20%; height: 10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="course_card">
                    <div class="card_header">
                        <div class="skeleton_osc" style="width: 100%; height: 100%;"></div>
                    </div>
                    <div class="card_body">
                        <div class="skeleton_osc" style="width: 80%; height: 15px; margin-bottom: 10px;"></div>
                        <div class="skeleton_osc" style="width: 40%; height: 10px; margin-bottom: 20px;"></div>
                        <div class="card_meta">
                             <div class="skeleton_osc" style="width: 30%; height: 10px;"></div>
                             <div class="skeleton_osc" style="width: 20%; height: 10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="course_card">
                    <div class="card_header">
                        <div class="skeleton_osc" style="width: 100%; height: 100%;"></div>
                    </div>
                    <div class="card_body">
                        <div class="skeleton_osc" style="width: 80%; height: 15px; margin-bottom: 10px;"></div>
                        <div class="skeleton_osc" style="width: 40%; height: 10px; margin-bottom: 20px;"></div>
                        <div class="card_meta">
                             <div class="skeleton_osc" style="width: 30%; height: 10px;"></div>
                             <div class="skeleton_osc" style="width: 20%; height: 10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="course_card">
                    <div class="card_header">
                        <div class="skeleton_osc" style="width: 100%; height: 100%;"></div>
                    </div>
                    <div class="card_body">
                        <div class="skeleton_osc" style="width: 80%; height: 15px; margin-bottom: 10px;"></div>
                        <div class="skeleton_osc" style="width: 40%; height: 10px; margin-bottom: 20px;"></div>
                        <div class="card_meta">
                             <div class="skeleton_osc" style="width: 30%; height: 10px;"></div>
                             <div class="skeleton_osc" style="width: 20%; height: 10px;"></div>
                        </div>
                    </div>
                </div>

                        <!--fin de tarjetas de esqueletos-->

                        </div>
                </div> 
                <span class="arrow right material-symbols-outlined">navigate_next</span>
            </div>
        </div>

        <div class="grid_item grid_2">
    <h2 style="color: #77b8e9;">Populares</h2>
    
    <div id="small_functions_container">
        <span class="small_arrow small_left material-symbols-outlined">navigate_next</span>
        
        <div class="nuevas_cajas"> 
            <div class="slider-small">
                
                <!--controlado por js-->

                <!--inicio de tarjetas de esqueletos-->

                <!--fin de tarjetas de esqueletos-->
                
            </div>
        </div> 
        
        <span class="small_arrow small_right material-symbols-outlined">navigate_next</span>
    </div>
</div>

<template id="small_card_skeleton_template">
    <div class="small_card">
        <div class="skeleton" style="width: 100%; height: 100%; position: absolute; top:0; left:0;"></div>
        
        <div class="card_content">
            <div class="skeleton_osc" style="width: 50px; height: 25px; border-radius: 20px; align-self: flex-start;"></div>
            
            <div class="text_info" style="width: 100%;">
                <div class="skeleton_osc" style="width: 80%; height: 18px; margin-bottom: 8px;"></div>
                <div class="skeleton_osc" style="width: 40%; height: 12px;"></div>
            </div>
        </div>
    </div>
</template>

        <div class="grid_item grid_3">
            <h2 style="color: #77b8e9;">Mas vistos de hoy</h2>
            <div id="small_functions_container">
        <span class="small_arrow small_left material-symbols-outlined">navigate_next</span>
        
        <div class="nuevas_cajas"> 
            <div class="slider-small">
                
                <!--controlado por js-->

                <!--inicio de tarjetas de esqueletos-->

                <!--fin de tarjetas de esqueletos-->

            </div>
        </div> 
        
        <span class="small_arrow small_right material-symbols-outlined">navigate_next</span>
    </div>
        </div>



        <div class="grid_item grid_4">
            <h2 style="color: #77b8e9;">Servicios que te pueden gustar</h2>
        <div id="small_functions_container">
            <span class="small_arrow small_left material-symbols-outlined">navigate_next</span>
        
            <div class="nuevas_cajas"> 
                <div class="slider-small">
                
                    <!--controlado por js-->

                    <!--inicio de tarjetas de esqueletos-->

                    <!--fin de tarjetas de esqueletos-->
                
                </div>
            </div> 
        
            <span class="small_arrow small_right material-symbols-outlined">navigate_next</span>
        </div>
    </div>

    <div class="grid_item grid_5">
            <h2 style="color: #77b8e9;">Nuevos Lanzamientos</h2>
            <div id="small_functions_container">
                <span class="small_arrow small_left material-symbols-outlined">navigate_next</span>
                <div class="nuevas_cajas"> 
                    <div class="slider-small">
                        <!--controlado por js-->
                        <!--inicio de tarjetas de esqueletos-->

                        <!--fin de tarjetas de esqueletos-->
                        </div>
                </div> 
                <span class="small_arrow small_right material-symbols-outlined">navigate_next</span>
            </div>
        </div>

        <div class="grid_item grid_6">
            <h2 style="color: #77b8e9;">Mejor Valuados</h2>
            <div id="small_functions_container">
                <span class="small_arrow small_left material-symbols-outlined">navigate_next</span>
                <div class="nuevas_cajas"> 
                    <div class="slider-small">
                        <!--controlado por js-->
                        <!--inicio de tarjetas de esqueletos-->

                        <!--fin de tarjetas de esqueletos-->

                        </div>
                </div> 
                <span class="small_arrow small_right material-symbols-outlined">navigate_next</span>
            </div>
        </div>

        <div class="grid_item grid_7">
            <h2 style="color: #77b8e9;">Ofertas Flash</h2>
            <div id="small_functions_container">
                <span class="small_arrow small_left material-symbols-outlined">navigate_next</span>
                <div class="nuevas_cajas"> 
                    <div class="slider-small">
                        <!--controlado por js-->
                        <!--inicio de tarjetas de esqueletos-->

                        <!--fin de tarjetas de esqueletos-->

                        </div>
                </div> 
                <span class="small_arrow small_right material-symbols-outlined">navigate_next</span>
            </div>
        </div>



    </div> 
    <template id="skeleton_template">
        <div class="curso_actual">
            <div class="curso_img_skeleton">
                <div class="skeleton skeleton-text_line1"></div>
            </div>
            <div class="curso_info">
                <div class="skeleton_osc" style="width: 60%; height: 15px; margin-bottom: 10px;"></div>
                <div class="skeleton_osc" style="width: 100%; height: 10px;"></div>
            </div>
        </div>
    </template>

    <!--skeleton card del recomendacion para ti-->
    <template id="skeleton_card_template">
        <div class="course_card">
            <div class="card_header">
                <div class="skeleton_osc" style="width: 100%; height: 100%;"></div>
            </div>
            <div class="card_body">
                <div class="skeleton_osc" style="width: 80%; height: 15px; margin-bottom: 10px;"></div>
                <div class="skeleton_osc" style="width: 40%; height: 10px; margin-bottom: 20px;"></div>
                <div class="card_meta">
                     <div class="skeleton_osc" style="width: 30%; height: 10px;"></div>
                     <div class="skeleton_osc" style="width: 20%; height: 10px;"></div>
                </div>
            </div>
        </div>
    </template>
    <!--termina skeleton card del recomendacion para ti-->

    

    <footer class="site-footer">
    <div class="footer-content">
        
        <div class="footer-section brand-section">
            <img src="../imagenes/kursa_logo_claro.png" alt="Kursa Logo" class="footer-logo">
            <p class="copyright-text">
                &copy; 2025 Kursa Inc.<br>
                Todos los derechos reservados.
            </p>
        </div>

        <div class="footer-section links-section">
            <h3>Soporte</h3>
            <ul>
                <li><a href="#">Centro de Ayuda</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Términos y Condiciones</a></li>
                <li><a href="#">Política de Privacidad</a></li>
            </ul>
        </div>

        <div class="footer-section social-section">
            <h3>Síguenos</h3>
            <div class="social-icons">
                <a href="#" aria-label="X (Twitter)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                </a>
                <a href="#" aria-label="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="currentColor"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
                </a>
                <a href="#" aria-label="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.5 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.9 0-184.9zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                </a>
                <a href="#" aria-label="TikTok">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/></svg>
                </a>
                <a href="#" aria-label="LinkedIn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>
                </a>
            </div>
        </div>
    </div>
</footer>

    
    <script src="dashboard_Scroll.js"></script>
    <script type="module" src="dashboard_loader.js"></script>
    
    </body>
</html>