import { listaCursos } from './fakeDB.js';
import { agregar_tarjetas } from './courses.js';
document.addEventListener("DOMContentLoaded", () => {
    show_skeleton(3);


    setTimeout(() => {
        load_content();
    }, 1000);
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