export class MyCourses {
    constructor(Titulo, Completacion, Imagen) {
        this.Titulo = Titulo;
        this.Completacion = Completacion;
        this.Imagen = Imagen;
    }

    add_courses(){
        let div = document.querySelector(".cursos_actuales");
        const card = document.createElement("div");
        card.innerHTML = 
            `
            <div class="curso_actual">
            <img src="${this.Imagen}" alt="curso" class="curso_img">
            <div class="curso_info">
                <h3>${this.Titulo}</h3>
                
                <div class="progress_container">
                    <div class="progress_fill" style="width: ${this.Completacion}%;"></div>
                </div>
                <span class="progress_text">${this.Completacion}% Completado</span>
            </div>
            </div>
            `;

        div.appendChild(card);
    }

    remove_all_courses(){
        let div = document.querySelector(".cursos_actuales");
        for(let i = div.children.length - 1; i >= 0; i--){
            div.children[i].remove();
        }
    }

    remove_courses(){
        let div = document.querySelector(".cursos_actuales");
        

        
        if(div.children.length == 0) return;
        div.removeChild(div.lastElementChild);
    }

}