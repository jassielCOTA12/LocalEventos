<?php
session_start();
include 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];

    // Crear instancia de la base de datos
    $db = new Database();
    $pdo = $db->getConnection();

    // Buscar si el correo ya existe en la base de datos
    $query = "SELECT * FROM cliente WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $correo);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // El correo existe, se loguea al usuario
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id_cliente'] = $user['id_cliente'];
        $_SESSION['nombre'] = $user['nombre'];
        header("Location: /LocalEventos-dev-php/inicio.php");
        exit();
    } else {
        // Si no existe, puede redirigir a una página de registro
        $_SESSION['error'] = "Correo no registrado. Por favor, regístrate.";
        header("Location: /LocalEventos-dev-php/registro.php");
        exit();
    }
}
?>
