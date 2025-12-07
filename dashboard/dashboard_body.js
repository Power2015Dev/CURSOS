//scroll de recomendados
const track = document.querySelector(".cuatro_cajas");
const left = document.querySelector(".left");
const right = document.querySelector(".right");
const scroll_speed = 900;
left.addEventListener("click", function(){
    track.scrollLeft -= scroll_speed;

});

right.addEventListener("click", function(){
    track.scrollLeft += scroll_speed;
});


