<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../../dashboard/dashboard.php");
    exit();
}

$nombre_usuario = $_SESSION['usuario_nombre'] ?? "Usuario";
$ruta_avatar = !empty($_SESSION['usuario_img']) ? $_SESSION['usuario_img'] : '../../imagenes/dashboard_img/perfil.png';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métodos de Pago | Kursa</title>
    
    <link rel="stylesheet" href="../navbar/navbar_style.css">
    <link rel="stylesheet" href="../sidebar/sidebar.css">       
    <link rel="stylesheet" href="css/estilo_perfil.css"> 
    
    <link rel="stylesheet" href="css/estilo_pagos.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="../../imagenes/icono2d.png"> 
</head>
<body>

    <?php include '../navbar/navbar.php'; ?>

    <div class="page-wrapper">
        
        <?php include '../sidebar/sidebar.php'; ?>

        <main class="profile-content">
            <div class="form-header">
                <h2>Metodos de Pago</h2>
                <p style="color:#666; font-size:0.9rem;">Elige como quieres pagar tus cursos o recibir pagos.</p>
            </div>

            <form id="form-pagos">
                
                <label style="display:block; margin-bottom:15px; font-weight:600; color:#0A1931;">Selecciona un método:</label>
                
                <div class="payment-options">
                    
                    <label class="payment-option">
                        <input type="radio" name="metodo_pago" value="tarjeta">
                        <div class="payment-card">
                            <i class="fas fa-credit-card"></i>
                            <span>Tarjeta</span>
                        </div>
                    </label>

                    <label class="payment-option">
                        <input type="radio" name="metodo_pago" value="paypal">
                        <div class="payment-card">
                            <i class="fab fa-paypal" style="color:#003087;"></i>
                            <span>PayPal</span>
                        </div>
                    </label>

                    <label class="payment-option">
                        <input type="radio" name="metodo_pago" value="binance">
                        <div class="payment-card">
                            <i class="fa fa-bank" style="color:#333;"></i>
                            <span>Transferencia Bancaria</span>
                        </div>
                    </label>
                </div>

                <div id="credit-card-form">
                    <h3 style="color:#0A1931; margin-bottom:15px; font-size:1rem;">
                        <i class="fas fa-lock"></i> Datos de la Tarjeta
                    </h3>
                    
                    <div class="form-grid">
                        <div class="input-group">
                            <label>Nombre en la tarjeta</label>
                            <input type="text" placeholder="Como aparece en el plástico">
                        </div>
                        
                        <div class="input-group">
                            <label>Numero de tarjeta</label>
                            <div style="position:relative;">
                                <input type="text" placeholder="0000 0000 0000 0000" maxlength="19">
                                <i class="fas fa-credit-card" style="position:absolute; right:15px; top:13px; color:#ccc;"></i>
                            </div>
                        </div>

                        <div class="card-row">
                            <div class="input-group card-col-half">
                                <label>Vencimiento</label>
                                <input type="text" placeholder="MM/AA" maxlength="5">
                            </div>
                            <div class="input-group card-col-half">
                                <label>CVC / CVV</label>
                                <input type="password" placeholder="123" maxlength="4">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="paypal-info">
                    <i class="fab fa-paypal" style="font-size:3rem; color:#003087; margin-bottom:10px;"></i>
                    <p>Serás redirigido a <strong>PayPal</strong> para completar la vinculación de forma segura.</p>
                </div>

                <div class="form-actions" style="margin-top: 30px;">
                    <button type="submit" class="btn-guardar">Guardar Método de Pago</button>
                </div>

            </form>
        </main>
    </div>
    <?php include '../footer/footer.php'; ?>
    <script src="js/pagos.js"></script>

</body>
</html>