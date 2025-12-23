export class page{

    constructor(id, titulo, descripcion, autor, precio, rating, rating_count, img_url_arr, video_url_arr){
        this.id = id;
        this.titulo = titulo;
        this.descripcion = descripcion;
        this.autor = autor;
        this.precio = precio;
        this.rating = rating;
        this.rating_count = rating_count;
        this.img_url_arr = img_url_arr;
        this.video_url_arr = video_url_arr;
    }


    load_page_content(titulo, descripcion, autor, precio, rating, rating_count) {

        const titulo_principal = document.querySelector(".titulo-principal");
        const autor_nombre = document.getElementById("nombre-autor");
        const rating_desc = document.getElementById("desc-autor");
        const precio_plan = document.querySelector(".precio-plan");
        const descripcion_principal = document.querySelector(".descripcion-plan");
        
        
        if (rating >= 5){
        rating_desc.style.setProperty('--before', `"★★★★★"`);
        } else if (rating >=4 ){
        rating_desc.style.setProperty('--before', `"★★★★☆"`);
        }
        else if (rating >=3 ){
        rating_desc.style.setProperty('--before', `"★★★☆☆"`);
        }
        else if (rating >=2 ){
        rating_desc.style.setProperty('--before', `"★★☆☆☆"`);
        }
        else if (rating >=1 ){
        rating_desc.style.setProperty('--before', `"★☆☆☆☆"`);
        }
        else {
        rating_desc.style.setProperty('--before', `"☆☆☆☆☆"`);
        }
        rating_desc.style.setProperty('--after', `"${rating} (${rating_count} reviews)"`);
        
        titulo_principal.textContent = titulo;
        autor_nombre.textContent = autor;
        precio_plan.textContent = `US$${precio}`;
        descripcion_principal.textContent = descripcion;
    }
    
}