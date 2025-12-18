import { listaMensajes } from '../configuracion/js/fakeDB.js';
import { Mail_Box_Messages } from '../../constructores/Mail_Box_Messages.js';



document.addEventListener("DOMContentLoaded", () => {
    show_skeleton(3);


    setTimeout(() => {
        if(listaMensajes.length === 0){
        let content = document.querySelector(".mail_box");
        content.innerHTML = "";
        const message = document.createElement("p");
        message.textContent = "No hay Mensajes";
        message.id = "Messages_available";
        message.classList.add("course_style");
        document.querySelector(".mail_box").appendChild(message);
        
    }
    else {
        load_content();
    }
        
    }, 5000);
});



function show_skeleton(Number_of_skeletons) {
    let content = document.querySelector(".mail_box");
    let skeleton = document.getElementById("messages_skeleton");

    for(let i = 0; i < Number_of_skeletons; i++){
        let clone = skeleton.content.cloneNode(true);
        content.appendChild(clone);
    }
}

function load_content(){
    let content = document.querySelector(".mail_box");
    content.innerHTML = "";
     listaMensajes.forEach(element => {agregar_mensajes(element.Nombre, element.Mensaje, element.Perfil, element.Tiempo, element.Tiempo_medida, element.prefijo, element.id);});
}

function agregar_mensajes(Nombre, Mensaje, Perfil, Tiempo, Tiempo_medida, prefijo, id){
    const message = new Mail_Box_Messages(Nombre, Mensaje, Perfil, Tiempo, Tiempo_medida, prefijo, id);
    message.add_message();
}