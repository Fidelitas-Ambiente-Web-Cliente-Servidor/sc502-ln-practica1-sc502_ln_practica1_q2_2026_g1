//El estudiante debe renderizar los cursos destacados de forma dinámica usando JavaScript, eliminando las tarjetas estáticas del HTML.
//	Crear un array de mínimo 3 objetos JavaScript, donde cada objeto represente un curso con las propiedades: nombre, descripcion, imagen y categoria
//	Usar createElement y appendChild para construir cada tarjeta del curso y agregarla al DOM
//	El HTML de index.html no debe contener las tarjetas hardcodeadas; deben generarse completamente desde index.js
//	El resultado visual debe ser idéntico o superior al de la Tarea #1

document.addEventListener("DOMContentLoaded", function () {

    //Array para almacenar los cursos de Lernify, cada uno con sus propiedades: nombre, descripción, imagen y categoría
    const courses = [
        {
            name: "Desarrollo Web",
            description:
                "Aprende HTML, CSS y JavaScript para crear sitios web modernos y responsivos.",
            image: "../img/ferenc-almasi-fhAfLtHToCs-unsplash.jpg",
            category: "Programación",
        },

        {
            name: "Diseño UI/UX",
            description:
                "Diseña experiencias digitales intuitivas y atractivas para los usuarios.",
            image: "../img/ux-indonesia-pqzRfBhd9r0-unsplash.jpg",
            category: "Diseño",
        },

        {
            name: "Marketing Digital",
            description:
                "Aprende estrategias digitales para potenciar marcas y negocios en línea.",
            image: "../img/istockphoto-2098359215-612x612.jpg",
            category: "Marketing",
        },
    ];

    //Con esto se obtiene el contenedor en el html donde se van a mostrar las tarjetas de los cursos
    const coursesContainer = document.getElementById("coursesContainer");

    //Esto recorre el array de cursos y crea dinámicamente una tarjeta para cada curso, agregándola al contenedor en el DOM
    courses.forEach((course) => {
        const card = document.createElement("div");
        card.classList.add("course-card");

        const image = document.createElement("img");
        image.src = course.image;
        image.alt = course.name;

        const title = document.createElement("h3");
        title.textContent = course.name;

        const description = document.createElement("p");
        description.textContent = course.description;

        const button = document.createElement("a");
        button.href = "cursos.html";
        button.textContent = "Ver más";
        button.classList.add("card-btn");

        //Aquí se agregan todos los elementos a la tarjeta
        card.appendChild(image);
        card.appendChild(title);
        card.appendChild(description);
        card.appendChild(button);

        //Esto agrega la tarjeta al contenedor
        coursesContainer.appendChild(card);
    });
});  
