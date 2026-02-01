import { Reproductor } from '../../../constructores/REPRODUCTOR_CLASS.js';
import { addCustomControls } from './CustomControls.js';
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

    const player = videojs('video-player', {
        fluid: true,
        playbackRates: [0.5, 1, 1.25, 1.5, 2] 
    });

  
    addCustomControls(player);

    const h2 = document.getElementById("titulo-h2");
    const descripcion = document.getElementById("descripcion-detalles");
    const urlParams = new URLSearchParams(window.location.search);
    const lesson_id = urlParams.get('lesson');

    data.forEach(element => {
        player.poster(element.imagen); 
        descripcion.textContent = element.descripcion_curso;
        
        element.lecciones.forEach((leccion, index) => {
            if(parseInt(leccion.id_leccion) == lesson_id){
              
                player.src({ type: 'video/mp4', src: leccion.lecciones });
                h2.textContent = leccion.titulo;
            } 
            
          
            const side_bar = new Reproductor();
            side_bar.add_Playlist(leccion.titulo, leccion.seccion, leccion.id_leccion, index, leccion.descripcion);
        });
    });
}