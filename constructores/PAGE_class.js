export class page {

    constructor(id, titulo, descripcion, autor_nombre, precio, rating, rating_count, img_url_arr, video_url_arr, autor_pais, user_rating, autor_avatar, FAQs, other_courses) {
        this.id = id;
        this.titulo = titulo;
        this.descripcion = descripcion;
        this.autor_nombre = autor_nombre;
        this.precio = precio;
        this.rating = rating;
        this.rating_count = rating_count;
        this.img_url_arr = img_url_arr;
        this.video_url_arr = video_url_arr;
        this.autor_pais = autor_pais;
        this.user_rating = user_rating;
        this.autor_avatar = autor_avatar;
        this.FAQs = FAQs;
        this.other_courses = other_courses;
    }

    load_page_content() {
        const titulo_principal = document.querySelector(".titulo-principal");
        const autor_nombre_html = document.getElementById("nombre-autor");
        const rating_desc = document.getElementById("desc-autor");
        const precio_plan = document.querySelector(".precio-plan");
        const descripcion_principal = document.querySelector(".descripcion-plan");
        const media_adder = document.getElementById("contenedor-media");
        const foto_autor = document.getElementById("foto-autor");

        // Asignar la imagen del autor
        if (foto_autor) {
            foto_autor.src = this.autor_avatar;
        }
      
        if (this.rating >= 5) {
            rating_desc.style.setProperty('--before', `"★★★★★"`);
        } else if (this.rating >= 4) {
            rating_desc.style.setProperty('--before', `"★★★★☆"`);
        } else if (this.rating >= 3) {
            rating_desc.style.setProperty('--before', `"★★★☆☆"`);
        } else if (this.rating >= 2) {
            rating_desc.style.setProperty('--before', `"★★☆☆☆"`);
        } else if (this.rating >= 1) {
            rating_desc.style.setProperty('--before', `"★☆☆☆☆"`);
        } else {
            rating_desc.style.setProperty('--before', `"☆☆☆☆☆"`);
        }
        rating_desc.style.setProperty('--after', `"${this.rating} (${this.rating_count} reviews)"`);

     
        titulo_principal.textContent = this.titulo;
        autor_nombre_html.textContent = this.autor_nombre;
        precio_plan.textContent = `US$ ${this.precio}`;
        descripcion_principal.textContent = this.descripcion;

   
        const contenedor_carrusel = document.getElementById("contenedor-carrusel-id");
   
        contenedor_carrusel.innerHTML = ""; 
        
        this.other_courses.forEach(element => {
        
            contenedor_carrusel.innerHTML += `
            <div class="tarjeta-producto">
                  <div class="media-producto">
                      <img src="${element.imagen_url}" alt="Service" class="imagen-producto">
                      <div class="icono-corazon">♥</div>
                  </div>
                  <div class="detalles-producto">
                      <div class="fila-autor">
                          <div class="autor-izq">
                              <img src="${element.avatar_url || this.autor_avatar}" alt="user" class="avatar-autor">
                              <span class="nombre-autor-prod">${element.autor || element.autor_nombre}</span>
                          </div>
                      </div>
                      <a href="/modulos/course_page/page.html?id=${element.id}" class="enlace-producto">${element.titulo}</a>
                      <div class="fila-rating">
                          <span class="estrella">★</span> <span class="puntaje">${element.rating}</span> <span class="conteo">(${element.rating_count || 0})</span>
                      </div>
                      <div class="fila-precio">De <strong>${element.precio}$</strong></div>
                  </div>
              </div>
            `;
        });

  
        const contenedor_faq = document.getElementById("contenedor_faq_id");

 

        this.FAQs.forEach(element => {
     
            contenedor_faq.innerHTML += `
            <div class="item-faq">
            <details>
                <summary>
                    <img src="${this.autor_avatar}" alt="Foto" class="foto-faq">
                    <div class="datos-faq">
                        <span class="nombre-usuario-faq">${this.autor_nombre}</span>
                        <span class="texto-pregunta">${element.pregunta}</span>
                    </div>
                </summary>
                <div class="respuesta-faq">
                    <p>${element.respuesta}</p>
                </div>
            </details>
        </div>`;
        });

   
        

        media_adder.innerHTML = "";

      
        let videosHTML = "";
        this.video_url_arr.forEach(element => {
            videosHTML += `
            <video controls class="item-media" width="800px" height="600px">
                <source src="${element}" type="video/mp4">
                Tu navegador no soporta el video.
            </video>`;
        });
        
   
        media_adder.innerHTML = videosHTML;

   
        for (let i = 0; i < this.img_url_arr.length; i++) {
            const miniatura = document.createElement("img");
            miniatura.src = this.img_url_arr[i];
            miniatura.alt = `Miniatura ${i + 1}`;
            miniatura.className = "item-media miniatura";
            media_adder.appendChild(miniatura);
        }


        // Ejecutamos la funcion auxiliar para cargar banderas y avatares secundarios
        this.load_page_content_by_query(this.autor_pais, this.user_rating, this.autor_avatar);
    }

    load_page_content_by_query(autor_pais, user_rating, autor_avatar) {
        const rating_user = document.getElementById("rating_user");
        const avatar_user = document.getElementById("avatar_user");
        const disminutivo_pais = document.getElementById("disminutivo_pais");
        const id_pais = document.getElementById("pais");
        const rating_number_int = document.getElementById("rating_number_int");


        const pais = autor_pais ? autor_pais.toLowerCase() : "??";

        if (pais == "mx") {
            disminutivo_pais.textContent = "MX";
        } else if (pais == "us") {
            disminutivo_pais.textContent = "US";
        } else if (pais == "es") {
            disminutivo_pais.textContent = "ES";
        } else if (pais == "ar") {
            disminutivo_pais.textContent = "AR";
        } else if (pais == "venezuela" || pais == "ve") {
            disminutivo_pais.textContent = "VE";
        } else {
            disminutivo_pais.textContent = "??";
        }

        if (rating_number_int) rating_number_int.textContent = user_rating;
        if (id_pais) id_pais.textContent = autor_pais;
        
        // Aquí asignamos el avatar que recibimos
        if (avatar_user) avatar_user.src = autor_avatar; // temporal porque esto solo me da el avatar del que subio el video no del que raiteo el video
   
        if (rating_user) rating_user.textContent = this.autor_nombre; 
    }
}