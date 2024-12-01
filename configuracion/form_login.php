<?php
session_start();
// Incluir el archivo de conexión a la base de datos
include 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
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
            // Iniciar sesión
            $_SESSION['id_cliente'] = $user['id_cliente'];
            $_SESSION['nombre'] = $user['nombre'];
            // Redirigir al usuario a la página de inicio o dashboard
            header("Location: /LocalEventos-dev-php/inicio.php"); // Usa una URL relativa
            exit();
        } else {
            // Contraseña incorrecta (redirigir o mostrar un mensaje sin salida
            $_SESSION['error'] = "Contraseña incorrecta.";
            header("Location: /LocalEventos-dev-php/login.php"); // Redirige de vuelta al formulario
            exit();
        }
    } else {
        // Usuario no encontrado (redirigir o mostrar un mensaje sin salida)
        $_SESSION['error'] = "El correo no está registrado.";
        header("Location: /LocalEventos-dev-php/login.php"); // Redirige de vuelta al formulario
        exit();
    }
}
?>
