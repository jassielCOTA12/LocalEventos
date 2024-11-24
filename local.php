<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salón de eventos "La Roca"</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /><!---importacion de font awsome para logos -->
     
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="stylesMedia.css">
    
</head>
<body class="local">
    <div class="contenedor-gen">
        <header class="header-gen">
            <div>
                <a href="inicio.php"><img src="./imagenes/logo.png" alt="LOGO" class="logoHeader-gen"></a>
            </div>

            <div class="derechaHeader-gen"> 
                <a href="login.php" class="btnAcceder-gen">Acceder  <span><i class="fa-regular fa-circle-user"></i></span></a>
                
                <div class="dropdown">
                    <button class="btn " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <a href="##" class="btnBarras-gen"><i class="fa-solid fa-bars"></i></a>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item active" href="misDatos.php">Mis datos</a></li>
                      <li><a class="dropdown-item" href="misReservas.php">Mis reservas</a></li>
                      <li><a class="dropdown-item" href="misFavoritos.php">Mis favoritos</a></li>
                    </ul>
                </div> 
            </div>
        </header>

        <div id="contenedor-busqueda">
            <div class="barraBusqueda">
                <input type="text" placeholder="Buscar..." id="inputBusqueda">
                <button type="submit" id="buscar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div> 
        
        <div class="panelCentral-gen">
            <div class="panelSuperior">
                    <div class="panelSuperior-izq">
                        <div id="carouselExample" class="carousel carousel-dark slide">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="imagenes/ImgLocal3.png" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="imagenes/ImgLocal2.png" class="d-block w-100" alt="...">
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                              </button>
                            
                        </div>
    
                    </div>
                    <div class="panelSuperior-derecha">
                        <div class="panelSuperior-derecha-info">
                            <h1 class="salonNombre"><strong>Salón de Eventos "La Roca"</strong></h1>
                        <div class="local-info">
                            <img class="icon"  src="imagenes/ubicacionIcon.png" alt="Ubicacion-Icon" >
                            <a href="#mapa" class="direccion">Carranza e/ Allende y Juáres, La Paz, México</a>
                        </div>
                        <div class="local-info">
                            <img class="icon" src="imagenes/personasIcon.png" alt="Personas-Icon" >
                            <p class="capacidad">Hasta 70 personas</p>
                        </div>
                        <div class="local-info">
                            <img class="icon" src="imagenes/mensajeIcon.png" alt="mensaje-Icon" >
                            <img class="calificacion" src="imagenes/estrellas.png" alt="calificacion">
                            <a href="#op" class="opiniones">(4 opiniones)</a>
                        </div>
                        <div class="local-info">
                            <img class="icon" src="imagenes/precioIcon.png" alt="precio1-Icon" >
                            <p class="precioAprox">Desde $3,000.0</p>
                        </div>
                        <div class="botonesReservar-compartir-like">
                            <button class="btn-reservar" data-bs-toggle="modal" data-bs-target="#reservarModal">Reservar</button>
                            <button class="btn-compartir"><img src="imagenes/compartirIcon.png" alt="compartir"></button>
                            <button class="btn-like"><i class="fa-solid fa-heart"></i></button>
                        </div>
                        </div>
        
                    
                    </div>
            </div>
            <div class="panel-infoLocal">
                <h2><strong>¡Reserva tu fecha!</strong></h2>
                <div class="informacion">
                        <h3><strong>Información:</strong></h3>
                    <div class="info-container">
                        <div class="local-info">
                            <img class="icon" src="imagenes/albercaIcon.png" alt="AlbercaIcon">
                            <p>Alberca</p>
                        </div>
                        <div class="local-info">
                            <img class="icon" src="imagenes/mobiliarioIcon.png" alt="mobiliarioIcon">
                            <p>Mobiliario</p>
                        </div>
                        <div class="local-info">
                            <img class="icon" src="imagenes/estacionamientoIcon.png" alt="estacionamientoIcon">
                            <p>Estacionamiento</p>
                        </div>
                        <div class="local-info">
                            <img class="icon" src="imagenes/cocinaIcon.png" alt="cocinaIcon">
                            <p>Cocina</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-ubicacionLocal">
                <h3 id="mapa"><strong>Ubicación:</strong></h3>
                <div  class="contenedor-mapa">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14830.819116667762!2d-110.314637!3d24.101549!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjTCsDA2JzA1LjYiTiAxMTCCsDE4JzUzLjciVw!5e0!3m2!1ses!2smx!4v1615338507657!5m2!1ses!2smx"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
            </div>
            <div class="panel-horariosPrecios">
                <h3><strong>Horarios y precios:</strong></h3>
                <div class="dias">
                    <div class="precio-item">
                        <div class="icon-text">
                            <img class="iconPrecio" src="imagenes/precio2Icon.png" alt="PrecioIcon">
                            <div class="text">
                                <strong>Lunes - Jueves</strong>
                                <p>Horario: 2:00 pm - 8pm</p>
                            </div>
                        </div>
                        <div class="precio">$3000</div>
                    </div>
                    <div class="precio-item">
                        <div class="icon-text">
                            <img class="iconPrecio" src="imagenes/precio2Icon.png" alt="PrecioIcon">
                            <div class="text">
                                <strong>Viernes - Domingo</strong>
                                <p>Horario: 2:00 pm - 8pm</p>
                            </div>
                        </div>
                        <div class="precio">$4200</div>
                    </div>
                    <div class="precio-item">
                        <div class="icon-text">
                        <img class="iconPrecio" src="imagenes/precio2Icon.png" alt="PrecioIcon">
                            <div class="text">
                                <strong>Hora extra</strong>
                            </div>
                        </div>
                        <div class="precio">$500</div>
                    </div>
                </div>
            </div>
            <div class="panel-disponibilidad">
                <h3><strong>Disponibilidad:</strong></h3>
                <div class="calendario">
                    <img src="imagenes/Calendario.png" alt="calendario">
                    <img src="imagenes/Calendario.png" alt="calendario">
                </div>
            </div>
            <div class="panel-opiniones">
                <h3 id="op"><strong>Opiniones:</strong></h3>
                <div class="panel-opiniones-container">
                    <div class="estrellas">
                        <img src="imagenes/estrellas.png" alt="Calificacion">
                        <div class="info-opinion">
                            <p>Calidad de servicio</p>
                            <img src="imagenes/estrellas.png" alt="estrellas">
                        </div>
                        <div class="info-opinion">
                            <p >Resuestas</p>
                            <img src="imagenes/estrellas.png" alt="estrellas">
                        </div>
                        <div class="info-opinion">
                            <p>Profesionalidad</p>
                            <img src="imagenes/estrellas.png" alt="estrellas">
                        </div>
                        <div class="info-opinion">
                            <p >Calidad / Precio</p>
                            <img src="imagenes/estrellas.png" alt="estrellas">
                        </div>
                        <div class="btn-opinion">
                            <button class="btn-agregarComentario" data-bs-toggle="modal" data-bs-target="#opinionModal">Escribe una opinión</button>
                        </div>
                    </div>
                    
                    
                    <div class="cards-wrapper">
                        <div class="card">
                            <div class="card-body">
                                <div class="headerComments">
                                    <img src="imagenes/personaIcon.png" alt="">
                                    <h4>Anónime</h4>
                                </div>
                                <div class="center-Comments"><img src="imagenes/estrellas.png" alt="estrellas"></div>
                            <p class="card-text">SLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce blandit commodo nibh, et scelerisque purus sodales in. Mauris sit amet nunc sodales, accumsan erat a, ultricies turpis. .</p>
                            <p class="card-date">Enviado el 05/03/24</p>
                            </div>
                        </div>
                        <div class="card v2">
                            <div class="card-body">
                                <div class="headerComments">
                                    <img src="imagenes/personaIcon.png" alt="">
                                    <h4>Anónime</h4>
                                </div>
                                <div class="center-Comments"><img src="imagenes/estrellas.png" alt="estrellas"></div>
                            <p class="card-text">SLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce blandit commodo nibh, et scelerisque purus sodales in. Mauris sit amet nunc sodales, accumsan erat a, ultricies turpis. In hac habitasse platea dictumst. Duis at lectus non orci ornare tincidunt. Mauris venenatis justo et auctor vestibulum.</p>
                            <p class="card-date">Enviado el 05/03/24</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contacto">
                <h3><strong>Contacto:</strong></h3>
                <div class="infoContacto">
                    <div class="formato-info">
                        <img src="imagenes/llavesIcon.png" alt="llavesIcon">
                        <p>Dueño: Juan Gómez</p>
                    </div>
                    <div class="formato-info">
                        <img src="imagenes/telefonoICon.png" alt="telefonoICon">
                        <p>Telefono: 123 123 1234</p>
                    </div>
                </div>
            </div>

        </div>
            
    </div>
        
    <div class="btnSubir">
        <a href="#" title="Subir"><img class="subir-gen" src="imagenes/subir.png"></a>
    </div>      
    
    <!--Modal reservar en version normal-->
    <div class="modal fade" id="reservarModal" tabindex="-1" aria-labelledby="reservarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservarModalLabel"><strong>Reservación</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Salón de Eventos "La Roca"</h4>
                    
                    <form>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Nombre y apellido" required>
                        </div>
                        
                        <div class="row g-2 mb-3">
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Correo electrónico" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                    <input type="tel" class="form-control" placeholder="Teléfono" required>
                                </div>
                            </div>
                        </div>

                        <label>Fecha del evento:</label>
                        <div class="row g-2 mb-3">
                            <div class="col">
                                <select class="form-select" required>
                                    <option selected>Día</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" required>
                                    <option selected>Mes</option>
                                    <option value="">Enero</option>
                                    <option value="">Febrero</option>
                                    <option value="">Marzo</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" required>
                                    <option selected>Año</option>
                                    <option value="">2024</option>
                                    <option value="">2025</option>
                                    <option value="">2026</option>
                                </select>
                            </div>
                        </div>

                        <label>Número de invitados:</label>
                        <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" name="invitados" id="invitados1" value="0-30">
                            <label class="form-check-label" for="invitados1">0 - 30 personas</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" name="invitados" id="invitados2" value="30-50">
                            <label class="form-check-label" for="invitados2">30 - 50 personas</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" name="invitados" id="invitados3" value="50-70">
                            <label class="form-check-label" for="invitados3">50 - 70 personas</label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="extraInfo">Información extra:</label>
                            <textarea class="form-control" id="extraInfo" rows="3" placeholder="Buen día, estoy interesado en un lugar para celebrar un cumpleaños infantil."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-continuar" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Continuar</button>
                    <p class="text-center text-muted mt-2">Salón de Eventos "La Roca" se pondrá en contacto contigo lo más pronto posible.</p>
                </div>

            </div>
        </div>
    </div>
     <!--Modal pagar en version normal-->
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2"><Strong>Solicitud de pagos</Strong></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Salón de Eventos "La Roca"</h4>
    
                    <form>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                            <input type="text" class="form-control" placeholder="07 de enero de 2024" readonly>
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-credit-card"></i></span>
                            <input type="text" class="form-control" placeholder="Tarjeta de crédito o débito" readonly>
                        </div>
    
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Sabrina Scratch" required>
                        </div>
    
                        <div class="row g-2 mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="0000 0000 0000 0000" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="MM / AA" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="000" required>
                            </div>
                        </div>
    
                        <div class="form-text mt-2">
                            <strong>Política de cancelación:</strong>
                            <p>• Esta reservación no es reembolsable.</p>
                            <p>• Respete las reglas del establecimiento.</p>
                        </div>
    
                        <div class="form-text mt-2">
                            <strong>Detalles de precio:</strong>
                            <p>Total (MXN): <strong>$3200.00</strong></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-aceptar" data-bs-dismiss="modal">Pagar</button>
                    <p class="text-center text-muted mt-2">Al seleccionar el botón, acepta los términos de la reservación.</p>
                </div>
            </div>
          </div>
        </div>
     <!--Modal escribir opinion en version normal-->
        <div class="modal fade" id="opinionModal" tabindex="-1" aria-labelledby="opinionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="opinionModalLabel"><strong>¡Tu opinión vale mucho!</strong></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Evalúa este servicio de acuerdo con:</p>
                        <h4>Salon de Eventos "La Roca"</h4>
                        
                        <div class="rating-section">
                            <div class="rating-item">
                                <label>Calidad de servicio</label>
                                <div class="stars">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                            <div class="rating-item">
                                <label>Respuesta</label>
                                <div class="stars">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                            <div class="rating-item">
                                <label>Profesionalidad</label>
                                <div class="stars">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                            <div class="rating-item">
                                <label>Calidad / Precio</label>
                                <div class="stars">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="experience">Describe tu experiencia:</label>
                            <textarea class="form-control" id="experience" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-aceptar" data-bs-dismiss="modal">Aceptar</button>
                        <p class="text-muted">Información anónima</p>
                    </div>
                </div>
            </div>
        </div>    

    <div class="versionMovil-local">
        <div class="panelBtn-movil">
            <button class="btnSuperior-movil"><a href="inicio.php"><</a></button>
            <div>
                <button class="btnSuperior-movil"><i class="fa-duotone fa-solid fa-share-nodes"></i></button>
            <button class="btnSuperior-movil"><i class="fa-solid fa-heart"></i></button>
            </div>
        </div>
        <div class="panelGeneral-movil">
            <div id="carouselMovil" class="carousel carousel-dark slide">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="imagenes/ImgLocal3.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="imagenes/ImgLocal2.png" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselMovil" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselMovil" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                
            </div>

            <div class="panelInfo-movil">
                <h2>Salón de Eventos "La Roca"</h2>
                <div class="info-opiniones">
                    <img class="calificacion" src="imagenes/estrellas.png" alt="calificacion">
                    <a href="#" class="">(4 opiniones)</a>  
                </div>
                <div class="detalles-movil">
                    <h3>Lo que ofrece este lugar</h3>
                    <div class="local-info">
                        <img class="icon" src="imagenes/albercaIcon.png" alt="AlbercaIcon">
                        <p>Alberca</p>
                    </div>
                    <div class="local-info">
                        <img class="icon" src="imagenes/mobiliarioIcon.png" alt="mobiliarioIcon">
                        <p>Mobiliario</p>
                    </div>
                    <div class="local-info">
                        <img class="icon" src="imagenes/estacionamientoIcon.png" alt="estacionamientoIcon">
                        <p>Estacionamiento</p>
                    </div>
                    <div class="local-info">
                        <img class="icon" src="imagenes/cocinaIcon.png" alt="cocinaIcon">
                        <p>Cocina</p>
                    </div>
                </div>
                <div class="ubicacion-movil">
                    <h3>Ubicación del local</h3>
                    <div class="local-info">
                        <img class="icon"  src="imagenes/ubicacionIcon.png" alt="Ubicacion-Icon" >
                        <a href="#" class="">Carranza e/ Allende y Juárez, La Paz, Mexico.</a>  
                    </div>
                    <div  class="contenedor-mapa-movil">
                        <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14830.819116667762!2d-110.314637!3d24.101549!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjTCsDA2JzA1LjYiTiAxMTCCsDE4JzUzLjciVw!5e0!3m2!1ses!2smx!4v1615338507657!5m2!1ses!2smx"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>
                </div>
                <div class="horariosPrecios-movil">
                    <h3>Horarios y precios</h3>
                    <div class="dias">
                        <div class="precio-item">
                            <div class="icon-text">
                                <img class="iconPrecio" src="imagenes/precio2Icon.png" alt="PrecioIcon">
                                <div class="text">
                                    <strong>Lunes - Jueves</strong>
                                    <p>Horario: 2:00 pm - 8pm</p>
                                </div>
                            </div>
                            <div class="precio">$3000</div>
                        </div>
                        <div class="precio-item">
                            <div class="icon-text">
                                <img class="iconPrecio" src="imagenes/precio2Icon.png" alt="PrecioIcon">
                                <div class="text">
                                    <strong>Viernes - Domingo</strong>
                                    <p>Horario: 2:00 pm - 8pm</p>
                                </div>
                            </div>
                            <div class="precio">$4200</div>
                        </div>
                        <div class="precio-item">
                            <div class="icon-text">
                            <img class="iconPrecio" src="imagenes/precio2Icon.png" alt="PrecioIcon">
                                <div class="text">
                                    <strong>Hora extra</strong>
                                </div>
                            </div>
                            <div class="precio">$500</div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="disponibilidad-movil">
                    <div class="accordion-item" >
                        <h2 class="accordion-header" >
                          <button class="accordion-button collapsed btnFechaFlex-movil" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" >
                            <strong>Disponibilidad </strong><p>Seleccione una fecha</p>
                          </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse colapso-movil" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                                <div class="divbtnFecha-movil">
                                    <img src="imagenes/Calendario.png" alt="calendario">
                                    <button class="btnFecha-movil" data-bs-toggle="collapse" data-bs-target="#collapseOne" >Seleccionar fecha</button>
                                </div>
                          </div>
                        </div>
                      </div>
                </div>
                <hr>
                <div class="opiniones-movil">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="padding-bottom: 10px;">
                            <strong>★ 4.2 - 7 opiniones</strong></p>
                          </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <div class="estrellas">
                                <img src="imagenes/estrellas.png" alt="Calificacion">
                                <div class="info-opinion">
                                    <p>Calidad de servicio</p>
                                    <img src="imagenes/estrellas.png" alt="estrellas">
                                </div>
                                <div class="info-opinion">
                                    <p >Resuestas</p>
                                    <img src="imagenes/estrellas.png" alt="estrellas">
                                </div>
                                <div class="info-opinion">
                                    <p>Profesionalidad</p>
                                    <img src="imagenes/estrellas.png" alt="estrellas">
                                </div>
                                <div class="info-opinion">
                                    <p >Calidad / Precio</p>
                                    <img src="imagenes/estrellas.png" alt="estrellas">
                                </div>
                                <div class="btn-opinion"  style="margin: 
                        20px 0";>
                                   <button type="button" class="btn btn-agregarComentario" data-bs-toggle="modal" data-bs-target="#opinionModalMovil">
                                    Escribe una opinión
                                </button>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div style="width: 100%; display:flex; justify-content:center">
                            <div class="card-movil">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="headerComments">
                                            <img src="imagenes/personaIcon.png" alt="">
                                            <h4>Anónime</h4>
                                        </div>
                                        <div class="center-Comments"><img class="calificacion" src="imagenes/estrellas.png" alt="calificacion">
                                        </div>
                                    <p class="card-text">SLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce blandit commodo nibh, et scelerisque purus sodales in. Mauris sit amet nunc sodales, accumsan erat a, ultricies turpis. .</p>
                                    <p class="card-date">Enviado el 05/03/24</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
                <hr>
                <div class="contacto-movil">
                    <h3>Contacto:</h3>
                <div class="infoContacto">
                    <div class="local-info">
                        <img src="imagenes/llavesIcon.png" alt="llavesIcon" class="icon">
                        <p>Dueño: Juan Gómez</p>
                    </div>
                    <div class="local-info">
                        <img src="imagenes/telefonoICon.png" alt="telefonoICon" class="icon">
                        <p>Telefono: 123 123 1234</p>
                    </div>
                </div>
                <br><br><br>
                </div>

                
            </div> 
        </div>
            <!--Btn Modal Reservar -->
        <div class="divBtn-movil">
        <button type="button" class="btn btn-primary btnReservar-movil" data-bs-toggle="modal" data-bs-target="#reservationModal">
            Reservar
        </button>
    </div>
    </div>
   
<!-- Modal de Opinión -->
<div class="modal fade" id="opinionModalMovil" tabindex="-1" aria-labelledby="opinionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" style="min-width: 420px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="opinionModalLabel">¡Tu opinión vale mucho!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Evalúa este servicio de acuerdo con:</p>
                <h6>Salon de Eventos "La Roca"</h6>

                <!-- Calificación con estrellas -->
                <form>
                    <div class="mb-3">
                        <label class="form-label">Calidad de servicio</label>
                        <div class="star-rating" data-rating="0">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Respuesta</label>
                        <div class="star-rating" data-rating="0">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Profesionalidad</label>
                        <div class="star-rating" data-rating="0">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calidad / Precio</label>
                        <div class="star-rating" data-rating="0">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>

                    <!-- Campo de texto para la experiencia -->
                    <div class="mb-3">
                        <label class="form-label">Describe tu experiencia:</label>
                        <textarea class="form-control" rows="3" placeholder="Escribe aquí tu opinión"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Enviar opinión</button>
                    <p class="text-center small mt-2">Información anónima</p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal reservar movil -->
    <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" style="min-width: 420px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservationModalLabel">Reservación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Salon de Eventos "La Roca"</p>
                    <form>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-person-fill"></i> Nombre y apellido</label>
                            <input type="text" class="form-control" placeholder="Nombre y apellido">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-envelope-fill"></i> Correo electrónico</label>
                            <input type="email" class="form-control" placeholder="Correo electrónico">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-telephone-fill"></i> Teléfono</label>
                            <input type="tel" class="form-control" placeholder="Teléfono">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha del evento:</label>
                            <div class="row">
                                <div class="col">
                                    <select class="form-select">
                                        <option>Día</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select">
                                        <option>Mes</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select">
                                        <option>Año</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Número de invitados:</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="invitados" id="invitados1" value="10-30">
                                    <label class="form-check-label" for="invitados1">10-30</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="invitados" id="invitados2" value="30-50">
                                    <label class="form-check-label" for="invitados2">30-50</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="invitados" id="invitados3" value="50-70">
                                    <label class="form-check-label" for="invitados3">50-70</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Información extra:</label>
                            <textarea class="form-control" rows="3" placeholder="Buen día, estoy interesado en un lugar para celebrar un cumpleaños infantil."></textarea>
                        </div>
                        <button type="button" class="btn btn-continuar w-100" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#paymentModal">Continuar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <small>Salón de Eventos "La Roca" se pondrá en contacto contigo lo más pronto posible.</small>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" style="min-width: 420px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Solicitud de pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Salon de Eventos "La Roca"</p>
                    <!-- Formulario de Pago -->
                    <form>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-calendar-date-fill"></i> Fecha</label>
                            <input type="text" class="form-control" placeholder="07 de enero de 2024" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pagar con</label>
                            <select class="form-select">
                                <option>Tarjeta de crédito o débito</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre del titular</label>
                            <input type="text" class="form-control" placeholder="Nombre y apellido">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">N° de tarjeta</label>
                            <input type="text" class="form-control" placeholder="0000 0000 0000 0000">
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Caducidad</label>
                                <input type="text" class="form-control" placeholder="MM / AA">
                            </div>
                            <div class="col">
                                <label class="form-label">CVV</label>
                                <input type="text" class="form-control" placeholder="000">
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="small">Política de cancelación:</p>
                            <ul class="small">
                                <li>Esta reservación no es reembolsable.</li>
                                <li>Respete las reglas del establecimiento.</li>
                            </ul>
                            <p class="small">Detalles de precio:</p>
                            <p class="small">Total (MXN): <strong>$3200.00</strong></p>
                        </div>
                        <button type="submit" class="btn btn-continuar w-100">Pagar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <small>Al seleccionar el botón, acepta los <strong>términos de la reservación</strong> .</small>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>