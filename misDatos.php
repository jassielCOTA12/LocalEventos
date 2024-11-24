<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /><!---importacion de font awsome para logos -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="stylesMedia.css">
</head>
<body class="misDatos">
    <div class="contenedor-gen">
        <header class="header-gen">
            <a href="inicio.php"><img src="imagenes/logo.png" class="logoHeader-gen" alt="LOGO"></a>
            <div class="derechaHeader-gen"> 
                <a href="login.php" class="btnAcceder-gen">Acceder  <span><i class="fa-regular fa-circle-user"></i></span></a>
                
                <div class="dropdown">
                    <button class="btn " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <a href="##" class="btnBarras-gen"><i class="fa-solid fa-bars"></i></a>
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item active" href="inicio.php">Inicio</a></li>
                      <li><a class="dropdown-item " href="misDatos.php">Mis datos</a></li>
                      <li><a class="dropdown-item" href="misReservas.php">Mis reservas</a></li>
                      <li><a class="dropdown-item" href="misFavoritos.php">Mis favoritos</a></li>
                    </ul>
                </div>  
            </div>
        </header>
        <div class="panelCentral-Mdatos">
            <h1 class="title-misDatos">Mis datos</h1>
            <div class="panelContenedorDatos">
            
            <h2>Información personal</h2>
            <div class="areaDatos">
                <form action="">
                    <h3>Nombre completo </h3>
                    <input type="text" id="nombreTxt-Mdatos" class="inputGeneral-Mdatos"> <br>
                    <div class="contenedorInputHorizontal">
                        <div class="correoSeccion">
                            <h3>Correo electrónico</h3> 
                            <input type="text" id="correoTxt-Mdatos" class="inputGeneral-Mdatos">
                        </div>
                        <div class="telefonoSeccion">
                            <h3>Teléfono</h3>
                            <input type="text" id="telefonoTxt-Mdatos" class="inputGeneral-Mdatos">

                        </div>
                    </div>
                </form>
            </div>
            <h2>Pagos y cobros</h2>
            <div class="areaPagos">
                <h3>Mis pagos </h3>
                    <input type="text" id="nombreTxt-Mdatos" class="inputGeneral-Mdatos" disabled> 
                <div class="gridPagos">
                    
                    <h3>Forma de pago</h3>
                    <div class="divCards">
                        <span><i class="fa-brands fa-cc-mastercard"></i></span>
                        <p>Terminada en <strong>1234</strong></p>
                    </div>
                    <div class="divCards">
                        <span><i class="fa-brands fa-cc-mastercard"></i></span>
                        <p>Terminada en <strong>1234</strong></p>
                    </div>
                    <div class="divCards">
                        <span><i class="fa-brands fa-cc-mastercard"></i></span>
                        <p>Terminada en <strong>1234</strong></p>
                    </div>
                     <!--- agragar card por  cada metodo de pago y dejar un metodo de pago efectivo para no estar vacio   darle estilo al boton tambirn  -->

                </div>
                <div class="areaInferiorPagos">
                    <a href="#" class="btnPago">Agregar forma de pago</a>

                </div>

                


            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>