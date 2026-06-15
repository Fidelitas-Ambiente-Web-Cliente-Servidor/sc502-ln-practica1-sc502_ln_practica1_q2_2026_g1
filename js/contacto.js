// Selección de elementos del formulario
const form = document.getElementById('formulario-contacto');
const btnEnviar = document.getElementById('btn-enviar');
const mensajeExito = document.getElementById('mensaje-exito');

const nombre = document.getElementById('nombre');
const correo = document.getElementById('correo');
const telefono = document.getElementById('telefono');
const asunto = document.getElementById('asunto');
const mensaje = document.getElementById('mensaje');

// Función para mostrar error en un campo
function mostrarError(input, spanId, mensaje) {
    input.classList.remove('valido');
    input.classList.add('invalido');
    document.getElementById(spanId).textContent = mensaje;
  }

// Función para marcar un campo como válido
function mostrarValido(input, spanId) {
    input.classList.remove('invalido');
    input.classList.add('valido');
    document.getElementById(spanId).textContent = '';
  }

// Validación del nombre: mínimo 5 caracteres, solo letras y espacios
function validarNombre() {
    const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{5,}$/;
    if (!regex.test(nombre.value.trim())) {
      mostrarError(nombre, 'error-nombre', 'Mínimo 5 caracteres, solo letras y espacios.');
      return false;
    }
    mostrarValido(nombre, 'error-nombre');
    return true;
  }

// Validación del correo: formato válido con regex
function validarCorreo() {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regex.test(correo.value.trim())) {
      mostrarError(correo, 'error-correo', 'Ingresá un correo electrónico válido.');
      return false;
    }
    mostrarValido(correo, 'error-correo');
    return true;
  }

// Validación del teléfono: solo números, mínimo 8 dígitos
function validarTelefono() {
    const regex = /^[0-9]{8,}$/;
    if (!regex.test(telefono.value.trim())) {
      mostrarError(telefono, 'error-telefono', 'Solo números, mínimo 8 dígitos.');
      return false;
    }
    mostrarValido(telefono, 'error-telefono');
    return true;
  }

// Validación del asunto: mínimo 3 caracteres
function validarAsunto() {
    if (asunto.value.trim().length < 3) {
      mostrarError(asunto, 'error-asunto', 'El asunto debe tener mínimo 3 caracteres.');
      return false;
    }
    mostrarValido(asunto, 'error-asunto');
    return true;
  }

// Validación del mensaje: mínimo 20 caracteres
function validarMensaje() {
    if (mensaje.value.trim().length < 20) {
      mostrarError(mensaje, 'error-mensaje', 'El mensaje debe tener mínimo 20 caracteres.');
      return false;
    }
    mostrarValido(mensaje, 'error-mensaje');
    return true;
  }

// Función que revisa si todos los campos son válidos para habilitar el botón
function verificarFormulario() {
    const todoValido =
      validarNombre() &
      validarCorreo() &
      validarTelefono() &
      validarAsunto() &
      validarMensaje();
  
    btnEnviar.disabled = !todoValido;
  }

// Eventos en tiempo real para cada campo
nombre.addEventListener('input', () => { validarNombre(); verificarFormulario(); });
correo.addEventListener('input', () => { validarCorreo(); verificarFormulario(); });
telefono.addEventListener('input', () => { validarTelefono(); verificarFormulario(); });
asunto.addEventListener('input', () => { validarAsunto(); verificarFormulario(); });
mensaje.addEventListener('input', () => { validarMensaje(); verificarFormulario(); });


// Evento de envío del formulario
form.addEventListener('submit', function (e) {
    e.preventDefault();
  
    // Mostrar mensaje de éxito y limpiar formulario
    mensajeExito.style.display = 'block';
    form.reset();
  
    // Limpiar clases de validación de todos los campos
    [nombre, correo, telefono, asunto, mensaje].forEach(campo => {
      campo.classList.remove('valido', 'invalido');
    });
  
    // Deshabilitar botón nuevamente
    btnEnviar.disabled = true;
  
    // Ocultar mensaje de éxito después de 4 segundos
    setTimeout(() => {
      mensajeExito.style.display = 'none';
    }, 4000);
  });