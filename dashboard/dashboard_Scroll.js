// dashboard_Scroll.js - SOLO MOVIMIENTO
const track = document.querySelector(".cuatro_cajas");
const left = document.querySelector(".left");
const right = document.querySelector(".right");
const scroll_speed = 300; // Bajé un poco la velocidad para que no sea tan brusco

left.addEventListener("click", function(){
    track.scrollLeft -= scroll_speed;
});

right.addEventListener("click", function(){
    track.scrollLeft += scroll_speed;
});