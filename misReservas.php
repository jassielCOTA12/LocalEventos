<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon"  type="image/png" href="./imagenes/logo.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /><!---importacion de font awsome para logos -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/stylesMedia.css">
</head>
<body class="misReservas">
    <div class="contenedor-gen">
        <?php
        include "include/header.php";
        ?>
        <div class="panelCentral-Reservas">
            <div class="panelContenedorDatos">
                <h1 class="title-misDatos">Mis reservas</h1>
                
                <div id="parteInferiorGrid-gen">
                    <?php
                        require 'configuracion/reservations.php'; // Incluye el archivo que obtiene las reservaciones
                        if (!empty($reservas)) {
                            foreach ($reservas as $local) {
                                $id_local = $local['id_local']; 
                                $ruta_imagen = isset($imagenesLocales[$id_local]) ? $imagenesLocales[$id_local] : 'imagenesLocales/HaciendaLosEncinos.jpg';
                                echo "
                                <a href='local.php?id={$local['id_local']}'>
                                <article class='localCard-gen'>
                                    <img src='$ruta_imagen' alt='Imagen de {$local['nombre_local']}'>
                                                    <h3>{$local['nombre_local']}</h3>
                                                    <p><strong>Fecha: </strong>{$local['fecha']}</p>
                                                    <p><strong>Horario: </strong>"; echo date("g:i A", strtotime($local['hora_inicio'])) . " - " . date("g:i A", strtotime($local['hora_fin']));echo"</p>

                                                </article>";
                                            }
                        } else {
                            echo "<p>No tienes reservas de locales.</p>";
                        }
                    ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>