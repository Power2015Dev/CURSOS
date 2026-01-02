<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis Cursos - Kursa</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="../navbar/navbar_style.css">
    
    <link rel="stylesheet" href="/CURSOS/modulos/barra_lateral/barra.css">
    
    <link rel="stylesheet" href="gestioncurso.css"> 
</head>
<body>

    <?php include __DIR__ . '/../../modulos/navbar/navbar.php'; ?>

    <?php include __DIR__ . '/../barra_lateral/barra.php'; ?>
      
    <main class="contenido">
        
        <header class="encabezado">
            <h1>Mis Cursos</h1>
            <p>Administra, edita y crea nuevo contenido para tus estudiantes.</p>
        </header>

        <section class="herramientas">
            <div class="buscador-interno">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Buscar por título...">
            </div>
            <div class="filtros-grupo">
                <select class="selector">
                    <option>Todos</option>
                    <option>Publicados</option>
                    <option>Borradores</option>
                </select>
                <button class="boton-primario"><i class="fa-solid fa-plus"></i> Crear Curso</button>
            </div>
        </section>

        <section class="catalogo">
            <article class="curso">
                    <div class="imagen-contenedor">
                        <img src="https://img.freepik.com/foto-gratis/codigo-html-css-desarrollador-web_23-2150038859.jpg" alt="Curso HTML">
                        <span class="estado publicado">Publicado</span>
                    </div>
                    <div class="detalle-curso">
                        <h3>Desarrollo Web Completo: HTML & CSS</h3>
                        <p class="precio">$15.00</p>
                        <div class="acciones-curso">
                            <button class="btn-editar">Editar</button>
                            <button class="btn-ver"><i class="fa-solid fa-eye"></i></button>
                        </div>
                    </div>
                </article>

                <article class="curso">
                    <div class="imagen-contenedor">
                        <img src="https://img.freepik.com/foto-gratis/programacion-fondo-collage_23-2149901770.jpg" alt="Curso JS">
                        <span class="estado revision">En Revisión</span>
                    </div>
                    <div class="detalle-curso">
                        <h3>JavaScript Moderno 2025</h3>
                        <p class="precio">$25.00</p>
                        <div class="acciones-curso">
                            <button class="btn-editar">Editar</button>
                            <button class="btn-borrar"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </article>
        </section>

    </main>

</body>
</html>