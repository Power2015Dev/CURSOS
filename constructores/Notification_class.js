let Tipo_esfera = "../../imagenes/dashboard_img/esfera.png";
let Tipo_check = "../../imagenes/dashboard_img/check.png";
export class Notifications{
    constructor(Titulo, Tiempo, Tipo, Tiempo_medida, prefijo, id){
        this.Titulo = Titulo;
        this.Tiempo = Tiempo;
        this.Tipo = Tipo;
        this.Tiempo_medida = Tiempo_medida;
        this.prefijo = prefijo;
        this.id = id;
    }
    
    add_notification(){
        let div = document.querySelector(".messages");
        const card = document.createElement("div");
        card.classList.add("notification_card");
        if(this.Tipo == "esfera"){
        card.innerHTML = 
            `
        
                <div class="row_message">
                            <img src="${Tipo_esfera}" alt="esfera">
                            <a href="/modulos/course_page/page.html?id=${this.id}" style="display: flex; align-items: center; width: 100%; text-decoration: none; color: inherit;">
                            <div style="display: flex; flex-direction: column; flex-grow: 1; min-width: 0;">
                                <p style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">${this.Titulo}"</p>
                                <span>${this.prefijo} ${this.Tiempo} ${this.Tiempo_medida}</span>
                            </div>
                        </div>
                        <a/>
                        <hr>
           
            `;
            }
            else if(this.Tipo == "check"){
                card.innerHTML = 
                `
                
                    <div class="row_message">
                                <img src="${Tipo_check}" alt="check">
                                <a href="/modulos/course_page/page.html?id=${this.id}" style="display: flex; align-items: center; width: 100%; text-decoration: none; color: inherit;">

                                <div style="display: flex; flex-direction: column; flex-grow: 1; min-width: 0;">
                                    <p style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">${this.Titulo}"</p>
                                    <span>${this.prefijo} ${this.Tiempo} ${this.Tiempo_medida}</span>
                                </div>
                            </div>    
                            <a/>
                            <hr>
               
                `;
                
            }
        div.appendChild(card);
    }
}