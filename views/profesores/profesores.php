<?php

$esDetalle = isset($profesor);

$pageTitle = $esDetalle
    ? htmlspecialchars($profesor['nombre']) . ' - Learnify'
    : 'Profesores - Learnify';

$extraCSS = 'profesores.css';
$activePage = 'profesores';
$depth = 0;

require __DIR__ . '/../layout/header.php';

?>

<?php if ($esDetalle): ?>


    <header class="page-header">
        <h1><?= htmlspecialchars($profesor['nombre']) ?></h1>
        <p><?= htmlspecialchars($profesor['especialidad']) ?></p>
    </header>

    <section class="profesor-detalle">
        <article class="profesor-detalle-card">

            <img src="img/<?= htmlspecialchars($profesor['foto']) ?>"
                 alt="Foto de <?= htmlspecialchars($profesor['nombre']) ?>"
                 class="profesor-detalle-foto">

            <h2><?= htmlspecialchars($profesor['nombre']) ?></h2>

            <span class="especialidad">
                <?= htmlspecialchars($profesor['especialidad']) ?>
            </span>

            <p class="profesor-detalle-bio">
                <?= htmlspecialchars($profesor['descripcion']) ?>
            </p>

            <p>
                <strong>Estado:</strong>
                <?= $profesor['activo'] ? 'Activo' : 'Inactivo' ?>
            </p>

            <a href="index.php?controller=profesores&action=index"
               class="btn-volver">
                &larr; Volver a profesores
            </a>

        </article>
    </section>

<?php else: ?>


    <header class="page-header">
        <h1>Nuestro Equipo de Profesores</h1>
        <p>
            Conocé a las personas expertas que te van a acompañar
            en cada paso de tu aprendizaje.
        </p>
    </header>

    <?php if (empty($profesores)): ?>
        <p class="text-center">
            No hay profesores disponibles.
        </p>
    <?php else: ?>

        <section class="profesores-grid">
            <?php foreach ($profesores as $prof): ?>
                <a class="profesor-link"
                   href="index.php?controller=profesores&action=show&id=<?= (int) $prof['id'] ?>">
                    <article class="profesor-card">
                        <img src="img/<?= htmlspecialchars($prof['foto']) ?>"
                             alt="Foto de <?= htmlspecialchars($prof['nombre']) ?>">
                        <h3>
                            <?= htmlspecialchars($prof['nombre']) ?>
                        </h3>
                        <span class="especialidad">
                            <?= htmlspecialchars($prof['especialidad']) ?>
                        </span>
                        <p>
                            <?= htmlspecialchars($prof['descripcion']) ?>
                        </p>
                    </article>
                </a>
            <?php endforeach; ?>
        </section>

    <?php endif; ?>

    <section class="mision-vision">
        <div class="mv-card">
            <h2>Misión</h2>
            <p>
                Brindar educación accesible y de calidad que conecte a las personas con
                habilidades reales, impulsando su crecimiento personal y profesional.
            </p>
        </div>
        <div class="mv-card">
            <h2>Visión</h2>
            <p>
                Ser la comunidad de aprendizaje en línea líder de la región, donde cada
                estudiante aprende, crea y crece junto a los mejores profesores.
            </p>
        </div>
    </section>

<?php endif; ?>

<?php require __DIR__ . '/../layout/footer.php'; ?>