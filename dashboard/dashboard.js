let profile_canvas = document.getElementById("profile_status");
let profile_picture_container = document.getElementById("profile_picture_container");

profile_picture_container.addEventListener("click", function(){
    if(profile_canvas.classList.contains("show")){
        profile_canvas.classList.remove("show");
        profile_canvas.classList.add("hide");
        
    }else{
        profile_canvas.classList.remove("hide");
        profile_canvas.classList.add("show");
    }

});

profile_canvas.addEventListener("click", function(event){
    event.stopPropagation();
});

document.addEventListener('click', function(event) {
        iniciado = profile_canvas.classList.contains("show");
        clickeado = !profile_canvas.contains(event.target) && !profile_picture_container.contains(event.target)
        if (iniciado && clickeado) {
            profile_canvas.classList.remove("show");
            profile_canvas.classList.add("hide");
        }

    });
