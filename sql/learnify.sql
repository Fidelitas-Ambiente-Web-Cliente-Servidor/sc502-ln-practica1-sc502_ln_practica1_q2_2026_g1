DROP DATABASE IF EXISTS learnify;

CREATE DATABASE learnify
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE learnify;

-- Creación de las tablas con sus respectivos cinco inserts solicitados 

-- TABLA: CONTACTO

CREATE TABLE contacto (
    id INT NOT NULL AUTO_INCREMENT,
    nombre_completo VARCHAR(120) NOT NULL,
    correo VARCHAR(120) NOT NULL,
    telefono VARCHAR(20) DEFAULT NULL,
    asunto VARCHAR(150) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO contacto (id, nombre_completo, correo, telefono, asunto, mensaje, fecha_registro) VALUES
(1, 'María González', 'maria@gmail.com', '8868-5021', 'Información', 'Deseo conocer más sobre los cursos.', '2026-07-09 22:25:34'),
(2, 'Luis Fernández', 'luis@gmail.com', '8478-4057', 'Matrícula', 'Quiero matricular un curso.', '2026-07-09 22:25:34'),
(3, 'Andrea Rojas', 'andrea@gmail.com', '6423-5427', 'Horarios', '¿Cuáles son los horarios disponibles?', '2026-07-09 22:25:34'),
(4, 'David Mora', 'david@gmail.com', '7865-4990', 'Certificados', '¿Entregan certificado al finalizar?', '2026-07-09 22:25:34'),
(5, 'Gabriela Castro', 'gabriela@gmail.com', '8988-2546', 'Consulta', 'Necesito asesoría para elegir un curso.', '2026-07-09 22:25:34');

-- TABLA: CURSOS

CREATE TABLE cursos (
    id INT NOT NULL AUTO_INCREMENT,
    imagen VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    categoria VARCHAR(60) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    duracion VARCHAR(50) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO cursos (id, imagen, nombre, categoria, descripcion, duracion, precio) VALUES
(1, 'hq720.jpg', 'Desarrollo Web con HTML y CSS', 'Tecnología', 'Aprendé a crear sitios web modernos y responsivos desde cero.', '8 semanas', 120.00),
(2, 'cursoJS_conFondo.png', 'JavaScript Intermedio', 'Tecnología', 'Domina la programación web dinámica con JavaScript moderno.', '10 semanas', 150.00),
(3, 'curso-python-300x169.gif', 'Python para Principiantes', 'Tecnología', 'Introducción a la programación utilizando Python.', '12 semanas', 180.00),
(4, 'istockphoto-2098359215-612x612.jpg', 'Marketing Digital', 'Negocios y Marketing', 'Creá estrategias efectivas para redes sociales y publicidad online.', '6 semanas', 110.00),
(5, 'cursos-gratis-para-emprendedores.jpg', 'Emprendimiento e Innovación', 'Negocios y Marketing', 'Convertí tus ideas en proyectos sostenibles y exitosos.', '8 semanas', 140.00),
(6, 'iStock-844535646-600x425.jpg', 'Gestión de Proyectos', 'Negocios y Marketing', 'Aprendé metodologías ágiles para liderar equipos y proyectos.', '10 semanas', 160.00);

-- TABLA: CURSOS DESTACADOS

CREATE TABLE cursos_destacados (
    id INT NOT NULL AUTO_INCREMENT,
    imagen VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    disponible TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO cursos_destacados (id, imagen, nombre, descripcion, disponible) VALUES
(1, 'ferenc-almasi-fhAfLtHToCs-unsplash.jpg', 'Desarrollo Web', 'Aprende HTML, CSS y JavaScript para crear sitios web modernos y responsivos.', 1),
(2, 'ux-indonesia-pqzRfBhd9r0-unsplash.jpg', 'Diseño UX/UI', 'Diseña experiencias digitales intuitivas y atractivas para los usuarios.', 1),
(3, 'istockphoto-2098359215-612x612.jpg', 'Marketing Digital', 'Aprende estrategias digitales para potenciar marcas y negocios en línea.', 1),
(4, 'python.jpg', 'Python para Principiantes', 'Domina la programación con Python de manera práctica.', 1),
(5, 'logo-microsoft-excel.jpg', 'Excel Avanzado', 'Analiza datos y automatiza procesos con Excel.', 1);

-- TABLA: PROFESORES

CREATE TABLE profesores (
    id INT NOT NULL AUTO_INCREMENT,
    foto VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    especialidad VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    activo TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO profesores (id, foto, nombre, especialidad, descripcion, activo) VALUES
(1, 'carlos.png', 'Carlos Méndez', 'Desarrollo Web', 'Más de 8 años creando aplicaciones modernas con HTML, CSS y JavaScript. Le apasiona enseñar buenas prácticas y código limpio desde el primer día.', 1),
(2, 'ana.jpg', 'Ana Solís', 'Diseño UX/UI', 'Apasionada por crear experiencias digitales claras, bonitas y fáciles de usar. Ha trabajado con startups y empresas de la región diseñando productos centrados en el usuario.', 1),
(3, 'luis.jpg', 'Luis Vargas', 'Marketing Digital', 'Experto en estrategias de contenido y crecimiento de marcas en línea. Combina datos y creatividad para que sus estudiantes lancen campañas reales.', 1),
(4, 'david.webp', 'David Torres', 'Análisis de Datos', 'Especialista en Excel y Business Intelligence. Cree que con buenas bases se puede llegar a grandes lugares.', 1),
(5, 'maria.jpg', 'María Rojas', 'Ciencia de Datos', 'Enseña a convertir datos en decisiones usando Python y visualización. Cree que cualquier persona puede aprender a analizar datos con la guía correcta.', 1);