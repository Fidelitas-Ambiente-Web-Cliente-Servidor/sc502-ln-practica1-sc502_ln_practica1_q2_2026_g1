document.addEventListener("DOMContentLoaded", function () {
 
    //Array de cursos
    const courses = [
 
        {
            name: "Desarrollo Web con HTML y CSS",
            description: "Aprendé a crear sitios web modernos y responsivos desde cero.",
            category: "Tecnología",
            duration: "8 semanas",
            price: "$120",
            image: "../img/hq720.jpg"
        },
 
        {
            name: "JavaScript Intermedio",
            description: "Domina la programación web dinámica con JavaScript moderno.",
            category: "Tecnología",
            duration: "10 semanas",
            price: "$150",
            image: "../img/cursoJS_conFondo.png"
        },
 
        {
            name: "Python para Principiantes",
            description: "Introducción a la programación utilizando Python.",
            category: "Tecnología",
            duration: "12 semanas",
            price: "$180",
            image: "../img/curso-python-300x169.gif"
        },
 
        {
            name: "Marketing Digital",
            description: "Creá estrategias efectivas para redes sociales y publicidad online.",
            category: "Negocios y Marketing",
            duration: "6 semanas",
            price: "$110",
            image: "../img/istockphoto-2098359215-612x612.jpg"
        },
 
        {
            name: "Emprendimiento e Innovación",
            description: "Convertí tus ideas en proyectos sostenibles y exitosos.",
            category: "Negocios y Marketing",
            duration: "8 semanas",
            price: "$140",
            image: "../img/cursos-gratis-para-emprendedores.jpg"
        },
 
        {
            name: "Gestión de Proyectos",
            description: "Aprendé metodologías ágiles para liderar equipos y proyectos.",
            category: "Negocios y Marketing",
            duration: "10 semanas",
            price: "$160",
            image: "../img/iStock-844535646-600x425.jpg"
        }
 
    ];
 
    //Elementos del DOM
    const searchInput = document.getElementById("buscarCurso");
    const categoryFilter = document.getElementById("filtroCategoria");
 
    const technologyCourses =document.getElementById("tecnologiaContainer");
 
    const businessCourses = document.getElementById("negociosContainer");
 
    const message = document.getElementById("message");
 
 
    //Función que renderiza los cursos en pantalla
    function renderCourses(coursesList) {
 
        //Limpiar contenedores antes de volver a dibujar
        technologyCourses.innerHTML = "";
        businessCourses.innerHTML = "";
 
        coursesList.forEach(course => {
 
            const card = document.createElement("article");
            card.classList.add("curso-card");
 
            card.innerHTML = `
                <img src="${course.image}" alt="${course.name}">
 
                <div class="curso-info">
 
                    <span class="categoria-tag">
                        ${course.category}
                    </span>
 
                    <h3>${course.name}</h3>
 
                    <p>${course.description}</p>
 
                    <p>
                        <strong>Duración:</strong>
                        ${course.duration}
                    </p>
 
                    <p>
                        <strong>Precio:</strong>
                        ${course.price}
                    </p>
 
                </div>
            `;
 
            //Separar los cursos por categoría
            if (course.category === "Tecnología") {
 
                technologyCourses.appendChild(card);
 
            } else {
 
                businessCourses.appendChild(card);
 
            }
 
        });
 
    }
 
    //Función que aplica búsqueda y filtro de categoría
    function applyFilters() {
 
        const searchText = searchInput.value.toLowerCase();
 
        const selectedCategory = categoryFilter.value;
 
        const filteredCourses = courses.filter(course => {
 
            const matchSearch =
                course.name.toLowerCase().includes(searchText)
                ||
                course.description.toLowerCase().includes(searchText);
 
            const matchCategory =
                selectedCategory === "Todos"
                ||
                course.category === selectedCategory;
 
            return matchSearch && matchCategory;
 
        });
 
        if (filteredCourses.length === 0) {
 
            message.textContent =
                "No se encontraron cursos.";
 
        } else {
 
            message.textContent = "";
 
        }
 
        renderCourses(filteredCourses);
 
    }
 
    //Evento para búsqueda en tiempo real
    searchInput.addEventListener(
        "input",
        applyFilters
    );
 
 
    //Evento para filtrar por categoría
    categoryFilter.addEventListener(
        "change",
        applyFilters
    );
 
    //Mostrar todos los cursos al cargar la página
    renderCourses(courses);
 
});
 