document.addEventListener('DOMContentLoaded', function() {

   
    const steps = document.querySelectorAll('.breadcrumb');
    const next_buttons = document.querySelectorAll('.siguiente_miga');
    const prev_buttons = document.querySelectorAll('.anterior_miga');
    const breadcrumb_nav = document.querySelectorAll('.glass-breadcrumbs .step'); // estoy agarrando todos los steps que esten dentro de la clase .glass-breadcrumbs

    let currentStep = 0;

    const fileInputs = document.querySelectorAll('input[type="file"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', () => {
            const button = input.previousElementSibling;
            const fileText = button.querySelector("span");
            const fileName = input.files[0].name;

            if(input.files && input.files.length > 0) {
                fileText.textContent = fileName;
                const icon = button.querySelector("i");
                if(icon){
                    icon.className = "fa-solid fa-check"; 
                    icon.style.color = "#A0E7E5";
                }
            }
            
        });
    });

   
                

    function showStep(index) {

        steps.forEach((step, i) => {
            step.classList.remove('active');
            // Actualizar la barrita de navegación de arriba
            if(breadcrumb_nav[i]) {
                if(i === index) breadcrumb_nav[i].classList.add('active');
                else if (i < index) breadcrumb_nav[i].classList.add('completed');
                else breadcrumb_nav[i].classList.remove('active', 'completed');
            }
        });

        // esto muestra el paso en que estamos
        steps[index].classList.add('active');
    }

    // primero mostramos el paso inicial
    showStep(currentStep);



    next_buttons.forEach(button => {
        button.addEventListener('click', () => {

            const currentSection = steps[currentStep];
            const inputs = currentSection.querySelectorAll('input, select, textarea');
            
            let allValid = true;

            for (const input of inputs) {
                // CheckValidity es una funcion nativa del navegador
                // Verifica si cumple con el 'required', el tipo de dato, etc.
                if (!input.checkValidity()) {
                    allValid = false;
                    input.reportValidity(); // Muestra el globito de error del navegador

                    if(input.type == "file"){
                        const button = input.previousElementSibling;
                        const span = button.querySelector("span") ? button.querySelector("span") : null;
                        
                        if(span){
                            span.textContent = "No se ha seleccionado ningun archivo";
                            const icon = button.querySelector("i");
                            if(icon){
                                icon.className = "fa-solid fa-xmark"; 
                                icon.style.color = "red";
                            }
                        }
                        
                    }

                    break; // Detenemos el bucle al primer error
                }

                
                
            }


            if (allValid) {

               

                if (currentStep < steps.length - 1) {// - 1 porque empezamos a contar desde el cero
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
        // Ignoramos los botones y los hidden (como los de breadcrumbs)
        if (input.type === 'submit' || input.type === 'button' || input.type === 'hidden') continue;
        
  
        if ((input.type === 'checkbox' || input.type === 'radio')) { // tanto este como el select y el input es para que no cuenten la seleccion por defecto
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

});


function new_lesson(){
    console.log("nueva leccion");
    
}