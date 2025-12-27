import { results } from '../../../constructores/SEARCH_class.js';
document.addEventListener('DOMContentLoaded', () => {

    get_results();


});


async function get_results(){
    try{
       const _GET = new URLSearchParams(window.location.search);
       const search = _GET.get('search');
       const response = await fetch('/modulos/navbar/busqueda/search.php?search=' + search);
       const results = await response.json();
       console.log(results);
       load_content(results);

    }catch(error){
        console.error("Error fetching search results:", error);
    }

}


const load_content = (resultado) => {
    let total = 0;
    const contador = document.getElementById("result-count");
    let precio_real;
    resultado.forEach(element => {
        precio_real = element.precio < 1 ? 'Free' : parseFloat(element.precio) + ' US$';
        const result = new results(element.id, element.titulo, element.nombre, element.imagen_url, element.avatar_url, element.rating, element.resenas_count, precio_real, element.usuario_id);
        result.add_card();
        total = total + 1;
        
    });
    contador.textContent = "Se encontraron " + total + " resultados.";
}
