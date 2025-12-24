import { page } from "../../constructores/PAGE_class.js";

document.addEventListener("DOMContentLoaded", function() {
    

    get_data();
});

async function get_data() {
    try {

        const params = new URLSearchParams(window.location.search);
        const id_curso = params.get('id');

       
        if (!id_curso) {
            console.error("No hay ID en la URL");
            return; 
        }
        const response = await fetch(`/modulos/course_page/Query_page/query_page.php?id=${id_curso}`);
        const data = await response.json();
        console.log(data);
        load_content(data);
    } catch (error) {
        console.log("No se pudo cargar la informacion por: " +error);
    }
}


function load_content(data) {
    const page_instance = new page(
        data.id,
        data.titulo,
        data.descripcion,
        data.autor_nombre,
        data.precio,
        data.rating || 0,        // Si no hay rating, 0
        data.resenas_count || 0, // Si no hay count, 0
        data.img_url_arr || [],  //  Array vacio si no existe
        data.video_url_arr || [],// lo mismo
        data.autor_pais,
        data.user_rating || 0,
        data.autor_avatar,
        data.FAQs || [],        
        data.other_courses || []
    )
    page_instance.load_page_content(data.titulo, data.descripcion, data.autor_nombre, data.precio, data.rating, data.rating_count, data.img_url_arr, data.video_url_arr, data.FAQs, data.other_courses);
}




