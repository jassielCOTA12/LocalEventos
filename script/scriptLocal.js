
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

//Validacion de pagar y reservas
document.addEventListener('DOMContentLoaded', function () {

    const fechaInput = document.getElementById('fecha1');
    const errorFecha = document.getElementById('error-fecha');
    const btnContinuar = document.querySelector('.btn-continuar');
    const idLocal = fechaInput.getAttribute('data-id-local'); // Obtener el id del local

    // Verificación de la disponibilidad al cambiar la fecha
    fechaInput.addEventListener('change', function () {
        const fecha = fechaInput.value;

        if (!fecha) {
            errorFecha.textContent = ''; 
        } else {
            // Verificar si la fecha es en el pasado
            const fechaSeleccionada = new Date(fecha);
            const fechaActual = new Date();

            if (fechaSeleccionada < fechaActual) {
                errorFecha.textContent = 'La fecha seleccionada ya ha pasado, por favor elija una fecha futura.';
                errorFecha.classList.add('is-invalid');
                fechaInput.classList.add('is-invalid');
                btnContinuar.disabled = true; // Deshabilitar botón "Continuar"
            } else {
                fetch('configuracion/checkAvailability.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `fecha=${fecha}&id_local=${idLocal}`
                })
                .then(response => response.text())
                .then(data => {
                    if (data === "Disponible") {
                        errorFecha.textContent = ''; // No hay error
                        errorFecha.classList.remove('is-invalid');
                        fechaInput.classList.remove('is-invalid');
                        btnContinuar.disabled = false; // Habilitar botón "Continuar"
                        // Obtener horario 
                        fetch('configuracion/schedules.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `fecha=${fecha}&id_local=${idLocal}`
                        })
                        .then(response => response.text()) 
                        .then(data => {
                            document.querySelector('.horario').textContent = data;
                        })
                        .catch(error => {
                            console.error('Error al obtener el horario:', error);
                            document.querySelector('.horario').textContent = "Error al obtener el horario.";
                        });
                    } else if (data === "Reservado") {
                        errorFecha.textContent = 'Fecha no disponible, seleccione otra.';
                        errorFecha.classList.add('is-invalid');
                        fechaInput.classList.add('is-invalid');
                        btnContinuar.disabled = true; // Deshabilitar botón "Continuar"
                    }
                })
                .catch(error => {
                    console.error('Error al verificar disponibilidad:', error);
                    errorFecha.textContent = 'Error al verificar disponibilidad.';
                    errorFecha.classList.add('is-invalid');
                    fechaInput.classList.add('is-invalid');
                    btnContinuar.disabled = true;
                });
            }
        }
    });

    

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
    const errorFechaTarjeta = document.getElementById('error-fecha');
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
            errorFechaTarjeta.textContent = 'Formato inválido. Usa MM/AA.';
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
            errorFechaTarjeta.textContent = 'La fecha está expirada.';
            fechaExpiracion.classList.add('is-invalid');
        } else {
            errorFechaTarjeta.textContent = '';
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

//Favoritos
document.addEventListener('DOMContentLoaded', function () {
    const btnFavorito = document.getElementById('btn-favorito');
    const iconoFavorito = btnFavorito.querySelector('#icono-favorito');
        let esFavorito = false; 
        // Verificar si el local está en la tabla de favoritos
        fetch('configuracion/favorites.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `accion=verificar&id_local=${btnFavorito.getAttribute('data-id-local')}&id_cliente=${btnFavorito.getAttribute('data-id-cliente')}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.isFavorito) {
                iconoFavorito.classList.add('text-danger');
                esFavorito = true; // Actualiza la variable si el local está en la tabla de favoritos
            }
        })
        .catch(error => console.error('Errore', error));

        
        btnFavorito.addEventListener('click', function () {
            const idLocal = this.getAttribute('data-id-local');
            const idCliente = this.getAttribute('data-id-cliente');

            if (esFavorito) {
                cambiarFavorito(idLocal, idCliente, 'eliminar');
                iconoFavorito.classList.remove('text-danger');
                esFavorito = false; // Actualiza la variable
            } else {
                cambiarFavorito(idLocal, idCliente, 'agregar');
                iconoFavorito.classList.add('text-danger');
                esFavorito = true; // Actualiza la variable
            }

            
        });
    

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
        .catch(error => console.error('Error:', error));
    }
    
});

// Favorito en movil
document.addEventListener('DOMContentLoaded', function () {
    const btnFavoritoMovil = document.getElementById('btn-favorito-movil');
    const iconoFavoritoMovil = btnFavoritoMovil.querySelector('#icono-favorito-movil');
    let esFavoritoMovil = false;

    // Verificar si el local está en favoritos (versión móvil)
    fetch('configuracion/favorites.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `accion=verificar&id_local=${btnFavoritoMovil.getAttribute('data-id-local')}&id_cliente=${btnFavoritoMovil.getAttribute('data-id-cliente')}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.isFavorito) {
            iconoFavoritoMovil.classList.add('text-danger');
            esFavoritoMovil = true;
        }
    })
    .catch(error => console.error('Error:', error));

    // Manejar clic en el botón de favoritos (versión móvil)
    btnFavoritoMovil.addEventListener('click', function () {
        const idLocal = this.getAttribute('data-id-local');
        const idCliente = this.getAttribute('data-id-cliente');

        if (esFavoritoMovil) {
            cambiarFavoritoMovil(idLocal, idCliente, 'eliminar');
            iconoFavoritoMovil.classList.remove('text-danger');
            esFavoritoMovil = false;
        } else {
            cambiarFavoritoMovil(idLocal, idCliente, 'agregar');
            iconoFavoritoMovil.classList.add('text-danger');
            esFavoritoMovil = true;
        }
    });

    // Función para cambiar el estado del favorito (versión móvil)
    function cambiarFavoritoMovil(idLocal, idCliente, accion) {
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
        .catch(error => console.error('Error:', error));
    }
});

