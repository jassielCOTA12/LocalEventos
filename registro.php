<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /><!---importacion de font awsome para logos -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="stylesMedia.css">
</head>
<body class="registro">
    <div class="contenedor-gen">
        <header class="header-gen">
            <a href="inicio.php"><img src="./imagenes/logo.png" alt="LOGO" class="logoHeader-gen"></a>
            
        </header>
        <div class="panelCentral-gen">
            <div id="recuadroRegistro">
                    <h2>¡Te damos la bienvenida!</h1>
                    <form class="formularioRegistro" >
                        <input type="text" id="nombreRegistro" class="inputText-gen" placeholder="Nombre">
                        <input type="text" id="correoRegistro" class="inputText-gen" placeholder="Correo electrónico">
                        <input type="text" id="telefonoRegistro" class="inputText-gen" placeholder="Teléfono">
                        <input type="password" id="passwordRegistro" class="inputText-gen" placeholder="Contraseña">
            
                         
                        <a href="inicio.php" id="btnRegistrarte">Registrarte</a>
                        <p id="terminosCondiciones">Al continuar,acepta los <span><a href="##" id="terminosEnlace">Términos de uso</a></span> y <br> confirma que ha leido la <span><a href="##" id="politicaEnlace">Política de privacidad.</a></span></p>
                        
                        o 
                        <a href="##" id="btnGoogle"><span><i class="fa-brands fa-google"></i></span>Continuar con Google</a>
                        <a href="##" id="btnFacebook"><span><i class="fa-brands fa-facebook"></i></span>Continuar con Facebook</a>
                        <p>¿Ya tienes cuenta? <span><a href="login.php" id="enlaceLogin">Inicia sesión aquí </a></span></p>
    
    
                    </form>
            </div>
            
        </div>
    

    </div>
   
    
</body>
</html>