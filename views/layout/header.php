<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Learnify' ?></title>
    <link rel="stylesheet" href="<?= str_repeat('../', $depth ?? 0) ?>css/style.css">

    <?php if (!empty($extraCSS)): ?>
        <link rel="stylesheet" href="<?= str_repeat('../', $depth ?? 0) ?>css/<?= $extraCSS ?>">
    <?php endif; ?>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="<?= str_repeat('../', $depth ?? 0) ?>img/learnify_logo_horizontal.png" alt="Learnify Logo"
                    class="logo-img">
            </div>
            <ul class="nav-links">
                <li>
                    <a href="index.php?controller=index&action=index"
                        class="<?= ($activePage ?? '') === 'inicio' ? 'active' : '' ?>">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=cursos&action=index"
                        class="<?= ($activePage ?? '') === 'cursos' ? 'active' : '' ?>">
                        Cursos
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=profesores&action=index"
                        class="<?= ($activePage ?? '') === 'profesores' ? 'active' : '' ?>">
                        Profesores
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=contacto&action=index"
                        class="<?= ($activePage ?? '') === 'contacto' ? 'active' : '' ?>">
                        Contacto
                    </a>
                </li>
            </ul>
        </nav>
    </header>