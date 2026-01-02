<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mis Ingresos - Kursa</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../navbar/navbar_style.css" />
  <link rel="icon" type="image/png" href="/CURSOS/imagenes/imagen_sin_fondo.png" />
  <link rel="stylesheet" href="ingresos.css" /> 
  <link rel="stylesheet" href="/CURSOS/modulos/barra_lateral/barra.css">
</head>
<body>

    <?php include __DIR__ . '/../../modulos/navbar/navbar.php'; ?>
     <?php include __DIR__ . '/../barra_lateral/barra.php'; ?>
 <div id="contenedor">
    
   

    <main class="contenido">
        
        <header class="encabezado">
            <h1>Panel de Finanzas</h1>
            <p>Resumen de tus ganancias y movimientos recientes.</p>
        </header>

        <section class="metricas">
            
            <div class="tarjeta">
                <div class="icono azul"><i class="fa-solid fa-chart-line"></i></div>
                <div class="datos">
                    <h3>Ingresos Totales</h3>
                    <p class="cifra">US$ 5,400</p>
                    <span class="subtexto positivo">▲ 15% este mes</span>
                </div>
            </div>

            <div class="tarjeta">
                <div class="icono naranja"><i class="fa-regular fa-calendar"></i></div>
                <div class="datos">
                    <h3>Este Mes</h3>
                    <p class="cifra">US$ 850</p>
                    <span class="subtexto neutro">12 ventas nuevas</span>
                </div>
            </div>

            <div class="tarjeta destacado">
                <div class="icono verde"><i class="fa-solid fa-sack-dollar"></i></div>
                <div class="datos">
                    <h3>Saldo Disponible</h3>
                    <p class="cifra">US$ 1,250</p>
                    <span class="subtexto positivo">Listo para retirar</span>
                </div>
            </div>

        </section>

        <section class="paneles">
            
            <div class="caja">
                <h3>Solicitar Retiro</h3>
                <p class="descripcion">Transfiere tus ganancias a tu cuenta.</p>
                
                <form class="formulario">
                    <label class="etiqueta">Monto a retirar</label>
                    <div class="campo">
                        <span><i class="fa-solid fa-dollar-sign"></i></span>
                        <input type="number" value="1250" class="entrada">
                    </div>

                    <label class="etiqueta">Método de pago</label>
                    <div class="campo">
                        <span><i class="fa-brands fa-paypal"></i></span>
                        <select class="entrada simple">
                            <option>PayPal</option>
                            <option>Transferencia</option>
                        </select>
                    </div>

                    <button type="button" class="confirmar">Confirmar Retiro</button>
                </form>
            </div>

            <div class="caja amplia">
                <div class="cabecera">
                    <h3>Movimientos</h3>
                    <select class="filtro">
                        <option>Este mes</option>
                        <option>Año</option>
                    </select>
                </div>

                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Concepto</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>22 Dic</td>
                            <td>Venta HTML</td>
                            <td class="verde">+$15.00</td>
                        </tr>
                        <tr>
                            <td>21 Dic</td>
                            <td>Venta CSS</td>
                            <td class="verde">+$20.00</td>
                        </tr>
                        <tr>
                            <td>20 Dic</td>
                            <td>Retiro</td>
                            <td class="gris">-$200.00</td>
                        </tr>
                        <tr>
                            <td>19 Dic</td>
                            <td>Venta Pack</td>
                            <td class="verde">+$45.00</td>
                        </tr>
                        <tr>
                            <td>18 Dic</td>
                            <td>Venta JS</td>
                            <td class="verde">+$35.00</td>
                        </tr>
                    </tbody>
                </table>

                <div class="paginacion">
                    <button class="pagina"><i class="fa-solid fa-chevron-left"></i></button>
                    <span class="info">1 / 5</span>
                    <button class="pagina"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>

        </section>

    </main>
 </div>

</body>
</html>