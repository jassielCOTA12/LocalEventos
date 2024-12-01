<?php
session_start();
include 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificamos si estamos recibiendo el nombre del formulario
    $nombre = $_POST['nombre'];

    // Crear instancia de la base de datos
    $db = new Database();
    $pdo = $db->getConnection();

    // Buscar si el nombre ya existe en la base de datos
    $query = "SELECT * FROM cliente WHERE nombre = :nombre"; // Cambiar correo por nombre
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // El nombre existe, se loguea al usuario
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id_cliente'] = $user['id_cliente'];
        $_SESSION['nombre'] = $user['nombre'];
        header("Location: /LocalEventos-dev-php/inicio.php");
        exit();
    } else {
        // Si no existe, puede redirigir a una página de registro
        $_SESSION['error'] = "Nombre no registrado. Por favor, regístrate.";
        header("Location: /LocalEventos-dev-php/registro.php");
        exit();
    }
}
?>
