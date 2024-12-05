
    <div class="versionMovil-local">
        <div class="panelBtn-movil">
            <button class="btnSuperior-movil"><a href="inicio.php"><</a></button>
        <div>
                
        <?php if (isset($_SESSION['id_cliente']) && !empty($_SESSION['id_cliente'])): ?>
                <button class="btnSuperior-movil" id="btn-favorito-movil" data-id-local="<?php echo $local['id_local']; ?>" data-id-cliente="<?php echo $_SESSION['id_cliente']; ?>">
                    <i class="fa-solid fa-heart <?php echo $isFavorito ? 'text-danger' : ''; ?>" id="icono-favorito-movil"></i>
                </button>
            <?php endif; ?>

            
            </div>
    </div>
        <div class="panelGeneral-movil">
            <div id="carouselMovil" class="carousel carousel-dark slide">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?php echo $imagen1; ?>" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo $imagen2; ?>" class="d-block w-100" alt="...">
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
                <h2><?php echo htmlspecialchars($local['nombre']); ?></h2>
                <div class="info-opiniones">
                    <?php
                                $estrellas = new Estrellas($promedioCalificacion);
                                $estrellas->imprimirEstrellas(); ?>
                    <a href="#op" class="opiniones">(<?php echo $num_opiniones; ?> opiniones)</a>
                </div>
                <div class="detalles-movil">
                    <h3>Lo que ofrece este lugar</h3>
                    <?php foreach ($amenidades as $amenidad): ?>
                        <?php if (isset($imagenesAmenidades[$amenidad['nombre']])): ?>
                            <div class="local-info">
                                <img class="icon" src="imagenes/<?php echo $imagenesAmenidades[$amenidad['nombre']]; ?>" alt="<?php echo $amenidad['nombre']; ?> Icon">
                                <p><?php echo htmlspecialchars($amenidad['nombre']); ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                   
                </div>
                <div class="ubicacion-movil">
                    <h3>Ubicación del local</h3>
                    <div class="local-info">
                                <img class="icon" src="imagenes/ubicacionIcon.png" alt="Ubicación Icon">
                                <a href="#mapa" class="direccion"><?php echo htmlspecialchars($local['ubicación']); ?></a>
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
                <hr>
                <div class="disponibilidad-movil">
                    <div class="accordion-item" >
                        <h2 class="accordion-header" >
                          <button class="accordion-button collapsed btnFechaFlex-movil" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" >
                            <strong>Disponibilidad </strong><p>Sseleccione una fecha</p>
                          </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse colapso-movil" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                                <div class="divbtnFecha-movil" style="">
                                <label for="fecha">Fecha:</label>
                                <input type="date" id="fecha" class="form-control">
                                <label for="fecha">Disponible</label>
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
                            <strong>★ <?php echo $num_opiniones; ?>  opiniones</strong></p>
                          </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <div class="estrellas">
                            <div>
                        <?php
                                $estrellas2 = new Estrellas($promedioCalificacion);
                                $estrellas2->imprimirEstrellas(); ?>
                        </div>
                                <div class="info-opinion">
                                    <p>Calidad de servicio</p>
                                    <div>
                        <?php
                                $estrellas2 = new Estrellas($promedioCalidadServicio);
                                $estrellas2->imprimirEstrellas(); ?>
                        </div>
                                </div>
                                <div class="info-opinion">
                                    <p >Resuestas</p>
                                    <div>
                        <?php
                                $estrellas2 = new Estrellas($promedioRespuesta);
                                $estrellas2->imprimirEstrellas(); ?>
                        </div>
                                </div>
                                <div class="info-opinion">
                                    <p>Profesionalidad</p>
                                    <div>
                        <?php
                                $estrellas2 = new Estrellas($promedioProfesionalidad);
                                $estrellas2->imprimirEstrellas(); ?>
                        </div>
                                </div>
                                <div class="info-opinion">
                                    <p >Calidad / Precio</p>
                                    <div>
                        <?php
                                $estrellas2 = new Estrellas($promedioCalidadPrecio);
                                $estrellas2->imprimirEstrellas(); ?>
                        </div>
                                </div>
                                <div class="btn-opinion"  style="margin: 
                        20px 0";>
                                   <button type="button" class="btn btn-agregarComentario" data-bs-toggle="modal" data-bs-target="#opinionModal">
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
                                        <div class="center-Comments">
                                            <?php 
                                            $estrellas2 = new Estrellas($promedioCalidadServicio);
                                            $estrellas2->imprimirEstrellas();
                                                ?>
                                        </div>
                                        <?php  echo '
                                        <p class="card-text">' . htmlspecialchars($opinion['comentario']) . '</p>
                                        <p class="card-date">Enviado el ' . htmlspecialchars($opinion['fecha']) . '</p>';
                                        ?>
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
                        <?php echo "<p>Dueño: {$propietario['nombre']}</p>"; ?>
                    </div>
                    <div class="local-info">
                        <img src="imagenes/telefonoICon.png" alt="telefonoICon" class="icon">
                        <?php echo "<p>Telefono: {$propietario['telefono']}"; ?></p>
                    </div>
                </div>
                <br><br><br>
                </div>

                
            </div> 
        </div>
            <!--Btn Modal Reservar -->
        <div class="divBtn-movil">
            
            <?php
            if (!isset($_SESSION['id_cliente']) || empty($_SESSION['id_cliente'])) {
                // Guardar la URL actual para redirigir después del login
                $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
                echo '<button class="btn btn-primary btnReservar-movil" onclick="redirigirALogin()">Reservar</button>';
            } else {
                echo '<button class="btn btn-primary btnReservar-movil" data-bs-toggle="modal" data-bs-target="#reservarModal">Reservar</button>';
            }
            ?>
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
    <div class="modal fade" id="reservarModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" style="min-width: 420px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservationModalLabel">Reservación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                <?php echo '<h4 class="text-center">' . $local['nombre'] . '</h4>';?>
                    <form>
                        <div class="mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Nombre y apellido" required
                            value="<?php echo isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre'], ENT_QUOTES, 'UTF-8') : ''; ?>" >
                        </div>  
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="Correo electrónico" required
                                value="<?php echo isset($_SESSION['correo']) ? htmlspecialchars($_SESSION['correo'], ENT_QUOTES, 'UTF-8') : ''; ?>" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                <input type="tel" class="form-control" placeholder="Teléfono" required
                                value="<?php echo isset($_SESSION['telefono']) ? htmlspecialchars($_SESSION['telefono'], ENT_QUOTES, 'UTF-8') : ''; ?>" >
                            </div>
                        </div>
                        <label>Fecha del evento:</label>
                        <input type="date" id="fecha1" class="form-control">
                         <br>
                        <div>
                        <label>Número de invitados:</label><br>
                        <input type="number" id="invitados" class="form-control" min="20" max="<?php echo htmlspecialchars($local['capacidad_maxima'], ENT_QUOTES, 'UTF-8'); ?>" 
                        placeholder="Máximo <?php echo htmlspecialchars($local['capacidad_maxima'], ENT_QUOTES, 'UTF-8'); ?> invitados" required>
                        <small id="error-invitados" class="text-danger"></small>
                        <br>
                        <label>Horario:</label>
                        <p class="horario"></p>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label class="form-label">Información extra:</label>
                            <textarea class="form-control" rows="3" placeholder="Buen día, estoy interesado en un lugar para celebrar un cumpleaños infantil."></textarea>
                        </div>
                        <button type="button" class="btn btn-continuar w-100" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalPagar">Continuar</button>
                    </form>
                </div>
                <div class="modal-footer">
                <?php
                    echo '<p class="text-center text-muted mt-2"> ' . $local['nombre'] .  ' se pondrá en contacto contigo lo más pronto posible.</p>';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal pagar movil -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" style="min-width: 420px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Solicitud de pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php echo '<h4 class="text-center">' . $local['nombre'] . '</h4>';?>
                    <!-- Formulario de Pago -->
                    <form>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-calendar-date-fill"></i> Fecha</label>
                            <input type="text" class="form-control" placeholder="07 de enero de 2024" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-credit-card"></i></span>
                            <input type="text" class="form-control" value="Tarjeta de crédito o débito" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" id="nombreTitularMovil" class="form-control" placeholder="Nombre del titular" required>
                            <small id="error-nombreMovil" class="text-danger"></small>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col">
                                <input type="text" id="numeroTarjetaMovil" class="form-control" placeholder="0000 0000 0000 0000" maxlength="19" required>
                                <small id="error-tarjetaMovil" class="text-danger"></small>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="MM/AA" id="fechaExpiracionMovil" maxlenght="7" required>
                                <small id="error-fechaMovil" class="text-danger"></small>
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" placeholder="000" required maxlenght="3" id="cvvMovil">
                                <small id="error-cvvMovil" class="text-danger"></small>
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
    
    <script src="script/scriptLocal.js"></script>
