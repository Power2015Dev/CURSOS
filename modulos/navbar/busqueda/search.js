document.addEventListener('DOMContentLoaded', () => {
    const searchLens = document.getElementById('search_lens');
    const input = document.getElementById('search_input');

    searchLens.addEventListener('click', performSearch);

    
    input.addEventListener('keypress', (event) => {
        if (event.key === 'Enter') {
            performSearch();
        }
    });

    
});


function performSearch() {
    let query = document.getElementById('search_input').value;
    if(query.trim() == "") return;

    window.location.href = "/modulos/navbar/busqueda/resultados.php?search=" + encodeURIComponent(query);
}