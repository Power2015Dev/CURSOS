export class ScrollerAdder {
    constructor(Titulo, Autor, Reseña, Imagen, Precio, Rating) {
        this.Titulo = Titulo;
        this.Autor = Autor;
        this.Reseña = Reseña;
        this.Imagen = Imagen;
        this.Precio = Precio;
        this.Rating = Rating;
    }


    add_recommendations(){
        let div = document.querySelector(".slider-track");
        const card = document.createElement("div");
        card.classList.add("course_card");

        card.innerHTML = 
            `
            <div class="card_header"> 
                <span class="badge">${this.Precio}</span> 
                <img src="${this.Imagen}" alt="curso"> 
            </div> 
            <div class="card_body"> 
                <h3>${this.Titulo}</h3> 
                <p class="author">by ${this.Autor}</p>
                <div class="card_meta"> 
                    <span>${this.Reseña} Reseñas</span> 
                    <span class="rating">⭐ ${this.Rating}</span> 
                </div> 
            </div> 
            <div class="card_footer"> Obtener curso </div> 
            `;

        div.appendChild(card);
    }

    remove_all_recommendations(){
        let div = document.querySelector(".slider-track");
        for(let i = div.children.length - 1; i >= 0; i--){
            div.children[i].remove();
        }
    }

    remove_recommendations(){
        let div = document.querySelector(".slider-track");
        let ultimoElemento = div.lastElementChild;

        if (ultimoElemento && ultimoElemento.id === "state_message") { // para que no borre el mensaje de no recomendaciones
            return; 
        }

        if(div.children.length == 0) return;
        div.removeChild(div.lastElementChild);
    }

    
}

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
        let ultimoElemento = div.lastElementChild;

        if (ultimoElemento && ultimoElemento.id === "Courses_available") { // para que no borre el mensaje de no cursos
            return; 
        }
        if(div.children.length == 0) return;
        div.removeChild(div.lastElementChild);
    }

}

