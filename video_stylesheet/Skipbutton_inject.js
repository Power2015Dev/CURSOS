export function skipButtons(element, index) {

    const player = window.videojs(`video-${index}`, {
        fluid: true,
        playbackRates: [0.5, 1, 1.5, 2]
    });

    const controlBar = player.getChild('ControlBar');

    if (controlBar) {

        // 1. Limpieza de nativos y previos
        const nativeBack = controlBar.getChild('SkipBackward');
        const nativeFwd = controlBar.getChild('SkipForward');
        if (nativeBack) controlBar.removeChild(nativeBack);
        if (nativeFwd) controlBar.removeChild(nativeFwd);

        const existingBack = controlBar.getChild('myBackButton');
        const existingFwd = controlBar.getChild('myForwardButton');
        if (existingBack) controlBar.removeChild(existingBack);
        if (existingFwd) controlBar.removeChild(existingFwd);

        // ==============================
        // --- BOTÓN RETROCEDER ---
        // ==============================
        const backBtn = controlBar.addChild('button', { name: 'myBackButton' }, 1);
        backBtn.addClass('custom-skip-back');
        backBtn.addClass('vjs-control'); // Mantenemos clase base para alineación
        backBtn.el().title = "Retroceder 10 segundos";

        // --- LA SOLUCIÓN: INYECTAR SVG DIRECTAMENTE ---
        // Usamos fill: white y estilos inline para asegurar visibilidad inmediata
        backBtn.el().innerHTML = `
            <svg viewBox="0 0 24 24" style="width: 22px; height: 22px; fill: white; display: block; margin: auto; pointer-events: none;">
                <path d="M11 18V6l-8.5 6 8.5 6zm.5-6l8.5 6V6l-8.5 6z"></path>
            </svg>
        `;

        backBtn.on('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const currentTime = player.currentTime();
            const newTime = currentTime - 10;
            player.currentTime(newTime < 0 ? 0 : newTime);
        });

        // ==============================
        // --- BOTÓN ADELANTAR ---
        // ==============================
        const fwdBtn = controlBar.addChild('button', { name: 'myForwardButton' }, 2);
        fwdBtn.addClass('custom-skip-fwd');
        fwdBtn.addClass('vjs-control');
        fwdBtn.el().title = "Adelantar 10 segundos";

        // --- INYECTAR SVG DIRECTAMENTE ---
        fwdBtn.el().innerHTML = `
            <svg viewBox="0 0 24 24" style="width: 22px; height: 22px; fill: white; display: block; margin: auto; pointer-events: none;">
                <path d="M4 18l8.5-6L4 6v12zm9-12v12l8.5-6L13 6z"></path>
            </svg>
        `;

        fwdBtn.on('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const currentTime = player.currentTime();
            const duration = player.duration();
            const newTime = currentTime + 10;

            if (Number.isFinite(duration) && duration > 0) {
                if (newTime >= duration) player.currentTime(duration - 0.1); 
                else player.currentTime(newTime);
            } else {
                player.currentTime(newTime);
            }
        });
    }
    return player;
}

export function cleanplayer(players) {
    if (players && players.length > 0) {
        players.forEach(player => {
            if (player) {
                try { player.dispose(); } catch (e) { console.log(e); }
            }
        });
    }
    return [];
}