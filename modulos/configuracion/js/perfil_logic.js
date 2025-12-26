document.addEventListener('DOMContentLoaded', async () => {
    // 1. Cargar datos actuales del usuario
    cargarDatosUsuario();

    // 2. Previsualizar imagen al seleccionarla
    const avatarInput = document.getElementById('avatar-input');
    const avatarPreview = document.getElementById('avatar-preview');

    avatarInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            avatarPreview.src = URL.createObjectURL(file);
        }
    });

    // 3. Enviar formulario
    document.getElementById('form-perfil').addEventListener('submit', actualizarPerfil);
});

async function cargarDatosUsuario() {
    try {
        const response = await fetch('../modulos/PHP/obtener_perfil.php');
        const data = await response.json();

        if (response.ok) {
            document.getElementById('nombre').value = data.nombre;
            document.getElementById('email').value = data.email;
            
            // Lógica del Teléfono
            const telefonoInput = document.getElementById('telefono');
            if (data.telefono) {
                telefonoInput.value = data.telefono;
                telefonoInput.placeholder = "Edita tu teléfono";
            } else {
                telefonoInput.value = "";
                telefonoInput.placeholder = "¡Agrega un teléfono ahora!";
            }

            // Cargar avatar si existe
            if (data.avatar_url) {
                document.getElementById('avatar-preview').src = data.avatar_url;
            }
        } else {
            alert("Error al cargar datos: " + data.error);
            // Si no hay sesión, redirigir al login
            if(data.sesion_expirada) window.location.href = "inicio_sesion.html";
        }
    } catch (error) {
        console.error("Error:", error);
    }
}

async function actualizarPerfil(e) {
    e.preventDefault();
    
    // Usamos FormData porque vamos a enviar archivos (imágenes)
    const formData = new FormData(document.getElementById('form-perfil'));

    try {
        const response = await fetch('../modulos/PHP/actualizar_perfil.php', {
            method: 'POST',
            body: formData // No ponemos Content-Type header con FormData, el navegador lo pone solo
        });

        const result = await response.json();

        if (response.ok) {
            alert("¡Perfil actualizado con éxito!");
            // Opcional: recargar para ver cambios firmes
            // location.reload(); 
        } else {
            alert("Error: " + result.error);
        }
    } catch (error) {
        console.error("Error:", error);
        alert("Error de conexión al guardar.");
    }
}