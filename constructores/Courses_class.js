export class MyCourses {
    constructor(Titulo, Imagen, id, id_leccion) {
        this.Titulo = Titulo;
        this.Imagen = Imagen;
        this.id = id;
        this.id_leccion = id_leccion;
    }

    add_courses(){
        let container = document.querySelector(".cursos_actuales");
        
        const card = document.createElement("div");
        card.classList.add("curso_actual");
        
 
        card.innerHTML = `
            <a href="/modulos/barra_lateral/mis-cursos/mis-cursos.php?id=${this.id}&lesson=${this.id_leccion}" style="text-decoration: none;"><img src="${this.Imagen}" alt="${this.Titulo}" class="curso_img_bg"></a>
            
            <div class="curso_overlay"></div>

            <div class="curso_info_overlay">
                <a href="/modulos/barra_lateral/mis-cursos/mis-cursos.php?id=${this.id}&lesson=${this.id_leccion}" style="text-decoration: none;"><h3>${this.Titulo}</h3></a>
            </div>
        `;

        container.appendChild(card);
    }

    remove_all_courses(){
        let div = document.querySelector(".cursos_actuales");
        div.innerHTML = ''; 
    }

    remove_courses(){
        let div = document.querySelector(".cursos_actuales");
        if(div.children.length > 0) {
            div.removeChild(div.lastElementChild);
        }
    }
}