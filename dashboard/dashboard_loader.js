import { listaRecomendados } from '../modulos/configuracion/js/fakeDB.js';
import { ScrollerAdder } from '../constructores/scroller_class.js'; 

document.addEventListener("DOMContentLoaded", () => {
    show_skeletons(5);

    setTimeout(() => {
        load_content();
    }, 3000); 
});

function load_content() {
    const track = document.querySelector(".slider-track");
    track.innerHTML = "";

    if (listaRecomendados.length === 0) {
        const message = document.createElement("div");
        message.textContent = "No hay recomendaciones disponibles";
        message.id = "slider_msg";
        message.classList.add("course_style");
        track.style.width = "100%";
        track.appendChild(message);
    } else {
        track.style.width = "";
        listaRecomendados.forEach(data => {
            const card = new ScrollerAdder(
                data.Titulo, data.Autor, data.Reseña, 
                data.Imagen, data.Precio, data.Rating
            );
            card.add_recommendations();
        });
    }
}

function show_skeletons(Number_of_skeletons) {
    const sliderTrack = document.querySelector(".slider-track");
    const cardTemplate = document.getElementById("skeleton_card_template");
    
 
    for (let i = 0; i < Number_of_skeletons; i++) {
        const clone = cardTemplate.content.cloneNode(true);
        sliderTrack.appendChild(clone);
    }
}