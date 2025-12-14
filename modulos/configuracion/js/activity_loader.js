import { actividadData } from './fakeDB.js'; 
import { Activity } from '../../../constructores/activity_class.js'; 

document.addEventListener("DOMContentLoaded", () => {

    show_skeleton();


    setTimeout(() => {
        load_activity_content();
    }, 2000);
});

function show_skeleton() {
    let content = document.getElementById("activity_content");
    let skeleton = document.getElementById("activity_skeleton");
    

    let clone = skeleton.content.cloneNode(true);
    content.appendChild(clone);
}

function load_activity_content() {
    let content = document.getElementById("activity_content");
    
 
    content.innerHTML = "";


    if (!actividadData) {
        const message = document.createElement("p");
        message.textContent = "No hay actividad";
        message.classList.add("course_style"); 
        message.style.fontSize = "18px";     
        content.appendChild(message);
    } else {
        const miActividad = new Activity(
            actividadData.horas, 
            actividadData.racha, 
            actividadData.dias
        );
        miActividad.add_activity();
    }
}