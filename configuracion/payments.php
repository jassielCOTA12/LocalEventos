<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el cliente está logueado
if (!isset($_SESSION['id_cliente'])) {
    header("Location: /LocalEventos/login.php");
    exit();
}

// Incluir la conexión a la base de datos
include "Database.php";

// Obtener la conexión a la base de datos
$db = new Database();
$pdo = $db->getConnection();

// Obtener el id_cliente desde la sesión
$id_cliente = $_SESSION['id_cliente'];

// Consultar todas las reservas realizadas por el cliente
$query = "
        SELECT r.*, l.nombre AS nombre
        FROM reservas r 
        JOIN cliente c ON r.id_cliente = c.id_cliente 
        JOIN local l ON r.id_local = l.id_local 
        WHERE c.id_cliente = :id_cliente
    ";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
$stmt->execute();
$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
