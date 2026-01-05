document.addEventListener('DOMContentLoaded', function() {
    console.log("fetch.js cargado correctamente");
    
    const form = document.getElementById('formulario');
    if (!form) {
        console.error("no hay formulario");
        return;
    }
    
    
    form.addEventListener('submit', async function(e) {

        e.preventDefault();
        
        // Verificar si estamos en el ultimo paso
        const currentStep = getCurrentStep();
        if (currentStep !== 3) { // 3 es el índice del último paso (0,1,2,3)
            alert("Completa los pasos anteriores primero");
            showStep(3); 
            return;
        }
        

        const lastStep = document.querySelectorAll('.breadcrumb')[3];
        const requiredInputs = lastStep.querySelectorAll('[required]');
        let isValid = true;
        
        for (const input of requiredInputs) {
            if (!input.value.trim() && !input.type === 'file') {
                input.reportValidity();
                isValid = false;
                break;
            }
        }
        
        if (!isValid) {
            alert("Completa todos los campos requeridos");
            return;
        }
        
      
        const submitBtn = document.getElementById('btn_finalizar');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Publicando...';
        
        try {

            const formData = new FormData(this);
            
          
            
            const response = await fetch('/modulos/vendedor/curso_formulario/api_form/form_query.php', {
                method: 'POST',
                body: formData
            });
            

            
            // Verificar si es JSON
            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                const text = await response.text();
                console.error("Respuesta no es JSON:", text.substring(0, 200));
                throw new Error("El servidor no devolvió JSON. Estado: " + response.status);
            }
            
            const data = await response.json();
            console.log("Datos recibidos:", data);
            
            if (!response.ok) {
                throw new Error(data.error || `Error HTTP ${response.status}`);
            }
            
            if (data.success) {
    
                alert((data.mensaje || "Curso publicado correctamente"));
                
     
                setTimeout(() => {
                    window.location.href = '../../../dashboard/dashboard.php';
                }, 2000);
                
            } else {
           
                throw new Error(data.error || "Error desconocido del servidor");
            }
            
        } catch (error) {
            console.error("❌ Error completo:", error);
            
            let errorMsg = "Error al publicar el curso: ";
            if (error.message.includes("JSON")) {
                errorMsg = "Error de conexión con el servidor. Verifica la consola.";
            } else if (error.message.includes("401")) {
                errorMsg = "Sesión expirada. Redirigiendo al login...";
                setTimeout(() => {
                    window.location.href = '../../../login/login.php';
                }, 2000);
            } else {
                errorMsg += error.message;
            }
            
            alert("❌ " + errorMsg);
            
        } finally {
            // Restaurar botón
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        }
    });
    
    // Función para obtener el paso actual (debe coincidir con form.js)
    function getCurrentStep() {
        const steps = document.querySelectorAll('.breadcrumb');
        for (let i = 0; i < steps.length; i++) {
            if (steps[i].classList.contains('active')) {
                return i;
            }
        }
        return 0;
    }
    
    // Función para mostrar un paso específico
    function showStep(index) {
        const steps = document.querySelectorAll('.breadcrumb');
        const breadcrumb_nav = document.querySelectorAll('.glass-breadcrumbs .step');
        
        steps.forEach((step, i) => {
            step.classList.remove('active');
            if(breadcrumb_nav[i]) {
                if(i === index) breadcrumb_nav[i].classList.add('active');
                else if (i < index) breadcrumb_nav[i].classList.add('completed');
                else breadcrumb_nav[i].classList.remove('active', 'completed');
            }
        });
        steps[index].classList.add('active');
    }
});