document.addEventListener('DOMContentLoaded', function() {

  



document.getElementById('formulario').addEventListener('submit', async function(e) {
    e.preventDefault();

    const form = new FormData(this);
    const response = await fetch('/modulos/vendedor/curso_formulario/api_form/form_query.php',
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(Object.fromEntries(form))
        }
    );
    const data = await response.json();
    load_content(data);
})


});

function load_content(data) {
    console.log(data);
}