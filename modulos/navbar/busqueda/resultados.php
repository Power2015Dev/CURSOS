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
    <link rel="icon" type="image/png" href="/imagenes/icono2d.png"> 
</head>
<body>

    <?php include __DIR__ . '/../../../modulos/navbar/navbar.php'; ?>

    <main class="results-container">
        
        <div class="results-header">
            <h1>Resultados para: <span><?php  echo '"'. $_GET['search'] . '"';?></span></h1>
            <p id="result-count"></p>
        </div>

        <section class="results-grid">

            <!-- con js -->
            
            </section>
    </main>

    
    <script type="module" src="result.js"></script>
     <script type="module" src="../../../modulos/navbar/notifications_loading.js"></script>
     <script type="module" src="../../../modulos/navbar/Mail_box_loading.js"></script>
</body>
</html>