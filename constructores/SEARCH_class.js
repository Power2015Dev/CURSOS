export class results{

    constructor(id, titulo, nombre, portada, autor_img, rating, rating_count, precio, usuario_id){
        this.id = id;
        this.titulo = titulo;
        this.nombre = nombre;
        this.portada = portada;
        this.autor_img = autor_img;
        this.rating = rating;
        this.rating_count = rating_count;
        this.precio = precio;
        this.usuario_id = usuario_id;

    }

    add_card() {
        const result_card = document.querySelector('.results-grid');
        const card = `
        
            <article class="kursa-card">
            <a href="/modulos/course_page/page.php?id=${this.id}">
                <div class="card-thumbnail" style="cursor: pointer;">
                    <img src="${this.portada}" alt="Thumbnail del curso">
                </div>
            </a>  
                <div class="card-content">
                 
                    <div class="seller-info">
                    <a href="/modulos/Perfil/perfil.php?id=${this.usuario_id}" style="text-decoration: none; color: inherit;">
                        <img src="${this.autor_img}" alt="Vendedor" class="seller-avatar" style="cursor: pointer;">
                        </a>
                        <span class="seller-name" style="cursor: pointer;"><a href="/modulos/Perfil/perfil.php?id=${this.usuario_id}" style="text-decoration: none; color: inherit;">${this.nombre}</a></span>
                    
                    </div>
                
                
                    <h3 class="card-title" style="cursor: pointer;">
                    <a href="/modulos/course_page/page.php?id=${this.id}" style="text-decoration: none; color: inherit;">${this.titulo}
                        </a>
                    </h3>
                

                    <div class="rating-container">
                        ${this.generarEstrellas(this.rating)} 
                        <span style="font-size: 12px; margin-left: 10px;">(${this.rating_count} reviews)</span>
                    </div>

                    <div class="price-container">
                        <span class="price">${this.precio}</span>
                    </div>
                </div>
            </article>

        `;
        result_card.insertAdjacentHTML('beforeend', card);

    }

    generarEstrellas(rating) {
    let estrellas = '';
    
    for (let i = 1; i <= 5; i++) {
        if (rating >= i) {
            estrellas += '<span class="material-symbols-outlined star-filled">star</span>';
        } else if (rating >= i - 0.5) {
            estrellas += '<span class="material-symbols-outlined star-half">star_half</span>';
        } else {
            estrellas += '<span class="material-symbols-outlined star-empty">star_border</span>'; 
        }
    }
    return estrellas;
}

}