<?php
include "Database.php";
$db = new Database();
$pdo = $db->getConnection();

if (!isset($_POST['fecha']) || empty($_POST['fecha'])) {
    echo "<p>Por favor, selecciona una fecha.</p>";
    exit();
}

$fecha = $_POST['fecha'];

try {
    $query = "
        SELECT local.* 
        FROM local
        WHERE local.id_local NOT IN (
            SELECT id_local 
            FROM reservas 
            WHERE DATE(fecha) = :fecha
        )
    ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stmt->execute();

    $locales = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($locales)) {
        echo "<p>No hay locales disponibles para esta fecha.</p>";
    } else {
        foreach ($locales as $local) {
            echo "
                <a href='local.php?id={$local['id_local']}'>
                    <article class='localCard-gen'>
                        <img src='imagenes/imgLocal1.png' alt='imagen de local no cargada'>
                        <h3>{$local['nombre']}</h3>
                        <p>Hasta {$local['capacidad_maxima']} personas</p>
                        <p>Desde \${$local['precio_base']}</p>
                        <p><span><i class='fa-starIcon-card fa-solid fa-star'></i></span> {$local['promedio_calificacion']}</p>
                    </article>
                </a>
            ";
        }
    }
} catch (Exception $e) {
    echo "<p>Error al cargar los locales: {$e->getMessage()}</p>";
}
?>
