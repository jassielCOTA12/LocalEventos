//Buscar locales disponibles por fecha - Inicio.php
// available.php - BK
document.addEventListener('DOMContentLoaded', function () {
    const guardarBtn = document.getElementById('guardarFecha');
    const fechaInput = document.getElementById('fecha');
    const gridDiv = document.getElementById('parteInferiorGrid-gen');
    const fechaSeleccionadaSpan = document.getElementById('fechaSeleccionada');
    const categoriaBtns = document.querySelectorAll('#contenedorSeleccion .secciones');
    guardarBtn.disabled = true;
    fechaInput.addEventListener('input', () => {
        guardarBtn.disabled = !fechaInput.value;
    });
    guardarBtn.addEventListener('click', () => {
        const fecha = fechaInput.value;

        if (fecha) {
            const [anio, mes, dia] = fecha.split('-');
            const fechaFormateada = `${dia}/${mes}/${anio}`; // Formato dd/mm/yyyy
            fechaSeleccionadaSpan.textContent = fechaFormateada;
            categoriaBtns.forEach(btn => btn.classList.remove('activo'));
            fetch('configuracion/available.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `fecha=${fecha}`,
            })
            .then(response => response.text()) 
            .then(html => {
                gridDiv.innerHTML = html; 
            })
            .catch(error => {
                console.error('Error al obtener los locales:', error);
                gridDiv.innerHTML = "<p>Error al cargar los locales.</p>";
            });
        }
    });
});
