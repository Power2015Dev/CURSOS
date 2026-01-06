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
        const precio = this.Precio === 'free' ? 'Free' : '$' + parseFloat(this.Precio);
        card.innerHTML = 
            `
            
            <div class="card_header"> 
                <span class="badge">${precio}</span> 
                <a href="/modulos/course_page/page.php?id=${this.id}" style="text-decoration: none;" class="never_visited">
                <img src="${this.Imagen}" alt="curso"> 
                </a>
            </div> 
            <div class="card_body"> 
            <a href="/modulos/course_page/page.php?id=${this.id}" style="text-decoration: none;" class="never_visited">
                <h3>${this.Titulo}</h3> 
                <p class="author">by ${this.Autor}</p>
            </a>
                <div class="card_meta"> 
                    <span>${this.Reseña} Reseñas</span> 
                    <span class="rating">⭐ ${this.Rating}</span> 
                </div> 
            </div> 
            <div class="card_footer"><a href="/modulos/course_page/page.html?id=${this.id}" style="text-decoration: none;" class="never_visited"> Obtener curso </a></div> 
            
            `;

        div.appendChild(card);
    }

    add_small_recomendation(){
        document.querySelectorAll(`.slider-small`).forEach(element => {
            const card = document.createElement("div");
            card.classList.add("small_card");
            const precio = this.Precio === 'free' ? 'Free' : '$' + parseFloat(this.Precio);
            card.innerHTML = `
            
            
                <a href="/modulos/course_page/page.php?id=${this.id}">
                    <img src="${this.Imagen}" alt="placeholder" class="card_bg">
                    
                    <div class="card_content">
                        <span class="small_badge">${precio}</span>
                        
                        <div class="text_info">
                            <h3 class="small_title">${this.Titulo}</h3>
                            <p class="small_author">by ${this.Autor}</p>
                           
                        </div>
                    </div>
                    </a>
                

            `;

            element.appendChild(card);
        });

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



