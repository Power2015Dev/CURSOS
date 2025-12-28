<?php
// Obtenemos el nombre del archivo actual
// Esto sirve para saber qué botón pintar de azul
$pagina_actual = basename($_SERVER['PHP_SELF']);


$nombre_usuario = $_SESSION['usuario_nombre'] ?? "Usuario";
$ruta_avatar = !empty($_SESSION['usuario_img']) ? $_SESSION['usuario_img'] : '../../imagenes/dashboard_img/perfil.png';

?>

<aside class="sidebar">
    <div class="sidebar-header">
        <img src="<?php echo $ruta_avatar; ?>" alt="Avatar" class="mini-avatar">
        <h3><?php echo htmlspecialchars($nombre_usuario); ?></h3>
    </div>
    
    <ul class="sidebar-menu">
        <li>
            <a href="editar_perfil.php" class="<?php echo ($pagina_actual == 'editar_perfil.php' || $pagina_actual == 'editar_perfil.html') ? 'active' : ''; ?>">
                <i class="fas fa-user"></i> Mi Perfil
            </a>
        </li>
        <li>
            <a href="seguridad.php" class="<?php echo ($pagina_actual == 'seguridad.php') ? 'active' : ''; ?>">
                <i class="fas fa-lock"></i> Seguridad
            </a>
        </li>
        <li>
            <a href="pagos.php" class="<?php echo ($pagina_actual == 'pagos.php') ? 'active' : ''; ?>">
                <i class="fas fa-credit-card"></i> Métodos de pago
            </a>
        </li>
        <li>
            <a href="notificaciones.php" class="<?php echo ($pagina_actual == 'notificaciones.php') ? 'active' : ''; ?>">
                <i class="fas fa-bell"></i> Notificaciones
            </a>
        </li>
        
        <li style="margin-top: 20px; border-top:1px solid #eee; padding-top:10px;">
            <a href="../PHP/cerrar_sesion.php" style="color:#d9534f;">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </a>
        </li>
    </ul>
</aside>