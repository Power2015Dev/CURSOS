<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../PHP/iniciar_sesion.php"); 
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
    
   <?php include '../navbar/navbar.php'; ?>

    <div id="flex_layout"> 
        <div class="box_container main-content">
            <div class="header-cursos">
                <h2>Mis cursos</h2>
                <hr>
                
                <div class="controls-container">
                    
                    <div class="filter-wrapper">
                        <div class="dropdown" id="myDropdown">
                            <button class="dropdown-btn">
                                <span id="current-selection">Todos</span>
                                <i class="arrow"></i>
                            </button>
                            <div class="dropdown-content">
                                <a href="#" data-value="Finalizados">Finalizados</a>
                                <a href="#" data-value="En curso">En curso</a>
                                <a href="#" data-value="Favoritos">Favoritos</a>
                                <a href="#" data-value="Todos">Todos</a>
                            </div>
                        </div>
                    </div>

                    <form class="search-container" action="" method="GET">
                        <input type="text" class="search-input" name="q" placeholder="Buscar contenido..." required>
                        <button type="submit" class="search-button">Buscar</button>
                    </form>

                </div>
            </div>

            <div class="cursos_actuales">
                </div>

            <template id="skeleton_template">
                <div class="curso_actual skeleton_card_container" style="background-color: #fff;"> 
                    
                    <div class="curso_img_skeleton" style="width: 100%; height: 100%;"></div>
                    
                    <div style="position: absolute; bottom: 20px; left: 20px; width: 80%; z-index: 5;">
                        <div class="skeleton_osc" style="width: 70%; height: 20px; background-color: rgba(255,255,255,0.5);"></div>
                        
                        <div class="skeleton_osc" style="width: 100%; height: 10px; margin-top: 15px; background-color: rgba(255,255,255,0.3);"></div>
                        
                        <div class="skeleton_osc" style="width: 40%; height: 10px; background-color: rgba(255,255,255,0.3);"></div>
                    </div>

                </div>
            </template>
        </div> 

        

    </div> 
       

    <script type="module" src="js/skeleton_loading.js"></script>
    <script type="module" src="../configuracion/js/courses.js"></script>
</body>
</html>