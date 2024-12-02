<?php
require_once 'Database.php';
$database = new Database();
$conn = $database->getConnection();

// Consulta para obtener los datos de la tabla 'local'
$query = "SELECT id_local, nombre, ubicación, capacidad_maxima, precio_base, precio_hora_extra, descripción FROM local";
$stmt = $conn->prepare($query);
$stmt->execute();

// Almacena los resultados en la variable $locales
$locales = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
