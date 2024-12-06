
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener los elementos del formulario
        const correoLogin = document.getElementById("correoLogin");
        const passwordLogin = document.getElementById("passwordLogin");
        const btnIniciarSesion = document.querySelector(".btnLogin");

        // Función para verificar si los campos están vacíos
        function checkForm() {
            if (correoLogin.value === "" || passwordLogin.value === "") {
                btnIniciarSesion.disabled = true; // Desactiva el botón si los campos están vacíos
                btnIniciarSesion.style.background = "gray";
            } else {
                btnIniciarSesion.disabled = false; // Activa el botón si los campos no están vacíos
                btnIniciarSesion.style.background = "#2D5CEA";
            }
        }

        // Llamar a la función de verificación cuando los campos cambien
        correoLogin.addEventListener("input", checkForm);
        passwordLogin.addEventListener("input", checkForm);

        checkForm();

        // Seleccionamos los campos de entrada
        const inputs = document.querySelectorAll('#correoLogin, #passwordLogin');

        // Añadimos el evento de 'input' para eliminar el mensaje de error cuando se escribe en los campos
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                const errorMessage = document.getElementById('error-message');
                if (errorMessage) {
                    errorMessage.style.display = 'none'; // Ocultar el mensaje de error
                }
            });
        });
    });

