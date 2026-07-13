<?php

$pageTitle   = 'Contacto';
$extraCSS    = 'contacto.css';
$activePage  = 'contacto';
$depth       = 0;

require __DIR__ . '/../layout/header.php';

?>

<section class="page-header">
    <h1>Contáctanos</h1>
    <p>¿Tienes preguntas sobre nuestros cursos o programas? Estamos aquí para ayudarte. Escríbenos o visítanos.</p>
</section>

<section class="contact-section">

    <div class="form-card">
        <h2>Envíanos un mensaje</h2>

        <?php if (!empty($_GET['exito'])): ?>
            <div id="mensaje-exito" class="mensaje-exito">
                ¡Mensaje enviado con éxito! Nos pondremos en contacto pronto.
            </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="mensaje-error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form id="formulario-contacto" action="index.php?controller=contacto&action=store" method="post" novalidate>
            <div class="form-group">
                <label for="nombre">Nombre completo</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" />
                <span class="error-msg" id="error-nombre"></span>
            </div>
            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" placeholder="correo@ejemplo.com" />
                <span class="error-msg" id="error-correo"></span>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="+506 8000-0000" />
                <span class="error-msg" id="error-telefono"></span>
            </div>
            <div class="form-group">
                <label for="asunto">Asunto</label>
                <input type="text" id="asunto" name="asunto" placeholder="¿En qué podemos ayudarte?" />
                <span class="error-msg" id="error-asunto"></span>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..."></textarea>
                <span class="error-msg" id="error-mensaje"></span>
            </div>
            <button type="submit" class="btn-enviar" id="btn-enviar" disabled>Enviar mensaje</button>
        </form>
    </div>

    <div class="info-col">
        <div class="info-card">
            <h2>Información de contacto</h2>

            <div class="info-item">
                <div class="info-icon">
                    <img src="img/pin_icon.png" alt="Pin Icon" />
                </div>
                <div>
                    <strong>Dirección</strong>
                    <p>Universidad Fidélitas, Calle Siles 203, San José, Costa Rica</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <img src="img/phone_icon.png" alt="Phone Icon" />
                </div>
                <div>
                    <strong>Teléfono</strong>
                    <p>+506 2200-0000</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <img src="img/email_icon.png" alt="Email Icon" />
                </div>
                <div>
                    <strong>Correo electrónico</strong>
                    <p>info@learnify.com</p>
                </div>
            </div>
        </div>

        <div class="map-card">
            <h2>¿Cómo llegar?</h2>
            <div class="map-wrapper">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.001017666609!2d-84.0375995247344!3d9.933872390168204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0e3f47ea4ff37%3A0x7a7818a6a9e5c90c!2sFidelitas%20University%20Campus%20San%20Pedro!5e0!3m2!1sen!2scr!4v1780299967547!5m2!1sen!2scr"
                    width="100%"
                    height="280"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>