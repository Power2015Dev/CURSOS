document.addEventListener('DOMContentLoaded', function() {
    

    const steps = document.querySelectorAll('.breadcrumb');
    const next_buttons = document.querySelectorAll('.siguiente_miga');
    const prev_buttons = document.querySelectorAll('.anterior_miga');
    const breadcrumb_nav = document.querySelectorAll('.glass-breadcrumbs .step');
    let currentStep = 0;

    function showStep(index) {
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
    showStep(currentStep);


    function configurarInputArchivo(input) {
     
        const button = input.previousElementSibling;
        
    
        button.onclick = function() {
            input.click();
        };

        input.addEventListener('change', () => {
            const fileText = button.querySelector(".file_text"); 
            const fileName = input.files[0] ? input.files[0].name : "Seleccionar Video (MP4)";
            const icon = button.querySelector("i");

            if(input.files && input.files.length > 0) {
                if(fileText) fileText.textContent = fileName;
                
                if(icon){
               
                    if(!icon.dataset.originalClass) icon.dataset.originalClass = icon.className;
                    
                    icon.className = "fa-solid fa-check"; 
                    icon.style.color = "#A0E7E5";
                }
            } else {
         
                if(fileText) fileText.textContent = "";
                if(icon && icon.dataset.originalClass) {
                    icon.className = icon.dataset.originalClass;
                    icon.style.color = "white";
                }
            }
        });
    }

   
    const existingFileInputs = document.querySelectorAll('input[type="file"]');
    existingFileInputs.forEach(input => {
        configurarInputArchivo(input);
    });


 
    const btnAgregar = document.getElementById('agregar_leccion');
    
    btnAgregar.addEventListener('click', () => {
   
        const modulos = document.querySelectorAll('.modulo');
        const original = modulos[0]; 
        

        const clone = original.cloneNode(true);
        
  
        const inputs = clone.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.value = ""; 
        });

      
        const fileButtons = clone.querySelectorAll('button.input_text');
        fileButtons.forEach(btn => {
            
            const spanTexto = btn.querySelector('.file_text'); 
            if(spanTexto) spanTexto.textContent = "";
            
          
            const icon = btn.querySelector('i');
            if(icon) {
            
                if(btn.textContent.includes("Video")) {
                    icon.className = "fa-solid fa-play-circle";
                } else if(btn.textContent.includes("Material")) {
                    icon.className = "fa-solid fa-folder-open";
                }
                icon.style.color = "white";
                delete icon.dataset.originalClass;
            }
        });

  
        const newFileInputs = clone.querySelectorAll('input[type="file"]');
        newFileInputs.forEach(input => {
            configurarInputArchivo(input);
        });

 
    
        btnAgregar.parentNode.insertBefore(clone, btnAgregar);
    });



    const faqInputs = document.querySelectorAll('.faq');
    const resInputs = document.querySelectorAll('.res');

    faqInputs.forEach((faqInput, i) => {
        faqInput.addEventListener('input', () => {
            const respuestaInput = resInputs[i];
            
            if(faqInput.value.trim() !== ""){
                respuestaInput.disabled = false;
             
                respuestaInput.required = true; 
                respuestaInput.placeholder = "Respuesta (Obligatorio)";
            }
            else{
                respuestaInput.disabled = true;
                respuestaInput.required = false; // Ya no es requerido si no hay pregunta
                respuestaInput.value = "";
                respuestaInput.placeholder = "Respuesta";
            }
        });
    });


  
    next_buttons.forEach(button => {
        button.addEventListener('click', () => {
            const currentSection = steps[currentStep];
            // Buscamos inputs que NO esten deshabilitados (para ignorar las respuestas de FAQ vacías)
            const inputs = currentSection.querySelectorAll('input:not([disabled]), select:not([disabled]), textarea:not([disabled])');
            
            let allValid = true;

            for (const input of inputs) {
                if (!input.checkValidity()) {
                    allValid = false;
                    input.reportValidity(); 
                    
          
                    if(input.type == "file"){
                        const button = input.previousElementSibling;
                        const span = button.querySelector(".file_text"); 
                        
                        if(span){
                            span.textContent = "Campo requerido";
                            const icon = button.querySelector("i");
                            if(icon){
                                icon.className = "fa-solid fa-circle-exclamation"; 
                                icon.style.color = "#ff4d4d"; 
                            }
                        }
                    }
                    break; 
                }
            }

            if (allValid) {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        });
    });

    prev_buttons.forEach(button => {
        button.addEventListener('click', () => {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    let isSubmitting = false;


const form = document.querySelector('form'); 
if(form) {
    form.addEventListener('submit', () => {
        isSubmitting = true; 
    });
}

//esto es para avisar al usuario que esta seguro de abandonar la pagina si hizo algun progreso en el formulario
window.addEventListener('beforeunload', (event) => {
    // Si no esta enviando el formulario Y escribio algo
    if (!isSubmitting && formHasData()) {

        // Cancelar el evento 
        event.preventDefault();

        // Chrome requiere que asignes un valor (aunque no lo muestre)
        event.returnValue = ''; 
    }
});


function formHasData() {

    const inputs = document.querySelectorAll('input, textarea, select');
    
    for (const input of inputs) {
       
        if (input.type === 'submit' || input.type === 'button' || input.type === 'hidden') continue;
        
  
        if ((input.type === 'checkbox' || input.type === 'radio')) { 
            if (input.checked !== input.defaultChecked) {
                return true; 
            }
            
        }else if (input.tagName === 'SELECT') {
            for (const option of input.options) {
                if (option.selected !== option.defaultSelected) {
                    return true; 
                }
            }
        }
        
        // trim elimina espacios en blanco para q no se envien cosas como "      hola   "
        else {
            if (input.value !== input.defaultValue) {
                return true; 
            }
        }
    }
    return false;
}

window.getCurrentStep = function() {
    return currentStep; 
};

window.showStep = function(index) {
    showStep(index); 
    currentStep = index;
};

});


