<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Busqueda | Kursa</title>
    
    <link rel="stylesheet" href="../../navbar/navbar_style.css">
    <link rel="stylesheet" href="resultados_style.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <link rel="icon" type="image/png" href="../../imagenes/icono2d.png"> 
</head>
<body>

    <?php include __DIR__ . '/../../../modulos/navbar/navbar.php'; ?>

    <main class="results-container">
        
        <div class="results-header">
            <h1>Resultados para: <span>"Producción musical"</span></h1>
            <p>Se encontraron 12 resultados</p>
        </div>

        <section class="results-grid">

            <article class="kursa-card">
                <div class="card-thumbnail">
                    <img src="https://concepto.de/wp-content/uploads/2020/08/Programacion-informatica-scaled-e1724960033513.jpg" alt="Thumbnail del curso">
                </div>
                
                <div class="card-content">
                    <div class="seller-info">
                        <img src="https://i.pravatar.cc/150?img=68" alt="Vendedor" class="seller-avatar">
                        <span class="seller-name">Javier Ast</span>
                    </div>

                    <h3 class="card-title">Llevaré tu música al siguiente nivel mezclando y masterizando.</h3>

                    <div class="rating-container">
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-half">star_half</span>
                    </div>

                    <div class="price-container">
                        <span class="price">50 US$</span>
                    </div>
                </div>
            </article>

            <article class="kursa-card">
                <div class="card-thumbnail">
                    <img src="https://img.freepik.com/vector-gratis/fondo-degradado-ui-ux_23-2149052117.jpg?semt=ais_hybrid&w=740&q=80" alt="Thumbnail del curso">
                </div>
                <div class="card-content">
                    <div class="seller-info">
                        <img src="https://i.pravatar.cc/150?img=12" alt="Vendedor" class="seller-avatar">
                        <span class="seller-name">Egon Beats</span>
                    </div>
                    <h3 class="card-title">Seré tu productor de música urbana, reggaetón, trap y afrobeat.</h3>
                    <div class="rating-container">
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                    </div>
                    <div class="price-container">
                        <span class="price">40 US$</span>
                    </div>
                </div>
            </article>

             <article class="kursa-card">
                <div class="card-thumbnail">
                    <img src="https://images.ctfassets.net/bbpb82zmp9gd/66Tzp5oDZMxJXbncHs9xjV/c1b8232f25aa022c3d9be067750d23a9/patterns-beatmaker.jpg" alt="Thumbnail del curso">
                </div>
                <div class="card-content">
                    <div class="seller-info">
                        <img src="https://i.pravatar.cc/150?img=33" alt="Vendedor" class="seller-avatar">
                        <span class="seller-name">Laura Guitar</span>
                    </div>
                    <h3 class="card-title">Clases de guitarra eléctrica y acústica para principiantes y avanzados.</h3>
                    <div class="rating-container">
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-filled">star</span>
                        <span class="material-symbols-outlined star-empty">star</span>
                    </div>
                    <div class="price-container">
                        <span class="price">25 US$</span>
                    </div>
                </div>
            </article>
            
            </section>
    </main>

    <script src="../../../modulos/navbar/dashboard_navbar.js"></script>
    <script type="module" src="dashboard_loader.js"></script>
     <script type="module" src="../../../modulos/navbar/notifications_loading.js"></script>
     <script type="module" src="../../../modulos/navbar/Mail_box_loading.js"></script>
</body>
</html>