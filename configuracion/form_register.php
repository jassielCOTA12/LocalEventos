<?php
session_start();
// Incluir el archivo de conexión a la base de datos
include 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];

    // Validar nombre
  /*  if (strlen($nombre) < 3) {
        $_SESSION['error'] = "El nombre debe tener al menos 3 caracteres.";
        header("Location: /LocalEventos/registro.php");
        exit();
    }

    // Validar correo
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "El correo electrónico no es válido.";
        header("Location: /LocalEventos/registro.php");
        exit();
    }

    // Validar teléfono
    if (!preg_match('/^[0-9]{10}$/', $telefono)) {
        $_SESSION['error'] = "El teléfono debe tener 10 dígitos numéricos.";
        header("Location: /LocalEventos/registro.php");
        exit();
    }

    // Validar contraseña
    if (strlen($password) < 6) {
        $_SESSION['error'] = "La contraseña debe tener al menos 6 caracteres.";
        header("Location: /LocalEventos/registro.php");
        exit();
    }*/

    // Crear instancia de la base de datos
    $db = new Database();
    $pdo = $db->getConnection();

    // Verificar si el correo ya está registrado
    $query = "SELECT * FROM cliente WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $correo);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Si el correo ya está registrado, mostrar un mensaje de error
        $_SESSION['error'] = "El correo ya está registrado.";
        header("Location: /LocalEventos/registro.php"); // Redirigir al formulario de registro
        exit();
    } else {
        // Si el correo no está registrado, proceder con el registro
        // Hashear la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insertar los datos del nuevo usuario
        $query = "INSERT INTO cliente (nombre, telefono, email, contraseña) VALUES (:nombre, :telefono, :email, :password)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':email', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Si el registro es exitoso, redirigir al login
            $_SESSION['success'] = true; // Indicador de éxito
            header("Location: /LocalEventos/registro.php");
            exit();
        } else {
            // Si hubo un error en la inserción, mostrar mensaje de error
            $_SESSION['error'] = "Hubo un error al registrar tu cuenta.";
            header("Location: /LocalEventos/registro.php");
            exit();
        }
    }
}
?>
