document.addEventListener("DOMContentLoaded", function() {
    get_data();

    //---CLASES EN CONFIRM BOX----

    //hide-Confirm-box

    //show-Confirm-box

    //---------------------------

    //---CLASES EN CHECK IN BOX----

    //hide-check-in-box

    //show-check-in-box

    //---------------------------

    //---CLASES EN LOADING TEXT----

    //Confirm-box-loading_off

    //Confirm-box-loading_on

    //---------------------------

    //---CLASES EN LOADING BUTTONS----

    //hide_buttons

    //show_buttons

    //---------------------------

    //---CLASES EN ERROR BOX----

    //show-error-box

    //hide-error-box

    //---------------------------
    const Check_in_box = document.querySelector(".check-in-section");
    const Confirm_box = document.querySelector(".Confirm-box-section");
    const errorSection = document.querySelector(".error-section");
    const errorText = document.querySelector(".error-text");
    
    
    const mensajeErrorOriginal = errorText ? errorText.textContent : "Error";


    const btnSi = document.querySelector(".Confirm-box-btn:nth-of-type(1)");
    const btnNo = document.querySelector(".Confirm-box-btn:nth-of-type(2)");
    const loading = document.querySelector(".loading");
    
  
    const avatarInput = document.getElementById('avatar-input-unico');
    const toggleInfoSelected = document.getElementById("avatar-info-selected"); 
    const toggleInfoInitial = document.getElementById("avatar-info-initial");  
    
    let datosFormulario = null;


    if (avatarInput) {
        avatarInput.addEventListener('change', (e) => {
            const input = e.target;
            const fileName = document.getElementById('file_name');
            const fileInfo = document.getElementById('file_info');
            const preview = document.getElementById('avatar-preview');

            if (input.files && input.files.length > 0) {
                const archivo = input.files[0];

           
                if (archivo.size <= 3000000) {
          
                    toggleInfoInitial.classList.add("hide_avatar");
                    toggleInfoInitial.classList.remove("show_avatar");

                    toggleInfoSelected.classList.remove("hide_avatar");
                    toggleInfoSelected.classList.add("show_avatar");

                    fileName.textContent = archivo.name;
                    fileInfo.textContent = (archivo.size / 1024).toFixed(2) + " KB";
                    preview.src = URL.createObjectURL(archivo);
                } else {
               
                    errorText.textContent = 'El archivo es demasiado grande (Máx 3MB)';
                    errorSection.classList.remove("hide-error-box");
                    errorSection.classList.add("show-error-box");

                
                    input.value = ""; 
                    preview.src = "/imagenes/dashboard_img/perfil.png"; 

                    setTimeout(() => {
                        errorSection.classList.add("hide-error-box");
                        errorSection.classList.remove("show-error-box");
                     
                        setTimeout(() => { errorText.textContent = mensajeErrorOriginal; }, 300);
                    }, 2500);
                }
            } else {
           
                toggleInfoInitial.classList.remove("hide_avatar");
                toggleInfoInitial.classList.add("show_avatar");

                toggleInfoSelected.classList.add("hide_avatar");
                toggleInfoSelected.classList.remove("show_avatar");
            }
        });
    }

 
    document.getElementById("form-perfil").addEventListener("submit", function(e) {
        e.preventDefault();
        datosFormulario = new FormData(this);
        
     
        loading.classList.remove("Confirm-box-loading_on");
        loading.classList.add("Confirm-box-loading_off");
        
        btnSi.classList.remove("hide_buttons");
        btnSi.classList.add("show_buttons");
        
        btnNo.classList.remove("hide_buttons");
        btnNo.classList.add("show_buttons");

      
        Confirm_box.classList.remove("hide-confirm-box");
        Confirm_box.classList.add("show-confirm-box");
    });

  
    btnSi.addEventListener("click", async function() { 
        if (!datosFormulario) return;

 
        loading.classList.remove("Confirm-box-loading_off");
        loading.classList.add("Confirm-box-loading_on");
        btnSi.classList.add("hide_buttons");
        btnSi.classList.remove("show_buttons");
        btnNo.classList.add("hide_buttons");
        btnNo.classList.remove("show_buttons");

        try {
            const peticion = await fetch("../configuracion/api_perfil/profile_update.php", {
                method: "POST",
                body: datosFormulario
            });
            const response = await peticion.json();

       
            Confirm_box.classList.remove("show-confirm-box");
            Confirm_box.classList.add("hide-confirm-box");
            
            if (peticion.ok && response.success) {
          
                Check_in_box.classList.remove("hide-check-in-box");
                Check_in_box.classList.add("show-check-in-box");

                setTimeout(() => {
                    Check_in_box.classList.remove("show-check-in-box");
                    Check_in_box.classList.add("hide-check-in-box");
                
                }, 3000);
                
            } else {
              
                if (response.filas_afectadas === 'sin_cambios') {
                    errorText.textContent = "No has realizado cambios.";
                } else {
                    errorText.textContent = response.error || mensajeErrorOriginal;
                }

                errorSection.classList.remove("hide-error-box");
                errorSection.classList.add("show-error-box");

                setTimeout(() => {
                    errorSection.classList.remove("show-error-box");
                    errorSection.classList.add("hide-error-box");
                
                    setTimeout(() => { errorText.textContent = mensajeErrorOriginal; }, 300);
                }, 2500);
            }

        } catch (error) {
            console.error("Error de conexión:", error);
            Confirm_box.classList.remove("show-confirm-box");
            Confirm_box.classList.add("hide-confirm-box");

            errorText.textContent = "Hubo un error de conexión.";
            errorSection.classList.remove("hide-error-box");
            errorSection.classList.add("show-error-box");

            setTimeout(() => {
                errorSection.classList.remove("show-error-box");
                errorSection.classList.add("hide-error-box");
                setTimeout(() => { errorText.textContent = mensajeErrorOriginal; }, 300);
            }, 2500);
        }
    });

  
    btnNo.addEventListener("click", function() {
        Confirm_box.classList.add("hide-confirm-box");
        Confirm_box.classList.remove("show-confirm-box");
    });
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
    } catch(error){
        console.log(error);
    }
}