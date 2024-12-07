<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
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
// Verificar si el cliente está logueado
if (!isset($_SESSION['id_cliente'])) {
    header("Location: /LocalEventos/login.php");
    exit();
}

$id_cliente = $_SESSION['id_cliente'];

// Incluir la conexión a la base de datos
include "Database.php";

// Obtener la conexión a la base de datos
$db = new Database();
$pdo = $db->getConnection();

$query = "
SELECT 
    r.id_local,
    r.fecha, 
    h.hora_inicio, 
    h.hora_fin, 
    l.nombre AS nombre_local
FROM 
    reservas r
JOIN 
    local l ON r.id_local = l.id_local
JOIN 
    horarios h ON r.id_local = h.id_local
WHERE 
    r.id_cliente = :id_cliente
AND (
    -- Verificar si la fecha seleccionada cae dentro del rango de días de inicio y fin
    (DAYOFWEEK(r.fecha) BETWEEN
        CASE h.dia_inicio
            WHEN '1' THEN 1
            WHEN '2' THEN 2
            WHEN '3' THEN 3
            WHEN '4' THEN 4
            WHEN '5' THEN 5
            WHEN '6' THEN 6
            WHEN '7' THEN 7
        END
    AND
        CASE h.dia_fin
            WHEN '1' THEN 1
            WHEN '2' THEN 2
            WHEN '3' THEN 3
            WHEN '4' THEN 4
            WHEN '5' THEN 5
            WHEN '6' THEN 6
            WHEN '7' THEN 7
        END)
    OR (
        -- Verificar si la fecha seleccionada cae en un rango específico de días (por ejemplo, Lunes a Viernes)
        (DAYOFWEEK(r.fecha) = CASE h.dia_inicio
            WHEN '1' THEN 1
            WHEN '2' THEN 2
            WHEN '3' THEN 3
            WHEN '4' THEN 4
            WHEN '5' THEN 5
            WHEN '6' THEN 6
            WHEN '7' THEN 7
        END)
        
    ) 
    OR (
        (DAYOFWEEK(r.fecha) = 1 AND (h.dia_inicio = '1' OR h.dia_fin = '1'))
    )
)";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
$stmt->execute();

// Obtener los resultados
$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>