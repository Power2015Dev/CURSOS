// menus desplegables en navbar
let profile_canvas = document.getElementById("profile_status");//perfil
let profile_picture_container = document.getElementById("profile_picture_container");
let caja_notificacion = document.getElementById("bell_container"); // notifaciones
let notificaciones = document.getElementById("notifications");
let caja_mensajes = document.getElementById("message_container"); //mensajes
let mensajes = document.getElementById("message_box");

if(profile_picture_container != null && profile_canvas != null){
profile_picture_container.addEventListener("click", function(){  //si van a hacer algo similar como el menu desplegable copien este codigo 
    if(profile_canvas.classList.contains("show")){
        profile_canvas.classList.remove("show");
        profile_canvas.classList.add("hide");
        
    }else{
        profile_canvas.classList.remove("hide");
        profile_canvas.classList.add("show");
    }

});
}
/* todo este codigo lo que hace es revisar si no diste click en el perfil y no diste click en la notificacion 
ademas tambien verifica si tampoco hiciste click en la caja de la notificacion y en la foto de perfil pq 
tambien se condirea parte del menu desplegable*/
if(caja_notificacion != null && notificaciones != null && caja_mensajes != null && mensajes != null){
caja_notificacion.addEventListener("click", function(){
    if(notificaciones.classList.contains("show")){
        notificaciones.classList.remove("show");
        notificaciones.classList.add("hide");
        
    }else{
        notificaciones.classList.remove("hide");
        notificaciones.classList.add("show");
    }
});

caja_mensajes.addEventListener("click", function(){
    if(mensajes.classList.contains("show")){
        mensajes.classList.remove("show");
        mensajes.classList.add("hide");
        
    }else{
        mensajes.classList.remove("hide");
        mensajes.classList.add("show");
    }
});

}


if(profile_canvas != null && notificaciones != null && mensajes != null){
profile_canvas.addEventListener("click", function(event){
    event.stopPropagation();
});

notificaciones.addEventListener("click", function(event){
    event.stopPropagation();
});

mensajes.addEventListener("click", function(event){
    event.stopPropagation();
});
}


document.addEventListener('click', function(event) {
        if(profile_canvas == null || notificaciones == null || mensajes == null){
            return;
        }
        let iniciado_perfil = profile_canvas.classList.contains("show");
        let clickeado_perfil = !profile_canvas.contains(event.target) && !profile_picture_container.contains(event.target)
        let iniciado_notificaciones = notificaciones.classList.contains("show");
        let clickeado_notificaciones = !notificaciones.contains(event.target) && !caja_notificacion.contains(event.target)
        let iniciado_mensajes = mensajes.classList.contains("show");
        let clickeado_mensajes = !mensajes.contains(event.target) && !caja_mensajes.contains(event.target)
        //el evento target solo regresa donde el usuario hizo click
        if (iniciado_notificaciones && clickeado_notificaciones) {
            notificaciones.classList.remove("show");
            notificaciones.classList.add("hide");
        }
        if (iniciado_perfil && clickeado_perfil) {
            profile_canvas.classList.remove("show");
            profile_canvas.classList.add("hide");
        }

        if (iniciado_mensajes && clickeado_mensajes) {
            mensajes.classList.remove("show");
            mensajes.classList.add("hide");
        }
       
        

    });
