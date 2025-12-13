import { MyCourses } from '../../../constructores/Courses_class.js';

// Agregando en mis cursos (temporal)
// const agregar_temp = document.getElementById("agregartemp");
// agregar_temp.addEventListener("click", function(){
//     const test2 = new MyCourses("Programación orientada a objetos", 50, "../../imagenes/dashboard_img/Programacion.png");
//     const message = document.getElementById("Courses_available");
//     if(message){
//         message.remove();
//     }
//     test2.add_courses();
// });

// Eliminando en mis cursos (temporal)
// const eliminar_temp = document.getElementById("eliminartemp");
// eliminar_temp.addEventListener("click", function(){
//     const test2 = new MyCourses();
//     const fatherbox = document.querySelector(".cursos_actuales");
//     const existing_message = document.getElementById("Courses_available");
//     test2.remove_courses();
//     if(fatherbox.children.length == 0 && !existing_message){
//         const message = document.createElement("p");
//         message.textContent = "No hay cursos guardados";
//         message.id = "Courses_available";
//         message.classList.add("course_style");
//         fatherbox.appendChild(message);

//     }
// });



export function agregar_tarjetas(Titulo, Completacion, Imagen){
    const Course_Card = new MyCourses(Titulo, Completacion, Imagen);
    const message = document.getElementById("Courses_available");
    if(message){
        message.remove();
    }
    Course_Card.add_courses();
}





