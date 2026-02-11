import { page } from "../../constructores/PAGE_class.js";

document.addEventListener("DOMContentLoaded", function() {
    
    const boton = document.getElementById("compra");
    const error_box = document.querySelector(".error-section");
    const confirm_box = document.querySelector(".Confirm-box-section");
    const check_in_box = document.querySelector(".check-in-section");
    const Confirm_btn = document.querySelectorAll(".Confirm-box-btn");
    const loading_box = document.querySelector(".loading");
    boton.addEventListener("click", function() {
        //mostrar todos los botones de confirm
        confirm_box.classList.remove("hide-confirm-box");
        confirm_box.classList.add("show-confirm-box");

         });

        Confirm_btn.forEach((btn, index) => {
            btn.classList.remove("hide_buttons");
            btn.classList.add("show_buttons");

            

            if(index === 0){ // Si es el primer botón (Confirmar)
                
                btn.addEventListener("click", async function() {
                    loading_box.classList.remove("Confirm-box-loading_off");
                    loading_box.classList.add("Confirm-box-loading_on");
                    btn.disabled = true; // Deshabilitar el botón para evitar multiples clics
                    const data = await get_buy();

                    Confirm_btn.forEach((btn2) => {
                        btn2.classList.remove("show_buttons");
                        btn2.classList.add("hide_buttons");
                    })
                    

                    if(data.ok){
                        confirm_box.classList.remove("show-confirm-box");
                            confirm_box.classList.add("hide-confirm-box");
                            check_in_box.classList.remove("hide-check-in-box");
                            check_in_box.classList.add("show-check-in-box");
                        setTimeout(() => {
                            check_in_box.classList.remove("show-check-in-box");
                            check_in_box.classList.add("hide-check-in-box");
                        }, 3000);
                        
                    }
                    else{
                        btn.disabled = false; // Rehabilitar el botón en caso de error
                        const error_message_element = error_box.querySelector(".error-text");
                        //console.log("llegamos aqui");
                        error_message_element.textContent = data.error || "Error desconocido al realizar la compra";

                        confirm_box.classList.remove("show-confirm-box");
                            confirm_box.classList.add("hide-confirm-box");
                            error_box.classList.remove("hide-error-box");
                            error_box.classList.add("show-error-box");

                        setTimeout(() => {
                            error_box.classList.remove("show-error-box");
                        error_box.classList.add("hide-error-box");
                        }, 3000);

                        Confirm_btn.forEach((btn3) => {
                        btn3.classList.remove("hide_buttons");
                        btn3.classList.add("show_buttons");
                    })
                    loading_box.classList.remove("Confirm-box-loading_on");
                    loading_box.classList.add("Confirm-box-loading_off");
                        
                    }
                });

                
            }
            else{ // Si es el segundo botón (Cancelar)
                btn.addEventListener("click", function() {
                    confirm_box.classList.remove("show-confirm-box");
                    confirm_box.classList.add("hide-confirm-box");

                });

                
            }

            
        });

        


        


   

    get_data();
});

async function get_data() {
    try {

        const params = new URLSearchParams(window.location.search);
        const id_curso = params.get('id');

       
        if (!id_curso) {
            alert("No se ha especificado un curso valido.");
            return window.location.href = "/dashboard/dashboard.php"; 
        }
        const response = await fetch(`/modulos/course_page/Query_page/query_page.php?id=${id_curso}`);
        const data = await response.json();
        //console.log(data);
        load_content(data);
    } catch (error) {
        console.log("No se pudo cargar la informacion por: " + error);
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
        data.other_courses || [],
        data.fecha_creacion,
        data.rating_info || []
    )
    page_instance.load_page_content(data.titulo, data.descripcion, data.autor_nombre, data.precio, data.rating, data.rating_count, data.img_url_arr, data.video_url_arr, data.FAQs, data.other_courses, data.autor_avatar, data.fecha_creacion, data.rating_info);
}

async function get_buy() {

    try {
        const params = new URLSearchParams(window.location.search);
        const id_curso = params.get('id');
        const response = await fetch(`/modulos/course_page/Query_page/buy.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id_curso : id_curso })
        });
        const data = await response.json();


        return {
            ok: response.ok,    
            mensaje: data.mensaje, 
            error: data.error     
        };
    } catch (error) {
        console.error("Error al obtener datos de compra:", error);
        return { ok: false }; // Retornar un objeto indicando que hubo un error
    }

}





