
        <?php 
        $titulo = $mensaje_promise ?? "null"; // ej: "¿Deseas cambiar tu contraseña?"
        // miralo como una variable booleana de true o false
        $caja_resolve = $caja_resuelta ?? "null"; // ej: "Cambiar contraseña" (resuelta significa confirmacion)
        $caja_reject = $caja_rechazada ?? "null"; // ej: "Cancelar" (rechazada significa cancelacion) 

        $color_resolve = $color_resuelto ?? "white"; // esto dira el color de la caja resuelta
        $color_reject = $color_rechazado ?? "white"; // esto dira el color de la caja rechazada

        $icon_type_Promise = $icono_resolve_reject ?? "null";
        ?>

    <section class="Confirm-box-section hide-confirm-box">

    <div class="Confirm-box-container">
        <dotlottie-player 
            src="/imagenes/lordicon json/<?php echo $icon_type_Promise; ?>" 
            background="transparent" 
            speed="0.3" 
            style="width: 150px; height: 150px;" 
            loop 
            autoplay>
        </dotlottie-player>
        
        <span class="Confirm-box-text"><?php echo $titulo; ?></span>
        
        <div class="Confirm-box-buttons">
            <span class="Confirm-box-btn hide_buttons"><?php echo $caja_resolve; ?></span>
            <span class="Confirm-box-btn hide_buttons"><?php echo $caja_reject; ?></span>
        </div>
        <span class="loading Confirm-box-loading_off">Un momento...</span>
        
    </div>
  
</section>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0');

    .hide_buttons{
        display: none !important;
    }

    .show_buttons{
        display: flex !important;
    }

    .loading{
        font-size: 1.5rem;
        font-weight: 600;
        color: #0A1931;
        font-family: 'Montserrat', sans-serif;
    }

    .Confirm-box-loading_off{
        display: none;
        
    }

    .Confirm-box-loading_on{
        display: block;
        
    }


    .show-confirm-box{
        display: flex !important; 
    }

    .hide-confirm-box{
        display: none !important;
    }

    .Confirm-box-section {
        position: fixed;
        width: 550px;
        height: 350px;
        inset: 0; 
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 5;
    }

    .Confirm-box-section::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        background-color: rgba(0, 0, 0, 0.4);
        z-index: -1;
        pointer-events: all;
    }


    .Confirm-box-section::after {
        content: '';
        position: fixed;
        inset: 0;
        margin: auto;
        width: 500px;
        height: 350px;
        background-color: #fff;
        z-index: -1;
        pointer-events: none;
        box-shadow: 0px 16px 35px 4px rgba(255,255,255,0.5);
       
        
        -webkit-animation: slide-in-blurred-top 0.6s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
        animation: slide-in-blurred-top 0.6s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
    }

    .Confirm-box-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 20px;
        position: relative;
        -webkit-animation: slide-in-blurred-top 0.6s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
        animation: slide-in-blurred-top 0.6s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
    }
    
    .Confirm-box-text {
        font-size: 2rem;
        font-weight: 600;
        margin: 10px;
        color: #0A1931;
        font-family: 'Montserrat', sans-serif;
    }


    .Confirm-box-buttons {
        display: flex;
        gap: 80px;
    }

    .Confirm-box-btn {
        width: 100px;
        height: 50px;
        border: none;
        background-color: transparent;
        color: #fff;
        font-weight: 600;
        font-family: 'Montserrat', sans-serif;
        cursor: pointer;
        text-decoration: none;
        transition: color 0.3s ease-in-out;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .Confirm-box-btn:hover {
        color: black;
    }


    .Confirm-box-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        -webkit-animation: color-change-2x 6s linear infinite alternate both;
        animation: color-change-2x 6s linear infinite alternate both;
        z-index: -2;
        transition: all 0.3s ease-in-out;
    }

    .Confirm-box-btn:hover::before {
        inset: -3px;
    }

 
    .Confirm-box-btn::after {
        position: absolute;
        content: '';
        inset: 0; 
        width: 100%;
        height: 100%;
        background-color: #0A1931;
        z-index: -1;
        transition: all 0.3s ease-in-out;
    }

    
    
  
    .Confirm-box-btn:nth-of-type(1):hover::after {
        background-color: <?php echo $color_resolve ?>;
        box-shadow: 0 0 10px <?php echo $color_resolve ?>;
    }

 
    .Confirm-box-btn:nth-of-type(2):hover::after {
        background-color: <?php echo $color_reject ?>;
        box-shadow: 0 0 10px <?php echo $color_reject ?>;
    }

    .Confirm-box-btn:hover::after {
        animation: blur 0.3s ease-in-out;
    }

  
    
    @-webkit-keyframes slide-in-blurred-top {
        0% {
            -webkit-transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
            transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
            -webkit-transform-origin: 50% 0%;
            transform-origin: 50% 0%;
            -webkit-filter: blur(40px);
            filter: blur(40px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateY(0) scaleY(1) scaleX(1);
            transform: translateY(0) scaleY(1) scaleX(1);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            -webkit-filter: blur(0);
            filter: blur(0);
            opacity: 1;
        }
    }
    @keyframes slide-in-blurred-top {
        0% {
            -webkit-transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
            transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
            -webkit-transform-origin: 50% 0%;
            transform-origin: 50% 0%;
            -webkit-filter: blur(40px);
            filter: blur(40px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateY(0) scaleY(1) scaleX(1);
            transform: translateY(0) scaleY(1) scaleX(1);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            -webkit-filter: blur(0);
            filter: blur(0);
            opacity: 1;
        }
    }

    @-webkit-keyframes color-change-2x {
        0% { background: #19dcea; }
        100% { background: #b22cff; }
    }
    @keyframes color-change-2x {
        0% { background: #19dcea; }
        100% { background: #b22cff; }
    }

    @keyframes blur {
        0% { filter: blur(0px); }
        50% { filter: blur(7px); }
        100% { filter: blur(0px); }
    }
</style>

        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
