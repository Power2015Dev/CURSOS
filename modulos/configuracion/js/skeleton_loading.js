
import { agregar_tarjetas } from './courses.js';
document.addEventListener("DOMContentLoaded", async () => {
    show_skeleton(4);
    const params = new URLSearchParams(window.location.search);
    const id_curso = params.get('id');


    let data = null;
    try {
        const response = await fetch(`../configuracion/api_course/get_my_courses.php?id=${id_curso}`);
        if (!response.ok) {
            throw new Error('Error al cargar los cursos');
        }
        data = await response.json();
        console.log(data);
    } catch (error) {
        console.error('Error:', error);
        data = { error: true };
    }

    if(!data || data.error){
        let content = document.querySelector(".cursos_actuales");
        content.innerHTML = "";
        const message = document.createElement("p");
        message.textContent = "No hay cursos guardados";
        message.id = "Courses_available";
        message.classList.add("course_style");
        document.querySelector(".cursos_actuales").appendChild(message);
        
    }
    else {
    load_content(data);
    }

        

});




function show_skeleton(Number_of_skeletons) {
    let content = document.querySelector(".cursos_actuales");
    let skeleton = document.getElementById("skeleton_template");

    for(let i = 0; i < Number_of_skeletons; i++){
        let clone = skeleton.content.cloneNode(true);
        content.appendChild(clone);
    }
}

function load_content(data){
    let content = document.querySelector(".cursos_actuales");

    content.innerHTML = "";
    data.forEach(element => { agregar_tarjetas(element.titulo, element.imagen_url, element.id, element.first_lesson_id); });
}