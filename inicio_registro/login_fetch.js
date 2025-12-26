document.getElementById("formulario").addEventListener("submit", async function(e) {
    e.preventDefault();

    const correo = document.getElementById("usuario").value;
    const password = document.getElementById("password").value;


    try {
        const peticion = await fetch("../modulos/PHP/iniciar_sesion.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ email: correo, pass: password })
        });

        if (peticion.status === 200) {
            
            window.location.href = "../dashboard/dashboard.php"; 
        } else {
 
            const errorData = await peticion.json();
            alert(errorData.error || "Usuario o contraseña incorrectos");
        }

    } catch (error) {
        console.error("Error de conexión:", error);
        alert("Hubo un error al intentar conectar con el servidor.");
    }
});