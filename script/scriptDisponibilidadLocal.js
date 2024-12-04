
//Disponibilidad en local.php
document.addEventListener('DOMContentLoaded', function () {
    const fechaInput = document.getElementById('fechaLocal');
    const estadoDisponibilidad = document.getElementById('estadoDisponibilidad');
    const btnGuardar = document.getElementById('guardarDisponibilidad');
    const idLocal = document.getElementById('fecha').getAttribute('data-id-local');

    btnGuardar.disabled = true;

    // verificar la disponibilidad al seleccionar una fecha
    fechaInput.addEventListener('change', function () {
        const fecha = fechaInput.value;

        if (!fecha) {
            btnGuardar.disabled = true;
            estadoDisponibilidad.textContent = ""; 
        } else {
            btnGuardar.disabled = false;
        }
    });

    
    btnGuardar.addEventListener('click', function () {
        const fecha = fechaInput.value;

         fetch('configuracion/checkAvailability.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `fecha=${fecha}&id_local=${idLocal}`
        })
        .then(response => response.text())
        .then(data => {
            estadoDisponibilidad.textContent = data;

            if (data === "Disponible") {
                estadoDisponibilidad.style.color = "green";
            } else if (data === "Reservado") {
                estadoDisponibilidad.style.color = "red";
            }
        })
        .catch(error => {
            console.error('Error al verificar disponibilidad:', error);
            estadoDisponibilidad.textContent = "Error al verificar disponibilidad.";
            estadoDisponibilidad.style.color = "orange";
        });

        console.log("Fecha enviada al servidor:", fechaInput.value); // Debe ser AAAA-MM-DD

    });
});
