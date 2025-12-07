import { ScrollerAdder, MyCourses } from './constructores/scroller_adder.js';
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

// Agregando en mis cursos (temporal)
const agregar_temp = document.getElementById("agregartemp");
agregar_temp.addEventListener("click", function(){
    const test2 = new MyCourses("Programación orientada a objetos", 100);
    const message = document.getElementById("Courses_available");
    if(message){
        message.remove();
    }
    test2.add_courses();
});
// Eliminando en mis cursos (temporal)
const eliminar_temp = document.getElementById("eliminartemp");
eliminar_temp.addEventListener("click", function(){
    const test2 = new MyCourses("Programación orientada a objetos", 100);
    const fatherbox = document.querySelector(".cursos_actuales");
    const existing_message = document.getElementById("Courses_available");
    test2.remove_courses();
    if(fatherbox.children.length == 0 && !existing_message){
        const message = document.createElement("p");
        message.textContent = "No hay cursos guardados";
        message.id = "Courses_available";
        message.classList.add("course_style");
        fatherbox.appendChild(message);

    }
});