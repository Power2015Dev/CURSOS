document.getElementById("formulario").addEventListener("submit", async function(e) {
    e.preventDefault();

    
    const usuario = document.getElementById("nombre").value;
    const correo = document.getElementById("correo").value;
    const password = document.getElementById("clave").value;
    const confirmar = document.getElementById("confirmar").value;
    const telefono = document.getElementById("telefono").value;

    if (password !== confirmar) {
        alert("Las contraseñas no coinciden");
        return;
    }

    try {
        const peticion = await fetch("../modulos/PHP/registrar.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ email: correo, pass: password, user: usuario, phone: telefono })
        });

        if (peticion.status === 200) {
            window.location.href = "redireccionable.html"; 
        } else {
 
            const errorData = await peticion.json();
            alert(errorData.error || "Error al registrar el usuario");
        }

    } catch (error) {
        console.error("Error de conexión:", error);
        alert("Hubo un error al intentar conectar con el servidor.");
    }
});