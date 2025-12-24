import { ScrollerAdder } from '../constructores/scroller_class.js'; 

document.addEventListener("DOMContentLoaded", () => {
    //show_skeletons(5);
    show_small_skeletons(3);
    
    get_data();
        

});

async function get_data() {
    try {
        const response = await fetch("Query_dashboard/course_query.php");
        const data = await response.json();
        load_content(data);
    } catch (error) {
        console.log(error);
    }
    

}

function load_content(table) {
    const track = document.querySelector(".slider-track");
    track.innerHTML = "";
    document.querySelectorAll(".slider-small").forEach(element => element.innerHTML = "");

    if (table.length === 0) {

        const message = document.createElement("div");
        message.textContent = "No hay recomendaciones disponibles";
        message.id = "slider_msg";
        message.classList.add("course_style");
        message.style.flex = "0 0 100%";
        message.style.textAlign = "center";
        track.style.width = "100%"; // para que se muestre el mensaje porque es infinito
        track.appendChild(message);

        document.querySelectorAll(".slider-small").forEach(element => {
            element.style.width = "100%";
            element.appendChild(message.cloneNode(true));
        });

    } else {

        track.style.width = "";
        document.querySelectorAll(".slider-small").forEach(element => element.style.width = "");

        table.forEach(data => {
            if(data.precio < 1 || data.precio === null) data.precio = "Free";
            const card = new ScrollerAdder(
                data.titulo, data.author_name, data.resenas_count, 
                data.imagen_url, data.precio, data.rating, data.id
            );

            card.add_recommendations();
            card.add_small_recomendation();

        });
    }
}

// function show_skeletons(Number_of_skeletons) {
//     const sliderTrack = document.querySelector(".slider-track");
//     const cardTemplate = document.getElementById("skeleton_card_template");
    
 
//     for (let i = 0; i < Number_of_skeletons; i++) {
//         const clone = cardTemplate.content.cloneNode(true);
//         sliderTrack.appendChild(clone);
//     }
// }

function show_small_skeletons(Number_of_skeletons) {
    const sliderSmall = document.querySelectorAll(".slider-small");
    const cardTemplate = document.getElementById("skeleton_card_template");
    
    sliderSmall.forEach(element => {
        element.innerHTML = "";

        for (let i = 0; i < Number_of_skeletons; i++) {
            const clone = cardTemplate.content.cloneNode(true);
            element.appendChild(clone);
        }
    });
 
   
}