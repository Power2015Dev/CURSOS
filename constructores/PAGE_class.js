export class page {

    constructor(id, titulo, descripcion, autor_nombre, precio, rating, rating_count, img_url_arr, video_url_arr, autor_pais, user_rating, autor_avatar, FAQs, other_courses, fecha_creacion, rating_info) {
        this.id = id;
        this.titulo = titulo;
        this.descripcion = descripcion;
        this.autor_nombre = autor_nombre;
        this.precio = precio;
        this.rating = rating;
        this.rating_count = rating_count;
        this.img_url_arr = img_url_arr || [];     
        this.video_url_arr = video_url_arr || []; 
        this.autor_pais = autor_pais;
        this.user_rating = user_rating;
        this.autor_avatar = autor_avatar;
        this.FAQs = FAQs || [];
        this.other_courses = other_courses || [];
        this.fecha_creacion = fecha_creacion;
        this.rating_info = rating_info || []; 
        this.players = [];
        
        this.currentReviewIndex = 0; 
    }

 
    load_page_content() {
        const titulo_principal = document.querySelector(".titulo-principal");
        const autor_nombre_html = document.getElementById("nombre-autor");
        const rating_desc = document.getElementById("desc-autor");
        const precio_plan = document.querySelector(".precio-plan");
        const descripcion_principal = document.querySelector(".descripcion-plan");
        const media_adder = document.getElementById("contenedor-media");
        const foto_autor = document.getElementById("foto-autor");

  
        if (foto_autor) {
            foto_autor.src = this.autor_avatar;
        }

       
        let stars = "☆☆☆☆☆";
        if (this.rating >= 5) stars = "★★★★★";
        else if (this.rating >= 4) stars = "★★★★☆";
        else if (this.rating >= 3) stars = "★★★☆☆";
        else if (this.rating >= 2) stars = "★★☆☆☆";
        else if (this.rating >= 1) stars = "★☆☆☆☆";
        rating_desc.innerHTML = "";
        rating_desc.style.setProperty('--before', `"${stars}"`);
        rating_desc.style.setProperty('--after', `"${this.rating} (${this.rating_count} reviews)"`);

     
        titulo_principal.textContent = this.titulo;
        autor_nombre_html.textContent = this.autor_nombre;
      
        precio_plan.textContent = parseFloat(this.precio) > 0  ? "US$ " + parseFloat(this.precio) : "Free";
        descripcion_principal.textContent = this.descripcion;

   
        const fechaObj = new Date(this.fecha_creacion.replace(" ", "T")); 
        const opciones = { day: 'numeric', month: 'short', year: 'numeric' };
        const textoFecha = "Creado el " + fechaObj.toLocaleDateString('es-ES', opciones); 
        autor_nombre_html.style.setProperty('--after_date', `"${textoFecha}"`);
    
    
        const contenedor_carrusel = document.getElementById("contenedor-carrusel-id");
        contenedor_carrusel.innerHTML = ""; 
        
        this.other_courses.forEach(element => {
      
            const precioDisplay = parseFloat(element.precio) > 0 ? element.precio + "$" : "Free";
            const prefijo = parseFloat(element.precio) > 0 ? "desde " : "";
            contenedor_carrusel.innerHTML += `
            <div class="tarjeta-producto">
                  <div class="media-producto">
                      <img src="${element.imagen_url}" alt="Service" class="imagen-producto">
                      <div class="icono-corazon">♥</div>
                  </div>
                  <div class="detalles-producto">
                      <div class="fila-autor">
                          <div class="autor-izq">
                              <img src="${element.author_url}" alt="user" class="avatar-autor">
                              <span class="nombre-autor-prod">${element.author_name}</span>
                          </div>
                      </div>
                      <a href="/modulos/course_page/page.html?id=${element.id}" class="enlace-producto">${element.titulo}</a>
                      <div class="fila-rating">
                          <span class="estrella">★</span> <span class="puntaje">${element.rating}</span> 
                          <span class="conteo">(${element.resenas_count || 0})</span>
                      </div>
                      <div class="fila-precio">${prefijo}<strong>${precioDisplay}</strong></div>
                  </div>
              </div>`;
        });

       
        const contenedor_faq = document.getElementById("contenedor_faq_id"); 
        if(contenedor_faq) {
            contenedor_faq.innerHTML = ""; 
            this.FAQs.forEach(element => {
                contenedor_faq.innerHTML += `
                <div class="item-faq">
                <details>
                    <summary>
                        <img src="${element.FAQ_img}" alt="Foto" class="foto-faq">
                        <div class="datos-faq">
                            <span class="nombre-usuario-faq">${element.FAQ_name}</span>
                            <span class="texto-pregunta">${element.pregunta}</span>
                        </div>
                    </summary>
                    <div class="respuesta-faq">
                        <p>${element.respuesta}</p>
                    </div>
                </details>
            </div>`;
            });
        }

      
        media_adder.innerHTML = "";
        let mediaHTML = "";

        
        
    
        this.video_url_arr.forEach((element, index) => {
      
            if (element.includes("youtube.com") || element.includes("youtu.be")) {
                const videoId = element.split('v=')[1] || element.split('/').pop();
                mediaHTML += `
                <div class="item-media" style="aspect-ratio: 16/9;">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>
                </div>`;
            } else {
                mediaHTML += `
            <video
                id="video-${index}"
                class="video-js vjs-fluid vjs-modern"
                controls
                preload="auto"
                width="720px"
                height="540px"
                poster="/Course_media/thumbnails/user_8_69659ef009754_8.jpg"
               
               
            >
            <source src="${element}" type="video/mp4" />
            
            <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
            </video>
                `;
            }
        });
        
     
        this.img_url_arr.forEach((img, i) => {
             mediaHTML += `<img src="${img}" alt="Miniatura ${i}" class="item-media miniatura">`;
        });
        
        media_adder.innerHTML = mediaHTML;

        if (this.players && this.players.length > 0) {
            this.players.forEach(player => {
                if (player) player.dispose();
            });
        }
        this.players = [];

       this.video_url_arr.forEach((element, index) => {
         
            if (!element.includes("youtube.com") && !element.includes("youtu.be")) {

                // Verificamos que el elemento exista en el DOM
            
                const videoElement = document.getElementById(`video-${index}`);

                if (videoElement) {
             
                    if (window.videojs) {
                        const player = window.videojs(`video-${index}`, {
                            fluid: true
                        });
                        this.players.push(player);
                    } else {
                        console.error("La libreria Video.js no ha cargado aun.");
                    }
                }
            }
        });

    
        this.setup_review_carousel();
    }


 
    setup_review_carousel() {
        const texto_comentario = document.querySelector(".texto-comentario");
        const encabezado_usuario = document.querySelector(".encabezado-usuario"); 
        const flechas = document.querySelector(".contenedor-flechas");
     
        if (!this.rating_info || this.rating_info.length === 0) {
            if(encabezado_usuario) encabezado_usuario.style.display = "none";
            

            if(flechas) flechas.style.display = "none";
            if(texto_comentario) texto_comentario.textContent = "No hay reseñas todavía.";
            return;
        }

   
        this.update_review_ui(0);


        const btnPrev = document.querySelector(".boton-flecha.prev");
        const btnNext = document.querySelector(".boton-flecha.next");

        if (btnNext) {
            btnNext.addEventListener('click', (e) => {
                e.preventDefault(); 
                this.currentReviewIndex++;
                
          
                if (this.currentReviewIndex >= this.rating_info.length) {
                    this.currentReviewIndex = 0;
                }
                this.update_review_ui(this.currentReviewIndex);
            });
        }

        if (btnPrev) {
            btnPrev.addEventListener('click', (e) => {
                e.preventDefault();
                this.currentReviewIndex--;

             
                if (this.currentReviewIndex < 0) {
                    this.currentReviewIndex = this.rating_info.length - 1;
                }
                this.update_review_ui(this.currentReviewIndex);
            });
        }
    }

    update_review_ui(index) {
   
        const review = this.rating_info[index];

   
        const rating_user = document.querySelector(".nombre-usuario");
        const avatar_user = document.querySelector(".avatar-usuario");
        const disminutivo_pais = document.getElementById("disminutivo_pais");
        const rating_number_int = document.querySelector(".numero-rating");
        const fechaElement = document.querySelector(".fecha-resena");
        const texto_comentario = document.querySelector(".texto-comentario");
        const id_pais = document.getElementById("pais"); 

  
        texto_comentario.style.transition = "opacity 0.2s";
        texto_comentario.style.opacity = 0;
        
        setTimeout(() => {

            rating_user.textContent = review.rater_name;
            
            avatar_user.src = review.rater_img;
            
            rating_number_int.textContent = `(${review.calificacion})`;
            texto_comentario.textContent = review.comentario;


            const pais = review.pais ? review.pais.toLowerCase() : "??";
            const mapPais = {
                "mx": "MX", "mexico": "MX",
                "us": "US", "usa": "US",
                "es": "ES", "espana": "ES",
                "ar": "AR", "argentina": "AR",
                "ve": "VE", "venezuela": "VE",
                "co": "CO", "colombia": "CO"
            };
            disminutivo_pais.textContent = (mapPais[pais] || "??");
            
          
            if(id_pais) id_pais.textContent = " " + review.pais;

         
            const fechaObj = new Date(review.fecha.replace(" ", "T"));
            const ahora = new Date();
            const diferenciaSegundos = Math.floor((ahora - fechaObj) / 1000);
            let textoFecha = "";

            if (diferenciaSegundos < 60) {
                textoFecha = "Justo ahora";
            } 
            else if (diferenciaSegundos < 3600) {
                const minutos = Math.floor(diferenciaSegundos / 60);
         
                textoFecha = minutos === 1 ? "Hace 1 minuto" : `Hace ${minutos} minutos`;
            } 
            else if (diferenciaSegundos < 86400) { // Menos de 24 horas
                const horas = Math.floor(diferenciaSegundos / 3600);
              
                textoFecha = horas === 1 ? "Hace 1 hora" : `Hace ${horas} horas`;
            } 
            else if (diferenciaSegundos < 604800) { // Menos de 7 días
                const dias = Math.floor(diferenciaSegundos / 86400);
                
                // Si dias es 1, escribe "Hace 1 día" (singular), si no "días" (plural)
                textoFecha = dias === 1 ? "Hace 1 día" : `Hace ${dias} días`;
            } 
            else {
                const opciones = { day: 'numeric', month: 'short', year: 'numeric' };
                textoFecha = fechaObj.toLocaleDateString('es-ES', opciones);
            }

            fechaElement.textContent = textoFecha;

          
            texto_comentario.style.opacity = 1;
        }, 200);
    }
}