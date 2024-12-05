<?php
include "Database.php";
$db = new Database();
$pdo = $db->getConnection();

if (!isset($_POST['fecha']) || empty($_POST['fecha'])) {
    echo "<p>Por favor, selecciona una fecha.</p>";
    exit();
}
$imagenesLocales = [
    1 => 'imagenesLocales/SalonFiestaBonita.png',
    2 => 'imagenesLocales/JardinLosPinos.jpg',
    3 => 'imagenesLocales/SalonsLasEstrellas.jpg',
    4 => 'imagenesLocales/FiestaKids.jpg',
    5 => 'imagenesLocales/BodasDeluxe.jpg',
    6 => 'imagenesLocales/SalonElegance.jpeg',
    7 => 'imagenesLocales/SalonAventuras.jpg',
    8 => 'imagenesLocales/CentroCorporativoElite.jpg',
    9 => 'imagenesLocales/SalonFiestaFeliz.jpeg',
    10 => 'imagenesLocales/HaciendaLosEncinos.jpg',
];
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
            $idLocal = $local['id_local'];
            $imagen = isset($imagenesLocales[$idLocal]) ? $imagenesLocales[$idLocal] : 'imagenes/imgLocal1.png'; 
        
            echo "
                <a href='local.php?id={$idLocal}'>
                    <article class='localCard-gen'>
                        <img src='{$imagen}' alt='imagen de local no cargada'>
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
