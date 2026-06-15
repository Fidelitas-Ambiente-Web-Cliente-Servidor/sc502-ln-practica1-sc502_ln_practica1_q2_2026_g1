//Tarea 2 - Profesores
//  - Array de mínimo 4 objetos con: nombre, especialidad, descripcion,
//    foto, correo, cursosQueImparte
//  - Renderizar las tarjetas dinámicamente al cargar la página
//  - Al hacer clic en una tarjeta, abrir un modal personalizado con la
//    información completa del profesor
//  - El modal se cierra con el botón de cierre o haciendo clic fuera
//  - Usar atributos data-* para identificar qué profesor se seleccionó


//Esperamos a que el HTML esté completamente cargado antes de ejecutar
document.addEventListener("DOMContentLoaded", function () {
    //array de objetos con la información de cada profesor.
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
    //guardamos en constantes los elementos del HTML que vamos a manipular  
    const grid = document.getElementById("profesoresGrid");

    const modal = document.getElementById("profesorModal");
    const modalFoto = document.getElementById("modalFoto");
    const modalNombre = document.getElementById("modalNombre");
    const modalEspecialidad = document.getElementById("modalEspecialidad");
    const modalDescripcion = document.getElementById("modalDescripcion");
    const modalCorreo = document.getElementById("modalCorreo");
    const modalCursos = document.getElementById("modalCursos");
    const btnCerrar = document.getElementById("modalCerrar");

    //recorremos el array y por cada profesor
    //    construimos su tarjeta con createElement y la agregamos al DOM
    //    con appendChild xq el HTML no tiene las tarjetas a mano
    function renderizarProfesores() {
        profesores.forEach(function (profesor, indice) {

            const tarjeta = document.createElement("article");
            tarjeta.classList.add("profesor-card");
            //guardamos laposición del profesor dentro del array
            tarjeta.dataset.indice = indice;

            // Foto del profesor
            const foto = document.createElement("img");
            foto.src = profesor.foto;
            foto.alt = "Foto de " + profesor.nombre;
            // Nombre
            const nombre = document.createElement("h3");
            nombre.textContent = profesor.nombre;
            // Especialidad
            const especialidad = document.createElement("span");
            especialidad.classList.add("especialidad");
            especialidad.textContent = profesor.especialidad;

            // Descripción corta
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

    //modal: se ejecuta al hacer clic en una tarjeta. Usa el índice guardado en data-indice para obtener la información del profesor correspondiente y mostrarla en el modal. Luego, muestra el modal agregando la clase "activo".
    function abrirModal(evento) {
        // currentTarget es la tarjeta que tiene el listener (aunque el
        // clic haya caído sobre la foto o el texto interno)
        const indice = evento.currentTarget.dataset.indice;
        // dataset siempre devuelve texto, pero como índice de array
        // JavaScript lo convierte automáticamente al acceder

        const profesor = profesores[indice];
        // Rellenamos cada parte del modal con los datos del profesor

        modalFoto.src = profesor.foto;
        modalFoto.alt = "Foto de " + profesor.nombre;
        modalNombre.textContent = profesor.nombre;
        modalEspecialidad.textContent = profesor.especialidad;
        modalDescripcion.textContent = profesor.descripcion;
        // El correo es un enlace mailto: para poder escribirle directo

        modalCorreo.textContent = profesor.correo;
        modalCorreo.href = "mailto:" + profesor.correo;


        // La lista de cursos se limpia y se vuelve a construir cada vez,
        // para que no queden cursos del profesor anterior
        modalCursos.innerHTML = "";
        profesor.cursosQueImparte.forEach(function (curso) {
            const item = document.createElement("li");
            item.textContent = curso;
            modalCursos.appendChild(item);
        });

        modal.classList.add("activo");
    }
    //quitamos la clase "activo" y el CSS lo oculta.
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