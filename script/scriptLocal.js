
// Array de comentarios que se actualizarán cada 5 segundos
var comentarios = <?php echo json_encode($opiniones); ?>;  // Usamos PHP para pasar los comentarios de servidor a JavaScript
var index = 0;

// Función para actualizar los comentarios
function actualizarComentario() {
    if (comentarios.length > 0) {
        var comentarioActual = comentarios[index];
        document.getElementById('comentarioText').textContent = comentarioActual.comentario;
        document.getElementById('comentarioFecha').textContent = 'Enviado el ' + comentarioActual.fecha;
        // Aquí puedes agregar la lógica para mostrar las estrellas si es necesario
        index = (index + 1) % comentarios.length; // Avanzamos al siguiente comentario y volvemos al inicio si llegamos al final
    }
}

// Llamar a la función cada 5 segundos
setInterval(actualizarComentario, 5000);

// Llamamos a la función inmediatamente para mostrar el primer comentario
actualizarComentario();

document.addEventListener('DOMContentLoaded', function () {
    const btnContinuar = document.getElementById('continuarReserva');
    const inputNombre = document.getElementById('inputNombre');
    const telefonoInput = document.getElementById('telefono');
    const fechaInput = document.getElementById('fecha1');
    const invitadosInput = document.getElementById('invitados');
    const correoInput = document.querySelector('input[placeholder="Correo electrónico"]');
    const capacidadMaxima = parseInt(invitadosInput.max); 
    const errorFecha = document.getElementById('error-fecha');
    const idLocal = fechaInput.getAttribute('data-id-local'); // Obtener el id del local
    const errorMensaje = document.getElementById('error-invitados');
    let isFechaReservada = false; 
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
                btnContinuar.style.background = 'gray';
                isFechaReservada = true;
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
                        isFechaReservada = false; // Fecha válida
                        verificarCampos();
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
                            const [horario, precio] = data.split("|");
                            document.querySelector('.horario').textContent = horario;
                            document.querySelector('#precioPrueba').textContent = `${precio}`;

                            document.querySelector('#precioPrueba1').value = precio;
                            
                        })
                        .catch(error => {
                            console.error('Error al obtener el horario:', error);
                            document.querySelector('.horario').textContent = "Error al obtener el horario.";
                        });
                    } else if (data === "Reservado") {
                        errorFecha.textContent = 'Fecha no disponible, seleccione otra.';
                        errorFecha.classList.add('is-invalid');
                        fechaInput.classList.add('is-invalid');
                        isFechaReservada = true;
                        btnContinuar.disabled = true; // Deshabilitar botón "Continuar"
                        btnContinuar.style.background = 'gray';
                    }
                })
                .catch(error => {
                    console.error('Error al verificar disponibilidad:', error);
                    errorFecha.textContent = 'Error al verificar disponibilidad.';
                    errorFecha.classList.add('is-invalid');
                    fechaInput.classList.add('is-invalid');
                    btnContinuar.disabled = true;
                    isFechaReservada = true;
                });
            }
        }
    });
    //Input invitados
    document.getElementById('invitados').addEventListener('input', function () {
        const maxInvitados = parseInt(this.max); // Máximo permitido
        const minInvitados = parseInt(this.min);
        
        if (parseInt(this.value) > maxInvitados) {
            errorMensaje.textContent = `El número de invitados no puede exceder ${maxInvitados}.`;
            this.classList.add('is-invalid'); // Agrega una clase para estilos adicionales si es necesario
        } else if(parseInt(this.value) < minInvitados){
            errorMensaje.textContent = `El número de invitados mínimo es ${minInvitados}.`;
            this.classList.add('is-invalid'); 
        } else {
            errorMensaje.textContent = ''; // Limpia el mensaje de error si es válido
            this.classList.remove('is-invalid');
        }
        verificarCampos();
    }); 

    const telefono = document.getElementById('telefono');
    // Solo permitir números
    telefono.addEventListener('input', () => {
        // Eliminar cualquier carácter que no sea un número
        telefono.value = telefono.value.replace(/\D/g, '');

        // Limitar el número de caracteres a 10
        if (telefono.value.length > 10) {
            telefono.value = telefono.value.slice(0, 10);
        }
    });
    // Función para verificar si todos los campos están completos
    function verificarCampos() {
        const numInvitados = parseInt(invitadosInput.value.trim());
        const todosCompletos = inputNombre.value.trim() !== '' && inputNombre.value.trim().length >= 3 &&
            telefonoInput.value.trim() !== '' &&  telefonoInput.value.trim().length === 10 &&
            fechaInput.value.trim() !== '' &&
            invitadosInput.value.trim() !== '' &&
            !isNaN(numInvitados) &&
            numInvitados >= 1 && // Asegurarse de que haya al menos 20 invitados
            numInvitados <= capacidadMaxima &&
            correoInput.value.trim() !== '' &&
            esFechaValida(fechaInput.value.trim()) &&
            !isFechaReservada;
            

        // Habilitar o deshabilitar el botón "Continuar"
        if (todosCompletos) {
            btnContinuar.disabled = false;
            btnContinuar.style.background = '#4563C0'; 
        } else {
            btnContinuar.disabled = true;
            btnContinuar.style.background = 'gray';
        }
    }

    function esFechaValida(fecha) {
        const fechaSeleccionada = new Date(fecha);
        const fechaActual = new Date();
        // Comparar si la fecha seleccionada es mayor o igual a la fecha actual
        return fechaSeleccionada >= fechaActual;
    }

    // Agregar eventos de 'input' a los campos para verificar cuando cambian
    inputNombre.addEventListener('input', verificarCampos);
    telefonoInput.addEventListener('input', verificarCampos);
    fechaInput.addEventListener('change', verificarCampos);
    invitadosInput.addEventListener('input', verificarCampos);
    extraInfo.addEventListener('input', verificarCampos);
    verificarCampos();

    //Boton continuar reserva - modal 1
    document.getElementById("continuarReserva").addEventListener("click", function () {
        const fecha = document.getElementById("fecha1").value;
        const inputFecha = document.querySelector("#fechaReserva"); //Modal2
        const precioPrueba = document.getElementById("precioPrueba");
        const precioModal2 = document.getElementById("pagarReserva"); // Modal2

        if (inputFecha) {
            inputFecha.value = new Date(fecha).toLocaleDateString('es-MX', {
                weekday: 'long', // dia 
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                timeZone: 'UTC' 
            });
        }
        precioModal2.textContent = "$" + precioPrueba.textContent; 
    });

    const nombreTitular = document.getElementById('nombreTitular');
    const numeroTarjeta = document.getElementById('numeroTarjeta');
    const fechaExpiracion = document.getElementById('fechaExpiracion');
    const cvv = document.getElementById('cvv');
    const errorNombre = document.getElementById('error-nombre');
    const errorTarjeta = document.getElementById('error-tarjeta');
    const errorFechaTarjeta = document.getElementById('error-fecha');
    const errorCvv = document.getElementById('error-cvv');

    // Validación del nombre del titular
    nombreTitular.addEventListener('input', () => {
        // Eliminar espacios al inicio y al final del valor
        const trimmedValue = nombreTitular.value.trimStart().replace(/[^a-zA-Z\s]/g, '');
        nombreTitular.value = trimmedValue;

        const formato = /^[a-zA-Z\s]+$/;
        if (!formato.test(nombreTitular.value.trim())) {
            errorNombre.textContent = 'El nombre solo puede contener letras y espacios.';
            nombreTitular.classList.add('is-invalid');
        } else if (nombreTitular.value.trim().length === 0) {
            errorNombre.textContent = 'El nombre no puede estar vacío ni tener solo espacios.';
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
    let sanitized = fechaExpiracion.value.replace(/[^0-9\/]/g, ''); // Eliminar todo excepto números y "/"
    fechaExpiracion.value = sanitized;

    const formato = /^(0[1-9]|1[0-2])\/\d{2}$/; // Formato MM/AA

    if (!formato.test(fechaExpiracion.value)) {
        errorFechaTarjeta.textContent = 'Formato inválido. Usa MM/AA.';
        fechaExpiracion.classList.add('is-invalid');
        return;
    }

    // Extraer mes y año de la fecha de expiración
    const mes = parseInt(fechaExpiracion.value.substring(0, 2)); // Los primeros dos dígitos son el mes
    const anio = parseInt(fechaExpiracion.value.substring(3, 5)); // Los dos últimos dígitos son el año (AA)
    const anioCompleto = 2000 + anio; // Convertir AA a formato 20XX

    // Obtener la fecha actual
    const fechaActual = new Date();
    const mesActual = fechaActual.getMonth() + 1; // Los meses comienzan en 0, por eso sumamos 1
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
        const sanitized = cvv.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
        cvv.value = sanitized;

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

document.addEventListener('DOMContentLoaded', function () {
    const btnPagar = document.querySelector('.btn-aceptar');
    const nombreTitularInput = document.getElementById('nombreTitular');
    const numeroTarjetaInput = document.getElementById('numeroTarjeta');
    const fechaExpiracionInput = document.getElementById('fechaExpiracion');
    const cvvInput = document.getElementById('cvv');
    const fechaReservaInput = document.getElementById('fechaReserva');
    
    // Función para verificar si todos los campos están completos
    function verificarCamposPago() {
        const fechaExpiracionValor = fechaExpiracionInput.value.trim(); // Obtener valor del input
        
        let fechaExpiracionValida = true;

        // Verificar que la fecha tenga el formato MM/AA
        if (fechaExpiracionValor.length === 5 && fechaExpiracionValor.includes('/')) {
            const mes = parseInt(fechaExpiracionValor.substring(0, 2)); // Extraemos el mes
            const anio = parseInt(fechaExpiracionValor.substring(3, 5)); // Extraemos el año (AA)
            const anioCompleto = 2000 + anio; // Convertir AA a formato 20XX
            const fechaActual = new Date();
            const mesActual = fechaActual.getMonth() + 1; // Los meses comienzan desde 0
            const anioActual = fechaActual.getFullYear();

            // Verificar que el mes sea válido (1-12)
            if (mes < 1 || mes > 12) {
                fechaExpiracionValida = false; // Mes inválido
            }

            // Verifica si la fecha está expirada
            if (anioCompleto < anioActual || (anioCompleto === anioActual && mes < mesActual)) {
                fechaExpiracionValida = false; // La fecha ha expirado
            }
        } else {
            fechaExpiracionValida = false; // Formato incorrecto
        }
        const todosCompletos = nombreTitularInput.value.trim() !== '' && nombreTitularInput.value.trim().length >= 3  &&
        numeroTarjetaInput.value.trim() !== '' && numeroTarjetaInput.value.trim().length === 19 && 
        fechaExpiracionValida && fechaExpiracionValor.trim() !== '' && fechaExpiracionValor.trim().length === 5 &&
        cvvInput.value.trim() !== '' && cvvInput.value.trim().length === 3; 
        // Habilitar o deshabilitar el botón "Pagar"
        if (todosCompletos) {
            btnPagar.disabled = false;
            btnPagar.style.background = '#4563C0'; 
        } else {
            btnPagar.disabled = true;
            btnPagar.style.background = 'gray';
        }
    }

    fechaExpiracionInput.addEventListener('input', function() {
        let valor = fechaExpiracionInput.value.replace(/[^0-9]/g, ''); // Eliminar todo excepto números
        if (valor.length > 2) {
            valor = valor.slice(0, 2) + '/' + valor.slice(2, 4); // Añadir la diagonal después de 2 dígitos
        }
        fechaExpiracionInput.value = valor; // Actualizar el valor del input
        verificarCamposPago(); // Verificar los campos después de la actualización
    });
    // Agregar eventos de 'input' a los campos para verificar cuando cambian
    nombreTitularInput.addEventListener('input', verificarCamposPago);
    numeroTarjetaInput.addEventListener('input', verificarCamposPago);
    fechaExpiracionInput.addEventListener('input', verificarCamposPago);
    cvvInput.addEventListener('input', verificarCamposPago);
    fechaReservaInput.addEventListener('input', verificarCamposPago);

   
    verificarCamposPago();
});

//Cambiar modal a version movil
document.addEventListener('DOMContentLoaded', () => {
    // Función para aplicar la validación a un modal específico
    const applyModalValidation = (modalDialog, modal) => {
        modal.addEventListener('shown.bs.modal', () => {
            if (window.innerWidth < 519) {
                modalDialog.classList.add('modal-fullscreen');
                modalDialog.style.minWidth = '420px';
            } else {
                modalDialog.classList.remove('modal-fullscreen');
                modalDialog.style.minWidth = '';
            }
        });
    };

    // Obtener referencias a los modales y sus diálogos
    const opinionModal = document.getElementById('opinionModal');
    const modalDialog = document.getElementById('modalDialog');

    const modalPagar = document.getElementById('modalPagar');
    const modalPagarDialog = document.getElementById('modalPagarDialog');

    const reservarModal = document.getElementById('reservarModal');
    const modalReservarDialog = document.getElementById('modalReservarDialog');

    // Aplicar la validación a cada modal
    applyModalValidation(modalDialog, opinionModal);
    applyModalValidation(modalPagarDialog, modalPagar);
    applyModalValidation(modalReservarDialog, reservarModal);
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
                iconoFavorito.classList.remove('fa-regular');
                iconoFavorito.classList.add('fa-solid','text-danger');
                esFavorito = true; // Actualiza la variable si el local está en la tabla de favoritos
            }
        })
        .catch(error => console.error('Error', error));

        
        btnFavorito.addEventListener('click', function () {
            const idLocal = this.getAttribute('data-id-local');
            const idCliente = this.getAttribute('data-id-cliente');

            if (esFavorito) {
                cambiarFavorito(idLocal, idCliente, 'eliminar');
                iconoFavorito.classList.remove('fa-solid', 'text-danger');
                iconoFavorito.classList.add('fa-regular');
                esFavorito = false; // Actualiza la variable
            } else {
                cambiarFavorito(idLocal, idCliente, 'agregar');
                iconoFavorito.classList.remove('fa-regular');
                iconoFavorito.classList.add('fa-solid', 'text-danger');
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

function abrirModal() {
    const modalReservar = document.getElementById('reservarModal');
    modalReservar.classList.remove('show');
    const local = document.getElementById('local');
    local.classList.remove('modal-open');
    event.preventDefault();

    
    const modalPagar = new bootstrap.Modal(document.getElementById('modalPagar'));
    modalPagar.show();

    
}
function redirigirALogin() {
    window.location.href = 'login.php';
}

document.getElementById('confirmarReserva').addEventListener('click', function () {
    Swal.fire({
      title: '¿Estás seguro?',
      text: "¿Deseas confirmar la reserva?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#2D5CEA',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, confirmar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        // Mostrar un mensaje de éxito y luego enviar el formulario
        Swal.fire({
            title: 'Reserva creada con éxito',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500, // Mostrar por 2 segundos
            didClose: () => {
                // Enviar el formulario después de que el mensaje desaparezca
                document.getElementById('formReservar').submit();
            }
        });
      }
    });
  });
  
