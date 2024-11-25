<?php
echo '
    <div class="contenedor-gen">
    <header class="header-gen">
        <a href="inicio.php"><img src="./imagenes/logo.png" alt="LOGO" class="logoHeader-gen"></a>
        <div class="derechaHeader-gen"> 
            <a href="login.php" class="btnAcceder-gen">Acceder <span><i class="fa-regular fa-circle-user"></i></span></a>
            
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
';
?>