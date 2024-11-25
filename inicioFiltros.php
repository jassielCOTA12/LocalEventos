<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Filtros</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="stylesMedia.css">
</head>
<body class="inicio inicioFiltros">
    
        <?php
        include "header.php";
        ?>

        <div class="panelCentral-gen">
            <div id="parteSuperior">
            <?php
            include "parteSuperior.php";
            ?>
            </div>

            
            <div class="contenedor-filtroLocal">
                <div class="filtros">
                    <h3>Precio</h3>
                            <div class="categorias-filtro">
                                <input type="checkbox" name="precio" value="menos2000"><label>Menos de $2000</label><br>
                                <input type="checkbox" name="precio" value="2000-3000"><label>$2000 - $3000</label><br>
                                <input type="checkbox" name="precio" value="3000-4000"><label>$3000 - $4000</label><br>
                                <input type="checkbox" name="precio" value="mas4000"><label>Más de $4000</label><br>
                            </div>
                            <h3>N° de invitados</h3>
                            <div class="categorias-filtro">
                                <input type="checkbox" name="invitados" value="20-40"><label>20 - 40</label><br>
                                <input type="checkbox" name="invitados" value="40-60"><label>40 - 60</label><br>
                                <input type="checkbox" name="invitados" value="60-80"><label>60 - 80</label><br>
                                <input type="checkbox" name="invitados" value="mas80"><label>Más de 80</label><br>
                            </div>
                            <h3>Espacios</h3>
                            <div class="categorias-filtro">
                                <input type="checkbox" name="espacios" value="jardin"><label>Jardín</label><br>
                                <input type="checkbox" name="espacios" value="alberca"><label>Alberca</label><br>
                                <input type="checkbox" name="espacios" value="terraza"><label>Terraza</label><br>
                                <input type="checkbox" name="espacios" value="pistaBaile"><label>Pista de baile</label><br>
                            </div>
                </div>
                <div class="locales">
                    <a href="local.php">
                        <div class="resultado">
                            <img src="imagenes/ImgLocal1.png" alt="Salón de Eventos Real" class="imagen-resultado">
                            <div class="detalle-resultado">
                                <h3>Salón de Eventos "Real"</h3>
                                <p>Salón "Real" te ofrece un espacio ideal para tus eventos, ven a disfrutar de una gran alberca y diviértete un rato.</p>
                                <p>Desde $5000 por 8 horas.</p>
                                <p>⭐ 4.2 (4)</p>
                            </div>
                        </div>
                    </a>
                    <a href="local.php">
                        <div class="resultado">
                            <img src="imagenes/ImgLocal1.png" alt="Salón de Eventos Real" class="imagen-resultado">
                            <div class="detalle-resultado">
                                <h3>Salón de Eventos "Real"</h3>
                                <p>Salón "Real" te ofrece un espacio ideal para tus eventos, ven a disfrutar de una gran alberca y diviértete un rato.</p>
                                <p>Desde $5000 por 8 horas.</p>
                                <p>⭐ 4.2 (4)</p>
                            </div>
                        </div>
                    </a><a href="local.php">
                        <div class="resultado">
                            <img src="imagenes/ImgLocal1.png" alt="Salón de Eventos Real" class="imagen-resultado">
                            <div class="detalle-resultado">
                                <h3>Salón de Eventos "Real"</h3>
                                <p>Salón "Real" te ofrece un espacio ideal para tus eventos, ven a disfrutar de una gran alberca y diviértete un rato.</p>
                                <p>Desde $5000 por 8 horas.</p>
                                <p>⭐ 4.2 (4)</p>
                            </div>
                        </div>
                    </a><a href="local.php">
                        <div class="resultado">
                            <img src="imagenes/ImgLocal1.png" alt="Salón de Eventos Real" class="imagen-resultado">
                            <div class="detalle-resultado">
                                <h3>Salón de Eventos "Real"</h3>
                                <p>Salón "Real" te ofrece un espacio ideal para tus eventos, ven a disfrutar de una gran alberca y diviértete un rato.</p>
                                <p>Desde $5000 por 8 horas.</p>
                                <p>⭐ 4.2 (4)</p>
                            </div>
                        </div>
                    </a><a href="local.php">
                        <div class="resultado">
                            <img src="imagenes/ImgLocal1.png" alt="Salón de Eventos Real" class="imagen-resultado">
                            <div class="detalle-resultado">
                                <h3>Salón de Eventos "Real"</h3>
                                <p>Salón "Real" te ofrece un espacio ideal para tus eventos, ven a disfrutar de una gran alberca y diviértete un rato.</p>
                                <p>Desde $5000 por 8 horas.</p>
                                <p>⭐ 4.2 (4)</p>
                            </div>
                        </div>
                    </a>
            </div>
            
        </div>

        <div class="btnSubir">
            <a href="#" title="Subir"><img class="subir-gen" src="imagenes/subir.png" alt="Subir"></a>
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
