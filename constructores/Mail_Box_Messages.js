
export class Mail_Box_Messages{
    constructor(Nombre, last_requested_message, Perfil, Tiempo, Tiempo_medida, prefijo, id){
        this.Nombre = Nombre;
        this.Mensaje = last_requested_message;
        this.Perfil = Perfil;
        this.Tiempo = Tiempo;
        this.Tiempo_medida = Tiempo_medida;
        this.prefijo = prefijo;
        this.id = id;
    }
    
    add_message(){
        let div = document.querySelector(".mail_box");
        const card = document.createElement("div");
        card.classList.add("notification_card");
        
        
        card.innerHTML = 
            `
            <div class="row_message">
                <a href="/modulos/mensajes/message.html?id=${this.id}" style="display: flex; align-items: center; width: 100%; text-decoration: none; color: inherit;">
                    
                    <img src="${this.Perfil}" alt="foto" class="icon_radius">
                    
                    <div style="display: flex; flex-direction: column; margin-left: 15px; flex-grow: 1; min-width: 0;">
                        <p style="margin: 0; font-weight: bold; font-size: 16px;">${this.Nombre}</p>
                        <p style="margin: 0; font-size: 13px; color: #555; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">${this.Mensaje}</p>
                    </div>

                    <span style="font-size: 12px; color: #888; white-space: nowrap; margin-left: 10px; font-weight: bold;">
                        ${this.prefijo} ${this.Tiempo} ${this.Tiempo_medida}
                    </span>
                </a>
            </div>
            <hr>
            `;
            
        div.appendChild(card);
    }
}