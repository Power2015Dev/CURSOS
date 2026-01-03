<?php
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }

    if(!isset($_SESSION['usuario_id'])){
        header("Location: ../../dashboard/dashboard.php");
        exit();
}


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
        <a href="/modulos/vendedor/curso_formulario/form.php">
        <button class="boton">+ Nuevo Curso</button>
        </a>
    </div>
</aside>