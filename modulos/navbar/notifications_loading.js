import { Notifications } from '../../constructores/Notification_class.js';

document.addEventListener("DOMContentLoaded", () => {
    show_skeleton(3);
    get_data();
});

async function get_data() {
    try {
        const response = await fetch("/modulos/navbar/notifications_query/notifications_query.php");
        const data = await response.json();
        load_content(data);
    } catch (error) {
        console.log(error);
    }
}

function show_skeleton(Number_of_skeletons) {
    let content = document.querySelector(".messages");
    let skeleton = document.getElementById("notifications_skeleton");

    for(let i = 0; i < Number_of_skeletons; i++){
        let clone = skeleton.content.cloneNode(true);
        content.appendChild(clone);
    }
}

function load_content(listaNotificaciones){
    let content = document.querySelector(".messages");
    content.innerHTML = "";

    if(listaNotificaciones.length === 0){
        const message = document.createElement("p");
        message.textContent = "No hay notificaciones";
        message.id = "Notifications_available";
        message.classList.add("course_style");
        message.style.flex = "0 0 100%";
        document.querySelector(".messages").appendChild(message);
    }
    else {
        listaNotificaciones.forEach(element => {
            agregar_notificaciones(element.Titulo, element.Tipo, element.fecha_formateada, element.id);
        });
    }
}

function agregar_notificaciones(Titulo, Tipo, Fecha, id){
    const Notification = new Notifications(Titulo, Tipo, Fecha, id);
    Notification.add_notification();
}