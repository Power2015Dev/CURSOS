export class Reproductor {
    constructor() {
        
    }


    add_Playlist(titulo, seccion, lesson_id, number, descripcion) {
        const list = document.getElementById("list");
        let state = "";
        const urlParams = new URLSearchParams(window.location.search);
        const course_id = urlParams.get('id');
        const lesson_id_url = urlParams.get('lesson');
        if(!seccion) seccion = "";
        if(lesson_id == parseInt(lesson_id_url)) {
            state = "activo";
        }else {
            state = "";
        }
 

        const item = `
        
        <section class="father_section">
        <div style="width: 100%;padding: 0 0 0 10px;">
            <p class="seccion">${seccion}</p>
        </div>
        <span class="item ${state}">
            <div class="icono">
                <i class="fa-solid fa-play"></i>
            </div>
            <div class="datos"> 
                <a href="/modulos/barra_lateral/mis-cursos/mis-cursos.php?&id=${course_id}&lesson=${lesson_id}" class="titulo" style="text-decoration: none;color:inherit">${number + 1}. ${titulo}</a>
                <span class="tiempo" style="display: block; width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">${descripcion}</span>
            </div>
        </span>

    </section>  
        `
        list.insertAdjacentHTML("beforeend", item);

    }
}