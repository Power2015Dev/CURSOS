import { ScrollerAdder } from './constructores/scroller_adder.js';
const Agregar = document.getElementById("agregar");

Agregar.addEventListener("click", function(){
    let test = new ScrollerAdder("Titulo", "Autor", "Reseña", "Imagen", "Precio", "Rating");
    test.add();

});