document.addEventListener('DOMContentLoaded', function () {
    
    const nombreRegistro = document.getElementById('nombreRegistro');
    const correoRegistro = document.getElementById('correoRegistro');
    const correoFormato = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const telefonoRegistro = document.getElementById('telefonoRegistro');
    const passwordRegistro = document.getElementById('passwordRegistro');
    const botonEnviar = document.querySelector('.btnEnviar'); 
    const errorNombre = document.getElementById('error-nombre');
    const errorCorreo = document.getElementById('error-correo');
    const errorTelefono = document.getElementById('error-telefono');
    const correoRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const errorPassword = document.getElementById('error-password');
    const passwordRegex =  /^.{6,}$/; // Mínimo 6 caracteres, al menos una letra y un número

    // Función para habilitar o deshabilitar el botón
    function validacion() {
        // Validar cada campo
        const isNombreValid = nombreRegistro.value.trim().length >= 3;
        const isCorreoValid = correoRegex.test(correoRegistro.value.trim());
        const isTelefonoValid = telefonoRegistro.value.length === 10;
        const isPasswordValid = passwordRegex.test(passwordRegistro.value);
        
        // Habilitar o deshabilitar el botón dependiendo de la validez de los campos
        if (isNombreValid && isCorreoValid && isTelefonoValid && isPasswordValid) {
            botonEnviar.disabled = false;
            botonEnviar.style.background = "#2D5CEA";
        } else {
            botonEnviar.disabled = true;
            botonEnviar.style.background = "gray";
        }
    }
    // Validación de Nombre
    nombreRegistro.addEventListener('input', () => {
        // Eliminar espacios al inicio y al final del valor
        const sanitized = nombreRegistro.value.trimStart().replace(/[^a-zA-Z\s]/g, '');
        nombreRegistro.value = sanitized;

        if (nombreRegistro.value.trim().length < 3) {
            errorNombre.textContent = 'El nombre debe tener al menos 3 caracteres.';
            nombreRegistro.classList.add('is-invalid');
        } else if (/^\s/.test(nombreRegistro.value) || /\s$/.test(nombreRegistro.value)) {
            errorNombre.textContent = 'El nombre no puede comenzar ni terminar con espacios.';
            nombreRegistro.classList.add('is-invalid');
        } else {
            errorNombre.textContent = '';
            nombreRegistro.classList.remove('is-invalid');
        }
        validacion();
    });

    // Validación de Correo
    correoRegistro.addEventListener('input', () => {
        // Eliminar espacios al inicio y al final
        correoRegistro.value = correoRegistro.value.trimStart();
    
        if (!correoFormato.test(correoRegistro.value.trim())) {
            errorCorreo.textContent = 'El correo electrónico no es válido.';
            correoRegistro.classList.add('is-invalid');
        } else if (/^\s/.test(correoRegistro.value) || /\s$/.test(correoRegistro.value)) {
            errorCorreo.textContent = 'El correo no puede comenzar ni terminar con espacios.';
            correoRegistro.classList.add('is-invalid');
        } else {
            errorCorreo.textContent = '';
            correoRegistro.classList.remove('is-invalid');
        }
        validacion();
    });
    

    // Validación de Teléfono
    telefonoRegistro.addEventListener('input', () => {
        telefonoRegistro.value = telefonoRegistro.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos

        if (telefonoRegistro.value.length < 10) {
            errorTelefono.textContent = 'El teléfono debe tener 10 dígitos.';
            telefonoRegistro.classList.add('is-invalid');
        } else {
            errorTelefono.textContent = '';
            telefonoRegistro.classList.remove('is-invalid');
        }
        validacion();
    });

    // Validación de Contraseña

    passwordRegistro.addEventListener('input', () => {
        // Eliminar espacios al inicio mientras el usuario escribe
        passwordRegistro.value = passwordRegistro.value.trimStart();
    
        if (passwordRegistro.value.trim().length < 6) {
            errorPassword.textContent = 'La contraseña debe tener al menos 6 caracteres.';
            passwordRegistro.classList.add('is-invalid');
        } else if (/^\s/.test(passwordRegistro.value) || /\s$/.test(passwordRegistro.value)) {
            errorPassword.textContent = 'La contraseña no puede comenzar ni terminar con espacios.';
            passwordRegistro.classList.add('is-invalid');
        } else if (!passwordRegex.test(passwordRegistro.value)) {
            errorPassword.textContent = 'La contraseña no cumple con el formato requerido.';
            passwordRegistro.classList.add('is-invalid');
        } else {
            errorPassword.textContent = '';
            passwordRegistro.classList.remove('is-invalid');
        }
        validacion();
    });
    

    // Enviar formulario
    const formularioRegistro = document.querySelector('.formularioRegistro');
    formularioRegistro.addEventListener('submit', (event) => {
        let formIsValid = true;

        // Validar Nombre
        if (nombreRegistro.value.trim().length < 3) {
            errorNombre.textContent = 'El nombre debe tener al menos 3 caracteres.';
            nombreRegistro.classList.add('is-invalid');
            formIsValid = false;
        }

        // Validar Correo
        if (!correoRegex.test(correoRegistro.value.trim())) {
            errorCorreo.textContent = 'El correo electrónico no es válido.';
            correoRegistro.classList.add('is-invalid');
            formIsValid = false;
        }

        // Validar Teléfono
        if (telefonoRegistro.value.length < 10) {
            errorTelefono.textContent = 'El teléfono debe tener 10 dígitos.';
            telefonoRegistro.classList.add('is-invalid');
            formIsValid = false;
        }

        // Validar Contraseña
        if (!passwordRegex.test(passwordRegistro.value)) {
            errorPassword.textContent = 'La contraseña debe tener al menos 6 caracteres, incluyendo al menos una letra y un número.';
            passwordRegistro.classList.add('is-invalid');
            formIsValid = false;
        }

        if (!formIsValid) {
            event.preventDefault(); // Evitar envío del formulario si hay errores
        }
    });
    validacion();
});
