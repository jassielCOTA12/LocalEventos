<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis favoritos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /><!---importacion de font awsome para logos -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="stylesMedia.css">
</head>
<body class="misFavoritos">
    <div class="contenedor-gen">
        <?php
        include "header.php";
        ?>
        <div class="panelCentral-favoritos">
            <div class="panelContenedorDatos">
                <h1 class="title-misDatos">Mis favoritos</h1>
                <div id="parteInferiorGrid-gen">
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p><span><i class="fa-solid fa-heart"></i></span></p>
                    </article>
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p><span><i class="fa-solid fa-heart"></i></span></p>
                    </article>
                    <article class="localCard-gen">
                        <img src="imagenes/ImgLocal1.png" alt="imagen de local no cargada">
                        <h3>Salón de eventos "La Roca"</h3>
                        <p><span><i class="fa-solid fa-heart"></i></span></p>
                    </article>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>