document.addEventListener('DOMContentLoaded', function() {
    
    const form = document.getElementById('formulario');
    if (!form) {
        console.error("no hay formulario");
        return;
    }
    const submitBtn = document.getElementById('btn_finalizar');

    submitBtn.addEventListener('click', function(e) {
        e.preventDefault();
        if(!validar()){return;}
        const Confirm_box = document.querySelector('.Confirm-box-section');
        
        Confirm_box.classList.remove('hide-confirm-box');
        Confirm_box.classList.add('show-confirm-box');
        const buttons = document.querySelectorAll('.Confirm-box-btn');
        const donthide = document.querySelectorAll('.hide_buttons');
        donthide.forEach(element => {
            element.classList.remove('hide_buttons');
            element.classList.add('show_buttons');
        });

        buttons[0].onclick = function() {
            

                Confirm_box.classList.add('hide-confirm-box');
                Confirm_box.classList.remove('show-confirm-box');

                const hidden_check = document.querySelector(".check-in-section");

                 
              
                    hidden_check.classList.remove("hide-check-in-box");
                    hidden_check.classList.add("show-check-in-box");
                    change_check_in("Espere un momento...", "loading.json");
                

                
                    form.requestSubmit();
            
    
        }//aqui termina
        
        buttons[1].onclick = function(){
            Confirm_box.classList.add('hide-confirm-box');
            Confirm_box.classList.remove('show-confirm-box');
        }

        
    });
    
    form.addEventListener('submit', async function(e) {

        e.preventDefault();
        
        // Verificar si estamos en el ultimo paso
        // const currentStep = getCurrentStep();
        // if (currentStep !== 3) {  3 es el índice del último paso (0,1,2,3)
        //     alert("Completa los pasos anteriores primero");
        //     showStep(3); 
        //     return;
        // }
        

        // const lastStep = document.querySelectorAll('.breadcrumb')[3];
        // const requiredInputs = lastStep.querySelectorAll('[required]');
        // let isValid = true;
        
        // for (const input of requiredInputs) {
        //     if (!input.value.trim() && !input.type === 'file') {
        //         input.reportValidity();
        //         isValid = false;
        //         break;
        //     }
        // }
        
        // if (!isValid) {
        //     alert("Completa todos los campos requeridos");
        //     return;
        // }
        
      
        
       
        
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
            //console.log("Datos recibidos:", data);
            
            if (!response.ok) {
                throw new Error(data.error || `Error HTTP ${response.status}`);
            }
            
            if (data.success) {
                const hidden_check = document.querySelector(".check-in-section");

                if (hidden_check.classList.contains("show-check-in-box")) {
                    hidden_check.classList.remove("show-check-in-box");
                    hidden_check.classList.add("hide-check-in-box");

                    change_check_in("¡Curso publicado con exito!", "confetti.json");

                    hidden_check.classList.add("show-check-in-box");
                    hidden_check.classList.remove("hide-check-in-box");
                } else {
                    hidden_check.classList.remove("hide-check-in-box");
                    hidden_check.classList.add("show-check-in-box");
                
                }

            
                //alert((data.mensaje || "Curso publicado correctamente"));
                
     
                setTimeout(() => {
                    window.location.href = '../../../dashboard/dashboard.php';
                }, 2000);
                
            } else {

                let hidden_error = document.querySelector(".error-section");
                const original_value = hidden_error.textContent;

                hidden_error.classList.remove("hide-error-box");
                hidden_error.classList.add("show-error-box");
                hidden_error.textContent = data.error;
                setTimeout(() => {
                    hidden_error.classList.remove("show-error-box");
                    hidden_error.classList.add("hide-error-box");
                    hidden_error.textContent = original_value;
                }, 5000);
           
                throw new Error(data.error || "Error desconocido del servidor");
            }
            
        } catch (error) {
            console.error("Error completo:", error);
            
            let errorMsg = "Error al publicar el curso: ";
            if (error.message.includes("JSON")) {
                errorMsg = "Error de conexion con el servidor. Verifica la consola.";
            } else if (error.message.includes("401")) {
                errorMsg = "Sesion expirada. Redirigiendo al login...";

                let hidden_error = document.querySelector(".error-section");
                hidden_error.classList.remove("hide-error-box");
                hidden_error.classList.add("show-error-box");
                
                setTimeout(() => {
                    window.location.href = '../../../inicio_registro/inicio_sesion.php';
                }, 2000);
            } else {
                errorMsg += error.message;
            }
            
            alert("Error: " + errorMsg);
            
        }
    });
    
    
});

function change_check_in(text, icon) {
    const checkSection = document.querySelector(".check-in-section");
    if (!checkSection) return;

    const checkText = checkSection.querySelector(".check-in-text");
    const oldPlayer = checkSection.querySelector("dotlottie-player");
    const container = checkSection.querySelector(".check-in-container");


    if (checkText) {
        checkText.textContent = text;
    }

 
    if (oldPlayer && container) {
        // Definimos la ruta segura con %20 eso significa espacio
        const nuevaRuta = "/imagenes/lordicon%20json/" + icon;
        
        console.log("Reemplazando player. Nueva ruta:", nuevaRuta);

      
        const newPlayer = document.createElement("dotlottie-player");
        
        
        newPlayer.setAttribute("src", nuevaRuta);
        newPlayer.setAttribute("background", "transparent");
        newPlayer.setAttribute("speed", "1"); 
        newPlayer.style.width = "150px";
        newPlayer.style.height = "150px";
        newPlayer.setAttribute("loop", "");
        newPlayer.setAttribute("autoplay", "");

        // Reemplazamos el viejo por el nuevo en el HTML
        // Esto mata el confetti instantáneamente y carga el loading
        container.replaceChild(newPlayer, oldPlayer);
    }
}


//para obtener el paso actual de form.js
    function getCurrentStep() {
        const steps = document.querySelectorAll('.breadcrumb');
        for (let i = 0; i < steps.length; i++) {
            if (steps[i].classList.contains('active')) {
                return i;
            }
        }
        return 0;
    }
    
    //para mostrar un paso específico
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

function validar() {
  
    const form = document.getElementById('formulario');
    if (!form) return false;

    const allInputs = form.querySelectorAll('input, select, textarea');

    
    for (const input of allInputs) {
        
  
        if (input.disabled || input.type === 'submit' || input.type === 'button') continue;

      
        if (!input.checkValidity()) {
            
        
            const parentStep = input.closest('.breadcrumb');
            const steps = document.querySelectorAll('.breadcrumb');
            
            let stepIndex = -1;
    
            steps.forEach((step, index) => {
                if (step === parentStep) stepIndex = index;
            });

         
            if (stepIndex !== -1 && stepIndex !== getCurrentStep()) {
                showStep(stepIndex); 
                
                let currentStep = getCurrentStep();
                if(typeof currentStep !== 'undefined') {
                    currentStep = stepIndex; 
                }
            }

            setTimeout(() => {
                input.focus(); 
                input.reportValidity(); 
            }, 100);

        
            return false; 
        }
    }
    
    
    return true;
}