//Tarea 2 - Profesores
document.addEventListener("DOMContentLoaded", function () {
    const profesores = [
        {
            nombre: "Carlos Méndez",
            especialidad: "Desarrollo Web",
            descripcion:
                "Más de 8 años creando aplicaciones modernas con HTML, CSS y JavaScript. " +
                "Le apasiona enseñar buenas prácticas y código limpio desde el primer día.",
            foto: "../img/carlos.png",
            correo: "carlos.mendez@learnify.com",
            cursosQueImparte: ["Desarrollo Web", "JavaScript desde Cero", "HTML y CSS Avanzado"],
        },
        {
            nombre: "Ana Solís",
            especialidad: "Diseño UX/UI",
            descripcion:
                "Apasionada por crear experiencias digitales claras, bonitas y fáciles de usar. " +
                "Ha trabajado con startups y empresas de la región diseñando productos centrados en el usuario.",
            foto: "../img/ana.jpg",
            correo: "ana.solis@learnify.com",
            cursosQueImparte: ["Diseño UI/UX", "Prototipado con Figma"],
        },
        {
            nombre: "Luis Vargas",
            especialidad: "Marketing Digital",
            descripcion:
                "Experto en estrategias de contenido y crecimiento de marcas en línea. " +
                "Combina datos y creatividad para que sus estudiantes lancen campañas reales.",
            foto: "../img/luis.jpg",
            correo: "luis.vargas@learnify.com",
            cursosQueImparte: ["Marketing Digital", "Redes Sociales para Negocios"],
        },
        {
            nombre: "María Rojas",
            especialidad: "Ciencia de Datos",
            descripcion:
                "Enseña a convertir datos en decisiones usando Python y visualización. " +
                "Cree que cualquier persona puede aprender a analizar datos con la guía correcta.",
            foto: "../img/maria.jpg",
            correo: "maria.rojas@learnify.com",
            cursosQueImparte: ["Ciencia de Datos con Python", "Visualización de Datos", "Excel Analítico"],
        },
    ];

    const grid = document.getElementById("profesoresGrid");

    const modal = document.getElementById("profesorModal");
    const modalFoto = document.getElementById("modalFoto");
    const modalNombre = document.getElementById("modalNombre");
    const modalEspecialidad = document.getElementById("modalEspecialidad");
    const modalDescripcion = document.getElementById("modalDescripcion");
    const modalCorreo = document.getElementById("modalCorreo");
    const modalCursos = document.getElementById("modalCursos");
    const btnCerrar = document.getElementById("modalCerrar");

    function renderizarProfesores() {
        profesores.forEach(function (profesor, indice) {

            const tarjeta = document.createElement("article");
            tarjeta.classList.add("profesor-card");
            tarjeta.dataset.indice = indice;


            const foto = document.createElement("img");
            foto.src = profesor.foto;
            foto.alt = "Foto de " + profesor.nombre;

            const nombre = document.createElement("h3");
            nombre.textContent = profesor.nombre;

            const especialidad = document.createElement("span");
            especialidad.classList.add("especialidad");
            especialidad.textContent = profesor.especialidad;


            const descripcion = document.createElement("p");
            descripcion.textContent = profesor.descripcion;


            tarjeta.appendChild(foto);
            tarjeta.appendChild(nombre);
            tarjeta.appendChild(especialidad);
            tarjeta.appendChild(descripcion);


            tarjeta.addEventListener("click", abrirModal);


            grid.appendChild(tarjeta);
        });
    }
    function abrirModal(evento) {

        const indice = evento.currentTarget.dataset.indice;

        
        const profesor = profesores[indice];

        modalFoto.src = profesor.foto;
        modalFoto.alt = "Foto de " + profesor.nombre;
        modalNombre.textContent = profesor.nombre;
        modalEspecialidad.textContent = profesor.especialidad;
        modalDescripcion.textContent = profesor.descripcion;

        modalCorreo.textContent = profesor.correo;
        modalCorreo.href = "mailto:" + profesor.correo;


        modalCursos.innerHTML = "";
        profesor.cursosQueImparte.forEach(function (curso) {
            const item = document.createElement("li");
            item.textContent = curso;
            modalCursos.appendChild(item);
        });

        modal.classList.add("activo");
    }

    function cerrarModal() {
        modal.classList.remove("activo");
    }

    btnCerrar.addEventListener("click", cerrarModal);

    modal.addEventListener("click", function (evento) {
        if (evento.target === modal) {
            cerrarModal();
        }
    });

    document.addEventListener("keydown", function (evento) {
        if (evento.key === "Escape") {
            cerrarModal();
        }
    });

    renderizarProfesores();
});