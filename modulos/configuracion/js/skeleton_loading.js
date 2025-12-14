import { listaCursos } from './fakeDB.js';
import { agregar_tarjetas } from './courses.js';
document.addEventListener("DOMContentLoaded", () => {
    show_skeleton(4);


    setTimeout(() => {

    if(listaCursos.length === 0){
        let content = document.querySelector(".cursos_actuales");
        content.innerHTML = "";
        const message = document.createElement("p");
        message.textContent = "No hay cursos guardados";
        message.id = "Courses_available";
        message.classList.add("course_style");
        document.querySelector(".cursos_actuales").appendChild(message);
        
    }
    else {
    load_content();
    }

        
    }, 3000);
});




function show_skeleton(Number_of_skeletons) {
    let content = document.querySelector(".cursos_actuales");
    let skeleton = document.getElementById("skeleton_template");

    for(let i = 0; i < Number_of_skeletons; i++){
        let clone = skeleton.content.cloneNode(true);
        content.appendChild(clone);
    }
}

function load_content(){
    let content = document.querySelector(".cursos_actuales");

    content.innerHTML = "";
     listaCursos.forEach(element => {agregar_tarjetas(element.Titulo, element.Completacion, element.Imagen);});
}