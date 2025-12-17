export const listaCursos = [
    {
        id: 1,
        Titulo: "I HAD SEX",
        Imagen: "https://i.redd.it/origin-of-the-dawko-i-had-sex-video-v0-53jt18zhi4we1.jpg?width=640&format=pjpg&auto=webp&s=601f03377f42f4e2014fa045bcc9ec602b517c28", 
        Completacion: 45,
        Estado: "En progreso"
    },
    {
        id: 2,
        Titulo: "Minecraft hardcore but I have carbon monoxide poisoning",
        Imagen: "https://i.ytimg.com/vi/8Wow0tjOvxg/maxresdefault.jpg",
        Completacion: 80,
        Estado: "En progreso"
    },
    {
        id: 3,
        Titulo: "Porque dice la verdad?",
        Imagen: "https://media.tenor.com/MkI7jDQ5yboAAAAe/youtube-thumbnail.png",
        Completacion: 100,
        Estado: "Finalizado"
    }
];

export const listaNotificaciones = [
    {
        id: 1, 
        Titulo: "Pago realizado con éxito",
        Tiempo: 5,
        Tipo: "check",
        Tiempo_medida: "minutos",
        prefijo: "hace"
    },
    {
        id: 2,
        Titulo: "Servidor en mantenimiento",
        Tiempo: 2,
        Tipo: "esfera",
        Tiempo_medida: "horas",
        prefijo: "en"
    },
    {
        id: 3,
        Titulo: "Nuevo comentario en tu post",
        Tiempo: 30,
        Tipo: "esfera",
        Tiempo_medida: "segundos",
        prefijo: "hace"
    },
    {
        id: 4,
        Titulo: "Perfil actualizado correctamente",
        Tiempo: 1,
        Tipo: "check",
        Tiempo_medida: "día",
        prefijo: "hace"
    },
    {
        id: 5,
        Titulo: "Intento de inicio de sesión",
        Tiempo: 10,
        Tipo: "esfera",
        Tiempo_medida: "minutos",
        prefijo: "hace"
    },
    {
        id: 6,
        Titulo: "Descarga completada",
        Tiempo: 15,
        Tipo: "check",
        Tiempo_medida: "minutos",
        prefijo: "hace"
    }
];

export const listaRecomendados = [
    {
       id: 1, Titulo: "React desde cero", Autor: "Facebook", Reseña: "120", Imagen: "https://media.tenor.com/MkI7jDQ5yboAAAAe/youtube-thumbnail.png", Precio: "20$", Rating: "4.9"
    },
    {
       id: 2, Titulo: "Python para Data Science", Autor: "Guido", Reseña: "500", Imagen: "https://i.ytimg.com/vi/8Wow0tjOvxg/maxresdefault.jpg", Precio: "Free", Rating: "5.0"
    },
    {
       id: 3, Titulo: "Diseño Gráfico", Autor: "Adobe", Reseña: "80", Imagen: "https://i.redd.it/origin-of-the-dawko-i-had-sex-video-v0-53jt18zhi4we1.jpg?width=640&format=pjpg&auto=webp&s=601f03377f42f4e2014fa045bcc9ec602b517c28", Precio: "15$", Rating: "4.5"
    },
    {
       id: 4, Titulo: "Marketing Digital", Autor: "Google", Reseña: "200", Imagen: "../imagenes/placeholder2.jpg", Precio: "10$", Rating: "4.7"
    },
    {
       id: 5, Titulo: "Marketing Digital", Autor: "Google", Reseña: "200", Imagen: "../imagenes/placeholder2.jpg", Precio: "10$", Rating: "4.7"
    }
    
];

export const actividadData = {
    horas: "4h",
    racha: 9,
    dias: [
        { dia: "L", altura: 40, active: true },
        { dia: "M", altura: 70, active: false },
        { dia: "X", altura: 30, active: false },
        { dia: "J", altura: 85, active: true },
        { dia: "V", altura: 50, active: false },
        { dia: "S", altura: 20, active: false },
        { dia: "D", altura: 10, active: false }
    ]
};

export const cursosData = [
    {
        id: 1,
        titulo: "Curso de Python desde Cero",
        precio: "$19.99",
        descripcion: "Aprende Python con este curso completo para principiantes...",
        imagen: "python.jpg"
    },
    {
        id: 2,
        titulo: "Diseño UX/UI Avanzado",
        precio: "$29.99",
        descripcion: "Domina las interfaces de usuario con Figma...",
        imagen: "uiux.jpg"
    },
    {
        id: 3,
        titulo: "Master en Marketing Digital",
        precio: "$15.00",
        descripcion: "Estrategias de SEO y SEM para 2024...",
        imagen: "marketing.jpg"
    }
];