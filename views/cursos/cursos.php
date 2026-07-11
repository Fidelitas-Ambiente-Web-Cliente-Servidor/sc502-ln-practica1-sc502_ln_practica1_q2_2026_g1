<?php

$pageTitle = 'Cursos';
$extraCSS = 'cursos.css';
$activePage = 'cursos';
$depth = 0;

require __DIR__ . '/../layout/header.php';

?>

<header class="page-header">
    <h1>Catálogo de Cursos</h1>
    <p>
        Descubrí nuestros programas de formación diseñados para ayudarte
        a desarrollar habilidades profesionales y tecnológicas.
    </p>
</header>

<section class="search-section">
    <form method="GET" action="index.php">
        <input type="hidden" name="controller" value="cursos">
        <input type="hidden" name="action" value="index">
        <select name="categoria" onchange="this.form.submit()">
            <option value="">Todas las categorías</option>
            <option value="Tecnología"
                <?= ($categoria ?? '') == 'Tecnología' ? 'selected' : '' ?>>
                Tecnología
            </option>
            <option value="Negocios y Marketing"
                <?= ($categoria ?? '') == 'Negocios y Marketing' ? 'selected' : '' ?>>
                Negocios y Marketing
            </option>
        </select>
    </form>
</section>

<?php if (empty($cursos)): ?>
    <p class="text-center">
        No hay cursos disponibles.
    </p>
<?php else: ?>

<section class="categoria">
    <div class="cursos-grid">
        <?php foreach ($cursos as $curso): ?>
            <article class="curso-card">
                <img src="img/<?= htmlspecialchars($curso['imagen']) ?>"
                     alt="<?= htmlspecialchars($curso['nombre']) ?>">
                <div class="curso-info">
                    <span class="categoria-tag">
                        <?= htmlspecialchars($curso['categoria']) ?>
                    </span>
                    <h3>
                        <?= htmlspecialchars($curso['nombre']) ?>
                    </h3>
                    <p>
                        <?= htmlspecialchars($curso['descripcion']) ?>
                    </p>
                    <p>
                        <strong>Duración:</strong>
                        <?= htmlspecialchars($curso['duracion']) ?>
                    </p>
                    <p>
                        <strong>Precio:</strong>
                        $<?= htmlspecialchars($curso['precio']) ?>
                    </p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php endif; ?>
<?php require __DIR__ . '/../layout/footer.php'; ?>