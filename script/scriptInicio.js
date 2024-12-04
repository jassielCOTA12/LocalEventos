document.addEventListener('DOMContentLoaded', function () {
    const guardarBtn = document.querySelector('#calendarioModal .btn-primary');
    const fechaInput = document.getElementById('fecha');
    const gridDiv = document.getElementById('parteInferiorGrid-gen');

    guardarBtn.addEventListener('click', () => {
        const fecha = fechaInput.value;

        // Hacer la solicitud
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
    });
});
