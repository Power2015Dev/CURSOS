export class Activity {
    constructor(horas, racha, dias) {
        this.horas = horas;
        this.racha = racha;
        this.dias = dias;
    }

    add_activity() {
        let div = document.getElementById("activity_content");
        
        // Creamos el HTML de las barras primero
        let barras_html = "";
        
        this.dias.forEach(elemento => {
            let activeClass = elemento.active ? "active" : "";
            
            // Fíjate en el cambio de clases HTML aquí
            barras_html += `
                <div class="bar-column">
                    <div class="bar-visual ${activeClass}" style="height: ${elemento.altura}%;"></div>
                    <span class="day-label">${elemento.dia}</span>
                </div>
            `;
        });

        // Inyectamos la estructura nueva completa
        // Nota como usamos 'activity-card' en lugar de 'stats_container'
        const nuevoHTML = `
            <div class="activity-card">
                <div class="stats-row">
                    <div class="stat-item">
                        <span class="stat-val">${this.horas}</span>
                        <span class="stat-lbl">Horas Totales</span>
                    </div>
                    <div class="stat-item fire"> 
                        <span class="stat-val">${this.racha}</span>
                        <span class="stat-lbl">Racha días</span>
                    </div>
                </div>

                <div class="chart-wrapper">
                    <div class="chart-header">Horas por día</div>
                    
                    <div class="chart-area">
                        ${barras_html}
                    </div>
                </div>
            </div>
        `;

        div.innerHTML = nuevoHTML;
    }
}