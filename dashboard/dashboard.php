<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../modulos/navbar/navbar_style.css">
    <link rel="stylesheet" href="dashboard_style.css">
    <link rel="stylesheet" href="/modulos/footer/footer.css">
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

    

    <?php include __DIR__ . '/../modulos/footer/footer.php'; ?>

    
    <script src="dashboard_Scroll.js"></script>
    <script type="module" src="dashboard_loader.js"></script>
    
    </body>
</html>