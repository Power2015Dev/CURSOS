const track = document.querySelector(".cuatro_cajas");
const left = document.querySelector(".left");
const right = document.querySelector(".right");
const scroll_speed = 300;

left.addEventListener("click", function(){
    track.scrollLeft -= scroll_speed;
});

right.addEventListener("click", function(){
    track.scrollLeft += scroll_speed;
});

const containers = document.querySelectorAll("#small_functions_container");

containers.forEach((container) => {
    const slider = container.querySelector(".slider-small");
    const btnLeft = container.querySelector(".small_left");
    const btnRight = container.querySelector(".small_right");

    if (slider && btnLeft && btnRight) {
        
        btnRight.addEventListener('click', () => {
            const width = slider.clientWidth; // el ancho de la tarjeta
            slider.scrollBy({ left: width, behavior: 'smooth' }); // inyecta codigo css para que se mueva al width
        });

        btnLeft.addEventListener('click', () => {
            const width = slider.clientWidth;
            slider.scrollBy({ left: -width, behavior: 'smooth' });
        });
    }
});