import { listaNotificaciones } from '../configuracion/js/fakeDB.js';
import { Notifications } from '../../constructores/Notification_class.js';



document.addEventListener("DOMContentLoaded", () => {
    show_skeleton(3);


    setTimeout(() => {
        if(listaNotificaciones.length === 0){
        let content = document.querySelector(".messages");
        content.innerHTML = "";
        const message = document.createElement("p");
        message.textContent = "No hay notificaciones";
        message.id = "Notifications_available";
        message.classList.add("course_style");
        message.style.flex = "0 0 100%";
        document.querySelector(".messages").appendChild(message);
        
    }
    else {
        load_content();
    }
        
    }, 3000);
});



function show_skeleton(Number_of_skeletons) {
    let content = document.querySelector(".messages");
    let skeleton = document.getElementById("notifications_skeleton");

    for(let i = 0; i < Number_of_skeletons; i++){
        let clone = skeleton.content.cloneNode(true);
        content.appendChild(clone);
    }
}

function load_content(){
    let content = document.querySelector(".messages");
    content.innerHTML = "";
     listaNotificaciones.forEach(element => {agregar_notificaciones(element.Titulo, element.Tiempo, element.Tipo, element.Tiempo_medida, element.prefijo, element.id);});
}

function agregar_notificaciones(Titulo, Tiempo, Tipo, Tiempo_medida, prefijo, id){
    const Notification = new Notifications(Titulo, Tiempo, Tipo, Tiempo_medida, prefijo, id);
    Notification.add_notification();
}