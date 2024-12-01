<?php
session_start();
include 'Database.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardar los datos ingresados en la sesión
    $_SESSION['old_data'] = [
        'correo' => $_POST['correo']
    ];

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Crear instancia de la base de datos
    $db = new Database();
    $pdo = $db->getConnection();

    // Preparar y ejecutar la consulta SQL
    $query = "SELECT * FROM cliente WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $correo);
    $stmt->execute();

    // Verificar si existe un usuario con ese correo
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar la contraseña
        if (password_verify($password, $user['contraseña'])) {
            // Limpiar los datos guardados en la sesión
            unset($_SESSION['old_data']);
            $_SESSION['id_cliente'] = $user['id_cliente'];
            $_SESSION['nombre'] = $user['nombre'];
            // Redirigir al usuario a la página de inicio o dashboard
            header("Location: /LocalEventos-dev-php/inicio.php");
            exit();
        } else {
            // Contraseña incorrecta
            $_SESSION['error'] = "Contraseña incorrecta.";
            header("Location: /LocalEventos-dev-php/login.php");
            exit();
        }
    } else {
        // Usuario no encontrado
        $_SESSION['error'] = "El correo no está registrado.";
        header("Location: /LocalEventos-dev-php/login.php");
        exit();
    }
}

?>
