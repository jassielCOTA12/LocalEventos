<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /><!---importacion de font awsome para logos -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="stylesMedia.css">
   
</head>
<body class="login">
    <div class="contenedor-gen">
        <header class="header-gen">
            <a href="inicio.php"><img src="./imagenes/logo.png" alt="" class="logoHeader-gen"></a>
           
          
        </header>
        <div class="panelCentral-gen">

            <div class="recuadroLogin">
                <h2>¡Te damos la bienvenida!</h1>
                <form class="formularioLogin" >
                    <input type="text" id="correoLogin" class="inputText-gen" placeholder="Correo electrónico">
                    <input type="password" id="passwordLogin" class="inputText-gen" placeholder="Contraseña">
        
                    <a href="##" id="olvidasteContraseña" >¿Olvidaste tu contraseña?</a> 
                    <a href="inicio.php" id="btnIniciarSesion">Iniciar sesión</a><!---Enlazada a inicio por el momento-->
                    <span>o</span>
                    <a href="##" id="btnGoogle"><span><i class="fa-brands fa-google"></i></span>Continuar con Google</a>
                    <a href="##" id="btnFacebook"><span><i class="fa-brands fa-facebook"></i></span>Continuar con Facebook</a>
                    <p>¿Aun no tienes cuenta? <span><a href="registro.php" id="enlaceRegistro">Registrate aquí</a></span></p>


                </form>
                

            </div>

        </div>
    

    </div>
   


    
</body>
</html>