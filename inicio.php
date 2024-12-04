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
                        
                            echo "
                            <a href='local.php?id={$local['id_local']}'>
                                <article class='localCard-gen'>
                                    <img src='imagenes/imgLocal1.png' alt='imagen de local no cargada'>
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
                        <input class="form-check-input" type="checkbox" id="precio1">
                        <label class="form-check-label" for="precio1">Menos de $2000</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="precio2">
                        <label class="form-check-label" for="precio2">$2000 - $3000</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="precio3" checked>
                        <label class="form-check-label" for="precio3">$3000 - $4000</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="precio4">
                        <label class="form-check-label" for="precio4">Más de $4000</label>
                    </div>
    
                    <h6 class="mt-3">N° de invitados</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invitados1">
                        <label class="form-check-label" for="invitados1">20 - 40</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invitados2">
                        <label class="form-check-label" for="invitados2">40 - 60</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invitados3" checked>
                        <label class="form-check-label" for="invitados3">60 - 80</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invitados4">
                        <label class="form-check-label" for="invitados4">Más de 80</label>
                    </div>
    
                    <h6 class="mt-3">Espacios</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="espacio1">
                        <label class="form-check-label" for="espacio1">Jardín</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="espacio2" checked>
                        <label class="form-check-label" for="espacio2">Alberca</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="espacio3">
                        <label class="form-check-label" for="espacio3">Terraza</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="espacio4">
                        <label class="form-check-label" for="espacio4">Pista de baile</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="display: flex; flex-direction:row; width: 100%; justify-content:space-around">
                        <button type="button" class="btn" data-bs-dismiss="modal">Quitar filtros</button>
                        <button type="button" class="btnFecha-movil" data-bs-dismiss="modal">Aplicar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>