<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon"  type="image/png" href="./imagenes/logo.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /><!---importacion de font awsome para logos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/stylesMedia.css">

    <style>
        .error-message {
        color: rgb(220,53,69);
        font-size: 14px;
        margin-bottom: 15px;
        padding: 10px;
        background-color: none;
    }
    </style>
   
</head>
<body class="login">
    <div class="contenedor-gen">
        <header class="header-gen">
            <a href="inicio.php"><img src="./imagenes/logo.png" alt="" class="logoHeader-gen"></a>
           
          
        </header>
        <div class="panelCentral-gen">

            <div class="recuadroLogin">
                <h3 style="margin:15px 0"><strong>¡Te damos la bienvenida!</strong></h3>

                <?php
                session_start();
                if (isset($_SESSION['error'])) {
                    echo '<div class="error-message" id="error-message">' . $_SESSION['error'] . '</div>';
                    unset($_SESSION['error']); 
                    
                }
                ?>

                <form class="formularioLogin" action="configuracion/form_login.php" method="POST">

                    <input type="text" id="correoLogin" class="inputText-gen form-control" placeholder="Correo electrónico" name="correo" >
                    <input type="password" id="passwordLogin" class="inputText-gen form-control" placeholder="Contraseña" name="password" required>
                   <!-- <a href="##" id="olvidasteContraseña" >¿Olvidaste tu contraseña?</a> -->
                    <button type="submit" id="btnIniciarSesion" class="btnLogin" style="font-weight: bold; font-family: 'Poppins'; margin-top:0">Iniciar sesión</button>
                     <p>¿Aun no tienes cuenta? <span><a href="registro.php" id="enlaceRegistro">Registrate aquí</a></span></p>
                </form>
                

                
            </div>

        </div>
    

    </div>
    <script src="script/scriptLogin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                
</body>
</html>

