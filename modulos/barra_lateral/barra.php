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
<!-- Mobile menu toggle (only output when this file is included) -->
<button id="mobile_menu_toggle" class="mobile-menu-button" aria-expanded="false" aria-controls="sidebar" aria-label="Abrir menú">☰</button>
<!-- Overlay for mobile sidebar -->
<div class="lateral-overlay" id="lateral_overlay" aria-hidden="true"></div>
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
<script>
;(function(){
    var btn = document.getElementById('mobile_menu_toggle');
    var lateral = document.querySelector('.lateral');
    var overlay = document.getElementById('lateral_overlay');
    if(!btn || !lateral) return;

    btn.addEventListener('click', function(){
        var open = lateral.classList.toggle('open');
        btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        if(overlay) overlay.classList.toggle('show', open);
    });

    if(overlay){
        overlay.addEventListener('click', function(){
            lateral.classList.remove('open');
            overlay.classList.remove('show');
            btn.setAttribute('aria-expanded', 'false');
        });
    }

    // close sidebar when clicking any link inside it (mobile behavior)
    lateral.addEventListener('click', function(e){
        if(e.target.closest && e.target.closest('a')){
            lateral.classList.remove('open');
            overlay && overlay.classList.remove('show');
            btn.setAttribute('aria-expanded', 'false');
        }
    });
})();
</script>