import { Mail_Box_Messages } from '../../constructores/Mail_Box_Messages.js';



document.addEventListener("DOMContentLoaded", () => {
    show_skeleton(3);


    get_data();
        
    
  
});

async function get_data() {
    try {
        const response = await fetch("/modulos/navbar/messages_query/message_query.php");
        const data = await response.json();
        console.log(data);
        load_content(data);
    } catch (error) {
        console.log(error);
    }
}


function show_skeleton(Number_of_skeletons) {
    let content = document.querySelector(".mail_box");
    let skeleton = document.getElementById("messages_skeleton");

    for(let i = 0; i < Number_of_skeletons; i++){
        let clone = skeleton.content.cloneNode(true);
        content.appendChild(clone);
    }
}

function load_content(table){
    let content = document.querySelector(".mail_box");
    content.innerHTML = "";

    if(table.length === 0){
        let content = document.querySelector(".mail_box");
        content.innerHTML = "";
        const message = document.createElement("p");
        message.textContent = "No hay Mensajes";
        message.id = "Messages_available";
        message.classList.add("course_style");
        message.style.flex = "0 0 100%";
        document.querySelector(".mail_box").appendChild(message);
        }
        else{

     table.forEach(element => {agregar_mensajes(element.nombre, element.mensaje, element.perfil, element.fecha_formateada, element.id);});
        }
}


function agregar_mensajes(Nombre, Mensaje, Perfil, Fecha, id){
    const message = new Mail_Box_Messages(Nombre, Mensaje, Perfil, Fecha, id);
    message.add_message();
}