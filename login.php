<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon"  type="image/png" href="./imagenes/logo.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /><!---importacion de font awsome para logos -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="stylesMedia.css">

    <style>
        .error-message {
    color: red;
    font-size: 14px;
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid red;
    background-color: #f8d7da;
    border-radius: 5px;
    }

    .modal {
            display: none; /* Inicialmente oculto */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
        }
        .modal .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .modal .close:hover,
        .modal .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

    </style>
   
</head>
<body class="login">
    <div class="contenedor-gen">
        <header class="header-gen">
            <a href=""><img src="./imagenes/logo.png" alt="" class="logoHeader-gen"></a>
           
          
        </header>
        <div class="panelCentral-gen">

            <div class="recuadroLogin">
                <h2>¡Te damos la bienvenida!</h1>

                <?php
                session_start();
                if (isset($_SESSION['error'])) {
                    echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
                    unset($_SESSION['error']); // Eliminar el mensaje después de mostrarlo
                    
                }
                ?>

                <form class="formularioLogin" action="configuracion/form_login.php" method="POST">

                    <input type="text" id="correoLogin" class="inputText-gen" placeholder="Correo electrónico" name="correo" >
                    <input type="password" id="passwordLogin" class="inputText-gen" placeholder="Contraseña" name="password" required>
                   <!-- <a href="##" id="olvidasteContraseña" >¿Olvidaste tu contraseña?</a> -->
                    <button type="submit" id="btnIniciarSesion" style="font-weight: bold; font-family: 'Poppins'">Iniciar sesión</button>
                    <span>o</span>
                     <p>¿Aun no tienes cuenta? <span><a href="registro.php" id="enlaceRegistro">Registrate aquí</a></span></p>
                </form>
                

                
            </div>

        </div>
    

    </div>
    
</body>
</html>

