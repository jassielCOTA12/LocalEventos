<?php
session_start();
echo '
    <header class="header-gen">
        <a href="inicio.php"><img src="./imagenes/logo.png" alt="LOGO" class="logoHeader-gen"></a>
        <div class="derechaHeader-gen"> ';

        if (isset($_SESSION['id_cliente'])) {
            // Si la sesión está activa, mostrar el nombre del usuario en el botón de acceso
            echo '
            <a href="inicio.php" class="btnAcceder-gen">' . htmlspecialchars($_SESSION['nombre']) . ' <span><i class="fa-regular fa-circle-user"></i></span></a>';
        } else {
            // Si la sesión no está activa, mostrar el botón de "Acceder"
            echo '
            <a href="login.php" class="btnAcceder-gen">Acceder <span><i class="fa-regular fa-circle-user"></i></span></a>';
        }
        if (isset($_SESSION['id_cliente'])) {
            echo '
            <div class="dropdown">
                <button class="btn " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <a href="##" class="btnBarras-gen"><i class="fa-solid fa-bars"></i></a>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item active" href="misDatos.php">Mis datos</a></li>
                  <li><a class="dropdown-item" href="misReservas.php">Mis reservas</a></li>
                  <li><a class="dropdown-item" href="misFavoritos.php">Mis favoritos</a></li> 
                  <li><a class="dropdown-item" href="configuracion/logout.php">Cerrar sesión</a></li>
                </ul>
            </div> ' ;
        }
        echo '
        </div>
    </header>
';
?>
