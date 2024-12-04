
    document.getElementById('invitados').addEventListener('input', function () {
    const maxInvitados = parseInt(this.max); // Máximo permitido
    const errorMensaje = document.getElementById('error-invitados');
    if (parseInt(this.value) > maxInvitados) {
        errorMensaje.textContent = `El número de invitados no puede exceder ${maxInvitados}.`;
        this.classList.add('is-invalid'); // Agrega una clase para estilos adicionales si es necesario
    } else {
        errorMensaje.textContent = ''; // Limpia el mensaje de error si es válido
        this.classList.remove('is-invalid');
    }
});

//Validacion de pagar reservas
document.addEventListener('DOMContentLoaded', function () {
    const nombreTitular = document.getElementById('nombreTitular');
    const numeroTarjeta = document.getElementById('numeroTarjeta');
    const fechaExpiracion = document.getElementById('fechaExpiracion');
    const cvv = document.getElementById('cvv');
    const nombreTitularMovil = document.getElementById('nombreTitularMovil');
    const numeroTarjetaMovil = document.getElementById('numeroTarjetaMovil');
    const fechaExpiracionMovil = document.getElementById('fechaExpiracionMovil');
    const cvvMovil = document.getElementById('cvvMovil');

    const errorNombre = document.getElementById('error-nombre');
    const errorTarjeta = document.getElementById('error-tarjeta');
    const errorFecha = document.getElementById('error-fecha');
    const errorCvv = document.getElementById('error-cvv');

    // Validación del nombre del titular
    nombreTitular.addEventListener('input', () => {
        const formato = /^[a-zA-Z\s]+$/;
        if (!formato.test(nombreTitular.value.trim())) {
            errorNombre.textContent = 'El nombre solo puede contener letras y espacios.';
            nombreTitular.classList.add('is-invalid');
        } else {
            errorNombre.textContent = '';
            nombreTitular.classList.remove('is-invalid');
        }
    });

    // Validación del número de tarjeta
    numeroTarjeta.addEventListener('input', () => {
        const sanitized = numeroTarjeta.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
        numeroTarjeta.value = sanitized.replace(/(\d{4})(?=\d)/g, '$1 '); // Formato XXXX XXXX XXXX XXXX

        if (sanitized.length !== 16) {
            errorTarjeta.textContent = 'El número de tarjeta debe tener 16 dígitos.';
            numeroTarjeta.classList.add('is-invalid');
        } else {
            errorTarjeta.textContent = '';
            numeroTarjeta.classList.remove('is-invalid');
        }
    });

    // Validación de la fecha de expiración
    fechaExpiracion.addEventListener('input', () => {
        const formato = /^(0[1-9]|1[0-2])\/\d{2}$/; // Formato MM/AA
        const fecha = fechaExpiracion.value.trim();
    
        if (!formato.test(fecha)) {
            errorFecha.textContent = 'Formato inválido. Usa MM/AA.';
            fechaExpiracion.classList.add('is-invalid');
            return;
        }
    
        // Dividir la fecha en mes y año
        const [mes, anio] = fecha.split('/').map(Number); // Convertir a números
        const anioCompleto = 2000 + anio; // Convertir AA a formato 20XX
    
        // Obtener el mes y año actual
        const fechaActual = new Date();
        const mesActual = fechaActual.getMonth() + 1; // Los meses comienzan en 0
        const anioActual = fechaActual.getFullYear();
    
        // Validar que la fecha no esté expirada
        if (anioCompleto < anioActual || (anioCompleto === anioActual && mes < mesActual)) {
            errorFecha.textContent = 'La fecha está expirada.';
            fechaExpiracion.classList.add('is-invalid');
        } else {
            errorFecha.textContent = '';
            fechaExpiracion.classList.remove('is-invalid');
        }
    });
    

    // Validación del CVV
    cvv.addEventListener('input', () => {
        const formato = /^\d{3}$/; // Solo 3 dígitos
        if (!formato.test(cvv.value.trim())) {
            errorCvv.textContent = 'El CVV debe tener 3 dígitos.';
            cvv.classList.add('is-invalid');
        } else {
            errorCvv.textContent = '';
            cvv.classList.remove('is-invalid');
        }
    });
});

// Favoritos
document.addEventListener('DOMContentLoaded', function () {
    const btnFavorito = document.getElementById('btn-favorito');
    if (btnFavorito) {
        const iconoFavorito = btnFavorito.querySelector('#icono-favorito');
        let esFavorito = iconoFavorito.classList.contains('text-danger');

        // Si es favorito, mantenemos el color rojo
        if (esFavorito) {
            iconoFavorito.classList.add('text-danger');
        }
        btnFavorito.addEventListener('click', function () {
            const idLocal = this.getAttribute('data-id-local');
            const idCliente = this.getAttribute('data-id-cliente');

            if (esFavorito) {
                iconoFavorito.classList.remove('text-danger');
                cambiarFavorito(idLocal, idCliente, 'eliminar');
            } else {
                iconoFavorito.classList.add('text-danger');
                cambiarFavorito(idLocal, idCliente, 'agregar');
            }
            esFavorito = !esFavorito;
        });
    }

    function cambiarFavorito(idLocal, idCliente, accion) {
        fetch('configuracion/favorites.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `accion=${accion}&id_local=${idLocal}&id_cliente=${idCliente}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(data.message);
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => console.error('Error en la petición AJAX:', error));
    }
    
});
