let Tipo_esfera = "../../imagenes/dashboard_img/esfera.png";
let Tipo_check = "../../imagenes/dashboard_img/check.png";
export class Notifications{
    constructor(Titulo, Tiempo, Tipo, Tiempo_medida, prefijo){
        this.Titulo = Titulo;
        this.Tiempo = Tiempo;
        this.Tipo = Tipo;
        this.Tiempo_medida = Tiempo_medida;
        this.prefijo = prefijo;
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
                            <p>${this.Titulo}"</p>
                        </div>
                        <span>${this.prefijo} ${this.Tiempo} ${this.Tiempo_medida}</span>
                        <hr>
           
            `;
            }
            else if(this.Tipo == "check"){
                card.innerHTML = 
                `
                
                    <div class="row_message">
                                <img src="${Tipo_check}" alt="check">
                                <p>${this.Titulo}"</p>
                            </div>    
                            <span>${this.prefijo} ${this.Tiempo} ${this.Tiempo_medida}</span>
                            <hr>
               
                `;
                
            }
        div.appendChild(card);
    }
}