document.addEventListener('DOMContentLoaded', () => {
    const starSections = document.querySelectorAll('.stars');
    const commentInput = document.getElementById('experience');
    const aceptarBtn = document.getElementById('agregar_opinion');

    const checkFormCompletion = () => {
      let allStarsSelected = true;
      starSections.forEach(container => {
        if (container.querySelectorAll('.star.selected').length === 0) {
          allStarsSelected = false;
        }
      });

      const isCommentFilled = commentInput.value.trim() !== "";

      aceptarBtn.disabled = !(allStarsSelected && isCommentFilled);
    };

    starSections.forEach(container => {
      container.addEventListener('click', (e) => {
        if (e.target.classList.contains('star')) {
          const rating = e.target.getAttribute('data-value');
          container.querySelectorAll('.star').forEach((star, index) => {
            star.classList.toggle('selected', index < rating);
          });
          checkFormCompletion();
        }
      });
    });

    commentInput.addEventListener('input', checkFormCompletion);

    aceptarBtn.addEventListener('click', () => {
        const comentarios = commentInput.value.trim();
        const calificaciones = {
            calidad_servicio: document.querySelectorAll('.stars[data-category="calidad_servicio"] .star.selected').length,
            respuesta: document.querySelectorAll('.stars[data-category="respuesta"] .star.selected').length,
            profesionalidad: document.querySelectorAll('.stars[data-category="profesionalidad"] .star.selected').length,
            calidad_precio: document.querySelectorAll('.stars[data-category="calidad_precio"] .star.selected').length
        };
    
    
        const id_local = 1; // Cambia este valor según el local correspondiente
        const nombre_usuario = "Anónimo"; // Puedes reemplazarlo por el nombre de usuario si tienes uno
    
        const datos = {
            comentarios,
            calificaciones,
            id_local,
            nombre_usuario
        };
    
        // Enviar los datos al archivo PHP
        fetch('configuracion/updateComentario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: (datos)
        })
        .then(response => response.text())
        .then(data => {
            if (data.message === "Opinión guardada con éxito") {
                alert('¡Gracias por tu opinión!');
                // Limpiar formulario
                commentInput.value = '';
                starSections.forEach(container => {
                    container.querySelectorAll('.selected').forEach(star => star.classList.remove('selected'));
                });
                aceptarBtn.disabled = true; // Desactivar el botón después de enviar
            } else {
                alert('Error al enviar tu opinión. Inténtalo de nuevo.');
            }
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al enviar tu opinión. Inténtalo más tarde.');
        });
    });
    
    
  });