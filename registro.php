<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
    </style>
</head>
<body class="registro">
    <div class="contenedor-gen">
        <header class="header-gen">
            <a href=""><img src="./imagenes/logo.png" alt="LOGO" class="logoHeader-gen"></a>
            
        </header>
        <div class="panelCentral-gen">
            <div id="recuadroRegistro">
                    <h2>Crear una cuenta</h1>
                    <?php
                    session_start();
                    if (isset($_SESSION['error'])) {
                        echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
                        unset($_SESSION['error']); // Eliminar el mensaje después de mostrarlo   
                    }
                    if (isset($_SESSION['success']) && $_SESSION['success'] === true) {
                        echo "
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    title: '¡Registro exitoso!',
                                    text: 'Tu cuenta ha sido creada exitosamente. Ahora puedes iniciar sesión.',
                                    icon: 'success',
                                    confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '/LocalEventos/login.php';
                                    }
                                });
                            });
                        </script>
                        ";
                        unset($_SESSION['success']); // Eliminar el indicador de éxito
                    }
                    ?>
                    <form class="formularioRegistro" action="configuracion/form_register.php" method="POST">
                        <input type="text" id="nombreRegistro" class="inputText-gen" placeholder="Nombre" required name="nombre">
                        <input type="text" id="correoRegistro" class="inputText-gen" placeholder="Correo electrónico" required name="correo">
                        <input type="number" id="telefonoRegistro" class="inputText-gen" placeholder="Teléfono" required name="telefono">
                        <input type="password" id="passwordRegistro" class="inputText-gen" placeholder="Contraseña" required name="password">
            
                         
                        
                        <button type="submit" id="btnIniciarSesion" style="font-weight: bold; font-family: 'Poppins'">Registrarse</button>
                        <p id="terminosCondiciones">Al continuar,acepta los <span><a href="##" id="terminosEnlace">Términos de uso</a></span> y <br> confirma que ha leido la <span><a href="##" id="politicaEnlace">Política de privacidad.</a></span></p>
                        <p>¿Ya tienes cuenta? <span><a href="login.php" id="enlaceLogin">Inicia sesión aquí </a></span></p>
    
    
                    </form>
            </div>
            
        </div>
    

    </div>
</body>
</html>