import { Reproductor } from '../../../constructores/REPRODUCTOR_CLASS.js';

document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const course_id = urlParams.get('id');
    

    if (!course_id) {
        alert("No se ha especificado un curso valido.");
        return window.location.href = "/dashboard/dashboard.php"; 
    }

    get_data();

});


async function get_data() {
    try{

        const urlParams = new URLSearchParams(window.location.search);
        const course_id = urlParams.get('id');
        const response = await fetch('./get_course_source.php?id=' + course_id);
        const data = await response.json();
        console.log(data);
        load_content(data);

    }catch(error){
        console.log(error);
    }
}

function load_content(data) {
const video = document.querySelector("video");
const h2 = document.querySelector("h2");
const urlParams = new URLSearchParams(window.location.search);
const lesson_id = urlParams.get('lesson');
    data.forEach(element => {
        video.poster = element.imagen;
        h2.textContent = element.titulo_curso; // mas tarde lo termino
        console.log(typeof element.titulo, typeof h2);
        
        element.lecciones.forEach((leccion, index) => {
            if(parseInt(leccion.id_leccion) == lesson_id) video.src = leccion.lecciones;
        
         
        
            const side_bar = new Reproductor();
            side_bar.add_Playlist(leccion.titulo, leccion.seccion, leccion.id_leccion, index, leccion.descripcion);
        });
       
      
    });
    
}