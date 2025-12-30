document.getElementById("form-perfil").addEventListener("submit", async function(e) {
    e.preventDefault();

    

    const datos = new FormData(this);
    

    try {
        const peticion = await fetch("../configuracion/api_perfil/profile_update.php", {
            method: "POST",
            body: datos
        });
        const response = await peticion.json();
        if (peticion.ok && response.success) {
            alert(response.success); 
            window.location.reload();
        } else {
 
            const errorData = await peticion.json();
            alert(errorData.error || "Error al cambiar el perfil.");
        }

    } catch (error) {
        console.error("Error de conexión:", error);
        alert("Hubo un error al intentar conectar con el servidor.");
    }
});

document.addEventListener("DOMContentLoaded", function() {
    get_data();
});

async function get_data() {
    const usuario = document.getElementById("nombre");
    const foto = document.getElementById("avatar-preview");
    const pais = document.getElementById("pais");
    const email = document.getElementById("email");
     try{
        const response = await fetch('../configuracion/api_perfil/get_profile.php');
        const data = await response.json();
       if(data.nombre) usuario.value = data.nombre;
        if(data.pais) pais.value = data.pais;
        if(data.email) email.value = data.email;

        if(data.avatar_url) foto.src = data.avatar_url;
        console.log(data.pais);
    }catch(error){
        console.log(error);
    }
}