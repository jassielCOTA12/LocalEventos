<?php
include "configuracion/infoLocal.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalMatch</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /><!---importacion de font awsome para logos -->
     
    <link rel="icon"  type="image/png" href="./imagenes/logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/stylesMedia.css">
    
</head>
<body class="local">
    <div class="contenedor-gen">

        <?php
        include "include/header.php";
        ?>
        
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
                            <h1 class="salonNombre"><strong><?php echo htmlspecialchars($local['nombre']); ?></strong></h1>
                            <div class="local-info">
                                <img class="icon" src="imagenes/ubicacionIcon.png" alt="Ubicación Icon">
                                <a href="#mapa" class="direccion"><?php echo htmlspecialchars($local['ubicación']); ?></a>
                            </div>
                            <div class="local-info">
                                <img class="icon" src="imagenes/personasIcon.png" alt="Personas Icon">
                                <p class="capacidad">Hasta <?php echo htmlspecialchars($local['capacidad_maxima']); ?> personas</p>
                            </div>
                            <div class="local-info">
                                <img class="icon" src="imagenes/mensajeIcon.png" alt="Mensaje Icon">  
                                <?php include 'include/estrellas.php';
                                $estrellas = new Estrellas($promedioCalificacion);
                                $estrellas->imprimirEstrellas(); ?>
                                <a href="#op" class="opiniones">(<?php echo $num_opiniones; ?> opiniones)</a>
                            </div>

                            <div class="local-info">
                                <img class="icon" src="imagenes/precioIcon.png" alt="Precio Icon">
                                <p class="precioAprox">Desde $<?php echo number_format($local['precio_base'], 2); ?></p>
                            </div>
                            <div class="botonesReservar-compartir-like">
                                <button class="btn-reservar" data-bs-toggle="modal" data-bs-target="#reservarModal">Reservar</button>
                                <?php if (isset($_SESSION['id_cliente']) && !empty($_SESSION['id_cliente'])): ?>
                                <button class="btn-like" id="btn-favorito" data-id-local="<?php echo $local['id_local']; ?>" data-id-cliente="<?php echo $_SESSION['id_cliente']; ?>">
                                    <i class="fa-solid fa-heart <?php echo $isFavorito ? 'text-danger' : ''; ?>" id="icono-favorito"></i>
                                </button>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="panel-infoLocal">
                <h2><strong>¡Reserva tu fecha!</strong></h2>
                <div class="informacion">
                    <h3><strong>Información:</strong></h3>
                    <div class="info-container">
                        <?php foreach ($amenidades as $amenidad): ?>
                            <?php if (isset($imagenesAmenidades[$amenidad['nombre']])): ?>
                                <div class="local-info">
                                    <img class="icon" src="imagenes/<?php echo $imagenesAmenidades[$amenidad['nombre']]; ?>" alt="<?php echo $amenidad['nombre']; ?> Icon">
                                    <p><?php echo htmlspecialchars($amenidad['nombre']); ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
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
                    <?php if (!empty($horarios)): ?>
                        <?php foreach ($horarios as $horario): ?>
                            <div class="precio-item">
                                <div class="icon-text">
                                    <img class="iconPrecio" src="imagenes/precio2Icon.png" alt="PrecioIcon">
                                    <div class="text">
                                        <strong><?php echo htmlspecialchars($horario['dia_inicio']) . " - " . htmlspecialchars($horario['dia_fin']); ?></strong>
                                        <p>Horario: <?php echo date("g:i A", strtotime($horario['hora_inicio'])) . " - " . date("g:i A", strtotime($horario['hora_fin'])); ?></p>
                                    </div>
                                </div>
                                <div class="precio">$<?php echo number_format($horario['precio'], 2); ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay horarios disponibles para este local.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="panel-disponibilidad">
            <h3><strong>Disponibilidad:</strong></h3>
            <div class="calendario">
                <label for="fechaLocal">Fecha:</label>
                <div style="display:flex; flex-direction:row; align-items:center; column-gap:25px">

                    <input type="date" id="fechaLocal" class="form-control" style="width:30%"  data-id-local="<?php echo $local['id_local']; ?>"/>

                    <button type="button" id="guardarDisponibilidad" class="btn btn-primary" disabled>Guardar</button>
                    <label id="estadoDisponibilidad" style="font-weight: bold; color: green;"></label>
                </div>
            </div>
        </div>
            <div class="panel-opiniones">
                <h3 id="op"><strong>Opiniones:</strong></h3>
                <div class="panel-opiniones-container">
                    <div class="estrellas">
                        <div>
                        <?php
                                $estrellas2 = new Estrellas($promedioCalificacion);
                                $estrellas2->imprimirEstrellas(); ?>
                        </div>
                        <hr>
                        <div class="info-opinion">
                            <p>Calidad de servicio</p>
                            <div class="comboEstrellas">
                                <?php
                                $estrellas3 = new Estrellas($promedioCalidadServicio);
                                $estrellas3->imprimirEstrellas(); ?>
                            </div>
                        </div>
                        <div class="info-opinion">
                            <p >Resuestas</p>

                            <div class="comboEstrellas" style="font-size:10px">
                                <?php
                                $estrellas2 = new Estrellas($promedioRespuesta);
                                $estrellas2->imprimirEstrellas(); ?>
                            </div>
                        </div >
                        <div class="info-opinion">
                            <p>Profesionalidad</p>
                            <div class="comboEstrellas">
                                <?php
                                $estrellas2 = new Estrellas($promedioProfesionalidad);
                                $estrellas2->imprimirEstrellas(); ?>
                            </div>
                        </div>
                        <div class="info-opinion">
                            <p >Calidad / Precio</p>
                            <div class="comboEstrellas">
                                <?php
                                $estrellas2 = new Estrellas($promedioCalidadPrecio);
                                $estrellas2->imprimirEstrellas(); ?>
                            </div>
                        </div>
                        <div class="btn-opinion">
                            <button class="btn-agregarComentario" data-bs-toggle="modal" data-bs-target="#opinionModal">Escribe una opinión</button>
                        </div>
                    </div>
                    
                    
                    <div class="cards-wrapper">
                    <?php
                            foreach ($opiniones as $opinion) {
                                // Imprimir la estructura de la tarjeta con los datos de la opinión
                                echo '<div class="card">
                                        <div class="card-body">
                                            <div class="headerComments">
                                                <img src="imagenes/personaIcon.png" alt="">
                                                <h4>Anónimo</h4></div> <br>';
                                                $estrellas2 = new Estrellas($opinion['calidad_servicio']);
                                                $estrellas2->imprimirEstrellas();
                                            echo '
                                            <div class="center-Comments">
                                                <!-- Aquí ya no se incluyen las estrellas -->
                                            </div>
                                            <p class="card-text">' . htmlspecialchars($opinion['comentario']) . '</p>
                                            <p class="card-date">Enviado el ' . htmlspecialchars($opinion['fecha']) . '</p>
                                        </div>
                                    </div>';
                            }
                            ?>
                    </div>
                </div>
            </div>
            <div class="contacto">
                <h3><strong>Contacto:</strong></h3>
                <div class="infoContacto">
                    <div class="formato-info">
                        <img src="imagenes/llavesIcon.png" alt="llavesIcon">
                        <?php echo "<p>Dueño: {$propietario['nombre']}</p>"; ?>
                    </div>
                    <div class="formato-info">
                        <img src="imagenes/telefonoICon.png" alt="telefonoICon">
                        <?php echo "<p>Telefono: {$propietario['telefono']}"; ?></p>
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
                    <?php echo '<h4 class="text-center">' . $local['nombre'] . '</h4>';?>
                    <form>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Nombre y apellido" required
                            value="<?php echo isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre'], ENT_QUOTES, 'UTF-8') : ''; ?>" >
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Correo electrónico" required
                                    value="<?php echo isset($_SESSION['correo']) ? htmlspecialchars($_SESSION['correo'], ENT_QUOTES, 'UTF-8') : ''; ?>" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                    <input type="tel" class="form-control" placeholder="Teléfono" required
                                    value="<?php echo isset($_SESSION['telefono']) ? htmlspecialchars($_SESSION['telefono'], ENT_QUOTES, 'UTF-8') : ''; ?>" >
                                </div>
                            </div>
                        </div>
                        <label>Fecha del evento:</label>
                        <input type="date" id="fecha1" class="form-control">
                         <br>
                        <label>Número de invitados:</label><br>
                        <input type="number" id="invitados" class="form-control" min="20" max="<?php echo htmlspecialchars($local['capacidad_maxima'], ENT_QUOTES, 'UTF-8'); ?>" 
                        placeholder="Máximo <?php echo htmlspecialchars($local['capacidad_maxima'], ENT_QUOTES, 'UTF-8'); ?> invitados" required>
                        <small id="error-invitados" class="text-danger"></small>
                        <div>
                        <label>Horario:</label>
                        <p class="horario"></p>
                        </div>
                        <div class="form-group mt-3">
                            <label for="extraInfo">Información extra:</label>
                            <textarea class="form-control" id="extraInfo" rows="3" placeholder="Buen día, estoy interesado en un lugar para celebrar un cumpleaños infantil."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-continuar" data-bs-target="#modalPagar" data-bs-toggle="modal">Continuar</button>
                    <?php
                    echo '<p class="text-center text-muted mt-2"> ' . $local['nombre'] .  ' se pondrá en contacto contigo lo más pronto posible.</p>';
                    ?>
                </div>

            </div>
        </div>
    </div>
     <!--Modal pagar en version normal-->
    <div class="modal fade" id="modalPagar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2"><Strong>Solicitud de pagos</Strong></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo '<h4 class="text-center">' . $local['nombre'] . '</h4>';?>
                    <form>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                            <input type="text" class="form-control" placeholder="07 de enero de 2024" readonly>
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-credit-card"></i></span>
                            <input type="text" class="form-control" value="Tarjeta de crédito o débito" readonly>
                        </div>
    
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" id="nombreTitular" class="form-control" placeholder="Nombre del titular" required>
                            <small id="error-nombre" class="text-danger"></small>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col">
                                <input type="text" id="numeroTarjeta" class="form-control" placeholder="0000 0000 0000 0000" maxlength="19" required>
                                <small id="error-tarjeta" class="text-danger"></small>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="MM/AA" id="fechaExpiracion" maxlenght="7" required>
                                <small id="error-fecha" class="text-danger"></small>
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" placeholder="000" required maxlenght="3" id="cvv">
                                <small id="error-cvv" class="text-danger"></small>
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
                            <?php echo '<p>Total (MXN): <strong>$' . $local['precio_total'] . '</strong></p>';?>
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

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script src="script/scriptLocal.js"></script>
    <script src="script/scriptDisponibilidadLocal.js"></script>
    <?php include "localMovil.php"; ?>
    
    
</body>
</html>