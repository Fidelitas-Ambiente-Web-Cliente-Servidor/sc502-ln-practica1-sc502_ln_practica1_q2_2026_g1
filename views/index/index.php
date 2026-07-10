<?php

$pageTitle = 'Inicio';
$extraCSS = 'index.css';
$activePage = 'inicio';
$depth = 0;

require __DIR__ . '/../layout/header.php';

?>

<section class="hero">
    <div class="hero-text">
        <h1>Aprende sin límites con Learnify</h1>
        <p>
            Learnify es donde aprendes una habilidad real viendo a alguien construir algo en directo,
            y luego lo construyes junto a esa persona. Grupos de trabajo gratuitos basados en proyectos,
            una comunidad sólida y creadores que te apoyan en el lanzamiento.
        </p>
        <p>Conecta. Aprende. Crece.</p>
        <a href="index.php?controller=cursos&action=index" class="btn-hero">
            Explorar Cursos
        </a>
    </div>
    <div class="hero-image">
        <img src="img/learnify_computer_mockup_small_logo.png" alt="Estudiante aprendiendo">
    </div>
</section>

<section class="featured-courses">
    <div class="section-title">
        <h2>Cursos Destacados</h2>
        <p>Explora algunos de nuestros cursos más populares</p>
    </div>
    <?php if (empty($cursos)): ?>
        <p class="text-center">
            No hay cursos destacados disponibles en este momento.
        </p>
    <?php else: ?>
        <div class="courses-container">
            <?php foreach ($cursos as $curso): ?>
                <div class="course-card">
                    <img src="img/<?= htmlspecialchars($curso['imagen']) ?>" alt="<?= htmlspecialchars($curso['nombre']) ?>">
                    <h3>
                        <?= htmlspecialchars($curso['nombre']) ?>
                    </h3>
                    <p>
                        <?= htmlspecialchars($curso['descripcion']) ?>
                    </p>
                    <a href="index.php?controller=cursos&action=index" class="card-btn">
                        Ver más
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>
<section class="statistics">
    <div class="statistics-box">
        <img src="img/cuenta.png" alt="Icono Estudiantes" class="estadisticas-icon">
        <h3>500+</h3>
        <p>Estudiantes</p>
    </div>
    <div class="statistics-box">
        <img src="img/maestro.png" alt="Icono Profesores" class="estadisticas-icon">
        <h3>40+</h3>
        <p>Profesores</p>
    </div>
    <div class="statistics-box">
        <img src="img/curso-por-internet.png" alt="Icono Cursos" class="estadisticas-icon">
        <h3>30+</h3>
        <p>Cursos</p>
    </div>
</section>

<section class="testimonial">
    <div class="section-title">
        <h2>Lo que dicen nuestros estudiantes</h2>
    </div>
    <div class="testimonial-container">
        <div class="testimonial-card">
            <p>
                "Gracias a Learnify logré mejorar mis habilidades en programación
                y conseguir nuevas oportunidades."
            </p>
            <h4>— Abby Chavarría</h4>

        </div>
        <div class="testimonial-card">
            <p>
                "Los cursos son dinámicos, modernos y fáciles de seguir.
                Recomiendo totalmente esta academia."
            </p>
            <h4>— Derek Jensen</h4>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>