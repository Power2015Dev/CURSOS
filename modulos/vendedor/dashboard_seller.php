<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Panel de Vendedor - Kursa</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />


  <link rel="icon" type="image/png" href="/CURSOS/imagenes/icono2d.png" />
   <link rel="stylesheet" href="/CURSOS/modulos/barra_lateral/barra.css">
  <link rel="stylesheet" href="../navbar/navbar_style.css" />
  <link rel="stylesheet" href="style.css" /> 
</head>
<body>

  <?php 
        include __DIR__ . '/../../modulos/navbar/navbar.php'
    ?>
    <?php include __DIR__ . '/../barra_lateral/barra.php'; ?>


  <div class="contenedor-dashboard">
    
    <aside >
        
         
       

        
    </aside>

    <main class="area-trabajo">
        
        <header class="cabecera-panel">
            <h1>Panel de Control</h1>
            <p>Bienvenido de nuevo, aquí está el resumen de tu rendimiento hoy.</p>
        </header>

        <section class="grid-stats">
            <div class="tarjeta-stat">
                <div class="icono-stat azul"></div>
                <div class="info-stat">
                    <h3>Ingresos Totales</h3>
                    <p class="numero-grande">US$ 1,250</p>
                    <span class="crecimiento positivo">▲ 12% este mes</span>
                </div>
            </div>

            <div class="tarjeta-stat">
                <div class="icono-stat verde"></div>
                <div class="info-stat">
                    <h3>Estudiantes</h3>
                    <p class="numero-grande">450</p>
                    <span class="crecimiento positivo">▲ 5 nuevos hoy</span>
                </div>
            </div>

            <div class="tarjeta-stat">
                <div class="icono-stat naranja"></div>
                <div class="info-stat">
                    <h3>Calificación</h3>
                    <p class="numero-grande">4.8</p>
                    <span class="crecimiento neutro">Based on 120 reviews</span>
                </div>
            </div>

            <div class="tarjeta-stat">
                <div class="icono-stat morado"></div>
                <div class="info-stat">
                    <h3>Cursos Activos</h3>
                    <p class="numero-grande">3</p>
                    <span class="enlace-stat">Ver todos</span>
                </div>
            </div>
        </section>

        <section class="grid-doble">
            
            <div class="panel-grafica">
                <div class="cabecera-seccion">
                    <h3>Rendimiento de Ventas</h3>
                    <select class="filtro-tiempo">
                        <option>Últimos 7 días</option>
                        <option>Este mes</option>
                        <option>Este año</option>
                    </select>
                </div>
                <div class="grafica-placeholder">
                    <div class="barras">
                        <div class="barra" style="height: 40%"></div>
                        <div class="barra" style="height: 60%"></div>
                        <div class="barra" style="height: 30%"></div>
                        <div class="barra" style="height: 80%"></div>
                        <div class="barra" style="height: 50%"></div>
                        <div class="barra" style="height: 90%"></div>
                        <div class="barra" style="height: 70%"></div>
                    </div>
                    <div class="eje-x">
                        <span>Lun</span><span>Mar</span><span>Mié</span><span>Jue</span><span>Vie</span><span>Sáb</span><span>Dom</span>
                    </div>
                </div>
            </div>

            <div class="panel-actividad">
                <h3>Actividad Reciente</h3>
                <ul class="lista-notificaciones">
                    <li class="item-notificacion">
                        <img src="https://img.freepik.com/foto-gratis/hombre-joven-confiado-traje-gafas_329181-11883.jpg" alt="User">
                        <div class="texto-notif">
                            <p><strong>Carlos M.</strong> compró "Curso Java"</p>
                            <small>Hace 2 horas</small>
                        </div>
                        <span class="monto">+ $20</span>
                    </li>
                    <li class="item-notificacion">
                        <img src="https://img.freepik.com/foto-gratis/mujer-joven-feliz-gafas_23-2148113460.jpg" alt="User">
                        <div class="texto-notif">
                            <p><strong>Ana G.</strong> dejó una reseña de 5★</p>
                            <small>Hace 5 horas</small>
                        </div>
                    </li>
                    <li class="item-notificacion">
                        <div class="icono-sistema">🎉</div>
                        <div class="texto-notif">
                            <p>Logro desbloqueado: 100 Ventas</p>
                            <small>Ayer</small>
                        </div>
                    </li>
                </ul>
            </div>

        </section>

    </main>
  </div>



</body>
</html>