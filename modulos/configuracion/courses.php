<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['usuario_id'])){
header("Location: ../../dashboard/dashboard.php");
exit();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis cursos</title>
    <link rel="stylesheet" href="../../modulos/navbar/navbar_style.css">
    <link rel="stylesheet" href="css/courses.css">
    <link rel="stylesheet" href="/modulos/footer/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/imagenes/icono2d.png">

</head>
<body>
    
    <?php 
        include __DIR__ . '/../../modulos/navbar/navbar.php';
    ?>

    <div id="flex_layout"> 
        
        <div class="box_container main-content">
            <div class="header-cursos">
                <h2>Mis cursos</h2>
                <hr>
                <div class="tabs">
                    <div class="filter_button">
                    <span>Todos</span>
                    
                    </div>

                    <div class="filter_button">
                    <span>En progreso</span>
                    </div>

                    <div class="filter_button">
                    <span>Finalizados</span> 
                    </div>
                </div>
              <!--  <button id="eliminartemp">Eliminar</button> -->
            </div>
            
            <div class="cursos_actuales">
                <!--controlado por js-->
                

                
            </div>

                <!--skeleton loading started-->
            <template id="skeleton_template">
                <div class="curso_actual">
            <div class="curso_img_skeleton">
                <div class="skeleton skeleton-text_line1"></div>
                <div class="skeleton skeleton-text_line2"></div>
                <div class="skeleton skeleton-text_line3"></div>
                <div class="skeleton skeleton-text_line4"></div>
                <div class="skeleton skeleton-text_line5"></div>
                
            </div>
     
            <div class="curso_info">
                <h3 class="skeleton_osc "></h3>
                
                <div class="progress_container">
                    <div class="skeleton_osc" style="width: 100%;height: 20px;" ></div>
                </div>
                <span class="skeleton_osc" style="width: 30%;" ></span>
            </div>

            </template>
                <!--skeleton loading ended-->


            </div>
        
        </div> 
    <div class="box_container sidebar">  
        <div class="center_text">       
            <h2>Tu Actividad</h2>
            <hr>
        </div>
        <div id="activity_content">

            <!--controlado por js-->

        </div> 
    </div>

<template id="activity_skeleton">
    <div class="activity-card">
        <div class="stats-row" style="opacity: 0.6;">
            <div class="stat-item skeleton_osc" style="height: 80px; background: #eee;"></div>
            <div class="stat-item skeleton_osc" style="height: 80px; background: #eee;"></div>
        </div>
        
        <div class="chart-wrapper" style="margin-top: 20px; opacity: 0.6;">
             <div class="skeleton_osc" style="width: 40%; height: 15px; margin-bottom: 15px;"></div>
             <div class="skeleton_osc" style="width: 100%; height: 200px; border-radius: 15px;"></div>
        </div>
    </div>
</template>




    </div> 

        <?php include __DIR__ . '/../footer/footer.php'; ?>
        <script src="../navbar/dashboard_navbar.js"></script>
        <script type="module" src="js/skeleton_loading.js"></script>
        <script type="module" src="../configuracion/js/courses.js"></script>
        <script type="module" src="../navbar/notifications_loading.js"></script>
        <script type="module" src="js/activity_loader.js"></script>
    

</body>
</html>