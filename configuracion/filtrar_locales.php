<?php
// Incluir conexión a la base de datos
require_once 'Database.php';

// Leer los datos enviados desde el frontend
$inputJSON = file_get_contents('php://input');
$filtros = json_decode($inputJSON, true);

// Variables para filtros (asignar valores predeterminados si están vacíos)
$precio_min = $filtros['precio_min'] ?? 0;
$precio_max = $filtros['precio_max'] ?? PHP_INT_MAX;

// Crear consulta base
$query = "SELECT l.* FROM local l WHERE l.precio_base BETWEEN ? AND ?";

// Preparar y ejecutar consulta
$database = new Database();
$conn = $database->getConnection();
$stmt = $conn->prepare($query);

// Combinar parámetros dinámicos
$params = [$precio_min, $precio_max];
$stmt->execute($params);

$locales = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT id_local, id_categoria FROM locales_categorias";
$stmt = $conn->prepare($query);
$stmt->execute();
$locales_categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

$id = $filtros['id'] ?? 1;

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

$capacidad_min = $filtros['capacidad_min'] ?? 0;
$capacidad_max = $filtros['capacidad_max'] ?? PHP_INT_MAX;

// Generar contenido dinámico
$html = '';
foreach ($locales_finales as $local) {
    if ($capacidad_max < $local['capacidad_maxima'] || $capacidad_min > $local['capacidad_maxima']) {
        continue;
    }

    $html .= "
    <a href='local.php?id={$local['id_local']}'>
        <article class='localCard-gen'>
            <img src='{$imagenesLocales[$local['id_local']]}' alt='imagen no disponible'>
            <h3>{$local['nombre']}</h3>
            <p>Hasta {$local['capacidad_maxima']} personas</p>
            <p>Desde \${$local['precio_base']}</p>
            <p><span><i class='fa-starIcon-card fa-solid fa-star'></i></span> {$local['promedio_calificacion']}</p>
        </article>
    </a>";
}

// Devolver respuesta al frontend
echo $html;
