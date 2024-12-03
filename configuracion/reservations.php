<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
AND 
    (
        (DAYOFWEEK(r.fecha) BETWEEN
            CASE h.dia_inicio
                WHEN 'Domingo' THEN 1
                WHEN 'Lunes' THEN 2
                WHEN 'Martes' THEN 3
                WHEN 'Miércoles' THEN 4
                WHEN 'Jueves' THEN 5
                WHEN 'Viernes' THEN 6
                WHEN 'Sábado' THEN 7
            END
        AND
            CASE h.dia_fin
                WHEN 'Domingo' THEN 1
                WHEN 'Lunes' THEN 2
                WHEN 'Martes' THEN 3
                WHEN 'Miércoles' THEN 4
                WHEN 'Jueves' THEN 5
                WHEN 'Viernes' THEN 6
                WHEN 'Sábado' THEN 7
            END)
        OR (
            CASE h.dia_inicio
                WHEN 'Sábado' THEN 7
                WHEN 'Domingo' THEN 1
                ELSE 0
            END
            <= DAYOFWEEK(r.fecha)
        )
    )
AND 
    (
        (h.dia_inicio = 'Lunes' AND h.dia_fin = 'Viernes' AND DAYOFWEEK(r.fecha) BETWEEN 2 AND 6)
        OR 
        (h.dia_inicio = 'Sábado' AND h.dia_fin = 'Domingo' AND DAYOFWEEK(r.fecha) IN (1, 7))
    )
";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
$stmt->execute();

// Obtener los resultados
$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>