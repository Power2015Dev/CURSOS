<?php
    // Detecta el nombre del archivo actual (ej: ingresos.php)
    $pagina_actual = basename($_SERVER['PHP_SELF']);
?>
<link rel="stylesheet" href="/modulos/barra_lateral/barra.css">
<aside class="lateral">
    <ul class="menu">
        
        <a href="/modulos/vendedor/dashboard_seller.php">
            <li class="opcion <?php if($pagina_actual == 'resumen.php'){ echo 'activo'; } ?>">
                Resumen
            </li>
        </a>

        <a href="/modulos/vendedor/gestioncurso.php">
            <li class="opcion <?php if($pagina_actual == 'cursos.php'){ echo 'activo'; } ?>">
                Gestionar Cursos
            </li>
        </a>

        <a href="/modulos/vendedor/ingresos.php">
            <li class="opcion <?php if($pagina_actual == 'ingresos.php'){ echo 'activo'; } ?>">
                Ingresos
            </li>
        </a>

        <a href="configuracion.php">
            <li class="opcion <?php if($pagina_actual == 'configuracion.php'){ echo 'activo'; } ?>">
                Configuración
            </li>
        </a>

    </ul>

    <div class="inferior">
        <button class="boton">+ Nuevo Curso</button>
    </div>
</aside>