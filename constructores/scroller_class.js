export class ScrollerAdder {
    constructor(Titulo, Autor, Reseña, Imagen, Precio, Rating, id) {
        this.Titulo = Titulo;
        this.Autor = Autor;
        this.Reseña = Reseña;
        this.Imagen = Imagen;
        this.Precio = Precio;
        this.Rating = Rating;
        this.id = id;
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
            <div class="card_footer"><a href="/modulos/course_page/page.html?id=${this.id}" style="text-decoration: none;"> Obtener curso </a></div> 
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

        if(div.children.length == 0) return;
        div.removeChild(div.lastElementChild);
    }

    
}



