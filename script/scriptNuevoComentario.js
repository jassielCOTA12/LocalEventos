document.addEventListener('DOMContentLoaded', () => {
    const starSections = document.querySelectorAll('.stars');
    const commentInput = document.getElementById('experience');
    const aceptarBtn = document.getElementById('agregar_opinion');
    const modal = document.getElementById('opinionModal');

    // Asegúrate de que el modal esté completamente cargado y accesible antes de obtener el atributo
    const id_local = modal ? modal.getAttribute('data-id_local') : null; // Verifica que 'modal' exista

    // Si id_local no se encuentra, puedes lanzar un error o manejarlo de alguna forma
    if (!id_local) {
        console.error('No se encontró el ID del local');
        return; // Evita que el código continúe si no se encuentra el id_local
    }
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
    
        const nombre_usuario = "Anónimo"; // Puedes reemplazarlo por el nombre de usuario si tienes uno
        const fechaActual = new Date();

// Obtener el año, mes y día
const year = fechaActual.getFullYear();
const month = (fechaActual.getMonth() + 1).toString().padStart(2, '0'); // Mes de 2 dígitos
const day = fechaActual.getDate().toString().padStart(2, '0'); // Día de 2 dígitos

// Formatear la fecha como 'YYYY-MM-DD'
const fechaFormateada = `${year}-${month}-${day}`;
        const datos = new URLSearchParams();
            datos.append('comentario', comentarios);
             datos.append('id_local', id_local);
            datos.append('nombre_usuario', nombre_usuario);
            datos.append('calidad_servicio', calificaciones.calidad_servicio);
            datos.append('respuesta', calificaciones.respuesta);
            datos.append('profesionalidad', calificaciones.profesionalidad);
            datos.append('fecha', fechaFormateada);
            datos.append('calidad_precio', calificaciones.calidad_precio);

    
        // Enviar los datos al archivo PHP
        fetch('configuracion/updateComentario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body:datos.toString()
        })
        .then(response => response.text())
        .then(data => {
            if (data === "Opinión guardada con éxito") {
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