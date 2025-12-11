import { ScrollerAdder } from '../constructores/scroller_class.js';
const Agregar = document.getElementById("agregar");
const eliminar = document.getElementById("eliminar");
//Agregando (temporal)
Agregar.addEventListener("click", function(){
    const Grid_1 = new ScrollerAdder("Programación", "Tu aloing", "400", "../imagenes/placeholder2.jpg", "15$", "6.0");
    const message = document.getElementById("state_message");
    if(message){
        message.remove();
    }
    
    Grid_1.add_recommendations();
});
// esto es usando DELETE_LAST_RECOMMENDATION (temporal)
eliminar.addEventListener(`click`, function(){
    const Grid_1 = new ScrollerAdder("Programación", "Tu aloing", "400", "../imagenes/placeholder2.jpg", "15$", "6.0");
    let slider_child = document.querySelector(".slider-track");
    let track = document.querySelector(".cuatro_cajas");
    let existing_message = document.getElementById("state_message");
   // slider_child.removeChild(slider_child.lastElementChild); Remplazado por mi clase
    Grid_1.remove_recommendations();
    if(slider_child.children.length == 0 && !existing_message){
        const message = document.createElement("p");
        message.textContent = "No hay recomendaciones";
        message.id = "state_message";
        message.classList.add("message_style");
        track.appendChild(message);

    }
});
