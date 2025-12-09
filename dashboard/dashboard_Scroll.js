//scroll de recomendados
const track = document.querySelector(".cuatro_cajas");
const slider = document.querySelector(".slider-track");
const left = document.querySelector(".left");
const right = document.querySelector(".right");
const cursos = document.querySelector(".cursos_actuales");
const scroll_speed = 900;
left.addEventListener("click", function(){
    track.scrollLeft -= scroll_speed;

});

right.addEventListener("click", function(){
    track.scrollLeft += scroll_speed;
});

//si no hay recomendaciones
if(slider.children.length == 0){
    const message = document.createElement("p");
    message.textContent = "No hay recomendaciones";
    message.id = "state_message";
    message.classList.add("message_style");
    track.appendChild(message);
}

//si no hay cursos
if(cursos.children.length == 0){
    const message = document.createElement("p");
    message.textContent = "No hay cursos guardados";
    message.id = "Courses_available";
    message.classList.add("course_style");
    cursos.appendChild(message);
}
    



