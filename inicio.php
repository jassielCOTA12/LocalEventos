<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="icon"  type="image/png" href="./imagenes/logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /><!---importacion de font awsome para logos -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/stylesMedia.css">
    <style>
    .activo {
        background-color: #2D5CEA; 
        color: white;
    }
    </style>

</head>
<body class="inicio">
    <div class="contenedor-gen">
        <?php
            include "include/header.php";
        ?>

        <div class="panelCentral-gen">
            <div id="parteSuperior">
                
            <?php
            include "include/parteSuperior.php";
            ?>
            
            </div>
            <div id="parteInferiorGrid-gen">
                <?php
                    require 'configuracion/fetchLocales.php'; // Incluye la conexión y la consulta
                    foreach ($locales_finales as $local) {
                        
                        // Obtener el id del local
                        $idLocal = $local['id_local'];

                        // Verificar si el id_local tiene una imagen asociada en el arreglo
                        if (array_key_exists($idLocal, $imagenesLocales)) {
                            $imagenLocal = $imagenesLocales[$idLocal];
                        } else {
                            // Si no se encuentra una imagen para el id_local, usar una imagen por defecto
                            $imagenLocal = 'imagenesLocales/SalonFiestaBonita.png';
                        }
                        
                        // Mostrar el local con su imagen
                        echo "
                        <a href='local.php?id={$local['id_local']}'>
                            <article class='localCard-gen'>
                                <img src='{$imagenLocal}' alt='imagen de local no cargada'>
                                <h3>{$local['nombre']}</h3>
                                <p>Hasta {$local['capacidad_maxima']} personas</p>
                                <p>Desde \${$local['precio_base']} </p>
                                <p><span><i class='fa-starIcon-card fa-solid fa-star'></i></span> {$local['promedio_calificacion']}</p>
                            </article>
                        </a>";
                    }
                ?>
            </div>

        </div>

        <div class="btnSubir">
            <a href="#" title="Subir"><img class="subir-gen" src="imagenes/subir.png"></a>
        </div> 
    </div>

     <!-- Modal de Filtros -->
     <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filtros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Precio</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="precio" checked>
                        <label class="form-check-label" for="precio">Todos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="precio1">
                        <label class="form-check-label" for="precio1">Menos de $2000</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="precio2">
                        <label class="form-check-label" for="precio2">$2000 - $5000</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="precio3">
                        <label class="form-check-label" for="precio3">$5000 - $7000</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="precio4">
                        <label class="form-check-label" for="precio4">Más de $7000</label>
                    </div>
    
                    <h6 class="mt-3">N° de invitados</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invitados" checked>
                        <label class="form-check-label" for="invitados">Todos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invitados1">
                        <label class="form-check-label" for="invitados1">Hasta 100</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invitados2">
                        <label class="form-check-label" for="invitados2">Hasta 200</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invitados3">
                        <label class="form-check-label" for="invitados3">Mas de 500</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="display: flex; flex-direction:row; width: 100%; justify-content:space-around">
                        <button id="btn-close" type="button" class="btn" data-bs-dismiss="modal" onclick="location.reload();">Quitar filtros</button>
                        <button type="button" class="btnFecha-movil" data-bs-dismiss="modal">Aplicar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script/scriptInicio.js"></script>
    <script src="script/scriptBusqueda.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        const precioCheckboxes = document.querySelectorAll('#precio, #precio1, #precio2, #precio3, #precio4');
        const invitadosCheckboxes = document.querySelectorAll('#invitados, #invitados1, #invitados2, #invitados3');

        function handleCheckboxChange(checkboxes) {
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    if (this.checked) {
                        checkboxes.forEach(box => {
                            if (box !== this) {
                                box.checked = false;
                            }
                        });
                    }
                });
            });
        }


        handleCheckboxChange(precioCheckboxes);
        handleCheckboxChange(invitadosCheckboxes);


        // Reiniciar los filtros
        document.getElementById('btn-close').addEventListener('click', function () {
            precioCheckboxes.forEach(checkbox => checkbox.checked = false);
            invitadosCheckboxes.forEach(checkbox => checkbox.checked = false);

            if (document.getElementById('precio').checked === false) {
                document.getElementById('precio').checked = true;
            }

            if (document.getElementById('invitados').checked === false) {
                document.getElementById('invitados').checked = true;
            }
        });


        document.querySelector('.btnFecha-movil').addEventListener('click', function () {
            const url = new URL(window.location.href);

            const params = new URLSearchParams(url.search);
            const ids = params.get('id');

            // Construir filtros seleccionados
            let filtros = {
                precio_min: 0,
                precio_max: 999999999,
                capacidad_min: 0,
                capacidad_max: 99999,
                id: ids
            };

            // Procesar los filtros de precio
            if (document.getElementById('precio1').checked) filtros.precio_max = 2000;
            if (document.getElementById('precio2').checked) filtros.precio_min = 2000, filtros.precio_max = 5000;
            if (document.getElementById('precio3').checked) filtros.precio_min = 5001, filtros.precio_max = 7000;
            if (document.getElementById('precio4').checked) filtros.precio_min = 7000;

            // Procesar los filtros de capacidad
            if (document.getElementById('invitados1').checked) filtros.capacidad_max = 100;
            if (document.getElementById('invitados2').checked) filtros.capacidad_max = 200;
            if (document.getElementById('invitados3').checked) filtros.capacidad_min = 500;


            // Enviar la solicitud al backend
            fetch('configuracion/filtrar_locales.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(filtros)
            })
                .then(response => response.text())
                .then(data => {
                    // Actualizar la sección con los resultados
                    document.getElementById('parteInferiorGrid-gen').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>


</html>