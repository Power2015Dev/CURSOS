

export function addCustomControls(player) {
    const controlBar = player.getChild('ControlBar');

    if (controlBar) {
    
        const nativeBack = controlBar.getChild('SkipBackward');
        const nativeFwd = controlBar.getChild('SkipForward');
        if (nativeBack) controlBar.removeChild(nativeBack);
        if (nativeFwd) controlBar.removeChild(nativeFwd);

      
        if (controlBar.getChild('myBackButton')) return;


        const backBtn = controlBar.addChild('button', { name: 'myBackButton' }, 1); 
        backBtn.addClass('custom-skip-back'); 
        backBtn.addClass('vjs-control'); 
        backBtn.el().title = "Retroceder 10 segundos";
        backBtn.el().innerHTML = `
            <svg viewBox="0 0 24 24" style="width: 22px; height: 22px; fill: white; display: block; margin: auto; pointer-events: none;">
                <path d="M11 18V6l-8.5 6 8.5 6zm.5-6l8.5 6V6l-8.5 6z"></path>
            </svg>
        `;
        
  
        backBtn.on('click', (e) => {
            e.preventDefault();
            const newTime = player.currentTime() - 10;
            player.currentTime(newTime < 0 ? 0 : newTime);
        });

     
        const fwdBtn = controlBar.addChild('button', { name: 'myForwardButton' }, 2);
        fwdBtn.addClass('custom-skip-fwd');
        fwdBtn.addClass('vjs-control');
        fwdBtn.el().title = "Adelantar 10 segundos";
        fwdBtn.el().innerHTML = `
            <svg viewBox="0 0 24 24" style="width: 22px; height: 22px; fill: white; display: block; margin: auto; pointer-events: none;">
                <path d="M4 18l8.5-6L4 6v12zm9-12v12l8.5-6L13 6z"></path>
            </svg>
        `;

        fwdBtn.on('click', (e) => {
            e.preventDefault();
            const duration = player.duration();
            const newTime = player.currentTime() + 10;
            if (Number.isFinite(duration) && newTime >= duration) {
                 player.currentTime(duration - 0.1);
            } else {
                 player.currentTime(newTime);
            }
        });
    }
}