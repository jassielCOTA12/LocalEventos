<?php
require_once 'Database.php';
$database = new Database();
$conn = $database->getConnection();

// Incluye la columna promedio_calificacion
$query = "SELECT id_local, nombre, ubicación, capacidad_maxima, precio_base, promedio_calificacion, precio_hora_extra, descripción FROM local";
$stmt = $conn->prepare($query);
$stmt->execute();

// Almacena los resultados en la variable $locales
$locales = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT id_local, id_categoria FROM locales_categorias";
$stmt = $conn->prepare($query);
$stmt->execute();
$locales_categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

$id = 1;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$locales_finales = [];

foreach ($locales_categorias as $local) {
    if ($local["id_categoria"] == $id) {
        foreach ($locales as $local_final) {
            if ($local_final["id_local"] == $local["id_local"]) {
                $locales_finales[] = $local_final;
            }
        }
    }
}

?>
