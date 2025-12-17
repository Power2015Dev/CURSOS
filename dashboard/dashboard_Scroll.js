const track = document.querySelector(".cuatro_cajas");
const left = document.querySelector(".left");
const right = document.querySelector(".right");
const small = document.querySelectorAll(".slider-small");
const small_left = document.querySelectorAll(".small_left");
const small_right = document.querySelectorAll(".small_right");
const scroll_speed = 300;

left.addEventListener("click", function(){
    track.scrollLeft -= scroll_speed;
});

right.addEventListener("click", function(){
    track.scrollLeft += scroll_speed;
});

small_right[0].addEventListener('click', () => {
    // clientWidth nos da el ancho exacto visible del contenedor
    const width = small[0].clientWidth; 
    small[0].scrollBy({ left: width, behavior: 'smooth' });
});

small_left[0].addEventListener('click', () => {
    const width = small[0].clientWidth; 
    small[0].scrollBy({ left: -width, behavior: 'smooth' });
});

small_right[1].addEventListener('click', () => {

    const width = small[1].clientWidth; 
    small[1].scrollBy({ left: width, behavior: 'smooth' });
});

small_left[1].addEventListener('click', () => {
    const width = small[1].clientWidth; 
    small[1].scrollBy({ left: -width, behavior: 'smooth' });
});

small_right[2].addEventListener('click', () => {

    const width = small[2].clientWidth; 
    small[2].scrollBy({ left: width, behavior: 'smooth' });
});

small_left[2].addEventListener('click', () => {
    const width = small[2].clientWidth; 
    small[2].scrollBy({ left: -width, behavior: 'smooth' });
});