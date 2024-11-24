<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /><!---importacion de font awsome para logos -->
    <link rel="stylesheet" href="styles.css">
    
    <link rel="stylesheet" href="stylesMedia.css">

</head>
<body class="inicio">
    <div class="contenedor-gen">
        <header class="header-gen">
            <a href="inicio.html"><img src="./imagenes/logo.png" alt="LOGO" class="logoHeader-gen"></a>
            <div class="derechaHeader-gen"> 
                <a href="login.html" class="btnAcceder-gen">Acceder  <span><i class="fa-regular fa-circle-user"></i></span></a>
                
                <div class="dropdown">
                    <button class="btn " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <a href="##" class="btnBarras-gen"><i class="fa-solid fa-bars"></i></a>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item active" href="misDatos.html">Mis datos</a></li>
                      <li><a class="dropdown-item" href="misReservas.html">Mis reservas</a></li>
                      <li><a class="dropdown-item" href="misFavoritos.html">Mis favoritos</a></li>
                    </ul>
                </div>
                

            </div>
        </header>

        <div class="panelCentral-gen">
            <div id="parteSuperior">
                <div id="contenedor-busqueda">
                    <div class="barraBusqueda">
                        <input type="text" placeholder="Buscar..." id="inputBusqueda">
                        <button type="submit" id="buscar">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    
                    <a href="##" id="calendario">
                        <label for="date-picker">
                            <span><i class="fas fa-calendar-days"></i></span>¿Cuándo?
                        </label>
                        <input type="date" id="date-picker" name="fecha">
                    </a>
                    
                    
                    <div class="divBtn-filtro">
                        <button type="button" id="filtro" data-bs-toggle="modal" data-bs-target="#filterModal">
                            <i class="fa-solid fa-sliders"></i>
                        </button>
                    </div>


                </div>
                <div id="contenedorSeleccion">
                    <a href="inicioFiltros.php" class="secciones">Populares<span><i class="fa-solid fa-star"></i></span></a>
                    <a href="inicioFiltros.php" class="secciones">Albercas <span><i class="fa-solid fa-water-ladder"></i></span></a>
                    <a href="inicioFiltros.php" class="secciones">Infantiles <span><i class="fa-solid fa-gopuram"></i></span></a>
                    <a href="inicioFiltros.php" class="secciones">Formales <span><i class="fa-solid fa-user-tie"></i></span></a>
                </div>
                
            
            </div>
            <div id="parteInferiorGrid-gen">
                <a href="local.php">
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p>Hasta 70 personas</p>
                        <p>Desde $3000</p>
                        <p><span><i class="fa-starIcon-card fa-solid fa-star "></i></span>4.2 (4)</p>
                    </article>
                </a>
                <a href="local.php">
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p>Hasta 70 personas</p>
                        <p>Desde $3000</p>
                        <p><span><i class="fa-starIcon-card fa-solid fa-star "></i></span>4.2 (4)</p>
                    </article>
                </a>
                <a href="local.php">
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p>Hasta 70 personas</p>
                        <p>Desde $3000</p>
                        <p><span><i class="fa-starIcon-card fa-solid fa-star "></i></span>4.2 (4)</p>
                    </article>
                </a>
                <a href="local.php">
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p>Hasta 70 personas</p>
                        <p>Desde $3000</p>
                        <p><span><i class="fa-starIcon-card fa-solid fa-star "></i></span>4.2 (4)</p>
                    </article>
                </a>
                <a href="local.php">
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p>Hasta 70 personas</p>
                        <p>Desde $3000</p>
                        <p><span><i class="fa-starIcon-card fa-solid fa-star "></i></span>4.2 (4)</p>
                    </article>
                </a>
                <a href="local.php">
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p>Hasta 70 personas</p>
                        <p>Desde $3000</p>
                        <p><span><i class="fa-starIcon-card fa-solid fa-star "></i></span>4.2 (4)</p>
                    </article>
                </a>
                <a href="local.php">
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p>Hasta 70 personas</p>
                        <p>Desde $3000</p>
                        <p><span><i class="fa-starIcon-card fa-solid fa-star "></i></span>4.2 (4)</p>
                    </article>
                </a>
                <a href="local.php">
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p>Hasta 70 personas</p>
                        <p>Desde $3000</p>
                        <p><span><i class="fa-starIcon-card fa-solid fa-star "></i></span>4.2 (4)</p>
                    </article>
                </a>
                <a href="local.php">
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p>Hasta 70 personas</p>
                        <p>Desde $3000</p>
                        <p><span><i class="fa-starIcon-card fa-solid fa-star "></i></span>4.2 (4)</p>
                    </article>
                </a>
                <a href="local.php">
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p>Hasta 70 personas</p>
                        <p>Desde $3000</p>
                        <p><span><i class="fa-starIcon-card fa-solid fa-star "></i></span>4.2 (4)</p>
                    </article>
                </a>
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