<?php
include "Database.php";

$db = new Database();
$pdo = $db->getConnection();

$fecha = $_POST['fecha'];
$id_local = $_POST['id_local'];

// Verificar si la fecha tiene reservas
$query = "SELECT COUNT(*) AS total 
          FROM reservas 
          WHERE fecha = :fecha AND id_local = :id_local";
$stmt = $pdo->prepare($query);
$stmt->execute(['fecha' => $fecha, 'id_local' => $id_local]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);


if ($result['total'] > 0) {
    echo "Reservado"; // Si hay reservas, el local está ocupado
} else {
    echo "Disponible"; // Si no hay reservas, el local está disponible
}

var_dump($result['total']);
?>
