
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon"  type="image/png" href="./imagenes/logo.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /><!---importacion de font awsome para logos -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/stylesMedia.css">
</head>
<body class="misDatos">
    <div class="contenedor-gen">
         <?php
        include "include/header.php";
        include "configuracion/payments.php"; 
        ?>
        <div class="panelCentral-Mdatos">
            <h1 class="title-misDatos">Mis datos</h1>
            <div class="panelContenedorDatos">
            
            <h2>Información personal</h2>
            <div class="areaDatos">
                <form action="">
                <h3>Nombre completo </h3>
                    <input type="text" id="nombreTxt-Mdatos" class="inputGeneral-Mdatos" value="<?= isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']) : ''; ?>" disabled> <br>
                    <div class="contenedorInputHorizontal">
                        <div class="correoSeccion">
                            <h3>Correo electrónico</h3>
                            <!-- Mostrar el correo desde la sesión -->
                            <input type="text" id="correoTxt-Mdatos" class="inputGeneral-Mdatos" value="<?= isset($_SESSION['correo']) ? htmlspecialchars($_SESSION['correo']) : ''; ?>" disabled>
                        </div>
                        <div class="telefonoSeccion">
                            <h3>Teléfono</h3>
                            <input type="text" id="telefonoTxt-Mdatos" class="inputGeneral-Mdatos" value="<?= isset($_SESSION['telefono']) ? htmlspecialchars($_SESSION['telefono']) : ''; ?>" disabled>
                        </div>
                    </div>
                </form>
            </div>
            <h2>Pagos y cobros</h2>
            <div class="areaPagos">
                    <h3>Mis pagos </h3>
                    <?php if (count($reservas) > 0): ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Local</th>
                                    <th>Precio Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservas as $reserva): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($reserva['fecha']) ?></td>
                                        <td><?= htmlspecialchars($reserva['nombre']) ?></td>
                                        <td>$<?= number_format($reserva['precio_total'], 2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No tienes reservas registradas.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>